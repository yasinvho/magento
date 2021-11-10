<?php

namespace Brainvire\Qna\Controller\Question;

use Brainvire\Qna\Model\Deta;
use Brainvire\Qna\Model\ResourceModel\Deta as DetaResourceModel;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Save extends Action
{
    private $deta;
   
    private $detaResourceModel;

    public function __construct(
        Context $context,
        Deta $deta,
        DetaResourceModel $detaResourceModel
    ) {
        $this->deta = $deta;
        $this->detaResourceModel = $detaResourceModel;
        parent::__construct($context);
      }

    public function execute()
        {
            $params = $this->getRequest()->getParams();
            $deta = $this->deta->setData($params);
            try {
                $this->detaResourceModel->save($deta);
                
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__("Something went wrong."));
            }
            $redirect = $this->resultRedirectFactory->create();
            $redirect->setPath('qna/index/index');
            return $redirect;
        }
}
