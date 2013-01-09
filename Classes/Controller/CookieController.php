<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Azeef <azeef@pitsolutions.com>, PIT Solutions
 *  sivaprasad.s@pitysolutons.com <sivaprasad.s@pitsolutions.com>, PIT Solutions
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package cookiecontrol
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Cookiecontrol_Controller_CookieController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * cookieRepository
	 *
	 * @var Tx_Cookiecontrol_Domain_Repository_CookieRepository
	 */
	protected $cookieRepository;

	/**
	 * injectCookieRepository
	 *
	 * @param Tx_Cookiecontrol_Domain_Repository_CookieRepository $cookieRepository
	 * @return void
	 */
	public function injectCookieRepository(Tx_Cookiecontrol_Domain_Repository_CookieRepository $cookieRepository) {
		$this->cookieRepository = $cookieRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		//$additional_text = ($flexformValues['additional_text'] != "") ? $flexformValues['additional_text'] : addslashes($this->pi_getLL(''));
		$introductory_text = Tx_Extbase_Utility_Localization::translate('introductory_text', $this->request->getControllerExtensionName(), $arguments=NULL);
		$additional_text = Tx_Extbase_Utility_Localization::translate('additional_text', $this->request->getControllerExtensionName(), $arguments=NULL);
		$cookies = array();
		
		$cookies = $this->settings;
		
		$cookies['additional_text'] = $additional_text;
		$cookies['introductory_text'] = $introductory_text;
		$cookies['cookie_toggleoff'] = Tx_Extbase_Utility_Localization::translate('cookieoff', $this->request->getControllerExtensionName(), $arguments=NULL);
		$cookies['cookie_toggleon'] = Tx_Extbase_Utility_Localization::translate('cookieon', $this->request->getControllerExtensionName(), $arguments=NULL);
		$cookies['cookie_preftext'] = Tx_Extbase_Utility_Localization::translate('cookiepreftext', $this->request->getControllerExtensionName(), $arguments=NULL);
		$cookies['readmore'] = Tx_Extbase_Utility_Localization::translate('readmore', $this->request->getControllerExtensionName(), $arguments=NULL);
		$cookies['readless'] = Tx_Extbase_Utility_Localization::translate('readless', $this->request->getControllerExtensionName(), $arguments=NULL);
		$cookies['titlelabel'] = Tx_Extbase_Utility_Localization::translate('titlelabel', $this->request->getControllerExtensionName(), $arguments=NULL);
		$cookies['addSize'] = strlen($additional_text);
		$cookies['close'] =  Tx_Extbase_Utility_Localization::translate('close', $this->request->getControllerExtensionName(), $arguments=NULL);
	
		$this->view->assign('cookies', $cookies);
	}

	/**
	 * action show
	 *
	 * @param Tx_Cookiecontrol_Domain_Model_Cookie $cookie
	 * @return void
	 */
	public function showAction(Tx_Cookiecontrol_Domain_Model_Cookie $cookie) {
		$this->view->assign('cookie', $cookie);
	}

	/**
	 * action new
	 *
	 * @param Tx_Cookiecontrol_Domain_Model_Cookie $newCookie
	 * @dontvalidate $newCookie
	 * @return void
	 */
	public function newAction(Tx_Cookiecontrol_Domain_Model_Cookie $newCookie = NULL) {
		$this->view->assign('newCookie', $newCookie);
	}

	/**
	 * action create
	 *
	 * @param Tx_Cookiecontrol_Domain_Model_Cookie $newCookie
	 * @return void
	 */
	public function createAction(Tx_Cookiecontrol_Domain_Model_Cookie $newCookie) {
		$this->cookieRepository->add($newCookie);
		$this->flashMessageContainer->add('Your new Cookie was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param Tx_Cookiecontrol_Domain_Model_Cookie $cookie
	 * @return void
	 */
	public function editAction(Tx_Cookiecontrol_Domain_Model_Cookie $cookie) {
		$this->view->assign('cookie', $cookie);
	}

	/**
	 * action update
	 *
	 * @param Tx_Cookiecontrol_Domain_Model_Cookie $cookie
	 * @return void
	 */
	public function updateAction(Tx_Cookiecontrol_Domain_Model_Cookie $cookie) {
		$this->cookieRepository->update($cookie);
		$this->flashMessageContainer->add('Your Cookie was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param Tx_Cookiecontrol_Domain_Model_Cookie $cookie
	 * @return void
	 */
	public function deleteAction(Tx_Cookiecontrol_Domain_Model_Cookie $cookie) {
		$this->cookieRepository->remove($cookie);
		$this->flashMessageContainer->add('Your Cookie was removed.');
		$this->redirect('list');
	}

}
?>