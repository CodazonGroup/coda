<?php
class Cdz_RevSlideshow_Block_Adminhtml_Revslideshow_Edit_Tab_Accordion_Spinner extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{

		$form = new Varien_Data_Form();
		$form->setFieldNameSuffix('spinner');
		$this->setForm($form);
		$fieldset = $form->addFieldset("revslideshow_spinner", array("legend"=>Mage::helper("revslideshow")->__("")));


		$fieldset->addField('spinner', 'select', array(
			'label'     => Mage::helper('revslideshow')->__('Spinner'),
			'title'     => Mage::helper('revslideshow')->__('Spinner'),
			'name'      => 'spinner',			
			'options'   => array(
				'spinner1' => Mage::helper('revslideshow')->__('Spinner 1'),
				'spinner2' => Mage::helper('revslideshow')->__('Spinner 2'),
				'spinner3' => Mage::helper('revslideshow')->__('Spinner 3'),
				'spinner4' => Mage::helper('revslideshow')->__('Spinner 4'),
				'spinner5' => Mage::helper('revslideshow')->__('Spinner 5'),
				),
			));				  					
		if (Mage::getSingleton("adminhtml/session")->getRevslideshowData())
		{
			$form->setValues(Mage::getSingleton("adminhtml/session")->getRevslideshowData());
			Mage::getSingleton("adminhtml/session")->setRevslideshowData(null);
		} 
		elseif(Mage::registry("revslideshow_data")) {
			$form->setValues(json_decode(Mage::registry("revslideshow_data")->getSpinner(),true));
		}
		return parent::_prepareForm();
	}
}
