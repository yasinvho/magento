<?php
namespace Brainvire\Qna\Controller\Adminhtml\Question;
 
use Magento\Backend\App\Action;
 
class Delete extends Action
{
    private $_model1;

    public function __construct(
        Action\Context $context,
        \Brainvire\Qna\Model\Deta $model1
        ) {
            parent::__construct($context);
            $this->_model1 = $model1;
          }  
 
        public function execute()
            {
                $id = $this->getRequest()->getParam('id');
           
                $resultRedirect = $this->resultRedirectFactory->create();
                if ($id) {
                    try {
                        $model1 = $this->_model1;
                        $model1->load($id);
                        $model1->delete();
                        $this->messageManager->addSuccess(__('Question deleted'));
                        return $resultRedirect->setPath('qna/index/index');
                    } catch (\Exception $e) {
                        $this->messageManager->addError($e->getMessage());
                        return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
                    }
                }
                $this->messageManager->addError(__('Question does not exist'));
                return $resultRedirect->setPath('qna/index/index');
            }

        protected function _isAllowed()
            {
             return $this->_authorization->isAllowed('Brainvire_Qna::question_delete');
            }
}