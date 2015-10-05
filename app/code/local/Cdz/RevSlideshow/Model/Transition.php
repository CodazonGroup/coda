<?php
class Cdz_RevSlideshow_Model_Transition extends Varien_Object
{
    static public function getOptionArray()
    {
        return array(
            'slideup'      => Mage::helper('revslideshow')->__('Slide To Top'),
            'slidedown'      => Mage::helper('revslideshow')->__('Slide To Bottom'),
            'slideright'      => Mage::helper('revslideshow')->__('Slide To Right'),
            'slideleft'      => Mage::helper('revslideshow')->__('Slide To Left'),   
            'slidehorizontal'      => Mage::helper('revslideshow')->__('Slide Horizontal'),         
            'slidevertical'      => Mage::helper('revslideshow')->__('Slide Vertical'), 
            'boxslide'      => Mage::helper('revslideshow')->__('Slide Boxes'), 
            'slotslide-horizontal'      => Mage::helper('revslideshow')->__('Slide Slots Horizontal'), 
            'slotslide-vertical'      => Mage::helper('revslideshow')->__('Slide Slots Vertical'), 
            'boxfade'      => Mage::helper('revslideshow')->__('Fade Boxes'), 
            'slotfade-horizontal'      => Mage::helper('revslideshow')->__('Fade Slots Horizontal'), 
            'slotfade-vertical'      => Mage::helper('revslideshow')->__('Fade Slots Vertical'), 
            'fadefromright'      => Mage::helper('revslideshow')->__('Fade and Slide from Right'), 
            'fadefromleft'      => Mage::helper('revslideshow')->__('Fade and Slide from Left'), 
            'fadefromtop'      => Mage::helper('revslideshow')->__('Fade and Slide from Top'), 
            'fadefrombottom'      => Mage::helper('revslideshow')->__('Fade and Slide from Bottom'), 
            'fadetoleftfadefromright'      => Mage::helper('revslideshow')->__('Fade To Left and Fade From Right'), 
            'fadetorightfadefromleft'      => Mage::helper('revslideshow')->__('Fade To Right and Fade From Left'), 
            'fadetotopfadefrombottom'      => Mage::helper('revslideshow')->__('Fade To Top and Fade From Bottom'), 
            'fadetobottomfadefromtop'      => Mage::helper('revslideshow')->__('Fade To Bottom and Fade From Top'), 
            'parallaxtoright'      => Mage::helper('revslideshow')->__('Parallax to Right'), 
            'parallaxtoleft'      => Mage::helper('revslideshow')->__('Parallax to Left'), 
            'parallaxtotop'      => Mage::helper('revslideshow')->__('Parallax to Top'), 
            'parallaxtobottom'      => Mage::helper('revslideshow')->__('Parallax to Bottom'), 
            'scaledownfromright'      => Mage::helper('revslideshow')->__('Zoom Out and Fade From Right'), 
            'scaledownfromleft'      => Mage::helper('revslideshow')->__('Zoom Out and Fade From Left'), 
            'scaledownfromtop'      => Mage::helper('revslideshow')->__('Zoom Out and Fade From Top'), 
            'scaledownfrombottom'      => Mage::helper('revslideshow')->__('Zoom Out and Fade From Bottom'), 
            'zoomout'      => Mage::helper('revslideshow')->__('Zoomout'), 
            'zoomin'      => Mage::helper('revslideshow')->__('Zoomin'), 
            'slotzoom-horizontal'      => Mage::helper('revslideshow')->__('Zoom Slots Horizontal'), 
            'slotzoom-vertical'      => Mage::helper('revslideshow')->__('Zoom Slots Vertical'), 
            'fade'      => Mage::helper('revslideshow')->__('Fade'), 
            'Random Flat'      => Mage::helper('revslideshow')->__('random-static'), 
        );
    }
}