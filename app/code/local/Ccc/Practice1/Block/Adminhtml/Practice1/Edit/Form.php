<?php 

/**
 * 
 */
class Ccc_Practice1_Block_Adminhtml_Practice1_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
	
	public function _prepareForm()
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
			'legend' => $this->__('practice Information'),
			'class' => 'fieldset',
		));
		$fieldset->addField('title','text',array(
			'name' => 'practice1[title]',
			'label' => $this->__('Title'),
		));
		if(Mage::registry('practice1_data'))
		{
			$form->setValues(Mage::registry('practice1_data')->getData());
		}
		return parent::_prepareForm();
	}
}

 ?>