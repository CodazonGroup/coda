<?php
class Cdz_RevSlideshow_Block_Adminhtml_Revslideshow_Edit_Tab_Slider extends Mage_Adminhtml_Block_Widget_Form
{
	public function _construct()
    {


        parent::_construct();
        $this->_fieldSetCollection = array();
        $this->_titleFieldSet = '';
        $this->_comment = '';        
        $this->setTemplate('revslideshow/edit/tab/slider.phtml');
    }

	protected function _prepareForm()
	{

		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldset = $form->addFieldset("revslideshow_form", array("legend"=>Mage::helper("revslideshow")->__("Item information")));




		if (Mage::getSingleton("adminhtml/session")->getRevslideshowData())
		{
			$form->setValues(Mage::getSingleton("adminhtml/session")->getRevslideshowData());
			Mage::getSingleton("adminhtml/session")->setRevslideshowData(null);
		} 
		elseif(Mage::registry("revslideshow_data")) {			
			$form->setValues(json_decode(Mage::registry("revslideshow_data")->getSlider(),true));
			$this->setData("slider",json_decode(Mage::registry("revslideshow_data")->getSlider(),true));
		}
		return parent::_prepareForm();
	}


}
