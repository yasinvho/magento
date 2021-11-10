<?php
namespace Brainvire\Qna\Model\Deta;

use Brainvire\Qna\Model\ResourceModel\Deta\CollectionFactory;
use Brainvire\Qna\Model\Deta;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $contactCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $contactCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();
        
        foreach ($items as $deta) {
           
            $this->loadedData[$deta->getId()]['deta'] = $deta->getData();
        }

        return $this->loadedData;

    }
}