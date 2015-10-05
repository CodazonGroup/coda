<?php
class Cdz_RevSlideshow_Model_Backgroundposition extends Varien_Object
{
    static public function getOptionArray()
    {
        return array(
            'left top'      => Mage::helper('revslideshow')->__('Left Top'),
            'left center'      => Mage::helper('revslideshow')->__('Left Center'),
            'left bottom'      => Mage::helper('revslideshow')->__('Left Bottom'),
            'center top'      => Mage::helper('revslideshow')->__('Center Top'),            
            'center center'		    => Mage::helper('revslideshow')->__('Center Center'),            
            'center bottom'		    => Mage::helper('revslideshow')->__('Center Bottom'),            
            'right top'      => Mage::helper('revslideshow')->__('Right'),            
            'right center'		    => Mage::helper('revslideshow')->__('Right Center'),            
            'right bottom'		    => Mage::helper('revslideshow')->__('Right Bottom'),   
        );
    }
}