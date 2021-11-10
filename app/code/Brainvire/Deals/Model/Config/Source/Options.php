<?php

namespace Brainvire\Deals\Model\Config\Source;

class Options extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
    * Get all options
    *
    * @return array
    */
    public function getAllOptions()
    {
        $this->_options = [
                ['label' => __('Fixed'), 'value'=>'0'],
                ['label' => __('Percentage'), 'value'=>'1']
            ];

    return $this->_options;

    }

}