<?php
/**
 * Copyright 2019 aheadWorks. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Aheadworks\Giftcard\Model\Import;

use Aheadworks\Giftcard\Model\Import\Exception\ImportValidatorException;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\App\RequestInterface;
use Magento\Ui\Component\Filters;
use Magento\Ui\Component\Filters\Type\Select;
use Magento\Ui\Component\MassAction\Filter;

/**
 * Class AbstractImport
 *
 * @package Aheadworks\Giftcard\Model\Import
 */
abstract class AbstractImport
{
    /**
     * Listing namespace
     *
     * @var string
     */
    protected $namespace;

    /**
     * Log file name
     *
     * @var string
     */
    protected $logFileName;

    /**
     * Options from listing
     *
     * @var []
     */
    private $options;

    /**
     * Array of validation failure messages
     *
     * @var []
     */
    private $messages = [];

    /**
     * @var []
     */
    private $requiredFields;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @param DataObjectHelper $dataObjectHelper
     * @param Filter $filter
     * @param RequestInterface $request
     */
    public function __construct(
        DataObjectHelper $dataObjectHelper,
        Filter $filter,
        RequestInterface $request
    ) {
        $this->dataObjectHelper = $dataObjectHelper;
        $this->filter = $filter;
        $this->request = $request;
    }

    /**
     * Process import
     *
     * @param [] $rawData
     * @return []
     * @throws ImportValidatorException
     */
    public function process($rawData)
    {
        $this->messages = [];
        $this->request->setParams(['namespace' => $this->namespace]);
        $component = $this->filter->getComponent();
        $this->filter->prepareComponent($component);

        // First row in array - header
        $codesRawHeader = $rawData[0];
        $validFields = $this->getValidFields($codesRawHeader);
        $filteredRows = $this->filterRawData($rawData, $validFields);

        $objects = [];
        if (!empty($this->getMessages())) {
            $this->saveMessagesToLog();
            throw new ImportValidatorException(
                __(
                    'Verification error while importing data. Details are available in log file: %1',
                    $this->getUrlToLogFile()
                )
            );
        }
        $objects = $this->convertDataToObject($filteredRows);
        $this->saveMessagesToLog();

        return $objects;
    }

    /**
     * Retrieve url to log file
     *
     * @return string
     */
    public function getUrlToLogFile()
    {
        return $this->getPathToLogFile();
    }

    /**
     * Get validation failure messages
     *
     * @return string[]
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Process import data
     *
     * @param [] $filteredRows
     * @return []
     */
    abstract protected function convertDataToObject($filteredRows);

    /**
     * Retrieve list of fields for data array
     *
     * @return []
     */
    abstract protected function getHeaderFields();

    /**
     * Add messages
     *
     * @param string[] $messages
     * @return void
     */
    protected function addMessages($messages)
    {
        $this->messages = array_merge_recursive($this->messages, $messages);
    }

    /**
     * Save validation failure messages to log file
     *
     * @return $this
     */
    protected function saveMessagesToLog()
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/' . $this->getPathToLogFile());
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);

        $messages = $this->getMessages();
        foreach ($messages as $message) {
            $logger->info($message);
        }

        return $this;
    }

    /**
     * Retrieve row data
     *
     * @param string[] $row
     * @return string[]
     */
    protected function getRowData($row)
    {
        $options = $this->getOptions();
        foreach ($row as $key => $value) {
            if (isset($options[$key])) {
                $matched = '';
                foreach ($options[$key] as $optionValue) {
                    if (!$matched && $optionValue['label'] == $value) {
                        $matched = $optionValue['value'];
                    }
                }
                $row[$key] = $matched;
            } else {
                $row[$key] = $this->prepareValue($key, $value);
            }
        }
        return $row;
    }

    /**
     * Prepare value
     *
     * @param string $column
     * @param string $value
     * @return string
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function prepareValue($column, $value)
    {
        return $value;
    }

    /**
     * Retrieve valid fields
     *
     * @param string[] $codesRawHeader
     * @return string[]
     */
    protected function getValidFields($codesRawHeader)
    {
        $validFields = [];
        $headerFields = $this->getHeaderFields();

        foreach ($headerFields as $valueHeaderFields) {
            $matched = false;
            foreach ($codesRawHeader as $indexHeader => $valueHeader) {
                if ($valueHeader == $valueHeaderFields['header']) {
                    $validFields[$indexHeader] = $valueHeaderFields['field_name'];
                    $matched = true;
                }
            }
            if (!$matched && isset($valueHeaderFields['required']) && $valueHeaderFields['required']) {
                $this->addMessages([__('Missing a required field: %1', $valueHeaderFields['header'])]);
            }
        }
        return $validFields;
    }

    /**
     * Filter raw data
     *
     * @param string[][] $rawData
     * @param string[] $validFields
     * @return string[][]
     */
    protected function filterRawData($rawData, $validFields)
    {
        $filteredData = [];
        for ($index = 0; $index < count($rawData); $index++) {
            // Skip first row (header in array)
            if ($index == 0) {
                continue;
            }
            // Set to new array valid fields from row
            foreach ($rawData[$index] as $fieldIndex => $fieldValue) {
                if (isset($validFields[$fieldIndex])) {
                    $filteredData[$index][$validFields[$fieldIndex]] = $fieldValue;
                }
            }

            $this->validateRow($filteredData[$index], $index);
        }
        return $filteredData;
    }

    /**
     * Check is valid row or not
     *
     * @param string[] $row
     * @param int $index
     * @return bool
     */
    private function validateRow($row, $index)
    {
        $requiredFields = $this->getRequiredHeaderFields();
        foreach ($requiredFields as $valueRequiredFields) {
            $requiredAssociations = [];
            if (isset($valueRequiredFields['required_association'])
                && is_array($valueRequiredFields['required_association'])
            ) {
                $requiredAssociations = $valueRequiredFields['required_association'];
            }
            $matchedAssociations = 0;
            foreach ($requiredAssociations as $association) {
                if (isset($row[$association['field']]) && $row[$association['field']] == $association['value']) {
                    $matchedAssociations++;
                }
            }
            if (count($requiredAssociations) > 0 && $matchedAssociations != count($requiredAssociations)) {
                return true;
            }

            $matched = false;
            foreach ($row as $rowFieldName => $rowValue) {
                if ($rowFieldName == $valueRequiredFields['field_name'] && !empty($rowValue)) {
                    $matched = true;
                }
            }
            if (!$matched) {
                $this->addMessages([
                    __('Missing required value %1 in row %2', $valueRequiredFields['header'], ($index + 1))
                ]);
                return false;
            }
        }
        return true;
    }

    /**
     * Returns Filters with options
     *
     * @return array
     */
    private function getOptions()
    {
        if (null == $this->options) {
            $this->options = [];
            $component = $this->filter->getComponent();
            $childComponents = $component->getChildComponents();
            $listingTop = $childComponents['listing_top'];
            foreach ($listingTop->getChildComponents() as $child) {
                if ($child instanceof Filters) {
                    foreach ($child->getChildComponents() as $filter) {
                        if ($filter instanceof Select) {
                            $this->options[$filter->getName()] = $this->getFilterOptions($filter);
                        }
                    }
                }
            }
        }
        return $this->options;
    }

    /**
     * Returns array of Select options
     *
     * @param Select $filter
     * @return array
     */
    private function getFilterOptions(Select $filter)
    {
        $options = [];
        foreach ($filter->getData('config/options') as $option) {
            $options[] = $option;
        }
        return $options;
    }

    /**
     * Retrieve list of fields required for data array
     *
     * @return []
     */
    private function getRequiredHeaderFields()
    {
        if (null == $this->requiredFields) {
            $this->requiredFields = [];
            $headerFields = $this->getHeaderFields();

            foreach ($headerFields as $valueField) {
                if (isset($valueField['required']) && $valueField['required']) {
                    $this->requiredFields[] = $valueField;
                }
            }
        }

        return $this->requiredFields;
    }

    /**
     * Retrieve path to log file
     *
     * @return string
     */
    private function getPathToLogFile()
    {
        return 'var/log/' . $this->logFileName . '.log';
    }
}
