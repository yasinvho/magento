<?php
namespace Brainvire\Qna\Controller\Adminhtml\Index;

class Index extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Index';

    protected $resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
            {
                $this->resultPageFactory = $resultPageFactory;
                parent::__construct($context);
            }

   
            public function execute()
                {
                    $resultPage = $this->resultPageFactory->create();
                    $resultPage->getConfig()->getTitle()->prepend(__('Question List'));
                    return $resultPage;
                }
            protected function _isAllowed()
                {
                 return $this->_authorization->isAllowed('Brainvire_Qna::menus');
                }
}