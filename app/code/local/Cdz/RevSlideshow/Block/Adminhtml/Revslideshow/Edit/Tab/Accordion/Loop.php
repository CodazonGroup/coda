<?php
class Cdz_RevSlideshow_Block_Adminhtml_Revslideshow_Edit_Tab_Accordion_Loop extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{

		$form = new Varien_Data_Form();
		$this->setForm($form);
		$form->setFieldNameSuffix('loop');
		$fieldset = $form->addFieldset("revslideshow_loop", array("legend"=>Mage::helper("revslideshow")->__("")));


		$fieldset->addField("startWithSlide", "text", array(
			"label" => Mage::helper("revslideshow")->__("Start with a Predefined Slide"),											
			"name" => "startWithSlide",
			));

		$fieldset->addField("stopAtSlide", "text", array(
			"label" => Mage::helper("revslideshow")->__("Stop at Slide"),											
			"name" => "stopAtSlide",
			"note" => Mage::helper("revslideshow")->__('Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.')
			));

		$fieldset->addField('stopAfterLoops', 'text', array(
			'label'     => Mage::helper('revslideshow')->__('Stop after loop'),			            
			'name'      => 'stopAfterLoops',				            
			"note" => Mage::helper("revslideshow")->__('Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic')
			));				        					

		if (Mage::getSingleton("adminhtml/session")->getRevslideshowData())
		{
			$form->setValues(Mage::getSingleton("adminhtml/session")->getRevslideshowData());
			Mage::getSingleton("adminhtml/session")->setRevslideshowData(null);
		} 
		elseif(Mage::registry("revslideshow_data")) {
			$form->setValues(json_decode(Mage::registry("revslideshow_data")->getLoop(),true));
		}
		return parent::_prepareForm();
	}
}
