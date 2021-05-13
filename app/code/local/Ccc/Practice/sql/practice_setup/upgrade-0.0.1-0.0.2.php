<?php 
$installer = $this;
$installer->startSetup();

$installer->getConnection()
	->addColumn($installer->getTable('ccc_practice/data'),'title',
		array(
			'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
			'nullable' => true,
			'default' => null,
			'comment' => 'title',
		)
	);
$installer->endSetup();



 ?>