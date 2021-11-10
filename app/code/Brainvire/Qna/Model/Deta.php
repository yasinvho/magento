<?php
namespace Brainvire\Qna\Model;
use Magento\Framework\Model\AbstractModel;

class Deta extends AbstractModel
{
    
    protected function _construct()
    {
        $this->_init(\Brainvire\Qna\Model\ResourceModel\Deta::class);
    }

    
}
