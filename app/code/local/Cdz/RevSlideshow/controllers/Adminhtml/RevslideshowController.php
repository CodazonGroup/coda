<?php

class Cdz_RevSlideshow_Adminhtml_RevslideshowController extends Mage_Adminhtml_Controller_Action
{
	protected function _initAction()
	{
		$this->loadLayout()->_setActiveMenu("revslideshow/revslideshow")->_addBreadcrumb(Mage::helper("adminhtml")->__("Revslideshow  Manager"),Mage::helper("adminhtml")->__("Revslideshow Manager"));
		return $this;
	}
	public function indexAction() 
	{
	    $this->_title($this->__("RevSlideshow"));
	    $this->_title($this->__("Manager Revslideshow"));

		$this->_initAction();
		$this->renderLayout();
	}
	public function editAction()
	{			    
	    $this->_title($this->__("RevSlideshow"));
		$this->_title($this->__("Revslideshow"));
	    $this->_title($this->__("Edit Item"));
		
		$id = $this->getRequest()->getParam("id");
		$model = Mage::getModel("revslideshow/revslideshow")->load($id);
		if ($model->getId()) {
			Mage::register("revslideshow_data", $model);
			$this->loadLayout();
			$this->_setActiveMenu("revslideshow/revslideshow");
			$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Revslideshow Manager"), Mage::helper("adminhtml")->__("Revslideshow Manager"));
			$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Revslideshow Description"), Mage::helper("adminhtml")->__("Revslideshow Description"));
			$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
			$this->_addContent($this->getLayout()->createBlock("revslideshow/adminhtml_revslideshow_edit"))->_addLeft($this->getLayout()->createBlock("revslideshow/adminhtml_revslideshow_edit_tabs"));
			$this->renderLayout();
		} 
		else {
			Mage::getSingleton("adminhtml/session")->addError(Mage::helper("revslideshow")->__("Item does not exist."));
			$this->_redirect("*/*/");
		}
	}

	public function newAction()
	{

		$this->_title($this->__("RevSlideshow"));
		$this->_title($this->__("Revslideshow"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("revslideshow/revslideshow")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("revslideshow_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("revslideshow/revslideshow");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Revslideshow Manager"), Mage::helper("adminhtml")->__("Revslideshow Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Revslideshow Description"), Mage::helper("adminhtml")->__("Revslideshow Description"));


		$this->_addContent($this->getLayout()->createBlock("revslideshow/adminhtml_revslideshow_edit"))->_addLeft($this->getLayout()->createBlock("revslideshow/adminhtml_revslideshow_edit_tabs"));

		$this->renderLayout();

	}
	public function saveAction()
	{

			$post_data=$this->getRequest()->getPost();
				if ($post_data) {					
					try {							
						$path = Mage::getBaseDir('media').DS.'cdz'.DS.'revslideshow'.DS.'images';
						foreach($_FILES as $key => $value)
			            {	
			            	
			            	$temp = explode("_", $key);			            	
					        if (!empty($value['tmp_name'])) {
					            try {
					                $uploader = new Varien_File_Uploader($value);
					                $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
					                $uploader->setFilesDispersion(false);
					                $uploader->setFilenamesCaseSensitivity(false);
					                $uploader->setAllowRenameFiles(true);
					                $imageName = Mage::helper('revslideshow')->replaceFileName($value['name']);
					                $uploader->save($path, $imageName);
					                $fileName = $uploader->getUploadedFileName();
					                $post_data['slider'][$temp[1]]['image'] = $fileName;
					            } catch (Exception $e) {
					                Mage::logException($e);
					                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
					            }
					        }					            				                             			              
			            }
			            foreach ($post_data['slider'] as $key => $value) {
		            		if(!$post_data['slider'][$key]['image'])
			            		$post_data['slider'][$key]['image'] = $value[$key]['image'];	
			            	
			            }
						
						$model = Mage::getModel("revslideshow/revslideshow");						
						if(isset($post_data["duplicate"]))
							$model->setId();
						else
							$model->setId($this->getRequest()->getParam("id"));
						$post_data['general_settings']=json_encode($post_data['general_settings'],JSON_HEX_TAG);						
						$post_data['appearance']=json_encode($post_data['appearance'],JSON_HEX_TAG);
						$post_data['loop']=json_encode($post_data['loop'],JSON_HEX_TAG);
						$post_data['mobile_settings']=json_encode($post_data['mobile_settings'],JSON_HEX_TAG);
						$post_data['navigation']=json_encode($post_data['navigation'],JSON_HEX_TAG);
						$post_data['parallax']=json_encode($post_data['parallax'],JSON_HEX_TAG);						
						$post_data['spinner']=json_encode($post_data['spinner'],JSON_HEX_TAG);
						$post_data['slider']=json_encode($post_data['slider'],JSON_HEX_TAG);
						$post_data['thumbnails']=json_encode($post_data['thumbnails'],JSON_HEX_TAG);	
						$model->addData($post_data);
						$model->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Revslideshow was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setRevslideshowData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setRevslideshowData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}

		public function validateAction()
	    {
	        $postData = $this->getRequest()->getPost();
	        $response = new Varien_Object();
	        $slideshow_id = Mage::app()->getFrontController()->getRequest()->getParam("slideshow_id",0);
	        if(isset($postData['identifier']))
	        {
	            $identifier = $postData['identifier'];
	            $model = Mage::getModel('revslideshow/revslideshow')->load($identifier,'identifier');

	            if($model->getId())
	            {
	                if($model->getId()!=$slideshow_id)
	                {
	                    $response->setError(true);
	                    $response->setAttribute("info_identifier");
	                    $response->setMessage(Mage::helper('revslideshow')->__("The value of identifier is unique"));
	                } else {
	                    $response->setError(false);
	                }
	            }
	            else
	                $response->setError(false);
	        }
	        else
	            $response->setError(false);
	        $this->getResponse()->setBody($response->toJson());
	    }

		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("revslideshow/revslideshow");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('slideshow_ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("revslideshow/revslideshow");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			
		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'revslideshow.csv';
			$grid       = $this->getLayout()->createBlock('revslideshow/adminhtml_revslideshow_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'revslideshow.xml';
			$grid       = $this->getLayout()->createBlock('revslideshow/adminhtml_revslideshow_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
