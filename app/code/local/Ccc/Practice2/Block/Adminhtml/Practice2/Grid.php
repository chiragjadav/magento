<?php 
/**
 * 
 */
class Ccc_Practice2_Block_Adminhtml_Practice2_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	
	public function __construct()
	{
		parent::__construct();
		$this->setId('practice2Grid');
		$this->setDefaultSort('data_id');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);

	}
}


 ?>