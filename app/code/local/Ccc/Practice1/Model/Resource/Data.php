<?php 
/**
 * 
 */
class Ccc_Practice1_Model_Resource_Data extends Mage_Core_Model_Resource_Db_Abstract
{
	
	protected function _construct()
	{
		$this->_init('ccc_practice1/data','data_id');
	}
}

 ?>