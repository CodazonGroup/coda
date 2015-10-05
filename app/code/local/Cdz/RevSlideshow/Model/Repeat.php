<?php
class Cdz_RevSlideshow_Model_Repeat extends Varien_Object
{
    static public function getOptionArray()
    {
        return array(
            'no-repeat'      => Mage::helper('revslideshow')->__('No Repeat'),
            'repeat'      => Mage::helper('revslideshow')->__('Repeat'),
            'repeat-x'      => Mage::helper('revslideshow')->__('Repeat X'),
            'repeat-y'      => Mage::helper('revslideshow')->__('Repeat Y'),            
        );
    }
}