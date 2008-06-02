<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA["tx_mhsimplegallery_categories"] = array (
	"ctrl" => $TCA["tx_mhsimplegallery_categories"]["ctrl"],
	"interface" => array (
		"showRecordFieldList" => "sys_language_uid,l18n_parent,l18n_diffsource,hidden,fe_group,cruser_id,name,path,public"
	),
	"feInterface" => $TCA["tx_mhsimplegallery_categories"]["feInterface"],
	"columns" => array (
  	't3ver_label' => array (        
      'label'  => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
      'config' => array (
        'type' => 'input',
        'size' => '30',
        'max'  => '30',
      )
    ),
    'sys_language_uid' => array (        
      'exclude' => 1,
      'label'  => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
      'config' => array (
        'type'                => 'select',
        'foreign_table'       => 'sys_language',
        'foreign_table_where' => 'ORDER BY sys_language.title',
        'items' => array(
          array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
          array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
        )
      )
    ),
    'l18n_parent' => array (        
      'displayCond' => 'FIELD:sys_language_uid:>:0',
      'exclude'     => 1,
      'label'       => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
      'config'      => array (
        'type'  => 'select',
        'items' => array (
          array('', 0),
        ),
        'foreign_table'       => 'tx_test_xy',
        'foreign_table_where' => 'AND tx_test_xy.pid=###CURRENT_PID### AND tx_test_xy.sys_language_uid IN (-1,0)',
      )
    ),
    'l18n_diffsource' => array (        
      'config' => array (
         'type' => 'passthrough'
      )
    ),
		'hidden' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'fe_group' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.fe_group',
			'config'  => array (
				'type'  => 'select',
				'items' => array (
					array('', 0),
					array('LLL:EXT:lang/locallang_general.xml:LGL.hide_at_login', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.any_login', -2),
					array('LLL:EXT:lang/locallang_general.xml:LGL.usergroups', '--div--')
				),
				'foreign_table' => 'fe_groups'
			)
		),
		"cruser_id" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_categories.owner",		
			"config" => Array (
				"type" => "select",
				"items" => Array (
            Array("",0),
        ),
				"foreign_table" => "fe_users",	
				"foreign_table_where" => "ORDER BY fe_users.username",	
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,
			)
		),
		"name" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_categories.name",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
				"eval" => "required",
			)
		),
		"path" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_categories.path",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",	
			)
		),
		"public" => Array (        
      "exclude" => 1,        
      "label" => "LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_categories.public",        
      "config" => Array (
          "type" => "check",
      )
    ),
	),
	"types" => array (
		"0" => array("showitem" => "sys_language_uid;;;;1-1-1, l18n_parent, l18n_diffsource, hidden;;1;;1-1-1, cruser_id, name, path, public")
	),
	"palettes" => array (
		"1" => array("showitem" => "fe_group")
	)
);



$TCA["tx_mhsimplegallery_images"] = array (
	"ctrl" => $TCA["tx_mhsimplegallery_images"]["ctrl"],
	"interface" => array (
		"showRecordFieldList" => "hidden,starttime,endtime,fe_group,category,title,describtion,image,comments,hits,rating"
	),
	"feInterface" => $TCA["tx_mhsimplegallery_images"]["feInterface"],
	"columns" => array (
		'hidden' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'starttime' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config'  => array (
				'type'     => 'input',
				'size'     => '8',
				'max'      => '20',
				'eval'     => 'date',
				'default'  => '0',
				'checkbox' => '0'
			)
		),
		'endtime' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config'  => array (
				'type'     => 'input',
				'size'     => '8',
				'max'      => '20',
				'eval'     => 'date',
				'checkbox' => '0',
				'default'  => '0',
				'range'    => array (
					'upper' => mktime(0, 0, 0, 12, 31, 2020),
					'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y'))
				)
			)
		),
		'fe_group' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.fe_group',
			'config'  => array (
				'type'  => 'select',
				'items' => array (
					array('', 0),
					array('LLL:EXT:lang/locallang_general.xml:LGL.hide_at_login', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.any_login', -2),
					array('LLL:EXT:lang/locallang_general.xml:LGL.usergroups', '--div--')
				),
				'foreign_table' => 'fe_groups'
			)
		),
		"category" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_images.category",		
			"config" => Array (
				"type" => "select",	
				"foreign_table" => "tx_mhsimplegallery_categories",	
				"foreign_table_where" => "ORDER BY tx_mhsimplegallery_categories.uid",	
				"size" => 10,	
				"minitems" => 0,
				"maxitems" => 100,
			)
		),
		"title" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_images.title",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"describtion" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_images.describtion",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",
				"rows" => "5",
				"wizards" => Array(
					"_PADDING" => 2,
					"RTE" => array(
						"notNewRecords" => 1,
						"RTEonly" => 1,
						"type" => "script",
						"title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
						"icon" => "wizard_rte2.gif",
						"script" => "wizard_rte.php",
					),
				),
			)
		),
		"image" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_images.image",		
			"config" => Array (
				"type" => "group",
				"internal_type" => "file",
				"allowed" => $GLOBALS["TYPO3_CONF_VARS"]["GFX"]["imagefile_ext"],	
				"max_size" => 1000,	
				"uploadfolder" => "uploads/tx_mhsimplegallery",
				"show_thumbs" => 1,	
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,
			)
		),
		"comments" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_images.comments",		
			"config" => Array (
				"type" => "none",
			)
		),
		"hits" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_images.hits",		
			"config" => Array (
				"type" => "none",
			)
		),
		"rating" => Array (		
			"config" => Array (
				"type" => "passthrough",
			)
		),
	),
	"types" => array (
		"0" => array("showitem" => "hidden;;1;;1-1-1, category, title;;;;2-2-2, describtion;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts];3-3-3, image, comments, hits, rating")
	),
	"palettes" => array (
		"1" => array("showitem" => "starttime, endtime, fe_group")
	)
);



$TCA["tx_mhsimplegallery_comments"] = array (
	"ctrl" => $TCA["tx_mhsimplegallery_comments"]["ctrl"],
	"interface" => array (
		"showRecordFieldList" => "hidden,starttime,endtime,image,title,text"
	),
	"feInterface" => $TCA["tx_mhsimplegallery_comments"]["feInterface"],
	"columns" => array (
		'hidden' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'starttime' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config'  => array (
				'type'     => 'input',
				'size'     => '8',
				'max'      => '20',
				'eval'     => 'date',
				'default'  => '0',
				'checkbox' => '0'
			)
		),
		'endtime' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config'  => array (
				'type'     => 'input',
				'size'     => '8',
				'max'      => '20',
				'eval'     => 'date',
				'checkbox' => '0',
				'default'  => '0',
				'range'    => array (
					'upper' => mktime(0, 0, 0, 12, 31, 2020),
					'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y'))
				)
			)
		),
		"image" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_comments.image",		
			"config" => Array (
				"type" => "select",	
				"foreign_table" => "tx_mhsimplegallery_images",	
				"foreign_table_where" => "AND tx_mhsimplegallery_images.pid=###STORAGE_PID### ORDER BY tx_mhsimplegallery_images.uid",	
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,
			)
		),
		"title" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_comments.title",		
			"config" => Array (
				"type" => "input",	
				"size" => "30",
			)
		),
		"text" => Array (		
			"exclude" => 1,		
			"label" => "LLL:EXT:mh_simplegallery/locallang_db.xml:tx_mhsimplegallery_comments.text",		
			"config" => Array (
				"type" => "text",
				"cols" => "30",
				"rows" => "5",
				"wizards" => Array(
					"_PADDING" => 2,
					"RTE" => array(
						"notNewRecords" => 1,
						"RTEonly" => 1,
						"type" => "script",
						"title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
						"icon" => "wizard_rte2.gif",
						"script" => "wizard_rte.php",
					),
				),
			)
		),
	),
	"types" => array (
		"0" => array("showitem" => "hidden;;1;;1-1-1, image, title;;;;2-2-2, text;;;richtext[paste|bold|italic|underline|formatblock|class|left|center|right|orderedlist|unorderedlist|outdent|indent|link|image]:rte_transform[mode=ts];3-3-3")
	),
	"palettes" => array (
		"1" => array("showitem" => "starttime, endtime")
	)
);
?>
