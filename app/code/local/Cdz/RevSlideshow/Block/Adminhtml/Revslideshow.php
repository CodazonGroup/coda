<?php


class Cdz_RevSlideshow_Block_Adminhtml_Revslideshow extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

		$this->_controller = "adminhtml_revslideshow";
		$this->_blockGroup = "revslideshow";
		$this->_headerText = Mage::helper("revslideshow")->__("Revslideshow Manager");
		$this->_addButtonLabel = Mage::helper("revslideshow")->__("Add New Item");
		parent::__construct();
	
	}

}