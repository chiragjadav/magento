<?php 

/**
 * 
 */
class Ccc_Practice1_Adminhtml_Practice1Controller extends Mage_Adminhtml_Controller_Action
{
	
	public function indexAction()
	{
		$this->loadLayout();
		$this->_setActiveMenu('practice1');
		$this->renderLayout();
	}
	public function newAction()
	{
		$this->_forward('edit');
	}
	public function editAction()
	{
		$practice1Id = $this->getRequest()->getParam('id');
		$practice1Model = Mage::getModel('ccc_practice1/data')->load($practice1Id);
		if($practice1Model->getId())
		{
			Mage::register('practice1_data',$practice1Model);
		}
		$this->loadLayout();
		$this->renderLayout();
	}
	public function saveAction()
	{
		$practice1Id = $this->getRequest()->getParam('id');
		$practice1Data = $this->getRequest()->getPost('practice1');
		$practice1Model = Mage::getModel('ccc_practice1/data');
		$practice1Model->setData($practice1Data);
		if($practice1Id)
		{
			$practice1Model = $practice1Model->setId($practice1Id);
		}
		$practice1Model->save();
		$this->_redirect('*/*/');
	}
}

 ?>