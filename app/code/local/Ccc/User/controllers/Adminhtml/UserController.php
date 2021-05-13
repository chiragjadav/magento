<?php

class Ccc_User_Adminhtml_UserController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('user/users')
            ->_addBreadcrumb(Mage::helper('adminhtml')->__('Users Manager'), Mage::helper('adminhtml')->__('User Manager'));
        return $this;
    }

    public function indexAction()
    {
        $this->_initAction();
        $this->renderLayout();
    }

    public function editAction()
    {
        $userId = $this->getRequest()->getParam('id');
        $userModel = Mage::getModel('user/user')->load($userId);
        if ($userModel->getId() || $userId == 0) {
            Mage::register('user_data', $userModel);
            $this->loadLayout();
            $this->_setActiveMenu('user/users');
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('User Manager'), Mage::helper('adminhtml')->__('User Manager'));
            //$this->_addBreadcrumb(Mage::helper('adminhtml')->__('User News'), Mage::helper('adminhtml')->__('User News'));
            
            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('user')->__('User does not exist'));
            $this->_redirect('*/*/');
        }
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function saveAction()
    {
        if ($this->getRequest()->getPost()) {
            try {
                $postData = $this->getRequest()->getPost();
                $id = $this->getRequest()->getParam('id');
                $userModel = Mage::getModel('user/user')->load($id);
                if ($userModel->getId()) {
                    $userModel->setUserName($postData['user_name'])
                        ->save();
                } else {
                    $userModel->setId($this->getRequest()->getParam('i-d'))
                        ->setUserName($postData['user_name'])
                        ->save();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('user')->__('User was Successfully saved.')
                );
                Mage::getSingleton('adminhtml/session')->setUserData(false);
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setUserData($this->getRequest()->getPost());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        if ($this->getRequest()->getParam('id') > 0) {
            try {
                $userModel = Mage::getModel('user/user');
                $userModel->setId($this->getRequest()->getParam('id'))
                    ->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('User was successfully deleted'));
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }

    /**
     * Product grid for AJAX request.
     * Sort and filter result for example.
     */

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('importedit/adminhtml_user_grid')->toHtml()
        );
    }
}