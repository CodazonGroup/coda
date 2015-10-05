<?php
class Cdz_RevSlideshow_Block_Adminhtml_Revslideshow_Edit_Tab_Accordion_Mobile extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{

		$form = new Varien_Data_Form();
		$form->setFieldNameSuffix('mobile_settings');
		$this->setForm($form);
		$fieldset = $form->addFieldset("revslideshow_mobile", array("legend"=>Mage::helper("revslideshow")->__("")));

		$fieldset->addField('touchenabled', 'radios', array(
			'label'     => Mage::helper('revslideshow')->__('Touch Enabled'),
			'name'      => 'mobile_settings[touchenabled]',						  
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
		$fieldset->addField('hideCaptionAtLimit', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Hide Caption Below Screen Resolution'),
			'name'      => 'hideCaptionAtLimit',
			'note'		=> Mage::helper('revslideshow')->__('It Defines if a caption should be shown under a Screen Resolution ( Based on The Width of Browser)'),
			))->setAfterElementHtml(' px');
		$fieldset->addField('hideAllCaptionAtLimit', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Hide All Caption Below Screen Resolution'),
			'name'      => 'hideAllCaptionAtLimit',
			'note'		=> Mage::helper('revslideshow')->__('Hide all The Captions if Width of Browser is less then this value'),
			))->setAfterElementHtml(' px');
		$fieldset->addField('hideSliderAtLimit', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Hide Slider Below Screen Resolution'),
			'name'      => 'hideSliderAtLimit',
			'note'		=> Mage::helper('revslideshow')->__('Hide the whole slider, and stop also functions if Width of Browser is less than this value'),
			))->setAfterElementHtml(' px');
		$fieldset->addField('hideNavDelayOnMobile', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Hide Thumb After'),
			'name'      => 'hideNavDelayOnMobile',
			'note'		=> Mage::helper('revslideshow')->__('Hide all navigation after a while on Mobile (touch and release events based)'),
			))->setAfterElementHtml(' ms');		
		$fieldset->addField('hideThumbsOnMobile', 'radios', array(
			'label'     => Mage::helper('revslideshow')->__('Hide Thumbnails on Mobile'),
			'name'      => 'mobile_settings[hideThumbsOnMobile]',						  
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
		$fieldset->addField('hideBulletsOnMobile', 'radios', array(
			'label'     => Mage::helper('revslideshow')->__('Hide Bullets on Mobile'),
			'name'      => 'mobile_settings[hideBulletsOnMobile]',						  
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
		$fieldset->addField('hideArrowsOnMobile', 'radios', array(
			'label'     => Mage::helper('revslideshow')->__('Hide Arrows on Mobile'),
			'name'      => 'mobile_settings[hideArrowsOnMobile]',						  
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
		$fieldset->addField('hideThumbsUnderResoluition', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Hide Slider Below Screen Resolution'),
			'name'      => 'hideThumbsUnderResoluition',
			'note'		=> Mage::helper('revslideshow')->__('Hide Thumb if Width of Browser is less than this value'),
			))->setAfterElementHtml(' px');
		$fieldset->addField('panZoomDisableOnMobile', 'radios', array(
			'label'     => Mage::helper('revslideshow')->__('Pan Zoom Effects'),
			'name'      => 'mobile_settings[panZoomDisableOnMobile]',						  
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

		if (Mage::getSingleton("adminhtml/session")->getRevslideshowData())
		{
			$form->setValues(Mage::getSingleton("adminhtml/session")->getRevslideshowData());
			Mage::getSingleton("adminhtml/session")->setRevslideshowData(null);
		} 
		elseif(Mage::registry("revslideshow_data")) {
			$form->setValues(json_decode(Mage::registry("revslideshow_data")->getMobileSettings(),true));
		}
		return parent::_prepareForm();
	}
}
