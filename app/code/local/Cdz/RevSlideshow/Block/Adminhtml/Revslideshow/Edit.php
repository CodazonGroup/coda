<?php
	
class Cdz_RevSlideshow_Block_Adminhtml_Revslideshow_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "slideshow_id";
				$this->_blockGroup = "revslideshow";
				$this->_controller = "adminhtml_revslideshow";
				$this->_updateButton("save", "label", Mage::helper("revslideshow")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("revslideshow")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("revslideshow")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);

				 $id = Mage::app()->getFrontController()->getRequest()->getParam("id",0);
				if($id != 0) 
				{
					$this->_addButton('saveasnew', array(
		                'label'     => Mage::helper('revslideshow')->__('Duplicate'),
		                'onclick'   => 'setLocation(\'' . $this->getDuplicateUrl() . '\')',
		                'class'     => 'add',
		            ), -1);
				}
				$this->setValidationUrl($this->getUrl('*/*/validate',array($this->_objectId=>$id)));

				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}

							editForm._processValidationResult = function(transport) {
				                var response = transport.responseText.evalJSON();
				                if (response.error){
				                    if (response.attribute && $(response.attribute)) {
				                        $(response.attribute).setHasError(true, editForm);
				                        Validation.ajaxError($(response.attribute), response.message);
				                        if (!Prototype.Browser.IE){
				                            $(response.attribute).focus();
				                        }
				                    }
				                    else if ($('messages')) {
				                        $('messages').innerHTML = '<ul class=\"messages\"><li class=\"error-msg\"><ul><li>' + response.message + '</li></ul></li></ul>';
				                    }
				                }
				                else{
				                    editForm._submit();
				                }
				            };
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("revslideshow_data") && Mage::registry("revslideshow_data")->getId() ){

				    return Mage::helper("revslideshow")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("revslideshow_data")->getId()));

				} 
				else{

				     return Mage::helper("revslideshow")->__("Add Item");

				}
		}
		public function getDuplicateUrl()
	    {
	        $id = Mage::app()->getFrontController()->getRequest()->getParam("id",0);
	        return $this->getUrl('*/*/edit',array('_current'=>true,'id'=>$id,'type'=>'duplicate'));
	    }
}