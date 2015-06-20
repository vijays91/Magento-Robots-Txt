<?php
class Vijay_Robotstxt_Block_Adminhtml_Robotstxt extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function __construct()
	{
		$this->_controller = 'adminhtml_robotstxt';
		$this->_blockGroup = 'robotstxt';
		$this->_headerText = Mage::helper('robotstxt')->__('Robots Txt Manager');
		$this->_addButtonLabel = Mage::helper('robotstxt')->__('Add Robots Txt Options');
		parent::__construct();
	}
}
