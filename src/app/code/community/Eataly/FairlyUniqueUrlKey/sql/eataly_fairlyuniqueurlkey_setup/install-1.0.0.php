<?php

/**
 * @var $this Mage_Catalog_Model_Resource_Setup
 */
$this->getConnection()->dropIndex(
    $this->getTable(array('catalog/product', 'url_key')),
    $this->getIdxName(
        array('catalog/product', 'url_key'),
        array('value'),
        Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE
    )
);

$this->getConnection()->addIndex(
    $this->getTable(array('catalog/product', 'url_key')),
    $this->getIdxName(
        array('catalog/product', 'url_key'),
        array('value', 'store_id'),
        Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE
    ),
    array('value', 'store_id'),
    Varien_Db_Adapter_Interface::INDEX_TYPE_UNIQUE
);
