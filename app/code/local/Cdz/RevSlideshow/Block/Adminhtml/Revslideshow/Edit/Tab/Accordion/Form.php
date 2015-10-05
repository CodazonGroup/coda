<?php
class Cdz_RevSlideshow_Block_Adminhtml_Revslideshow_Edit_Tab_Accordion_Form extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {

        $form = new Varien_Data_Form();        
        $fieldset = $form->addFieldset("revslideshow_form", null);
        $fieldset->addField("title", "text", array(
            "label" => Mage::helper("revslideshow")->__("Title"),                   
            "class" => "required-entry",
            "required" => true,
            "name" => "title",
            ));

        $fieldset->addField("identifier", "text", array(
            "label" => Mage::helper("revslideshow")->__("Identifier"),                  
            "class" => "required-entry",
            "required" => true,
            "name" => "identifier",
            ));

        $fieldset->addField('is_active', 'select', array(
            'label'     => Mage::helper('revslideshow')->__('Status'),
            'title'     => Mage::helper('revslideshow')->__('Status'),
            'name'      => 'is_active',
            'required'  => true,
            'values'   => array(
                '1' => Mage::helper('revslideshow')->__('Enabled'),
                '0' => Mage::helper('revslideshow')->__('Disabled'),
                ),
            ));
        $is_duplicate = Mage::app()->getFrontController()->getRequest()->getParam('type',false);
        if($is_duplicate)
        {
            $fieldset->addField('duplicate', 'hidden', array(
                'name'  => 'duplicate',
                'value' => 'duplicate'
            ));
        }
        if (!Mage::registry("revslideshow_data")->getId()) {
            Mage::registry("revslideshow_data")->setData('is_active', '1');
        }

        if (Mage::getSingleton("adminhtml/session")->getRevslideshowData())
        {
            $form->setValues(Mage::getSingleton("adminhtml/session")->getRevslideshowData());
            Mage::getSingleton("adminhtml/session")->setRevslideshowData(null);
        } 
        elseif(Mage::registry("revslideshow_data") && !$is_duplicate) {
            $form->setValues(Mage::registry("revslideshow_data")->getData());
        }
        $this->setForm($form);        
        return parent::_prepareForm();

    }
}