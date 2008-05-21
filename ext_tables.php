<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

t3lib_extMgm::allowTableOnStandardPages('tx_mhsimplegallery_categories');


t3lib_extMgm::addToInsertRecords('tx_mhsimplegallery_categories');

$TCA["tx_mhsimplegallery_categories"] = array (
	"ctrl" => array (
		'title'         => 'LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_categories',		
		'label'         => 'name',	
		'tstamp'        => 'tstamp',
		'crdate'        => 'crdate',
		'cruser_id'     => 'cruser_id',
		'versioningWS'  => TRUE, 
    'origUid'       => 't3_origuid',
    'languageField'            => 'sys_language_uid',    
    'transOrigPointerField'    => 'l18n_parent',    
    'transOrigDiffSourceField' => 'l18n_diffsource',    
    'sortby' => 'sorting', 	
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',	
			'fe_group' => 'fe_group',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_mhsimplegallery_categories.gif',
	),
	"feInterface" => array (
		"fe_admin_fieldList" => "sys_language_uid, l18n_parent, l18n_diffsource, hidden, fe_group, name",
	)
);


t3lib_extMgm::allowTableOnStandardPages('tx_mhsimplegallery_images');


t3lib_extMgm::addToInsertRecords('tx_mhsimplegallery_images');

$TCA["tx_mhsimplegallery_images"] = array (
	"ctrl" => array (
		'title'     => 'LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_images',		
		'label'     => 'title',	
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'sortby' => 'sorting',	
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',	
			'starttime' => 'starttime',	
			'endtime' => 'endtime',	
			'fe_group' => 'fe_group',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_mhsimplegallery_images.gif',
	),
	"feInterface" => array (
		"fe_admin_fieldList" => "hidden, starttime, endtime, fe_group, category, title, describtion, image, comments, hits, rating",
	)
);


t3lib_extMgm::allowTableOnStandardPages('tx_mhsimplegallery_comments');


t3lib_extMgm::addToInsertRecords('tx_mhsimplegallery_comments');

$TCA["tx_mhsimplegallery_comments"] = array (
	"ctrl" => array (
		'title'     => 'LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_comments',		
		'label'     => 'text',	
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => "ORDER BY crdate",	
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',	
			'starttime' => 'starttime',	
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_mhsimplegallery_comments.gif',
	),
	"feInterface" => array (
		"fe_admin_fieldList" => "hidden, starttime, endtime, image, title, text",
	)
);


t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1']='pi_flexform';

t3lib_extMgm::addPlugin(array('LLL:EXT:mh_simplegallery/locallang_db.xml:tt_content.list_type_pi1', $_EXTKEY.'_pi1'),'list_type');


t3lib_extMgm::addStaticFile($_EXTKEY,"pi1/static/","Simple Gallery");


if (TYPO3_MODE=="BE")	$TBE_MODULES_EXT["xMOD_db_new_content_el"]["addElClasses"]["tx_mhsimplegallery_pi1_wizicon"] = t3lib_extMgm::extPath($_EXTKEY).'pi1/class.tx_mhsimplegallery_pi1_wizicon.php';

t3lib_extMgm::addStaticFile($_EXTKEY,'static/', 'Simple Gallery (Static)');
t3lib_extMgm::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:mh_simplegallery/flexform_ds_pi1.xml');
?>
