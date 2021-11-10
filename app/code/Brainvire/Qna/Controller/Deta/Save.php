<?php
namespace Brainvire\Qna\Controller\Deta;

use Brainvire\Qna\Model\Deta;
use Brainvire\Qna\Model\ResourceModel\Deta as DetaResourceModel;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Save extends Action
{
    private $deta;
    
    protected $_request;
    
    private $detaResourceModel;

    public function __construct(
        Context $context,
        Deta $deta,
        \Magento\Framework\App\Request\Http $request,
        DetaResourceModel $detaResourceModel
        ) {
            $this->deta = $deta;
            $this->detaResourceModel = $detaResourceModel;
            parent::__construct($context);
          }

    public function execute()
        {
                
                $product = $_POST['product_name']; 
                $question = $_POST['question'];
                $username = $_POST['name'];
                $email =  $_POST['email'];
            $params = $this->getRequest()->getParams();
            $deta = $this->deta->setData($params);

             if(empty($question))
                {
                $this->messageManager->addErrorMessage(__("Please Enter Question"));
                    return $this->_redirect($product.'.html');
                }
                if(empty($username))
                {
                $this->messageManager->addErrorMessage(__("Please Enter Username "));
                    return $this->_redirect($product.'.html');
                }
                if(empty($email))
                {
                $this->messageManager->addErrorMessage(__("Please Enter Email"));
                    return $this->_redirect($product.'.html');
                }
            try {
                    
                $this->detaResourceModel->save($deta);
                $this->messageManager->addSuccess(__('Thanks for asking us,we will provide answer soon.'));
                return $this->_redirect($product.'.html');

                        }
                         catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__("Something went wrong."));
            }
            $redirect = $this->resultRedirectFactory->create();

            $redirect->setPath($product.'.html');
            return $redirect;
        }
}
