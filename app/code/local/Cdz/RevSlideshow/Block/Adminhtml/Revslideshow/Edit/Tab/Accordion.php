<?php 
class Cdz_RevSlideshow_Block_Adminhtml_Revslideshow_Edit_Tab_Accordion
    extends Mage_Adminhtml_Block_Widget implements Mage_Adminhtml_Block_Widget_Tab_Interface
{

    public function _construct()
    {


        parent::_construct();
        $this->_fieldSetCollection = array();
        $this->_titleFieldSet = '';
        $this->_comment = '';        
        $this->setTemplate('revslideshow/edit/tab/accordion.phtml');
    }



    public function getTabLabel()
    {
        return $this->_titleFieldSet;
    }

    public function getTabTitle()
    {
        return $this->_titleFieldSet;
    }


    public function canShowTab()
    {
        return true;
    }


    public function isHidden()
    {
        return false;
    }


    protected function _toHtml()
    {
        
        $this->_titleFieldSet = "General Information";
        $accordion = $this->getLayout()->createBlock('adminhtml/widget_accordion')
            ->setId("general_information");
            $this->setChild('accordion_general_information', $accordion);
        $accordion->addItem("general_information", array(
            'title'   => "Genral Information",
            'content' => $this->getLayout()
                    ->createBlock('revslideshow/adminhtml_revslideshow_edit_tab_accordion_form')                    
                    ->toHtml(),            
        ));
        $this->setChild('accordion_general_settings', $accordion);
        $accordion->addItem("general_settings", array(
            'title'   => "Genral Settings",
            'content' => $this->getLayout()
                    ->createBlock('revslideshow/adminhtml_revslideshow_edit_tab_accordion_general')                    
                    ->toHtml(),            
        ));
        $this->setChild('accordion_general_loop', $accordion);
        $accordion->addItem("loop", array(
            'title'   => "Loop &amp; Progress",
            'content' => $this->getLayout()
                    ->createBlock('revslideshow/adminhtml_revslideshow_edit_tab_accordion_loop')                    
                    ->toHtml(),            
        ));        
        $this->setChild('accordion_general_appearance', $accordion);
        $accordion->addItem("appearance", array(
            'title'   => "Appearance",
            'content' => $this->getLayout()
                    ->createBlock('revslideshow/adminhtml_revslideshow_edit_tab_accordion_appearance')                    
                    ->toHtml(),            
        ));
        $this->setChild('accordion_general_navigation', $accordion);
        $accordion->addItem("navigation", array(
            'title'   => "Navigation",
            'content' => $this->getLayout()
                    ->createBlock('revslideshow/adminhtml_revslideshow_edit_tab_accordion_navigation')                    
                    ->toHtml(),            
        ));
        $this->setChild('accordion_general_thumbnails', $accordion);
        $accordion->addItem("thumbnails", array(
            'title'   => "Thumbnails",
            'content' => $this->getLayout()
                    ->createBlock('revslideshow/adminhtml_revslideshow_edit_tab_accordion_thumbnails')                    
                    ->toHtml(),            
        ));
        $this->setChild('accordion_general_spinner', $accordion);
        $accordion->addItem("spinner", array(
            'title'   => "Spinner",
            'content' => $this->getLayout()
                    ->createBlock('revslideshow/adminhtml_revslideshow_edit_tab_accordion_spinner')                    
                    ->toHtml(),            
        ));
        $this->setChild('accordion_general_parallax', $accordion);
        $accordion->addItem("parallax", array(
            'title'   => "Parallax",
            'content' => $this->getLayout()
                    ->createBlock('revslideshow/adminhtml_revslideshow_edit_tab_accordion_parallax')                    
                    ->toHtml(),            
        ));
        $this->setChild('accordion_general_mobile', $accordion);
        $accordion->addItem("mobile", array(
            'title'   => "Mobile",
            'content' => $this->getLayout()
                    ->createBlock('revslideshow/adminhtml_revslideshow_edit_tab_accordion_mobile')                    
                    ->toHtml(),            
        ));
        
        return parent::_toHtml();
    }

}