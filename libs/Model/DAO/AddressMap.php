<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * AddressMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the AddressDAO to the address datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Digital::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class AddressMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["Idaddress"] = new FieldMap("Idaddress","address","idaddress",true,FM_TYPE_BIGINT,20,null,true);
			self::$FM["City"] = new FieldMap("City","address","city",false,FM_TYPE_INT,11,null,false);
			self::$FM["Contact"] = new FieldMap("Contact","address","contact",false,FM_TYPE_INT,11,null,false);
			self::$FM["Street"] = new FieldMap("Street","address","street",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Number"] = new FieldMap("Number","address","number",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Complement"] = new FieldMap("Complement","address","complement",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Zipcode"] = new FieldMap("Zipcode","address","zipcode",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Otherinformation"] = new FieldMap("Otherinformation","address","otherinformation",false,FM_TYPE_VARCHAR,255,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
			self::$KM["fk_address_contact1"] = new KeyMap("fk_address_contact1", "Contact", "Contact", "Idcontact", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_adress_city"] = new KeyMap("fk_adress_city", "City", "City", "Idcity", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>