<?php
namespace Brainvire\Qna\Block\Adminhtml\Question\Edit;
    
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;
use Magento\Framework\UrlInterface;

class GenericButton
{
    protected $urlBuilder;

   protected $registry;

   
    public function __construct(
        Context $context,
        Registry $registry
    ) {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
        $this->context = $context;
    }
    
       public function getId()
    {
        $entityId = null;
        $entityId =  $this->context->getRequest()->getParam('id'); 
        
        return $entityId;
    }
   
    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}
