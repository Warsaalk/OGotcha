<?php
define( '__VERSION'		, '2.0.3 (Modified by Vii & Warsaalk)'		);
define( '__BASE'		, '/git/ogame-converter/'			);
define( '__BASE_URL'		, 'http://'.$_SERVER['HTTP_HOST'].__BASE 	);
define( '__TEMPLATE' 		, 'app/tpl/' 		);
define( '__DICTIONARY' 		, 'app/dict/' 		);
define( '__DATA' 		, 'app/data/' 		);
define( '__MODULES' 		, 'app/modules/'	);
define( '__CLASS_PATH' 		, 'lib/class/'		);
define( '__MODEL' 		, 'lib/model/' 		);
define( '__VIEW' 		, 'lib/view/' 		);
define( '__IMAGES'		, 'app/img/'		);
define( '__JAVASCRIPT'		, 'app/js/'		);
define( '__CSS'			, 'app/css/'		);

$phpExt 		= '.php';
$modelExt 		= '.model'	. $phpExt;
$classExt 		= '.class' 	. $phpExt;
$viewExt 		= '.view' 	. $phpExt;
$tplExt 		= '.tpl'	. $phpExt;
$dataExt 		= '.data'	. $phpExt;
$dictExt 		= '.dict'	. $phpExt;
$moduleExt 		= '.module'	. $phpExt;

include __CLASS_PATH	. 'lang'			. $classExt;
include __CLASS_PATH	. 'page'			. $classExt;
include __CLASS_PATH	. 'info'			. $classExt;
include __CLASS_PATH	. 'debug'			. $classExt;

//include __DATA			. 'properties'		. $dataExt;

include __MODEL 		. 'connector'		. $modelExt;
include __MODEL 		. 'validator'		. $modelExt;
include __MODEL 		. 'formmanager'		. $modelExt;
include __MODEL 		. 'dictionary'		. $modelExt;
include __MODEL 		. 'store'			. $modelExt;
include __MODEL 		. 'main'			. $modelExt;

include __VIEW 			. 'parser'			. $viewExt;
include __VIEW 			. 'view' 			. $viewExt;