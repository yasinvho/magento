<?php
namespace Brainvire\Qna\Block;

use Brainvire\Qna\Model\ResourceModel\Deta\Collection;
use Magento\Framework\View\Element\Template;

class Display extends Template
{
    protected $_registry;

    private $collection;

    public function __construct(
        Template\Context $context,
        \Magento\Framework\Registry $registry,
         \Brainvire\Qna\Helper\Data $helperData,
        Collection $collection,
        array $deta = [] 
    ) 
        {
            $this->_registry = $registry;
            $this->helperData = $helperData;
            $this->collection = $collection;
            parent::__construct($context, $deta);
        }

            public function getAllEmpdeta()
            {
                return $this->collection;
            }

            public function getPostUrl()
            {
                return $this->getUrl('question/deta/save');
            }
             
             
            public function getConfigValue()
            {    
                return $this->helperData->getGeneralConfig('display_text');    
            }
            
             public function getCurrentProduct()
            {
                return $this->_registry->registry('current_product');
            }
}
