<?php 
namespace Brainvire\Deals\Setup;

use Magento\Eav\Setup\EavSetup; 
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Catalog\Setup\CategorySetupFactory;
use Magento\Eav\Model\Entity\Attribute\Set as AttributeSet;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;

/*
* UpgradeDataInterface brings the ‘upgrade’ method which must be implemented
*/
class InstallData implements InstallDataInterface
{
 	private $eavSetupFactory;
	private $attributeSetFactory;
	private $attributeSet;
	private $categorySetupFactory;
   	


public function __construct(EavSetupFactory $eavSetupFactory, AttributeSetFactory $attributeSetFactory, CategorySetupFactory $categorySetupFactory )
    	{
        		$this->eavSetupFactory = $eavSetupFactory; 
        		$this->attributeSetFactory = $attributeSetFactory; 
        		$this->categorySetupFactory = $categorySetupFactory; 
    	} 
	
 public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
 {
 	 
    $categorySetup = $this->categorySetupFactory->create(['setup' => $setup]);
		$categorySetup = $this->categorySetupFactory->create(['setup' => $setup]);
		$entityTypeId = $categorySetup->getEntityTypeId(\Magento\Catalog\Model\Product::ENTITY);
                $attributeSetId = $categorySetup->getAttributeSetId($entityTypeId, 'default');
                
		$autosettingsTabName = 'Custom Product Deals';
		$categorySetup->addAttributeGroup($entityTypeId, $attributeSetId, $autosettingsTabName, 50);
     //eav_attribute_group
        $setup->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
 
         $eavSetup->addAttribute(
             \Magento\Catalog\Model\Product::ENTITY,
             'discount_type',
             [
                 'type' => 'int',
                 'label' => 'Discount Type',
                 'backend' => '',
                 'input' => 'select',
                 'wysiwyg_enabled'   => false,
                 'source' => 'Brainvire\Deals\Model\Config\Source\Options',
                 'required' => false,
                 'sort_order' => 5,
                 'group' => 'Custom Product Deals',
                 'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                 'used_in_product_listing' => true,
                 'visible_on_front' => true,
            ]
         ); 
         $eavSetup->addAttribute(
             \Magento\Catalog\Model\Product::ENTITY,
            'discount_price',
             [
                 'type' => 'varchar',
                 'label' => 'Discount Price',
                 'backend' => '',
                 'input' => 'text',
                 'wysiwyg_enabled'   => false,
                 'source' => '',
                 'required' => false,
                 'sort_order' => 5,
                 'group' => 'Custom Product Deals',
                 'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                 'used_in_product_listing' => true,
                 'visible_on_front' => true
            ]
          );
           $eavSetup->addAttribute(
             \Magento\Catalog\Model\Product::ENTITY,   
            'discount_from_date',
             [
                 'type' => 'datetime',
                 'label' => 'Discount From Date',
                 'backend' => '',
                 'input' => 'date',
                 'wysiwyg_enabled'   => false,
                 'source' => '',
                 'required' => false,
                 'sort_order' => 5,
                 'group' => 'Custom Product Deals',
                 'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                 'used_in_product_listing' => true,
                 'visible_on_front' => true
            ]
          );   
            $eavSetup->addAttribute(
             \Magento\Catalog\Model\Product::ENTITY,
            'discount_to_date',
             [
                 'type' => 'datetime',
                 'label' => 'Discount to Date',
                 'backend' => '',
                 'input' => 'date',
                 'wysiwyg_enabled'   => false,
                 'source' => '',
                 'required' => false,
                 'sort_order' => 5,
                 'group' => 'Custom Product Deals',
                 'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
                 'used_in_product_listing' => true,
                 'visible_on_front' => true
            ]
        );  
 
        $setup->endSetup();
  } 
} 