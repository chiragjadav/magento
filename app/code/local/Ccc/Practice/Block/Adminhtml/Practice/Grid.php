<?php 
/**
 * 
 */
class Ccc_Practice_Block_Adminhtml_Practice_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	
	public function __construct()
	{
		parent::__construct();
		$this->setId('practiceGrid');
		$this->setDefaultDir('Asc');
		$this->setDefaultSort('data_id');
	}
	public function _prepareCollection()
	{
		$collection = Mage::getModel('ccc_practice/data')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}
	public function _prepareColumns()
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
				'index' => 'title'
			)
		);
		return parent::_prepareColumns();
	}

	public function getRowUrl($row)
	{
		return $this->getUrl('*/*/edit',['id' => $row->getDataId()]);
	}
}



 ?>