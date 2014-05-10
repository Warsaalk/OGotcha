<?php
/**   OGotcha, a combat report converter for Ogame
 *    Copyright (C) 2014  Klaas Van Parys
 *
 *   This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *   This program is based on the Kokx's CR Converter © 2009 kokx: https://github.com/kokx/kokx-converter
 *   
 *   This file is not part of the original program and therefore it only inherits this copyright: Copyright (C) 2014 Klaas Van Parys
 */

define( '__VERSION'		, '3.0.0'	);
define( '__BASE'		, '/git/ogame-converter/'			);
define( '__BASE_URL'		, '//'.$_SERVER['HTTP_HOST'].__BASE 	);
define( '__TEMPLATE' 		, 'app/tpl/' 		);
define( '__PAGE_TEMPLATE' 	, 'app/tpl/pages/'	);
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

include __CLASS_PATH	. 'lang'	. $classExt;
include __CLASS_PATH	. 'page'	. $classExt;
include __CLASS_PATH	. 'info'	. $classExt;
include __CLASS_PATH	. 'debug'	. $classExt;

//include __DATA			. 'properties'		. $dataExt;

include __MODEL 	. 'connector'	. $modelExt;
include __MODEL 	. 'validator'	. $modelExt;
include __MODEL 	. 'formmanager'	. $modelExt;
include __MODEL 	. 'dictionary'	. $modelExt;
include __MODEL 	. 'store'	. $modelExt;
include __MODEL 	. 'main'	. $modelExt;

include __VIEW 		. 'parser'	. $viewExt;
include __VIEW 		. 'view' 	. $viewExt;