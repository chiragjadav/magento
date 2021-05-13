<?php 

class Ccc_Salesman_Adminhtml_SalesmanController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction()
	{
		$this->loadLayout();
		$this->_setActiveMenu('salesman');
		$this->renderLayout();
	}
	public function newAction()
	{

		$this->_forward('edit');
	}
	public function editAction()
	{

		$salesmanId = $this->getRequest()->getParam('id');
		$salesmanModel = Mage::getModel('ccc_salesman/data')->load($salesmanId);
		if($salesmanModel->getId())
		{
			Mage::register('salesman_data',$salesmanModel);
		}
		$this->loadLayout();
		$this->renderLayout();
	}
	public function saveAction()
	{
		$salesmanId = $this->getRequest()->getParam('id');
		$salesmanData = $this->getRequest()->getPost('salesman');
		/*echo "<pre>";
		print_r($salesmanData);die();*/
		$salesmanModel = Mage::getModel('ccc_salesman/data');
		$salesmanModel->setData($salesmanData);
		if($salesmanId)
		{
			$salesmanModel = $salesmanModel->setId($salesmanId);
		}
		$salesmanModel->save();
		$this->_redirect('*/*/');
	}
	public function deleteAction()
	{
		$salesmanId = $this->getRequest()->getParam('id');
		$salesmanModel = Mage::getModel('ccc_salesman/data');
		$salesmanModel->setId($salesmanId)->delete();
		$this->_redirect('*/*/');
	}
	
}

