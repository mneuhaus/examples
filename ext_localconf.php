<?php
/* $Id$ */

if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

	// Load XCLASSing of db_new
	// USAGE: Core APIs > TYPO3 API overview > PHP Class Extension > Which classes? > Example - Adding a small feature in the interface
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Backend\\Controller\\NewRecordController'] = array(
	'className' => 'TYPO3\\Examples\\Xclass\\NewRecordController'
);

	// Add tt_news listing to Web > Page module
	// USAGE: Core APIs > TYPO3 API overview > Various examples > Support for custom tables in the Page module
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['cms']['db_layout']['addTables']['sys_template'][0] = array(
	'fList' => 'title,short;author',
	'icon' => TRUE
);

	// Define custom permission options
	// USAGE: Core APIs > TYPO3 API overview > Various examples > Using custom permission options
$GLOBALS['TYPO3_CONF_VARS']['BE']['customPermOptions'] = array(
	'tx_coreunittest_cat1' => array(
			'header' => '[Core Unittest] Category 1',
			'items' => array(
			'key1' => array('Key 1 header'),
			'key2' => array('Key 2 header'),
			'key3' => array('Key 3 header'),
		)
	)
);

	// Register ExtDirect method
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerExtDirectComponent(
	'TYPO3.Examples.ExtDirect',
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY, 'Classes/ExtDirect/Server.php:Tx_Examples_ExtDirect_Server')
);

/*
	// Register a class for manipulating the page rendering process
	// (used in TYPO3 Viewport manipulation demonstration)
	// NOTE: even though the code itself works, it breaks the TYPO3 backend
	// This code should be revisited at some point, but this requires solid ExtJS knowledge
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-preProcess'][] =
  'EXT:' . $_EXTKEY . '/Classes/Utilities/Viewport.php:Tx_Examples_Utilities_Viewport->renderPreProcess';
*/

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPItoST43(
	$_EXTKEY,
	'pierror/class.tx_examples_pierror.php',
	'_pierror',
	'list_type',
	1
);
?>
