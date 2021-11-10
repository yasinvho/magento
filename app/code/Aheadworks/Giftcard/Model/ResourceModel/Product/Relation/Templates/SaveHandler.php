<?php
/**
 * Copyright 2019 aheadWorks. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Aheadworks\Giftcard\Model\ResourceModel\Product\Relation\Templates;

use Aheadworks\Giftcard\Api\Data\TemplateInterface;
use Magento\Framework\EntityManager\Operation\ExtensionInterface;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\EntityManager\MetadataPool;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Eav\Api\AttributeRepositoryInterface;
use Magento\Framework\EntityManager\HydratorPool;
use Aheadworks\Giftcard\Model\Product\Type\Giftcard as ProductGiftcard;
use Magento\Store\Model\StoreManagerInterface as StoreManager;
use Magento\Framework\EntityManager\EntityManager;

/**
 * Class SaveHandler
 *
 * @package Aheadworks\Giftcard\Model\ResourceModel\Product\Relation\Templates
 */
class SaveHandler implements ExtensionInterface
{
    /**
     * @var ResourceConnection
     */
    private $resourceConnection;

    /**
     * @var MetadataPool
     */
    private $metadataPool;

    /**
     * @var HydratorPool
     */
    private $hydratorPool;

    /**
     * @var AttributeRepositoryInterface
     */
    private $attributeRepository;

    /**
     * @var StoreManager
     */
    private $storeManager;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param ResourceConnection $resourceConnection
     * @param MetadataPool $metadataPool
     * @param HydratorPool $hydratorPool
     * @param AttributeRepositoryInterface $attributeRepository
     * @param StoreManager $storeManager
     * @param EntityManager $entityManager
     */
    public function __construct(
        ResourceConnection $resourceConnection,
        MetadataPool $metadataPool,
        HydratorPool $hydratorPool,
        AttributeRepositoryInterface $attributeRepository,
        StoreManager $storeManager,
        EntityManager $entityManager
    ) {
        $this->resourceConnection = $resourceConnection;
        $this->metadataPool = $metadataPool;
        $this->hydratorPool = $hydratorPool;
        $this->attributeRepository = $attributeRepository;
        $this->storeManager = $storeManager;
        $this->entityManager = $entityManager;
    }

    /**
     *  {@inheritDoc}
     */
    public function execute($entity, $arguments = [])
    {
        $hydrator = $this->hydratorPool->getHydrator(ProductInterface::class);
        $entityData = $hydrator->extract($entity);
        if ($entityData['type_id'] !== ProductGiftcard::TYPE_CODE) {
            return $entity;
        }

        $templates = $entity->getExtensionAttributes()->getAwGiftcardTemplates();
        if (!empty($templates)) {
            $entityId = $entityData['entity_id'];
            $this->removeTemplatesByProduct($entityId);
            $this->saveNewProductTemplates($templates, $entityId);
        }
        return $entity;
    }

    /**
     * Remove templates data by product id
     *
     * @param int $entityId
     * @return int
     */
    private function removeTemplatesByProduct($entityId)
    {
        $connection = $this->getConnection();
        $table = $this->resourceConnection
            ->getTableName($this->metadataPool->getMetadata(TemplateInterface::class)->getEntityTable());

        return $connection->delete($table, ['entity_id = ?' => $entityId]);
    }

    /**
     * Save new product templates data
     *
     * @param [] $templates
     * @param int $entityId
     * @return $this
     */
    private function saveNewProductTemplates($templates, $entityId)
    {
        foreach ($templates as $template) {
            /** @var TemplateInterface $template */
            $template->setValueId('');
            $template->setEntityId($entityId);
            $this->entityManager->save($template);
        }
        return $this;
    }

    /**
     * Get connection
     *
     * @return \Magento\Framework\DB\Adapter\AdapterInterface
     * @throws \Exception
     */
    private function getConnection()
    {
        return $this->resourceConnection->getConnectionByName(
            $this->metadataPool->getMetadata(TemplateInterface::class)->getEntityConnectionName()
        );
    }
}
