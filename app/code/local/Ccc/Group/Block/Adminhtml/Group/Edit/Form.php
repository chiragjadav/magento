<?php 

/**
 * 
 */
class Ccc_Group_Block_Adminhtml_Group_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
	
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form(
			array(
				'id' => 'edit_form',
				'action' => $this->getUrl('*/*/save',array('id' => $this->getRequest()->getParam('id'))),
				'method' => 'post',
			)
		);
		$form->setUseContainer(true);
		$this->setForm($form);
		$fieldset = $form->addFieldset('display',array(
			'legend' => $this->__('group Information'),
			'class' => 'fieldset',
		));
		$fieldset->addField('first_name','text',array(
			'name' => 'group[first_name]',
			'label' => $this->__('First Name'),
			'required' => true,
		));
		$fieldset->addField('last_name','text',array(
			'name' => 'group[last_name]',
			'label' => $this->__('Last Name'),
			'required' => true,
		));
		if(Mage::registry('group_data'))
		{
			$form->setValues(Mage::registry('group_data')->getData());
		}
		return parent::_prepareForm();
	}
}


 ?>