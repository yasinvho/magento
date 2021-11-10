<?php

namespace Brainvire\Qna\Controller\Index;

class Config extends \Magento\Framework\App\Action\Action
{

	protected $helperData;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Brainvire\Qna\Helper\Data $helperData

	)
		{
			$this->helperData = $helperData;
			return parent::__construct($context);
		}

	public function execute()
		{
			echo $this->helperData->getGeneralConfig('display_text');
			exit();

		}
}