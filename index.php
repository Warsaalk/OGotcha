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

/**
 * Include everything we need
 */
include 'const.php';
include __MODULES . 'kokx/const.php';

/**
 * Let the Main handle everything :)
 */
$main = new Main(); //Create Main 

//$main->addInfo( new Info( "This website is still under construction and can be used for testing purposes only! Errors can occur when doing certain actions.", Info::INFORMATION ) );
//$main->addInfo( new Info( "Copyrights are not final yet. This software is under GNU GPL v3 license, the source will be available when the software is finished!", Info::INFORMATION ) );

$main->initDictionaries( array('nl','en') );
$main->initPages( array('home') );

$main->setValidator( new Validator() ); //Connect form validator
$main->setFormManager( new FormManager() ); //Connect form manager
$main->setDict( new Dictionary() ); //Connect dictionary
$main->setStore( new Store() ); //Connect Store

$main->handleGet(); //Handle $_GET
$main->handleDictionary(); //Handle Dictionary
$main->handlePost(); //Handle $_POST

$main->handleModule( 'KokxModule' ); //Name of module class

$main->addGoogleAnalytics( 'UA-46271379-4' );

/**
 * Handle View
 */
$view = new View( $main ); //Create view 
$view->addCSS( 'main.css' ); //Add style

$renderd = $view->render(); //Render content

echo $renderd; //Dispay content

/*
 * http://pastebin.com/Fg1uhvU4 - Dutch
 * http://pastebin.com/1xzDcJm4 - English
 */