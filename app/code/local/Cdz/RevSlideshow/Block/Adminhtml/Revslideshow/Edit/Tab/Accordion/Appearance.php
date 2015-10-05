<?php
class Cdz_RevSlideshow_Block_Adminhtml_Revslideshow_Edit_Tab_Accordion_Appearance extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{

		$form = new Varien_Data_Form();
		$this->setForm($form);
		$form->setFieldNameSuffix('appearance');
		$fieldset = $form->addFieldset("revslideshow_appearance",array("legend"=>Mage::helper("revslideshow")->__("")));				
		$fieldset->addField('shadow', 'select', array(
			'label'     => Mage::helper('revslideshow')->__('Shadow Type'),
			'name'      => 'shadow',				  
			'values'    => array(
				array(
					'value'     => 0,
					'label'     => Mage::helper('revslideshow')->__('No Shadow'),
					),
				array(
					'value'     => 1,
					'label'     => Mage::helper('revslideshow')->__('1'),
					),
				array(
					'value'     => 2,
					'label'     => Mage::helper('revslideshow')->__('2'),
					),
				array(
					'value'     => 3,
					'label'     => Mage::helper('revslideshow')->__('3'),
					),
				),
			));

		$fieldset->addField('hideTimerBar', 'radios', array(
			'label'     => Mage::helper('revslideshow')->__('Show Timer Bar'),
			'name'      => 'appearance[hideTimerBar]',
			'note'		=> Mage::helper('revslideshow')->__('Show the timer line'),
			'values'    => array(
				array(
					'value'     => 'on',
					'label'     => Mage::helper('revslideshow')->__('Show'),
					),
				array(
					'value'     => 'off',
					'label'     => Mage::helper('revslideshow')->__('Hide'),
					),
				),
			));

		$fieldset->addField('timer_position', 'radios', array(
			'label'     => Mage::helper('revslideshow')->__('Timer Line Position'),
			'name'      => 'appearance[timer_position]',
			'note'		=> Mage::helper('revslideshow')->__('Show timler line on top or bottom'),
			'values'    => array(
				array(
					'value'     => 'top',
					'label'     => Mage::helper('revslideshow')->__('Top'),
					),
				array(
					'value'     => 'bottom',
					'label'     => Mage::helper('revslideshow')->__('Bottom'),
					),
				),
			));

		if (Mage::getSingleton("adminhtml/session")->getRevslideshowData())
		{
			$form->setValues(Mage::getSingleton("adminhtml/session")->getRevslideshowData());
			Mage::getSingleton("adminhtml/session")->setRevslideshowData(null);
		} 
		elseif(Mage::registry("revslideshow_data")) {
			$form->setValues(json_decode(Mage::registry("revslideshow_data")->getAppearance(),true));
		}
		return parent::_prepareForm();
	}
}
