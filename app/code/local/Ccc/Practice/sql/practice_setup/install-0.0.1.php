<?php 
$installer = $this;
$installer->startSetup();

$table = $this->getConnection()->newTable($installer->getTable('ccc_practice/data'))
		->addColumn('data_id',
			Varien_Db_Ddl_Table::TYPE_INTEGER,null,
			array(
				'unsigned' => true,
				'nullable' => false,
				'primary' => true
			), 'ID'
		);
$installer->getConnection()->createTable($table);
$installer->endSetup();




 ?>