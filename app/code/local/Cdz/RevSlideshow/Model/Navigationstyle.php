<?php
class Cdz_RevSlideshow_Model_Navigationstyle extends Varien_Object
{
    static public function getOptionArray()
    {
        return array(
            'preview1'      => Mage::helper('revslideshow')->__('Style 1'),
            'preview2'      => Mage::helper('revslideshow')->__('Style 2'),
            'preview3'      => Mage::helper('revslideshow')->__('Style 3'),
            'preview4'      => Mage::helper('revslideshow')->__('Style 4'),
            'round'         => Mage::helper('revslideshow')->__('Round'),
            'square'        => Mage::helper('revslideshow')->__('Square'),
            'round-old'     => Mage::helper('revslideshow')->__('Old Round'),            
            'square-old'    => Mage::helper('revslideshow')->__('Old Square'),            
            'navbar-old'    => Mage::helper('revslideshow')->__('Old Navbar')
        );
    }
}