<?php 
/**
 * 
 */
class Ccc_Practice_Block_Adminhtml_Practice_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form(
			array(
				'id' => 'edit_form',
				'action' => $this->getUrl('*/*/save',['id' => $this->getRequest()->getParam('id')]),
				'method' => 'post',
			)
		);
		$form->setUseContainer(true);
		$this->setForm($form);
		$fieldset = $form->addFieldset('display',array(
			'legend' => $this->__('group Information'),
			'class' => 'fieldset',
		));
		$fieldset->addField('title','text',array(
			'name' => 'practice[title]',
			'label' => $this->__('Title'),
		));
		/*if(Mage::registry('practice_data'))
		{
			$form->setValues(Mage::registry('practice_data')->getData());
		}*/
		if(Mage::registry('practice_data'))
		{
			$form->setValues(Mage::registry('practice_data')->getData());
		}
		return parent::_prepareForm();
	}
}

 ?>