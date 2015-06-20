<?php
class Vijay_Robotstxt_Adminhtml_RobotstxtController extends Mage_Adminhtml_Controller_Action
{
	public function indexAction() {
	
		$path = BP . DS;
		$filename = 'robots.txt';
		$filepath = $path.'/'.$filename;
		
		$this->_title($this->__('Robots Txt'))->_title($this->__('Robots Txt'));
		
		$this->loadLayout();
		$this->_setActiveMenu('vijay/items');
		$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
		
		$breadcrumbTitle = Mage::helper('robotstxt')->__('Robots Txt');
		$breadcrumbLabel = Mage::helper('robotstxt')->__('Robots Txt');
		$this->_addBreadcrumb($breadcrumbLabel, $breadcrumbTitle);
		
		/*- Set Content in register -*/
		$content = $this->readRobotsfile($filename, $filepath);
		Mage::register('robotstxt_data', $content);
		
		$this->_addContent($this->getLayout()->createBlock('robotstxt/adminhtml_robotstxt_edit'));
		/* ->_addLeft($this->getLayout()->createBlock('robotstxt/adminhtml_robotstxt_edit_tabs')); */		
		$this->renderLayout();
	}

	public function saveAction()
	{
	
		$path = BP . DS;
		$filename = 'robots.txt';
		$filepath= $path.'/'.$filename;
		
		$folderwrite = is_writable($path); 
		$write = is_writable($filepath);
		$content = $this->getRequest()->getParam('content');
		
		if (file_exists($filepath)):
			if($folderwrite):
				if($write):
					$this->writeFile($filename, $content);
					Mage::getSingleton('adminhtml/session')->addSuccess(
						Mage::helper('robotstxt')->__('File updated successfully')
					);
					$this->_redirect('*/*/');
				else:
					Mage::getSingleton('adminhtml/session')->addError(
						Mage::helper('robotstxt')->__('File needs writable permissions')
					);
					$this->_redirect('*/*/');
				endif;
			else:
				Mage::getSingleton('adminhtml/session')->addError(
					Mage::helper('robotstxt')->__('Folder needs writable permissions to create robots.txt')
				);
				$this->_redirect('*/*/');
			endif; 
		else:
		    if($folderwrite):				
					$this->writeFile($filename, $content);
					Mage::getSingleton('adminhtml/session')->addSuccess(
						Mage::helper('robotstxt')->__('File created and saved successfully')
					);
					$this->_redirect('*/*/');
			else:
				Mage::getSingleton('adminhtml/session')->addError(
					Mage::helper('robotstxt')->__('Folder needs writable permissions to create robots.txt')
				);
				$this->_redirect('*/*/');
			endif; 
		endif;
	}
	
	/*
	 * Write the content in robots.txt file
	*/
	public function writeFile($filename, $content) {
		$create = fopen($filename, "w");
		file_put_contents($filename, $content);
		$close = fclose($create);
	}
	
	/*
	 * Get the content in robots.txt file
	*/	
	public function readRobotsfile($filename, $filepath){
		if (file_exists($filepath)) {
			$file_read = fopen($filename, "r");
			$robots_content = file_get_contents($filename);
			fclose($file_read);
		}
		else {
			$robots_content = '';
		}
		return $robots_content;
	}
}