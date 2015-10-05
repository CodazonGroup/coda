<?php

class Cdz_RevSlideshow_Block_Adminhtml_Revslideshow_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
			parent::__construct();
			$this->setId("revslideshowGrid");
			$this->setDefaultSort("slideshow_id");
			$this->setDefaultDir("DESC");
			$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
			$collection = Mage::getModel("revslideshow/revslideshow")->getCollection();
			$this->setCollection($collection);
			return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
			$this->addColumn("slideshow_id", array(
				"header" => Mage::helper("revslideshow")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "slideshow_id",
			));
                
			$this->addColumn("title", array(
				"header" => Mage::helper("revslideshow")->__("Title"),
				"index" => "title",
			));
			$this->addColumn("identifier", array(
				"header" => Mage::helper("revslideshow")->__("Identifier"),
				"index" => "identifier",
			));
			$this->addColumn('creation_time', array(
				'header'    => Mage::helper('revslideshow')->__('Date Created'),
				'index'     => 'creation_time',
				'type'      => 'datetime',
			));
			$this->addColumn('update_time', array(
				'header'    => Mage::helper('revslideshow')->__('Last Modified'),
				'index'     => 'update_time',
				'type'      => 'datetime',
			));				
			$this->addColumn("is_active", array(
				"header" => Mage::helper("revslideshow")->__("Status"),
				"index" => "is_active",
				'type'      => 'options',
				'options'   => array(
					1 => 'Enabled',
					0 => 'Disabled',
					),
			));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

			return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('slideshow_id');
			$this->getMassactionBlock()->setFormFieldName('slideshow_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_revslideshow', array(
					 'label'=> Mage::helper('revslideshow')->__('Remove Revslideshow'),
					 'url'  => $this->getUrl('*/adminhtml_revslideshow/massRemove'),
					 'confirm' => Mage::helper('revslideshow')->__('Are you sure?')
				));
			return $this;
		}
			

}