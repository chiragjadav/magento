<?php 
/**
 * 
 */
class Ccc_Group_Block_Adminhtml_Group extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	
	public function __construct()
	{
		
		parent::__construct();
		$this->_controller = 'adminhtml_group';
		$this->_blockGroup = 'ccc_group';
		$this->_headerText = $this->__('Group Details');
	}
}


 ?>