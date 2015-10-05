<?php
class Cdz_RevSlideshow_Block_Adminhtml_Revslideshow_Edit_Tab_Accordion_Parallax extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{

		$form = new Varien_Data_Form();
		$form->setFieldNameSuffix('parallax');
		$this->setForm($form);
		$fieldset = $form->addFieldset("revslideshow_parallax", array("legend"=>Mage::helper("revslideshow")->__("")));
		$fieldset->addField('parallax', 'radios', array(
			'label'     => Mage::helper('revslideshow')->__('Parallax'),
			'name'      => 'parallax[parallax]',						  
			'values'    => array(
				array(
					'value'     => 'mouse',
					'label'     => Mage::helper('revslideshow')->__('Mouse'),
					),
				array(
					'value'     => 'scroll',
					'label'     => Mage::helper('revslideshow')->__('Scroll'),
					),
				),
			'note' => Mage::helper("revslideshow")->__('How the Parallax should act')
			));
		$fieldset->addField('parallaxBgFreeze', 'radios', array(
			'label'     => Mage::helper('revslideshow')->__('Parallax Background Freeze'),
			'name'      => 'parallax[parallaxBgFreeze]',						  
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
		$fieldset->addField('parallaxLevels', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Parallax Levels'),
			'name'      => 'parallaxLevels',
			'value'	=> 'aaa',
			'note' => Mage::helper("revslideshow")->__('An array which defines the Parallax depths</br>each level is seperated by comma.Example: 10,7,4,3,2,5,4,3,2,1'),
			));

		if (Mage::getSingleton("adminhtml/session")->getRevslideshowData())
		{
			$form->setValues(Mage::getSingleton("adminhtml/session")->getRevslideshowData());
			Mage::getSingleton("adminhtml/session")->setRevslideshowData(null);
		} 
		elseif(Mage::registry("revslideshow_data")) {
			$form->setValues(json_decode(Mage::registry("revslideshow_data")->getParallax(),true));
		}
		return parent::_prepareForm();
	}
}
