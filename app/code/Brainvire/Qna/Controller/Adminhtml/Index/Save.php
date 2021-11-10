<?php
namespace Brainvire\Qna\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Brainvire\Qna\Model\DetaFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Session\SessionManagerInterface;

class Save extends Action
{
    const ADMIN_RESOURCE = 'Brainvire_Qna::Question';

    protected $_entityFactory;
    
    protected $resultPageFactory;

    protected $_sessionManager;

    public function __construct(
        Context $context,
        DetaFactory $entityFactory,
        PageFactory  $resultPageFactory,
        SessionManagerInterface $sessionManager
    )
        {
            parent::__construct($context);
            $this->_entityFactory = $entityFactory;
            $this->resultPageFactory = $resultPageFactory;
            $this->_sessionManager = $sessionManager;
            
        }
    
        public function execute()
            {   
                $resultRedirect     = $this->resultRedirectFactory->create();
                $entityModel        = $this->_entityFactory->create();
                $data               = $this->getRequest()->getPost(); 
                
                // print_r($data);
                // die();
                 $myArray = json_decode(json_encode($data), true);
                
                        $entityModel->setQuestionId($myArray["deta"]["question_id"]);

                        
                    $entityModel->setData('answer',$myArray["deta"]["answer"]);
                    
                    $entityModel->setData('is_active',$myArray["deta"]["is_active"]);


                    $entityModel->save();
                    //check for `back` parameter
                    if ($this->getRequest()->getParam('back')) { 
                        return $resultRedirect->setPath('*/*/edit', ['question_id' => $entityModel->getId(), '_current' => true, '_use_rewrite' => true]);
                    }

                    $this->_redirect('*/*');
                    $this->messageManager->addSuccess(__('The Question has been Edited.'));      
               
            }
        protected function _isAllowed()
                {
                 return $this->_authorization->isAllowed('Brainvire_Qna::question_save');
                }
}