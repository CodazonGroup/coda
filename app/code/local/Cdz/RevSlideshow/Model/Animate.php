<?php
class Cdz_RevSlideshow_Model_Animate extends Varien_Object
{
    static public function getIncomingOptionArray()
    {
        return array(
            'sft'      => Mage::helper('revslideshow')->__('Short from Top'),
            'sfb'      => Mage::helper('revslideshow')->__('Short from Bottom'),
            'sfr'      => Mage::helper('revslideshow')->__('Short from Right'),
            'sfl'      => Mage::helper('revslideshow')->__('Short from Left'),
            'lft'      => Mage::helper('revslideshow')->__('Long from Top'),
            'lfb'      => Mage::helper('revslideshow')->__('Long from Bottom'),
            'lfr'      => Mage::helper('revslideshow')->__('Long from Right'),
            'lfl'      => Mage::helper('revslideshow')->__('Long from Left'),   
            'skewfromleft'      => Mage::helper('revslideshow')->__('Skew from Left'),    
            'skewfromright'      => Mage::helper('revslideshow')->__('Skew from Right'),    
            'skewfromleftshort'      => Mage::helper('revslideshow')->__('Skew Short from Left'),    
            'skewfromrightshort'      => Mage::helper('revslideshow')->__('Skew Short from Right'),            
            'fade'      => Mage::helper('revslideshow')->__('Fading'),            
            'randomrotate'      => Mage::helper('revslideshow')->__('Random position and Degree'),            
        );
    }
    static public function getOutgoingOptionArray()
    {
        return array(
            'sft'      => Mage::helper('revslideshow')->__('Short from Top'),
            'sfb'      => Mage::helper('revslideshow')->__('Short from Bottom'),
            'sfr'      => Mage::helper('revslideshow')->__('Short from Right'),
            'sfl'      => Mage::helper('revslideshow')->__('Short from Left'),
            'lft'      => Mage::helper('revslideshow')->__('Long from Top'),
            'lfb'      => Mage::helper('revslideshow')->__('Long from Bottom'),
            'lfr'      => Mage::helper('revslideshow')->__('Long from Right'),
            'lfl'      => Mage::helper('revslideshow')->__('Long from Left'),   
            'skewfromleft'      => Mage::helper('revslideshow')->__('Skew from Left'),    
            'skewfromright'      => Mage::helper('revslideshow')->__('Skew from Right'),    
            'skewfromleftshort'      => Mage::helper('revslideshow')->__('Skew Short from Left'),    
            'skewfromrightshort'      => Mage::helper('revslideshow')->__('Skew Short from Right'),            
            'fadeout'      => Mage::helper('revslideshow')->__('Fading'),            
            'randomrotateout'      => Mage::helper('revslideshow')->__('Random position and Degree'),            
        );
    }
}