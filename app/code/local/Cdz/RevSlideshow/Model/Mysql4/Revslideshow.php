<?php
class Cdz_RevSlideshow_Model_Mysql4_Revslideshow extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("revslideshow/revslideshow", "slideshow_id");
    }
    protected function _beforeSave(Mage_Core_Model_Abstract $object)
    {
        if (!$object->getId()) {
            $object->setCreationTime(Mage::getSingleton('core/date')->gmtDate());
        }
        $object->setUpdateTime(Mage::getSingleton('core/date')->gmtDate());
        return $this;
    }
}