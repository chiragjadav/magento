<?php 
/**
 * 
 */
class Ccc_Practice_Adminhtml_PracticeController extends Mage_Adminhtml_Controller_Action
{
	
	public function indexAction()
	{
		$this->loadLayout();
		$this->_setActiveMenu('practice');
		$this->renderLayout();
	}
	public function newAction()
	{
		$this->_forward('edit');
	}
	public function editAction()
	{
		$practiceId = $this->getRequest()->getParam('id');
		$practiceModel = Mage::getModel('ccc_practice/data')->load($practiceId);
		if($practiceModel->getId())
		{
			Mage::register('practice_data',$practiceModel);
		}
		$this->loadLayout();
		$this->renderLayout();
	}
	public function saveAction()
	{
		$practiceId = $this->getRequest()->getParam('id');
		$practiceData = $this->getRequest()->getPost('practice');
		$practiceModel = Mage::getModel('ccc_practice/data');
		$practiceModel->setData($practiceData);
		if($practiceId)
		{
			$practiceModel = $practiceModel->setId($practiceId);
		}
		$practiceModel->save();
		$this->_redirect('*/*/');
	}
}

 ?>