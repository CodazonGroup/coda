<?php
class Cdz_RevSlideshow_Block_Adminhtml_Revslideshow_Edit_Tab_Accordion_Thumbnails extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{

		$form = new Varien_Data_Form();
		$form->setFieldNameSuffix('thumbnails');
		$this->setForm($form);
		$fieldset = $form->addFieldset("revslideshow_thumbnails", array("legend"=>Mage::helper("revslideshow")->__("")));

		$fieldset->addField('thumbWidth', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Thumb Width'),
			'name'      => 'thumbWidth',
			'note'		=> Mage::helper('revslideshow')->__('The basic Width of one Thumbnail (only if thumb is selected)'),
			))->setAfterElementHtml(' px');

		$fieldset->addField('thumbHeight', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Thumb Height'),
			'name'      => 'thumbHeight',
			'note'		=> Mage::helper('revslideshow')->__('the basic Height of one Thumbnail (only if thumb is selected)'),
			))->setAfterElementHtml(' px');

		$fieldset->addField('thumbAmount', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Thumb Amount'),
			'name'      => 'thumbAmount',
			'note'		=> Mage::helper('revslideshow')->__('the amount of the Thumbs visible same time (only if thumb is selected)'),
			))->setAfterElementHtml(' px');
		$fieldset->addField('hideThumbs', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Hide Thumb After'),
			'name'      => 'hideThumbs',
			'note'		=> Mage::helper('revslideshow')->__('0 - Never hide Thumbs. Hide thumbs and navigation arrows, bullets after the predefined ms (1000ms==1s)'),
			))->setAfterElementHtml(' ms');		        

		if (Mage::getSingleton("adminhtml/session")->getRevslideshowData())
		{
			$form->setValues(Mage::getSingleton("adminhtml/session")->getRevslideshowData());
			Mage::getSingleton("adminhtml/session")->setRevslideshowData(null);
		} 
		elseif(Mage::registry("revslideshow_data")) {
			$form->setValues(json_decode(Mage::registry("revslideshow_data")->getThumbnails(),true));
		}
		return parent::_prepareForm();
	}
}
