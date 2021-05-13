<?php 
/**
 * 
 */
class Ccc_Salesman_Block_Adminhtml_Salesman_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	
	public function __construct()
	{
		parent::__construct();
		$this->setId('salesmanGrid');
		$this->setDefaultSort('data_id');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);
	}
	protected function _prepareCollection()
	{
		$collection = Mage::getModel('ccc_salesman/data')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}
	protected function _prepareColumns()
	{

		$this->addColumn('data_id',
			array(
				'header' => $this->__('ID'),
				'align' => 'center',
				'width' => '50px',
				'index' => 'data_id',
			)
		);

		$this->addColumn('first_name',
			array(
				'header' => $this->__('First Name'),
				'index' => 'first_name',
			)
		);

		$this->addColumn('last_name',
			array(
				'header' => $this->__('Last Name'),
				'index' => 'last_name',
			)
		);

		return parent::_prepareColumns();
	}
	public function getRowUrl($row)
	{
		return $this->getUrl('*/*/edit',array('id' => $row->getDataId()));
	}
}

 ?>