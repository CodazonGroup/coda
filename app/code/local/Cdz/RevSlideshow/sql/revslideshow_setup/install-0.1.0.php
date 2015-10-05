<?php
$installer = $this;

$installer->startSetup();
$pathFile = Mage::getBaseDir('var').DS.'install_rev_slideshow.txt';
if(file_exists($pathFile)){
    echo 'Installing Revolution Slideshow, please wait for some minutes ...';
    exit;
}
file_put_contents($pathFile,'Installing Theme Framework');
/**
 * Create table 'themeframework/area'
 */
if(!$installer->tableExists($installer->getTable('revslideshow/revslideshow'))){
$table = $installer->getConnection()
    ->newTable($installer->getTable('revslideshow/revslideshow'))
    ->addColumn('slideshow_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Area ID')
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        ), 'Title')
    ->addColumn('identifier', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
            'unsigned'  => true,
            'nullable'  => false,
            'default'   => '',
        ), 'Identifier')
    ->addColumn('general_settings', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'General Settings')
	->addColumn('loop', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'Loop and Progress')
	->addColumn('appearance', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'Appearance')
	->addColumn('navigation', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'Navigation')
	->addColumn('thumbnails', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'Thumbnails')
	->addColumn('spinner', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'Spinner')
	->addColumn('parallax', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'Parallax')
	->addColumn('mobile_settings', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'Mobile Settings')
	->addColumn('slider', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(
        ), 'Slider')
    ->addColumn('creation_time', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        ), 'Date Created')
    ->addColumn('update_time', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        ), 'Last Modified')
    ->addColumn('is_active', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'nullable'  => false,
        'default'   => '1',
        ), 'Status')
    ->setComment('CDZ Revelution Slideshow Table');
$installer->getConnection()->createTable($table);
}

unlink($pathFile);
$installer->endSetup();