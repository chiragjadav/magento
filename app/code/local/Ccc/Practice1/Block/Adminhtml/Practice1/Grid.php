<?php 
/**
 * 
 */
class Ccc_Practice1_Block_Adminhtml_Practice1_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	
	public function __construct()
	{
		parent::__construct();
		$this->setId('practice1Grid');
		$this->setDefaultSort('data_id');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);
	}
	protected function _prepareCollection()
	{
		$collection = Mage::getModel('ccc_practice1/data')->getCollection();
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

		$this->addColumn('title',
			array(
				'header' => $this->__('Title'),
				'index' => 'title',
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