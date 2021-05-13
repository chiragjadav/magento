<?php 

class Ccc_Demo_IndexController extends Mage_Core_Controller_Front_Action
{
	public function helloAction()
	{
		echo "Hello World";
		$this->loadLayout();
		$this->renderLayout();
	}
	
}

