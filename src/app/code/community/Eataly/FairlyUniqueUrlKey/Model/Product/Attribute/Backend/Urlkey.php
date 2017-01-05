<?php

class Eataly_FairlyUniqueUrlKey_Model_Product_Attribute_Backend_Urlkey
    extends Enterprise_Catalog_Model_Product_Attribute_Backend_Urlkey
{

    /**
     * Check unique url_key value in catalog_category_entity_url_key table.
     *
     * @param Mage_Catalog_Model_Abstract $object
     * @return bool
     * @throws Mage_Core_Exception
     */
    protected function _isAvailableUrl($object)
    {
        $select = $this->_connection->select()
            ->from($this->getAttribute()->getBackendTable(), array('entity_id', 'store_id'))
            ->where('value = ?', $object->getUrlKey())
            ->where('store_id = ?', $object->getStoreId())
            ->limit(1);
        $row = $this->_connection->fetchRow($select);

        // we should allow save same url key for product in current store view
        // but not allow save existing url key in current store view from another store view
        if (empty($row)) {
            return true;
        } elseif ($object->getId() && $object->getStoreId() !== null
                  && ($row['store_id'] == $object->getStoreId() && $row['entity_id'] == $object->getId())
        ) {
            return true;
        }
        return false;
    }

}
