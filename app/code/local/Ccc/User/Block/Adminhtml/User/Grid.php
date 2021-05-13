<?php
class Ccc_User_Block_Adminhtml_User_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('userGrid');
        // This is the primary key of the database
        $this->setDefaultSort('user_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('user/user')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    protected function _prepareColumns()
    {
        $this->addColumn('user_id', array(
        'header' => Mage::helper('user')->__('ID'),
        'align' =>'right',
        'width' => '50px',
        'index' => 'user_id',
        ));

        $this->addColumn('user_name', array(
        'header' => Mage::helper('user')->__('User Name'),
        'align' =>'left',
        'index' => 'user_name',
        ));

        return parent::_prepareColumns();
    }
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
?>