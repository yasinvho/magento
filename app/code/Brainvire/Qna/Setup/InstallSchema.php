<?php declare(strict_types=1);

namespace Brainvire\Qna\Setup;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Zend_Db_Exception;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();
        $table = $installer->getConnection()->newTable(
            $installer->getTable('que_ans')
        )->addColumn(
            'question_id',
            Table::TYPE_INTEGER,
            11,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Question ID'
        )->addColumn(
            'question',
            Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Question Title'
        )->addColumn(
            'answer',
            Table::TYPE_TEXT,
            65536,
            ['nullable' => false],
            'Question Content'
        )->addColumn(
            'email',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Email'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Name'
        )->addColumn(
            'product_name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'productName'
        )->addColumn(
            'customer_id',
            Table::TYPE_INTEGER,
            11,
            ['unsigned' => true, 'nullable' => true],
            'Customer Name'
        )->addIndex(
            $installer->getIdxName('que_ans', ['customer_id']),
            ['customer_id']
        )->addForeignKey(
            $installer->getFkName('que_ans', 'customer_id', 'customer_entity', 'entity_id'),
            'customer_id',
            $installer->getTable('customer_entity'),
            'entity_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->addColumn(
            'creation_time',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
            'Question Creation Time'
        )->addColumn(
            'update_time',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
            'Question Modification Time'
        )->addColumn(
            'is_active',
            Table::TYPE_SMALLINT,
            null,
            ['nullable' => false],
            'Is Question Active'
        )->setComment(
            'Question Table'
        );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}