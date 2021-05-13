<?php
class Ccc_User_Block_Adminhtml_User_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_blockGroup = 'ccc_user';
        $this->_controller = 'adminhtml_user';
         $this->_headerText = $this->__('Edit User');
        $this->_updateButton('save', 'label', Mage::helper('user')->__('Save User'));
        $this->_updateButton('delete', 'label', Mage::helper('user')->__('Delete User'));
    }
   
}

