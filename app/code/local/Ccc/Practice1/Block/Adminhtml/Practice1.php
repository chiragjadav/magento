<?php 

/**
 * 
 */
class Ccc_Practice1_Block_Adminhtml_Practice1 extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	
	public function __construct()
	{
		parent::__construct();
		$this->_controller = 'adminhtml_practice1';
		$this->_blockGroup = 'ccc_practice1';
		$this->_headerText = $this->__('Practice1 Details');
 	}
}

 ?>