<?php
class Vijay_Robotstxt_Block_Adminhtml_Robotstxt_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	/*
	public function __construct() {
		$this->setTemplate('robotstxt/robots_form.phtml');
	}
	*/
	public function __construct()
	{
		parent::__construct();               
        $this->_objectId = 'id';
        $this->_blockGroup = 'robotstxt';
        $this->_controller = 'adminhtml_robotstxt'; 
		$this->_removeButton('back');
		$this->_removeButton('delete');
		$this->_removeButton('reset');		
        $this->_updateButton('save', 'label', Mage::helper('robotstxt')->__('Save Content'));		
	}
 
    public function getHeaderText() {
		return Mage::helper('robotstxt')->__('Robotstxt Content');
    }
	
}
