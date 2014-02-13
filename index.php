<?php
include 'const.php'; //File which contains all

//Include modules
include __MODULES . 'kokx/const.php';

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

$view = new View( $main ); //Create view 

$renderd = $view->render(); //Render view

echo $renderd; //Echo view 