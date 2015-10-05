<?php
class Cdz_RevSlideshow_Block_Revslideshow extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface
{
	protected function _construct()
	{
		parent::_construct();
        $this->setCacheTags(array(Mage_Cms_Model_Block::CACHE_TAG));
        $this->setCacheLifetime(false);

	}
	public function getCacheKeyInfo()
	{	
		$id	=	$this->getData('slideshow_id');			 
        if ($id) {
            $result = array(
               'cdz_revslideshow',
				Mage::app()->getStore()->getId(),
				(int)Mage::app()->getStore()->isCurrentlySecure(),
				Mage::getDesign()->getPackageName(),
				Mage::getDesign()->getTheme('template'),
				serialize($this->getData())
            );
        } else {
            $result = parent::getCacheKeyInfo();
        }
        return $result;
	}
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }

	public function _toHtml(){
		$this->setTemplate('cdz_revslideshow/slideshow.phtml');
		return parent::_toHtml();
	}

	public function getSlider()
    {
		$id	=	$this->getData('slideshow_id');		
		$slider  = Mage::getModel('revslideshow/revslideshow')->load($id)->getData();
		
		$slider['general_settings']=json_decode($slider['general_settings'],JSON_HEX_TAG);
		$slider['appearance']=json_decode($slider['appearance'],JSON_HEX_TAG);
		$slider['loop']=json_decode($slider['loop'],JSON_HEX_TAG);
		$slider['mobile_settings']=json_decode($slider['mobile_settings'],JSON_HEX_TAG);
		$slider['navigation']=json_decode($slider['navigation'],JSON_HEX_TAG);
		$slider['parallax']=json_decode($slider['parallax'],JSON_HEX_TAG);
		$slider['position']=json_decode($slider['position'],JSON_HEX_TAG);
		$slider['spinner']=json_decode($slider['spinner'],JSON_HEX_TAG);
		$slider['slider']=json_decode($slider['slider'],JSON_HEX_TAG);
		$slider['thumbnails']=json_decode($slider['thumbnails'],JSON_HEX_TAG);			
		return $slider;
    }
}