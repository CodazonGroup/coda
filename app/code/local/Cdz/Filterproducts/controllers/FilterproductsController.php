<?php
class Cdz_Filterproducts_FilterproductsController extends Mage_Core_Controller_Front_Action
{
	public function loadProductsBlockAction(){
		$data = $this->getRequest()->getParams();
		$block = Mage::app()->getLayout()->createBlock('filterproducts/cdzfilterproducts');
		unset($data['use_ajax']);
		$block->setData('use_ajax',0);
		foreach($data as $key => $val){
			$block->setData($key,$val);
		}
		$result['html'] = $block->toHtml();
		echo json_encode($result);
	}
}
?>