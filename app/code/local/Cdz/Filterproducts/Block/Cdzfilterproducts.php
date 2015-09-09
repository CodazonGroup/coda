<?php
class Cdz_Filterproducts_Block_Cdzfilterproducts
    extends Mage_Catalog_Block_Product_List
    implements Mage_Widget_Block_Interface
{

    protected function _toHtml()
    {
		extract( array_replace( array(
				'categories'	=> '',
				'filtertype' 	=> '',
				'attribute'		=> '',
				'orderby'		=> 'price',
				'order'			=> 'asc',
				'limit'			=> 12,
				'use_ajax'		=> 0,
				'template'		=> 'cdz_filterproducts/grid.phtml',
				'custom_template'=>'cdz_filterproducts/custom.phtml',
				'column_count'	=> 5,
			),$this->getData() )
		);
		//$categories = explode(',',trim($categories));
		switch($filtertype){
			case 1:	//new
				$collection = $this->getNewProducts($categories);
				$collection->setOrder($orderby, $order);
				break;
			case 2:	//best seller
				$collection = $this->getBestSellerProducts();
				break;
			case 3: //most viewed
				$collection = $this->getMostViewProducts();
				break;
			case 4:	//attribute
				$collection = $this->getProductsByAttribute($attribute);
				$collection->setOrder($orderby, $order);
				break;
		}
		
		
		$this->addCategoriestoFilter($collection,$categories);
		$collection->setPageSize($limit);//->setCurPage(1);
		

		$this->setProductCollection($collection);
		$this->setColumnCount($column_count);
		
		if($use_ajax == 0){
			if($template != 'custom'){
				$this->setTemplate($template);
			}else{
				$this->setTemplate($custom_template);
			}
		}else{
			$this->setTemplate('cdz_filterproducts/ajax.phtml');
		}
		$html = parent::_toHtml();
		return $html;
    }
	public function addCategoriestoFilter(&$collection,array $categories){
		if(!empty($categories)){
			$collection->joinField('category_id',
				'catalog/category_product',
				'category_id',
				'product_id=entity_id',
				NULL,
				'left'
			);
			$collection->addAttributeToFilter('category_id', array('in' => $categories ));
		}
	}
	public function getNewProducts($categories){	
		$todayDate  = Mage::app()->getLocale()->date()->toString(Varien_Date::DATETIME_INTERNAL_FORMAT);
		$collection = Mage::getResourceModel('catalog/product_collection');
		//$collection = $this->_addProductAttributesAndPrices($collection);
		
		/*$collection->joinField('category_id','catalog/category_product','category_id','product_id=entity_id',NULL,'left')
->addAttributeToFilter('category_id', array('in' => implode(',',$categories) ));*/
		
		$collection->setVisibility(Mage::getSingleton('catalog/product_visibility')->getVisibleInCatalogIds());
		$collection = $this->_addProductAttributesAndPrices($collection)
			->addStoreFilter()
			->addAttributeToFilter('news_from_date', array('date' => true, 'to' => $todayDate))
			->addAttributeToFilter('news_to_date', array('or'=> array(
				0 => array('date' => true, 'from' => $todayDate),
				1 => array('is' => new Zend_Db_Expr('null')))
			), 'left')
			->addAttributeToSort('news_from_date', 'desc');
		
		return $collection;
	}
	public function getMostViewProducts(){
		$storeId = Mage::app()->getStore()->getId();
		$collection = Mage::getResourceModel('reports/product_collection')
			->addOrderedQty()
			->addAttributeToSelect('*')
			->setStoreId($storeId)
			->addStoreFilter($storeId)
			->addViewsCount();
		Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($collection);
		Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($collection);
		return $collection; 
	}
	public function getBestSellerProducts(){
		$storeId = Mage::app()->getStore()->getId();
        $collection = Mage::getResourceModel('reports/product_collection')
            ->addOrderedQty()
            ->addAttributeToSelect('*')
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
            ->setOrder('ordered_qty', 'desc');
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($collection);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($collection);
		return $collection;
	}
	public function getProductsByAttribute($attribute){
		$storeId = Mage::app()->getStore()->getId();
        $collection =  Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
			->addAttributeToFilter($attribute,true)
            ->load();
		return $collection;
	}
}