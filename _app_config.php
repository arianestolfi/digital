<?php
/**
 * @package DIGITAL
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
if (!GlobalConfig::$APP_ROOT) GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/ExampleUser.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'SecureExample.LoginForm'),
	'POST:login' => array('route' => 'SecureExample.Login'),
	'GET:secureuser' => array('route' => 'SecureExample.UserPage'),
	'GET:secureadmin' => array('route' => 'SecureExample.AdminPage'),
	'GET:logout' => array('route' => 'SecureExample.Logout'),
		
	// Address
	'GET:addresses' => array('route' => 'Address.ListView'),
	'GET:address/(:num)' => array('route' => 'Address.SingleView', 'params' => array('idaddress' => 1)),
	'GET:api/addresses' => array('route' => 'Address.Query'),
	'POST:api/address' => array('route' => 'Address.Create'),
	'GET:api/address/(:num)' => array('route' => 'Address.Read', 'params' => array('idaddress' => 2)),
	'PUT:api/address/(:num)' => array('route' => 'Address.Update', 'params' => array('idaddress' => 2)),
	'DELETE:api/address/(:num)' => array('route' => 'Address.Delete', 'params' => array('idaddress' => 2)),
		
	// City
	'GET:cities' => array('route' => 'City.ListView'),
	'GET:city/(:num)' => array('route' => 'City.SingleView', 'params' => array('idcity' => 1)),
	'GET:api/cities' => array('route' => 'City.Query'),
	'POST:api/city' => array('route' => 'City.Create'),
	'GET:api/city/(:num)' => array('route' => 'City.Read', 'params' => array('idcity' => 2)),
	'PUT:api/city/(:num)' => array('route' => 'City.Update', 'params' => array('idcity' => 2)),
	'DELETE:api/city/(:num)' => array('route' => 'City.Delete', 'params' => array('idcity' => 2)),
		
	// Contact
	'GET:contacts' => array('route' => 'Contact.ListView'),
	'GET:contact/(:num)' => array('route' => 'Contact.SingleView', 'params' => array('idcontact' => 1)),
	'GET:api/contacts' => array('route' => 'Contact.Query'),
	'POST:api/contact' => array('route' => 'Contact.Create'),
	'GET:api/contact/(:num)' => array('route' => 'Contact.Read', 'params' => array('idcontact' => 2)),
	'PUT:api/contact/(:num)' => array('route' => 'Contact.Update', 'params' => array('idcontact' => 2)),
	'DELETE:api/contact/(:num)' => array('route' => 'Contact.Delete', 'params' => array('idcontact' => 2)),
		
	// Country
	'GET:countries' => array('route' => 'Country.ListView'),
	'GET:country/(:num)' => array('route' => 'Country.SingleView', 'params' => array('idcountry' => 1)),
	'GET:api/countries' => array('route' => 'Country.Query'),
	'POST:api/country' => array('route' => 'Country.Create'),
	'GET:api/country/(:num)' => array('route' => 'Country.Read', 'params' => array('idcountry' => 2)),
	'PUT:api/country/(:num)' => array('route' => 'Country.Update', 'params' => array('idcountry' => 2)),
	'DELETE:api/country/(:num)' => array('route' => 'Country.Delete', 'params' => array('idcountry' => 2)),
		
	// Creator
	'GET:creators' => array('route' => 'Creator.ListView'),
	'GET:creator/(:num)' => array('route' => 'Creator.SingleView', 'params' => array('idcreator' => 1)),
	'GET:api/creators' => array('route' => 'Creator.Query'),
	'POST:api/creator' => array('route' => 'Creator.Create'),
	'GET:api/creator/(:num)' => array('route' => 'Creator.Read', 'params' => array('idcreator' => 2)),
	'PUT:api/creator/(:num)' => array('route' => 'Creator.Update', 'params' => array('idcreator' => 2)),
	'DELETE:api/creator/(:num)' => array('route' => 'Creator.Delete', 'params' => array('idcreator' => 2)),
		
	// CreatorAwardHonour
	'GET:creatorawardhonours' => array('route' => 'CreatorAwardHonour.ListView'),
	'GET:creatorawardhonour/(:num)' => array('route' => 'CreatorAwardHonour.SingleView', 'params' => array('id' => 1)),
	'GET:api/creatorawardhonours' => array('route' => 'CreatorAwardHonour.Query'),
	'POST:api/creatorawardhonour' => array('route' => 'CreatorAwardHonour.Create'),
	'GET:api/creatorawardhonour/(:num)' => array('route' => 'CreatorAwardHonour.Read', 'params' => array('id' => 2)),
	'PUT:api/creatorawardhonour/(:num)' => array('route' => 'CreatorAwardHonour.Update', 'params' => array('id' => 2)),
	'DELETE:api/creatorawardhonour/(:num)' => array('route' => 'CreatorAwardHonour.Delete', 'params' => array('id' => 2)),
		
	// CreatorContact
	'GET:creatorcontacts' => array('route' => 'CreatorContact.ListView'),
	'GET:creatorcontact/(:num)' => array('route' => 'CreatorContact.SingleView', 'params' => array('id' => 1)),
	'GET:api/creatorcontacts' => array('route' => 'CreatorContact.Query'),
	'POST:api/creatorcontact' => array('route' => 'CreatorContact.Create'),
	'GET:api/creatorcontact/(:num)' => array('route' => 'CreatorContact.Read', 'params' => array('id' => 2)),
	'PUT:api/creatorcontact/(:num)' => array('route' => 'CreatorContact.Update', 'params' => array('id' => 2)),
	'DELETE:api/creatorcontact/(:num)' => array('route' => 'CreatorContact.Delete', 'params' => array('id' => 2)),
		
	// CreatorHistory
	'GET:creatorhistories' => array('route' => 'CreatorHistory.ListView'),
	'GET:creatorhistory/(:num)' => array('route' => 'CreatorHistory.SingleView', 'params' => array('id' => 1)),
	'GET:api/creatorhistories' => array('route' => 'CreatorHistory.Query'),
	'POST:api/creatorhistory' => array('route' => 'CreatorHistory.Create'),
	'GET:api/creatorhistory/(:num)' => array('route' => 'CreatorHistory.Read', 'params' => array('id' => 2)),
	'PUT:api/creatorhistory/(:num)' => array('route' => 'CreatorHistory.Update', 'params' => array('id' => 2)),
	'DELETE:api/creatorhistory/(:num)' => array('route' => 'CreatorHistory.Delete', 'params' => array('id' => 2)),
		
	// CreatorReference
	'GET:creatorreferences' => array('route' => 'CreatorReference.ListView'),
	'GET:creatorreference/(:num)' => array('route' => 'CreatorReference.SingleView', 'params' => array('id' => 1)),
	'GET:api/creatorreferences' => array('route' => 'CreatorReference.Query'),
	'POST:api/creatorreference' => array('route' => 'CreatorReference.Create'),
	'GET:api/creatorreference/(:num)' => array('route' => 'CreatorReference.Read', 'params' => array('id' => 2)),
	'PUT:api/creatorreference/(:num)' => array('route' => 'CreatorReference.Update', 'params' => array('id' => 2)),
	'DELETE:api/creatorreference/(:num)' => array('route' => 'CreatorReference.Delete', 'params' => array('id' => 2)),
		
	// Creatorname
	'GET:creatornames' => array('route' => 'Creatorname.ListView'),
	'GET:creatorname/(:num)' => array('route' => 'Creatorname.SingleView', 'params' => array('idcreatorname' => 1)),
	'GET:api/creatornames' => array('route' => 'Creatorname.Query'),
	'POST:api/creatorname' => array('route' => 'Creatorname.Create'),
	'GET:api/creatorname/(:num)' => array('route' => 'Creatorname.Read', 'params' => array('idcreatorname' => 2)),
	'PUT:api/creatorname/(:num)' => array('route' => 'Creatorname.Update', 'params' => array('idcreatorname' => 2)),
	'DELETE:api/creatorname/(:num)' => array('route' => 'Creatorname.Delete', 'params' => array('idcreatorname' => 2)),
		
	// Dimension
	'GET:dimensions' => array('route' => 'Dimension.ListView'),
	'GET:dimension/(:num)' => array('route' => 'Dimension.SingleView', 'params' => array('id' => 1)),
	'GET:api/dimensions' => array('route' => 'Dimension.Query'),
	'POST:api/dimension' => array('route' => 'Dimension.Create'),
	'GET:api/dimension/(:num)' => array('route' => 'Dimension.Read', 'params' => array('id' => 2)),
	'PUT:api/dimension/(:num)' => array('route' => 'Dimension.Update', 'params' => array('id' => 2)),
	'DELETE:api/dimension/(:num)' => array('route' => 'Dimension.Delete', 'params' => array('id' => 2)),
		
	// Documentation
	'GET:documentations' => array('route' => 'Documentation.ListView'),
	'GET:documentation/(:num)' => array('route' => 'Documentation.SingleView', 'params' => array('iddocumentation' => 1)),
	'GET:api/documentations' => array('route' => 'Documentation.Query'),
	'POST:api/documentation' => array('route' => 'Documentation.Create'),
	'GET:api/documentation/(:num)' => array('route' => 'Documentation.Read', 'params' => array('iddocumentation' => 2)),
	'PUT:api/documentation/(:num)' => array('route' => 'Documentation.Update', 'params' => array('iddocumentation' => 2)),
	'DELETE:api/documentation/(:num)' => array('route' => 'Documentation.Delete', 'params' => array('iddocumentation' => 2)),
		
	// DocumentationMedia
	'GET:documentationmedias' => array('route' => 'DocumentationMedia.ListView'),
	'GET:documentationmedia/(:num)' => array('route' => 'DocumentationMedia.SingleView', 'params' => array('id' => 1)),
	'GET:api/documentationmedias' => array('route' => 'DocumentationMedia.Query'),
	'POST:api/documentationmedia' => array('route' => 'DocumentationMedia.Create'),
	'GET:api/documentationmedia/(:num)' => array('route' => 'DocumentationMedia.Read', 'params' => array('id' => 2)),
	'PUT:api/documentationmedia/(:num)' => array('route' => 'DocumentationMedia.Update', 'params' => array('id' => 2)),
	'DELETE:api/documentationmedia/(:num)' => array('route' => 'DocumentationMedia.Delete', 'params' => array('id' => 2)),
		
	// Expoitem
	'GET:expoitems' => array('route' => 'Expoitem.ListView'),
	'GET:expoitem/(:num)' => array('route' => 'Expoitem.SingleView', 'params' => array('id' => 1)),
	'GET:api/expoitems' => array('route' => 'Expoitem.Query'),
	'POST:api/expoitem' => array('route' => 'Expoitem.Create'),
	'GET:api/expoitem/(:num)' => array('route' => 'Expoitem.Read', 'params' => array('id' => 2)),
	'PUT:api/expoitem/(:num)' => array('route' => 'Expoitem.Update', 'params' => array('id' => 2)),
	'DELETE:api/expoitem/(:num)' => array('route' => 'Expoitem.Delete', 'params' => array('id' => 2)),
		
	// Exposition
	'GET:expositions' => array('route' => 'Exposition.ListView'),
	'GET:exposition/(:num)' => array('route' => 'Exposition.SingleView', 'params' => array('idexposition' => 1)),
	'GET:api/expositions' => array('route' => 'Exposition.Query'),
	'POST:api/exposition' => array('route' => 'Exposition.Create'),
	'GET:api/exposition/(:num)' => array('route' => 'Exposition.Read', 'params' => array('idexposition' => 2)),
	'PUT:api/exposition/(:num)' => array('route' => 'Exposition.Update', 'params' => array('idexposition' => 2)),
	'DELETE:api/exposition/(:num)' => array('route' => 'Exposition.Delete', 'params' => array('idexposition' => 2)),
		
	// ExpositionCreator
	'GET:expositioncreators' => array('route' => 'ExpositionCreator.ListView'),
	'GET:expositioncreator/(:num)' => array('route' => 'ExpositionCreator.SingleView', 'params' => array('id' => 1)),
	'GET:api/expositioncreators' => array('route' => 'ExpositionCreator.Query'),
	'POST:api/expositioncreator' => array('route' => 'ExpositionCreator.Create'),
	'GET:api/expositioncreator/(:num)' => array('route' => 'ExpositionCreator.Read', 'params' => array('id' => 2)),
	'PUT:api/expositioncreator/(:num)' => array('route' => 'ExpositionCreator.Update', 'params' => array('id' => 2)),
	'DELETE:api/expositioncreator/(:num)' => array('route' => 'ExpositionCreator.Delete', 'params' => array('id' => 2)),
		
	// ExpositionDimension
	'GET:expositiondimensions' => array('route' => 'ExpositionDimension.ListView'),
	'GET:expositiondimension/(:num)' => array('route' => 'ExpositionDimension.SingleView', 'params' => array('id' => 1)),
	'GET:api/expositiondimensions' => array('route' => 'ExpositionDimension.Query'),
	'POST:api/expositiondimension' => array('route' => 'ExpositionDimension.Create'),
	'GET:api/expositiondimension/(:num)' => array('route' => 'ExpositionDimension.Read', 'params' => array('id' => 2)),
	'PUT:api/expositiondimension/(:num)' => array('route' => 'ExpositionDimension.Update', 'params' => array('id' => 2)),
	'DELETE:api/expositiondimension/(:num)' => array('route' => 'ExpositionDimension.Delete', 'params' => array('id' => 2)),
		
	// ExpositionHistory
	'GET:expositionhistories' => array('route' => 'ExpositionHistory.ListView'),
	'GET:expositionhistory/(:num)' => array('route' => 'ExpositionHistory.SingleView', 'params' => array('idhistory' => 1)),
	'GET:api/expositionhistories' => array('route' => 'ExpositionHistory.Query'),
	'POST:api/expositionhistory' => array('route' => 'ExpositionHistory.Create'),
	'GET:api/expositionhistory/(:num)' => array('route' => 'ExpositionHistory.Read', 'params' => array('idhistory' => 2)),
	'PUT:api/expositionhistory/(:num)' => array('route' => 'ExpositionHistory.Update', 'params' => array('idhistory' => 2)),
	'DELETE:api/expositionhistory/(:num)' => array('route' => 'ExpositionHistory.Delete', 'params' => array('idhistory' => 2)),
		
	// ExpositionPlacelocation
	'GET:expositionplacelocations' => array('route' => 'ExpositionPlacelocation.ListView'),
	'GET:expositionplacelocation/(:num)' => array('route' => 'ExpositionPlacelocation.SingleView', 'params' => array('id' => 1)),
	'GET:api/expositionplacelocations' => array('route' => 'ExpositionPlacelocation.Query'),
	'POST:api/expositionplacelocation' => array('route' => 'ExpositionPlacelocation.Create'),
	'GET:api/expositionplacelocation/(:num)' => array('route' => 'ExpositionPlacelocation.Read', 'params' => array('id' => 2)),
	'PUT:api/expositionplacelocation/(:num)' => array('route' => 'ExpositionPlacelocation.Update', 'params' => array('id' => 2)),
	'DELETE:api/expositionplacelocation/(:num)' => array('route' => 'ExpositionPlacelocation.Delete', 'params' => array('id' => 2)),
		
	// ExpositionReference
	'GET:expositionreferences' => array('route' => 'ExpositionReference.ListView'),
	'GET:expositionreference/(:num)' => array('route' => 'ExpositionReference.SingleView', 'params' => array('id' => 1)),
	'GET:api/expositionreferences' => array('route' => 'ExpositionReference.Query'),
	'POST:api/expositionreference' => array('route' => 'ExpositionReference.Create'),
	'GET:api/expositionreference/(:num)' => array('route' => 'ExpositionReference.Read', 'params' => array('id' => 2)),
	'PUT:api/expositionreference/(:num)' => array('route' => 'ExpositionReference.Update', 'params' => array('id' => 2)),
	'DELETE:api/expositionreference/(:num)' => array('route' => 'ExpositionReference.Delete', 'params' => array('id' => 2)),
		
	// Fond
	'GET:fonds' => array('route' => 'Fond.ListView'),
	'GET:fond/(:num)' => array('route' => 'Fond.SingleView', 'params' => array('idfond' => 1)),
	'GET:api/fonds' => array('route' => 'Fond.Query'),
	'POST:api/fond' => array('route' => 'Fond.Create'),
	'GET:api/fond/(:num)' => array('route' => 'Fond.Read', 'params' => array('idfond' => 2)),
	'PUT:api/fond/(:num)' => array('route' => 'Fond.Update', 'params' => array('idfond' => 2)),
	'DELETE:api/fond/(:num)' => array('route' => 'Fond.Delete', 'params' => array('idfond' => 2)),
		
	// FondLevel
	'GET:fondlevels' => array('route' => 'FondLevel.ListView'),
	'GET:fondlevel/(:num)' => array('route' => 'FondLevel.SingleView', 'params' => array('idfondlevel' => 1)),
	'GET:api/fondlevels' => array('route' => 'FondLevel.Query'),
	'POST:api/fondlevel' => array('route' => 'FondLevel.Create'),
	'GET:api/fondlevel/(:num)' => array('route' => 'FondLevel.Read', 'params' => array('idfondlevel' => 2)),
	'PUT:api/fondlevel/(:num)' => array('route' => 'FondLevel.Update', 'params' => array('idfondlevel' => 2)),
	'DELETE:api/fondlevel/(:num)' => array('route' => 'FondLevel.Delete', 'params' => array('idfondlevel' => 2)),
		
	// History
	'GET:histories' => array('route' => 'History.ListView'),
	'GET:history/(:num)' => array('route' => 'History.SingleView', 'params' => array('id' => 1)),
	'GET:api/histories' => array('route' => 'History.Query'),
	'POST:api/history' => array('route' => 'History.Create'),
	'GET:api/history/(:num)' => array('route' => 'History.Read', 'params' => array('id' => 2)),
	'PUT:api/history/(:num)' => array('route' => 'History.Update', 'params' => array('id' => 2)),
	'DELETE:api/history/(:num)' => array('route' => 'History.Delete', 'params' => array('id' => 2)),
		
	// HistoryMedia
	'GET:historymedias' => array('route' => 'HistoryMedia.ListView'),
	'GET:historymedia/(:num)' => array('route' => 'HistoryMedia.SingleView', 'params' => array('id' => 1)),
	'GET:api/historymedias' => array('route' => 'HistoryMedia.Query'),
	'POST:api/historymedia' => array('route' => 'HistoryMedia.Create'),
	'GET:api/historymedia/(:num)' => array('route' => 'HistoryMedia.Read', 'params' => array('id' => 2)),
	'PUT:api/historymedia/(:num)' => array('route' => 'HistoryMedia.Update', 'params' => array('id' => 2)),
	'DELETE:api/historymedia/(:num)' => array('route' => 'HistoryMedia.Delete', 'params' => array('id' => 2)),
		
	// Holder
	'GET:holders' => array('route' => 'Holder.ListView'),
	'GET:holder/(:num)' => array('route' => 'Holder.SingleView', 'params' => array('idholder' => 1)),
	'GET:api/holders' => array('route' => 'Holder.Query'),
	'POST:api/holder' => array('route' => 'Holder.Create'),
	'GET:api/holder/(:num)' => array('route' => 'Holder.Read', 'params' => array('idholder' => 2)),
	'PUT:api/holder/(:num)' => array('route' => 'Holder.Update', 'params' => array('idholder' => 2)),
	'DELETE:api/holder/(:num)' => array('route' => 'Holder.Delete', 'params' => array('idholder' => 2)),
		
	// Infobjectfond
	'GET:infobjectfonds' => array('route' => 'Infobjectfond.ListView'),
	'GET:infobjectfond/(:num)' => array('route' => 'Infobjectfond.SingleView', 'params' => array('id' => 1)),
	'GET:api/infobjectfonds' => array('route' => 'Infobjectfond.Query'),
	'POST:api/infobjectfond' => array('route' => 'Infobjectfond.Create'),
	'GET:api/infobjectfond/(:num)' => array('route' => 'Infobjectfond.Read', 'params' => array('id' => 2)),
	'PUT:api/infobjectfond/(:num)' => array('route' => 'Infobjectfond.Update', 'params' => array('id' => 2)),
	'DELETE:api/infobjectfond/(:num)' => array('route' => 'Infobjectfond.Delete', 'params' => array('id' => 2)),
		
	// Institution
	'GET:institutions' => array('route' => 'Institution.ListView'),
	'GET:institution/(:num)' => array('route' => 'Institution.SingleView', 'params' => array('idinstitution' => 1)),
	'GET:api/institutions' => array('route' => 'Institution.Query'),
	'POST:api/institution' => array('route' => 'Institution.Create'),
	'GET:api/institution/(:num)' => array('route' => 'Institution.Read', 'params' => array('idinstitution' => 2)),
	'PUT:api/institution/(:num)' => array('route' => 'Institution.Update', 'params' => array('idinstitution' => 2)),
	'DELETE:api/institution/(:num)' => array('route' => 'Institution.Delete', 'params' => array('idinstitution' => 2)),
		
	// InstitutionMedia
	'GET:institutionmedias' => array('route' => 'InstitutionMedia.ListView'),
	'GET:institutionmedia/(:num)' => array('route' => 'InstitutionMedia.SingleView', 'params' => array('id' => 1)),
	'GET:api/institutionmedias' => array('route' => 'InstitutionMedia.Query'),
	'POST:api/institutionmedia' => array('route' => 'InstitutionMedia.Create'),
	'GET:api/institutionmedia/(:num)' => array('route' => 'InstitutionMedia.Read', 'params' => array('id' => 2)),
	'PUT:api/institutionmedia/(:num)' => array('route' => 'InstitutionMedia.Update', 'params' => array('id' => 2)),
	'DELETE:api/institutionmedia/(:num)' => array('route' => 'InstitutionMedia.Delete', 'params' => array('id' => 2)),
		
	// Item
	'GET:items' => array('route' => 'Item.ListView'),
	'GET:item/(:num)' => array('route' => 'Item.SingleView', 'params' => array('iditem' => 1)),
	'GET:api/items' => array('route' => 'Item.Query'),
	'POST:api/item' => array('route' => 'Item.Create'),
	'GET:api/item/(:num)' => array('route' => 'Item.Read', 'params' => array('iditem' => 2)),
	'PUT:api/item/(:num)' => array('route' => 'Item.Update', 'params' => array('iditem' => 2)),
	'DELETE:api/item/(:num)' => array('route' => 'Item.Delete', 'params' => array('iditem' => 2)),
		
	// ItemMedia
	'GET:itemmedias' => array('route' => 'ItemMedia.ListView'),
	'GET:itemmedia/(:num)' => array('route' => 'ItemMedia.SingleView', 'params' => array('id' => 1)),
	'GET:api/itemmedias' => array('route' => 'ItemMedia.Query'),
	'POST:api/itemmedia' => array('route' => 'ItemMedia.Create'),
	'GET:api/itemmedia/(:num)' => array('route' => 'ItemMedia.Read', 'params' => array('id' => 2)),
	'PUT:api/itemmedia/(:num)' => array('route' => 'ItemMedia.Update', 'params' => array('id' => 2)),
	'DELETE:api/itemmedia/(:num)' => array('route' => 'ItemMedia.Delete', 'params' => array('id' => 2)),
		
	// Itemcreator
	'GET:itemcreators' => array('route' => 'Itemcreator.ListView'),
	'GET:itemcreator/(:num)' => array('route' => 'Itemcreator.SingleView', 'params' => array('iditemcreator' => 1)),
	'GET:api/itemcreators' => array('route' => 'Itemcreator.Query'),
	'POST:api/itemcreator' => array('route' => 'Itemcreator.Create'),
	'GET:api/itemcreator/(:num)' => array('route' => 'Itemcreator.Read', 'params' => array('iditemcreator' => 2)),
	'PUT:api/itemcreator/(:num)' => array('route' => 'Itemcreator.Update', 'params' => array('iditemcreator' => 2)),
	'DELETE:api/itemcreator/(:num)' => array('route' => 'Itemcreator.Delete', 'params' => array('iditemcreator' => 2)),
		
	// Itemdescription
	'GET:itemdescriptions' => array('route' => 'Itemdescription.ListView'),
	'GET:itemdescription/(:num)' => array('route' => 'Itemdescription.SingleView', 'params' => array('id' => 1)),
	'GET:api/itemdescriptions' => array('route' => 'Itemdescription.Query'),
	'POST:api/itemdescription' => array('route' => 'Itemdescription.Create'),
	'GET:api/itemdescription/(:num)' => array('route' => 'Itemdescription.Read', 'params' => array('id' => 2)),
	'PUT:api/itemdescription/(:num)' => array('route' => 'Itemdescription.Update', 'params' => array('id' => 2)),
	'DELETE:api/itemdescription/(:num)' => array('route' => 'Itemdescription.Delete', 'params' => array('id' => 2)),
		
	// Itemdimension
	'GET:itemdimensions' => array('route' => 'Itemdimension.ListView'),
	'GET:itemdimension/(:num)' => array('route' => 'Itemdimension.SingleView', 'params' => array('id' => 1)),
	'GET:api/itemdimensions' => array('route' => 'Itemdimension.Query'),
	'POST:api/itemdimension' => array('route' => 'Itemdimension.Create'),
	'GET:api/itemdimension/(:num)' => array('route' => 'Itemdimension.Read', 'params' => array('id' => 2)),
	'PUT:api/itemdimension/(:num)' => array('route' => 'Itemdimension.Update', 'params' => array('id' => 2)),
	'DELETE:api/itemdimension/(:num)' => array('route' => 'Itemdimension.Delete', 'params' => array('id' => 2)),
		
	// Iteminscription
	'GET:iteminscriptions' => array('route' => 'Iteminscription.ListView'),
	'GET:iteminscription/(:num)' => array('route' => 'Iteminscription.SingleView', 'params' => array('d' => 1)),
	'GET:api/iteminscriptions' => array('route' => 'Iteminscription.Query'),
	'POST:api/iteminscription' => array('route' => 'Iteminscription.Create'),
	'GET:api/iteminscription/(:num)' => array('route' => 'Iteminscription.Read', 'params' => array('d' => 2)),
	'PUT:api/iteminscription/(:num)' => array('route' => 'Iteminscription.Update', 'params' => array('d' => 2)),
	'DELETE:api/iteminscription/(:num)' => array('route' => 'Iteminscription.Delete', 'params' => array('d' => 2)),
		
	// Level
	'GET:levels' => array('route' => 'Level.ListView'),
	'GET:level/(:num)' => array('route' => 'Level.SingleView', 'params' => array('idlevel' => 1)),
	'GET:api/levels' => array('route' => 'Level.Query'),
	'POST:api/level' => array('route' => 'Level.Create'),
	'GET:api/level/(:num)' => array('route' => 'Level.Read', 'params' => array('idlevel' => 2)),
	'PUT:api/level/(:num)' => array('route' => 'Level.Update', 'params' => array('idlevel' => 2)),
	'DELETE:api/level/(:num)' => array('route' => 'Level.Delete', 'params' => array('idlevel' => 2)),
		
	// Media
	'GET:medias' => array('route' => 'Media.ListView'),
	'GET:media/(:num)' => array('route' => 'Media.SingleView', 'params' => array('idmedia' => 1)),
	'GET:api/medias' => array('route' => 'Media.Query'),
	'POST:api/media' => array('route' => 'Media.Create'),
	'GET:api/media/(:num)' => array('route' => 'Media.Read', 'params' => array('idmedia' => 2)),
	'PUT:api/media/(:num)' => array('route' => 'Media.Update', 'params' => array('idmedia' => 2)),
	'DELETE:api/media/(:num)' => array('route' => 'Media.Delete', 'params' => array('idmedia' => 2)),
		
	// Ncontact
	'GET:ncontacts' => array('route' => 'Ncontact.ListView'),
	'GET:ncontact/(:num)' => array('route' => 'Ncontact.SingleView', 'params' => array('id' => 1)),
	'GET:api/ncontacts' => array('route' => 'Ncontact.Query'),
	'POST:api/ncontact' => array('route' => 'Ncontact.Create'),
	'GET:api/ncontact/(:num)' => array('route' => 'Ncontact.Read', 'params' => array('id' => 2)),
	'PUT:api/ncontact/(:num)' => array('route' => 'Ncontact.Update', 'params' => array('id' => 2)),
	'DELETE:api/ncontact/(:num)' => array('route' => 'Ncontact.Delete', 'params' => array('id' => 2)),
		
	// Nhistory
	'GET:nhistories' => array('route' => 'Nhistory.ListView'),
	'GET:nhistory/(:num)' => array('route' => 'Nhistory.SingleView', 'params' => array('idhistory' => 1)),
	'GET:api/nhistories' => array('route' => 'Nhistory.Query'),
	'POST:api/nhistory' => array('route' => 'Nhistory.Create'),
	'GET:api/nhistory/(:num)' => array('route' => 'Nhistory.Read', 'params' => array('idhistory' => 2)),
	'PUT:api/nhistory/(:num)' => array('route' => 'Nhistory.Update', 'params' => array('idhistory' => 2)),
	'DELETE:api/nhistory/(:num)' => array('route' => 'Nhistory.Delete', 'params' => array('idhistory' => 2)),
		
	// Nreference
	'GET:nreferences' => array('route' => 'Nreference.ListView'),
	'GET:nreference/(:num)' => array('route' => 'Nreference.SingleView', 'params' => array('id' => 1)),
	'GET:api/nreferences' => array('route' => 'Nreference.Query'),
	'POST:api/nreference' => array('route' => 'Nreference.Create'),
	'GET:api/nreference/(:num)' => array('route' => 'Nreference.Read', 'params' => array('id' => 2)),
	'PUT:api/nreference/(:num)' => array('route' => 'Nreference.Update', 'params' => array('id' => 2)),
	'DELETE:api/nreference/(:num)' => array('route' => 'Nreference.Delete', 'params' => array('id' => 2)),
		
	// Physicaldescription
	'GET:physicaldescriptions' => array('route' => 'Physicaldescription.ListView'),
	'GET:physicaldescription/(:num)' => array('route' => 'Physicaldescription.SingleView', 'params' => array('id' => 1)),
	'GET:api/physicaldescriptions' => array('route' => 'Physicaldescription.Query'),
	'POST:api/physicaldescription' => array('route' => 'Physicaldescription.Create'),
	'GET:api/physicaldescription/(:num)' => array('route' => 'Physicaldescription.Read', 'params' => array('id' => 2)),
	'PUT:api/physicaldescription/(:num)' => array('route' => 'Physicaldescription.Update', 'params' => array('id' => 2)),
	'DELETE:api/physicaldescription/(:num)' => array('route' => 'Physicaldescription.Delete', 'params' => array('id' => 2)),
		
	// PlaceLocation
	'GET:placelocations' => array('route' => 'PlaceLocation.ListView'),
	'GET:placelocation/(:num)' => array('route' => 'PlaceLocation.SingleView', 'params' => array('id' => 1)),
	'GET:api/placelocations' => array('route' => 'PlaceLocation.Query'),
	'POST:api/placelocation' => array('route' => 'PlaceLocation.Create'),
	'GET:api/placelocation/(:num)' => array('route' => 'PlaceLocation.Read', 'params' => array('id' => 2)),
	'PUT:api/placelocation/(:num)' => array('route' => 'PlaceLocation.Update', 'params' => array('id' => 2)),
	'DELETE:api/placelocation/(:num)' => array('route' => 'PlaceLocation.Delete', 'params' => array('id' => 2)),
		
	// Reference
	'GET:references' => array('route' => 'Reference.ListView'),
	'GET:reference/(:num)' => array('route' => 'Reference.SingleView', 'params' => array('idreference' => 1)),
	'GET:api/references' => array('route' => 'Reference.Query'),
	'POST:api/reference' => array('route' => 'Reference.Create'),
	'GET:api/reference/(:num)' => array('route' => 'Reference.Read', 'params' => array('idreference' => 2)),
	'PUT:api/reference/(:num)' => array('route' => 'Reference.Update', 'params' => array('idreference' => 2)),
	'DELETE:api/reference/(:num)' => array('route' => 'Reference.Delete', 'params' => array('idreference' => 2)),
		
	// ReferenceMedia
	'GET:referencemedias' => array('route' => 'ReferenceMedia.ListView'),
	'GET:referencemedia/(:num)' => array('route' => 'ReferenceMedia.SingleView', 'params' => array('idRefMedia' => 1)),
	'GET:api/referencemedias' => array('route' => 'ReferenceMedia.Query'),
	'POST:api/referencemedia' => array('route' => 'ReferenceMedia.Create'),
	'GET:api/referencemedia/(:num)' => array('route' => 'ReferenceMedia.Read', 'params' => array('idRefMedia' => 2)),
	'PUT:api/referencemedia/(:num)' => array('route' => 'ReferenceMedia.Update', 'params' => array('idRefMedia' => 2)),
	'DELETE:api/referencemedia/(:num)' => array('route' => 'ReferenceMedia.Delete', 'params' => array('idRefMedia' => 2)),
		
	// Role
	'GET:roles' => array('route' => 'Role.ListView'),
	'GET:role/(:num)' => array('route' => 'Role.SingleView', 'params' => array('idrole' => 1)),
	'GET:api/roles' => array('route' => 'Role.Query'),
	'POST:api/role' => array('route' => 'Role.Create'),
	'GET:api/role/(:num)' => array('route' => 'Role.Read', 'params' => array('idrole' => 2)),
	'PUT:api/role/(:num)' => array('route' => 'Role.Update', 'params' => array('idrole' => 2)),
	'DELETE:api/role/(:num)' => array('route' => 'Role.Delete', 'params' => array('idrole' => 2)),
		
	// Search
	'GET:searches' => array('route' => 'Search.ListView'),
	'GET:search/(:num)' => array('route' => 'Search.SingleView', 'params' => array('idsearch' => 1)),
	'GET:api/searches' => array('route' => 'Search.Query'),
	'POST:api/search' => array('route' => 'Search.Create'),
	'GET:api/search/(:num)' => array('route' => 'Search.Read', 'params' => array('idsearch' => 2)),
	'PUT:api/search/(:num)' => array('route' => 'Search.Update', 'params' => array('idsearch' => 2)),
	'DELETE:api/search/(:num)' => array('route' => 'Search.Delete', 'params' => array('idsearch' => 2)),
		
	// State
	'GET:states' => array('route' => 'State.ListView'),
	'GET:state/(:num)' => array('route' => 'State.SingleView', 'params' => array('idstate' => 1)),
	'GET:api/states' => array('route' => 'State.Query'),
	'POST:api/state' => array('route' => 'State.Create'),
	'GET:api/state/(:num)' => array('route' => 'State.Read', 'params' => array('idstate' => 2)),
	'PUT:api/state/(:num)' => array('route' => 'State.Update', 'params' => array('idstate' => 2)),
	'DELETE:api/state/(:num)' => array('route' => 'State.Delete', 'params' => array('idstate' => 2)),
		
	// Storage
	'GET:storages' => array('route' => 'Storage.ListView'),
	'GET:storage/(:num)' => array('route' => 'Storage.SingleView', 'params' => array('idstorage' => 1)),
	'GET:api/storages' => array('route' => 'Storage.Query'),
	'POST:api/storage' => array('route' => 'Storage.Create'),
	'GET:api/storage/(:num)' => array('route' => 'Storage.Read', 'params' => array('idstorage' => 2)),
	'PUT:api/storage/(:num)' => array('route' => 'Storage.Update', 'params' => array('idstorage' => 2)),
	'DELETE:api/storage/(:num)' => array('route' => 'Storage.Delete', 'params' => array('idstorage' => 2)),
		
	// StorageMedia
	'GET:storagemedias' => array('route' => 'StorageMedia.ListView'),
	'GET:storagemedia/(:num)' => array('route' => 'StorageMedia.SingleView', 'params' => array('id' => 1)),
	'GET:api/storagemedias' => array('route' => 'StorageMedia.Query'),
	'POST:api/storagemedia' => array('route' => 'StorageMedia.Create'),
	'GET:api/storagemedia/(:num)' => array('route' => 'StorageMedia.Read', 'params' => array('id' => 2)),
	'PUT:api/storagemedia/(:num)' => array('route' => 'StorageMedia.Update', 'params' => array('id' => 2)),
	'DELETE:api/storagemedia/(:num)' => array('route' => 'StorageMedia.Delete', 'params' => array('id' => 2)),
		
	// Timezones
	'GET:timezoneses' => array('route' => 'Timezones.ListView'),
	'GET:timezones/(:num)' => array('route' => 'Timezones.SingleView', 'params' => array('idtimezone' => 1)),
	'GET:api/timezoneses' => array('route' => 'Timezones.Query'),
	'POST:api/timezones' => array('route' => 'Timezones.Create'),
	'GET:api/timezones/(:num)' => array('route' => 'Timezones.Read', 'params' => array('idtimezone' => 2)),
	'PUT:api/timezones/(:num)' => array('route' => 'Timezones.Update', 'params' => array('idtimezone' => 2)),
	'DELETE:api/timezones/(:num)' => array('route' => 'Timezones.Delete', 'params' => array('idtimezone' => 2)),
		
	// Title
	'GET:titles' => array('route' => 'Title.ListView'),
	'GET:title/(:num)' => array('route' => 'Title.SingleView', 'params' => array('idtitle' => 1)),
	'GET:api/titles' => array('route' => 'Title.Query'),
	'POST:api/title' => array('route' => 'Title.Create'),
	'GET:api/title/(:num)' => array('route' => 'Title.Read', 'params' => array('idtitle' => 2)),
	'PUT:api/title/(:num)' => array('route' => 'Title.Update', 'params' => array('idtitle' => 2)),
	'DELETE:api/title/(:num)' => array('route' => 'Title.Delete', 'params' => array('idtitle' => 2)),
		
	// Transcription
	'GET:transcriptions' => array('route' => 'Transcription.ListView'),
	'GET:transcription/(:num)' => array('route' => 'Transcription.SingleView', 'params' => array('idtranscription' => 1)),
	'GET:api/transcriptions' => array('route' => 'Transcription.Query'),
	'POST:api/transcription' => array('route' => 'Transcription.Create'),
	'GET:api/transcription/(:num)' => array('route' => 'Transcription.Read', 'params' => array('idtranscription' => 2)),
	'PUT:api/transcription/(:num)' => array('route' => 'Transcription.Update', 'params' => array('idtranscription' => 2)),
	'DELETE:api/transcription/(:num)' => array('route' => 'Transcription.Delete', 'params' => array('idtranscription' => 2)),
		
	// User
	'GET:users' => array('route' => 'User.ListView'),
	'GET:user/(:num)' => array('route' => 'User.SingleView', 'params' => array('iduser' => 1)),
	'GET:api/users' => array('route' => 'User.Query'),
	'POST:api/user' => array('route' => 'User.Create'),
	'GET:api/user/(:num)' => array('route' => 'User.Read', 'params' => array('iduser' => 2)),
	'PUT:api/user/(:num)' => array('route' => 'User.Update', 'params' => array('iduser' => 2)),
	'DELETE:api/user/(:num)' => array('route' => 'User.Delete', 'params' => array('iduser' => 2)),
		
	// Userrole
	'GET:userroles' => array('route' => 'Userrole.ListView'),
	'GET:userrole/(:num)' => array('route' => 'Userrole.SingleView', 'params' => array('iduserrole' => 1)),
	'GET:api/userroles' => array('route' => 'Userrole.Query'),
	'POST:api/userrole' => array('route' => 'Userrole.Create'),
	'GET:api/userrole/(:num)' => array('route' => 'Userrole.Read', 'params' => array('iduserrole' => 2)),
	'PUT:api/userrole/(:num)' => array('route' => 'Userrole.Update', 'params' => array('iduserrole' => 2)),
	'DELETE:api/userrole/(:num)' => array('route' => 'Userrole.Delete', 'params' => array('iduserrole' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Address","fk_address_contact1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Address","fk_adress_city",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("City","fk_city_institution1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("City","fk_city_state1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Contact","fk_contact_creator1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Contact","fk_contact_institution1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Contact","fk_contact_user",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Creator","fk_creator_institution1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("CreatorContact","fk_creatorcontact_creator",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("CreatorContact","fk_creatorcontact_contact",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("CreatorHistory","FK_kv28ykd90gnj9a3ika7vvbsib",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("CreatorHistory","fk_creatorhistory",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("CreatorReference","FK_ly7e216u77lqiatnysrm1um6",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("CreatorReference","FK_r7ovmckudaqk0px6wtotfyy8c",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Creatorname","fk_creatorname_creator",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Documentation","fk_document_item1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Documentation","fk_documentation_institution1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("DocumentationMedia","FK_documentationmedia_media",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("DocumentationMedia","FK_documentationmedia_documentation",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Expoitem","fk_expoitem_exposition",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Expoitem","fk_expoitem_item",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Exposition","fk_exposition_institution1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("ExpositionCreator","FK_kwh7ariugb0qjrwhpo3rai1uy",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("ExpositionCreator","FK_rqs393faxa7qvmarkbh38rhay",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("ExpositionDimension","FK_69we0kulo49s1sr97htshsxtw",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("ExpositionDimension","FK_ai09pidrxa780uxmakwlex92c",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("ExpositionHistory","FK_g6g5n45iyajyahsp1dfaeff4b",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("ExpositionHistory","FK_sfxtpv6nypctjcamcjgov1etg",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("ExpositionPlacelocation","FK_anby2ek1hm7l0n2v7s11ajdmj",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("ExpositionPlacelocation","FK_eidy94mayop8hv1jwy5rjt3p7",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("ExpositionPlacelocation","FK_k75vo2tl0yd87up64gkti5kpf",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("ExpositionReference","FK_1v8ywvb944diagioy8oulgjfi",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("ExpositionReference","FK_bn9yeqjkv398d64fdibt6jbys",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Fond","fk_fond_institution1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("FondLevel","fk_fondlevel_level",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("FondLevel","fk_fondlevel_fond",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("History","fk_history_creator",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("History","fk_history_institution1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("History","fk_history_item1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("HistoryMedia","fk_historymedia_media",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("HistoryMedia","fk_historymedia_history",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Holder","fk_holder_institution1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Infobjectfond","FK_fironk10lq67q4j0a3oue8ldg",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Infobjectfond","FK_k77kiqsk4fg0wh48h5adn2x67",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("InstitutionMedia","fk_institutionmedia_media",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("InstitutionMedia","fk_institutionmedia_institution",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Item","fk_item_holder1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Item","fk_item_level",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Item","fk_item_institution1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("ItemMedia","fk_itemmedia_item",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("ItemMedia","fk_itemmedia_media",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Itemcreator","fk_document_has_creator_creator1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Itemcreator","fk_itemcreator_item",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Itemdescription","fk_itemdescription_item",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Itemdimension","fk_item_dimension",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Iteminscription","fk_item_inscription",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Level","fk_serie_fond1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Level","fk_serie_institution1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Media","fk_media_institution1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Ncontact","FK_q27ejta8y2arisfx6k2v8y01v",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Nhistory","FK_19r8lwpjqv2j4hcqpjkwb1nsc",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Nreference","FK_360fxrl1q9vf3b3yu70b0lxl1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Physicaldescription","fk_item_physical",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("PlaceLocation","fk_placelocation_institution",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("PlaceLocation","fk_placelocation_country",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("PlaceLocation","fk_placelocation_state",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("PlaceLocation","fk_placelocation_city",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Reference","fk_reference_creator",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Reference","fk_reference_item1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Reference","fk_reference_institution",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("ReferenceMedia","fk_refmedia_ref",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("ReferenceMedia","fk_refmedia_media",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Role","fk_role_institution1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Search","fk_search_user1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("State","fk_state_country1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("StorageMedia","FK_hrmsbocvkwn14rnyh8qj55dfc",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("StorageMedia","FK_nmymba781jas5ih7fojmm9435",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Title","fk_title_institution1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Title","fk_title_item1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Transcription","fk_transcription_item1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Transcription","fk_transcription_media1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("User","fk_user_institution1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("User","fk_user_timezone",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Userrole","fk_user_has_role_role1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Userrole","fk_user_has_role_user1",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
?>