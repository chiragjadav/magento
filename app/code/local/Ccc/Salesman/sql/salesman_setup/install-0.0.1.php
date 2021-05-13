<?php 
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()->newTable($installer->getTable('ccc_salesman/data'))
	->addColumn('data_id',
		Varien_Db_Ddl_Table::TYPE_INTEGER,null,
		array(
			'identity' => true,
			'unsigned' => true,
			'nullable' => false,
			'primary' => true,
		), 'ID'
	)
	->addColumn('first_name',
		Varien_Db_Ddl_Table::TYPE_VARCHAR,null,
		array(
			'nullable' => false,
		), 'first_name'
	)
	->addColumn('last_name',
		Varien_Db_Ddl_Table::TYPE_VARCHAR,null,
		array(
			'nullable' => false,
		), 'last_name'
	);
	
	$installer->getConnection()->createTable($table);
	$installer->endSetup();

 ?>