<?php

class Ccc_User_Block_Adminhtml_User extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	
    public function __construct() {
        parent::__construct();
        $this->_controller = 'adminhtml_user';
        $this->_blockGroup = 'ccc_user';
        $this->_headerText = Mage::helper('user')->__('User Manager');
        // $this->_addButtonLabel = Mage::helper('user')->__('Add User');
    }
}