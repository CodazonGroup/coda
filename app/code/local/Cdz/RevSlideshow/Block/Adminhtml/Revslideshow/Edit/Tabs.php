<?php
class Cdz_RevSlideshow_Block_Adminhtml_Revslideshow_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
	public function __construct()
	{
		parent::__construct();
		$this->setId("revslideshow_tabs");
		$this->setDestElementId("edit_form");
		$this->setTitle(Mage::helper("revslideshow")->__("Item Information"));
	}
	protected function _beforeToHtml()
	{
		$this->addTab("form_settings", array(
			"label" => Mage::helper("revslideshow")->__("Settings"),
			"title" => Mage::helper("revslideshow")->__("Settings"),
			"content" => $this->getLayout()->createBlock("revslideshow/adminhtml_revslideshow_edit_tab_accordion")->toHtml(),
			));
		$this->addTab("form_slider", array(
			"label" => Mage::helper("revslideshow")->__("Sliders"),
			"title" => Mage::helper("revslideshow")->__("Sliders"),
			"content" => $this->getLayout()->createBlock("revslideshow/adminhtml_revslideshow_edit_tab_slider")->toHtml(),
			));

		return parent::_beforeToHtml();
	}

}
