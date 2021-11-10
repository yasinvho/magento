<?php

namespace Brainvire\Qna\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Deta extends AbstractDb
{
    const MAIN_TABLE = 'que_ans';
    const ID_FIELD_NAME = 'question_id';

    public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}