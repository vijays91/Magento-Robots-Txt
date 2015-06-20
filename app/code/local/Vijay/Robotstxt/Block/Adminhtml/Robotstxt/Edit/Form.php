<?php
class Vijay_Robotstxt_Block_Adminhtml_Robotstxt_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{	  
    public function __construct() {
        parent::__construct();
    }
	
    public function getModel() {
        return Mage::registry('robotstxt_data');
    }
	
    protected function _prepareForm()
    {
        $data  = $this->getModel();
		
		$form = new Varien_Data_Form(array(
			'id' => 'edit_form',
			'action' => $this->getUrl('*/*/save'),
			'method' => 'post',
			)
		); 
        $form->setUseContainer(true);
        $this->setForm($form);		
		
        $fieldset = $form->addFieldset('robotstxt_form',array('legend'=>Mage::helper('robotstxt')->__('Robotstxt Content')));
		$fieldset->addField('content', 'textarea', array(
			'name'          =>'content',
			'label'         => Mage::helper('robotstxt')->__('Robotstxt Content'),
			'value'         => $data,
			'required'		=> true,
			'tabindex' 		=> 1,
			'style' 		=> 'width:700px;height:20em;',
		));
		
        return parent::_prepareForm();
    }
}
