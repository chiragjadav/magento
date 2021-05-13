<?php 
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()->newTable($installer->getTable('ccc_practice1/data'))
	->addColumn('data_id',
		Varien_Db_Ddl_Table::TYPE_INTEGER,
		null,
		array(
			'identity' => true,
			'nullable' => false,
			'primary' => true,
		),'ID'
	)
	->addColumn('title',
		Varien_Db_Ddl_Table::TYPE_VARCHAR,
		null,
		array(
			'nullable' => true,
		), 'title'
	);

	$installer->getConnection()->createTable($table);
	$installer->endSetup();



 ?>