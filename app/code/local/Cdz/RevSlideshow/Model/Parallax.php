<?php
class Cdz_RevSlideshow_Model_Parallax extends Varien_Object
{
    static public function getOptionArray()
    {
        return array(
            ''                        => Mage::helper('revslideshow')->__('None'),
            'rs-parallaxlevel-1'      => Mage::helper('revslideshow')->__('Parallax Level 1'),
            'rs-parallaxlevel-2'      => Mage::helper('revslideshow')->__('Parallax Level 2'),
            'rs-parallaxlevel-3'      => Mage::helper('revslideshow')->__('Parallax Level 3'),
            'rs-parallaxlevel-4'      => Mage::helper('revslideshow')->__('Parallax Level 4'),
            'rs-parallaxlevel-5'      => Mage::helper('revslideshow')->__('Parallax Level 5'),
            'rs-parallaxlevel-6'      => Mage::helper('revslideshow')->__('Parallax Level 6'),
            'rs-parallaxlevel-7'      => Mage::helper('revslideshow')->__('Parallax Level 7'),
            'rs-parallaxlevel-8'      => Mage::helper('revslideshow')->__('Parallax Level 8'),
            'rs-parallaxlevel-9'      => Mage::helper('revslideshow')->__('Parallax Level 9'),
            'rs-parallaxlevel-10'      => Mage::helper('revslideshow')->__('Parallax Level 10'),
        );
    }
}