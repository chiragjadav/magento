<?php 
/**
 * 
 */
class Ccc_Group_Adminhtml_GroupController extends Mage_Adminhtml_Controller_Action
{
	
	public function indexAction()
	{
		$this->loadLayout();
		$this->_setActiveMenu('group');
		$this->renderLayout();
	}
	public function newAction()
	{
		$this->_forward('edit');
	}
/*	public function editAction()
	{
		$groupId = $this->getRequest()->getParam('id');
		$groupModel = Mage::getModel('ccc_group/data')->load($groupId);
		if($groupModel->getId())
		{
			Mage::register('group_data',$groupModel);
		}
		$this->loadLayout();
		$this->renderLayout();
	}*/
	public function editAction()
    {
        try {
            $id = $this->getRequest()->getParam('id');
            //$wholeseller = Mage::getModel('wholeseller/wholeseller')->load($id);
            $groupModel = Mage::getModel('ccc_group/data');
            /* if ($wholeseller->getId() || $id == 0) {
                Mage::register('wholeseller', $wholeseller);
            } */
            if ($id) {
                $groupModel->load($id);
                if (!$groupModel->getId()) {
                    Mage::throwException(Mage::helper('ccc_group')->__('Invalid Id.'));
                }
            }
            Mage::register('group_data', $groupModel);
            $this->loadLayout();
            $this->renderLayout();
        } 
        catch (Exception $e) {
            $this->_getSession()->addError(Mage::helper('ccc_group')->__($e->getMessage()));
            $this->_redirect('*/*/');
        }
    }
/*	public function saveAction()
	{
		$groupId = $this->getRequest()->getParam('id');
		$groupData = $this->getRequest()->getPost('group');
		echo "<pre>";
		print_r($groupData); 
		if(count(array_filter($groupData)) == 0)
		{
			echo "empty"; die();
		}

		die();

		$groupModel = Mage::getModel('ccc_group/data');
		$groupModel->setData($groupData);
		if($groupId)
		{
			$groupModel = $groupModel->setId($groupId);
		}
		$groupModel->save();
		$this->_redirect('');
	}*/
	public function saveAction()
    {
        try {
            if (!$this->getRequest()->isPost()) {
                Mage::throwException(Mage::helper('ccc_group')->__('Invalid Request.'));
            }
            $postData = $this->getRequest()->getPost('group');
            $id = $this->getRequest()->getParam('id');
            $groupModel = Mage::getModel('ccc_group/data');
            if ($id) {
                $groupModel->load($id);
                if (!$groupModel->getId()) {
                    Mage::throwException(Mage::helper('ccc_group')->__('Invalid Id.'));
                }
                $groupModel->setId($id);
            }
            $groupModel->addData($postData)->save();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('ccc_group')->__('Group successfully saved.'));
        } 
        catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('ccc_group')->__($e->getMessage()));
        }
        $this->_redirect('*/*/');
    }
	/*public function deleteAction()
	{
		$groupId = $this->getRequest()->getParam('id');
		$groupModel = Mage::getModel('ccc_group/data');
		$groupModel->setId($groupId)->delete();
		$this->_redirect('');
	}*/
	public function deleteAction()
    {
        try {
            $id = $this->getRequest()->getParam('id');    
            if (!$id) {
                Mage::throwException(Mage::helper('ccc_group')->__('Id not found.!'));
            }
            $groupModel = Mage::getModel('ccc_group/data')->load($id);
            if (!$groupModel->getId()) {
                Mage::throwException(Mage::helper('ccc_group')->__('Invalid id.!'));
            }
            $groupModel->setId($id)->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('ccc_group')->__('Group successfully deleted.'));
        } 
        catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('ccc_group')->__($e->getMessage()));
        	$this->_redirect('*/*/');
        }
        $this->_redirect('*/*/');
    }
}

 ?>