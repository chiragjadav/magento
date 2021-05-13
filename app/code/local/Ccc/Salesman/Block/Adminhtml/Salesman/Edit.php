<?php 

/**
 * 
 */
class Ccc_Salesman_Block_Adminhtml_Salesman_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	
	public function __construct()
	{
		
		parent::__construct();
		$this->_controller = 'adminhtml_salesman';
		$this->_blockGroup = 'ccc_salesman';
		$this->_headerText = $this->__('Edit Salesman');
	}
}

 ?>