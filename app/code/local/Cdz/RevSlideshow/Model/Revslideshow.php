<?php

class Cdz_RevSlideshow_Model_Revslideshow extends Mage_Core_Model_Abstract
{
    protected function _construct(){

       $this->_init("revslideshow/revslideshow");

    }

    public function toOptionArray()
    {
        $collection = $this->getCollection()->addFieldToFilter("is_active",1);
		$data	=	$collection->getData();
		$result	= array();
		$result[] = array('value' => '0','label' => 'Please choose slideshow');
		foreach($data as $value)
			$result[] = array('value' => $value['slideshow_id'],'label' => $value['title']);
		return $result;
    }

}
	 