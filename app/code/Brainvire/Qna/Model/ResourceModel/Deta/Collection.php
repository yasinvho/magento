<?php
namespace Brainvire\Qna\Model\ResourceModel\Deta;
use Brainvire\Qna\Model\Deta;
use Brainvire\Qna\Model\ResourceModel\Deta as DetaResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    
    protected function _construct()
    {
        $this->_init(Deta::class, DetaResourceModel::class);
    }
}
