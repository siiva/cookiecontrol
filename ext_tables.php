<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}



Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Cookie',
	'cookiecontrol'
);
/*
$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'select_key';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform,recursive';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');
*/

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'cookiecontrol');

t3lib_extMgm::addLLrefForTCAdescr('tx_cookiecontrol_domain_model_cookie', 'EXT:cookiecontrol/Resources/Private/Language/locallang_csh_tx_cookiecontrol_domain_model_cookie.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_cookiecontrol_domain_model_cookie');
$TCA['tx_cookiecontrol_domain_model_cookie'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:cookiecontrol/Resources/Private/Language/locallang_db.xml:tx_cookiecontrol_domain_model_cookie',
		'label' => 'uid',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => '',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Cookie.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_cookiecontrol_domain_model_cookie.gif'
	),
);





?>