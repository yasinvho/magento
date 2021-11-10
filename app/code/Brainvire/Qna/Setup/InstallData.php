<?php
namespace Brainvire\Qna\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{

private $eavSetupFactory;

/**
* Init
*
* @param EavSetupFactory $eavSetupFactory
*/
public function __construct(EavSetupFactory $eavSetupFactory)
{
    $this->eavSetupFactory = $eavSetupFactory;
}

public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
{
            /* @var EavSetup $eavSetup */
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
            /**
            * Add attributes to the eav/attribute
            */

            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
            //       'question_tab',
            //       [
            //     'group'              => 'General',
            //     'input'              => 'select',
            //     'type'               => 'int',
            //     'label'              => 'Question Tab',
            //     'visible'            => true,
            //     'required'           => false,
            //     'user_defined'               => true,
            //     'searchable'                 => false,
            //     'filterable'                 => false,
            //     'comparable'                 => false,
            //     'visible_on_front'           => false,
            //     'visible_in_advanced_search' => false,
            //     'is_html_allowed_on_front'   => false,
            //     'used_for_promo_rules'       => true,
            //     'source'                     => 'Brainvire\Qna\Model\Attribute\Backend\CustomAttribute',
            //     'frontend_class'             => '',
            //     'global'                     =>  \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
            //     'unique'                     => false,
            //     'apply_to'                   => 'simple,grouped,configurable,downloadable,virtual,bundle'
            // ]
                   
               'qna_tab',
                [
                    'group' => 'General',
                    'type' => 'int',
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'QnA Tab',
                    'input' => 'boolean',
                    'class' => '',
                    'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '1',
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => false,
                    'unique' => false,
                    'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
                ]
            );
    }
}