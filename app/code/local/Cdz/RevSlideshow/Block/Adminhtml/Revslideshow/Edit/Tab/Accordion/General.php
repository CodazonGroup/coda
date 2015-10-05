<?php
class Cdz_RevSlideshow_Block_Adminhtml_Revslideshow_Edit_Tab_Accordion_General extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{

		$form = new Varien_Data_Form();
		$this->setForm($form);
		$form->setFieldNameSuffix('general_settings');
		$fieldset = $form->addFieldset("revslideshow_general", array("legend"=>Mage::helper("revslideshow")->__("")));		



		$fieldset->addField('startwidth', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Slider Width'),
			'name'      => 'startwidth',
			'note'		=> Mage::helper('revslideshow')->__('This Width is the Max Width of Slider in Responsive Layout')
			));

		$fieldset->addField('startheight', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Slider Height'),
			'name'      => 'startheight',
			'note'		=> Mage::helper('revslideshow')->__('This Height is the Max Height of Slider in Responsive Layout')
			));
		$fieldset->addField('delay', 'text', array(
			'label'     	=> Mage::helper('revslideshow')->__('Delay'),			
			'name'     	=> 'delay',
			'note'		=> Mage::helper('revslideshow')->__('Default : 9000 = 9 seconds')
			));
		$fieldset->addField('shuffle', 'radios', array(
			'label'     => Mage::helper('revslideshow')->__('Shuffle Mode'),
			'name'      => 'general_settings[shuffle]',						  
			'values'    => array(
				array(
					'value'     => 'on',
					'label'     => Mage::helper('revslideshow')->__('On'),
					),
				array(
					'value'     => 'off',
					'label'     => Mage::helper('revslideshow')->__('Off'),
					),
				),
			));
		$fieldset->addField('lazy_load', 'radios', array(
			'label'     => Mage::helper('revslideshow')->__('Lazy Load'),
			'name'      => 'general_settings[lazy_load]',						  
			'values'    => array(
				array(
					'value'     => 'on',
					'label'     => Mage::helper('revslideshow')->__('On'),
					),
				array(
					'value'     => 'off',
					'label'     => Mage::helper('revslideshow')->__('Off'),
					),
				),
			));
		$slider_type = $fieldset->addField('slider_type', 'select', array(
			'label'     => Mage::helper('revslideshow')->__('Slider Type'),
			'class'     => 'slider_type',
			'name'      => 'slider_type',
			'values'    => array(
				'fixed'  =>  Mage::helper('revslideshow')->__('Fixed'),				
				'fullwidth' =>  Mage::helper('revslideshow')->__('Auto Responsive'),
				'fullscreen' =>  Mage::helper('revslideshow')->__('Full Screen')		
				),
			));
		

		if (Mage::getSingleton("adminhtml/session")->getRevslideshowData())
		{
			$form->setValues(Mage::getSingleton("adminhtml/session")->getRevslideshowData());
			Mage::getSingleton("adminhtml/session")->setRevslideshowData(null);
		} 
		elseif(Mage::registry("revslideshow_data")) {		
			$form->setValues(json_decode(Mage::registry("revslideshow_data")->getGeneralSettings(),true));
		}


		return parent::_prepareForm();
	}
}
