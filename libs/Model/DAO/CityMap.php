<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * CityMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the CityDAO to the city datastore.
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
class CityMap implements IDaoMap, IDaoMap2
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
			self::$FM["Idcity"] = new FieldMap("Idcity","city","idcity",true,FM_TYPE_INT,11,null,true);
			self::$FM["State"] = new FieldMap("State","city","state",false,FM_TYPE_INT,11,null,false);
			self::$FM["Institution"] = new FieldMap("Institution","city","institution",false,FM_TYPE_INT,11,null,false);
			self::$FM["Citypublic"] = new FieldMap("Citypublic","city","citypublic",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["City"] = new FieldMap("City","city","city",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Citycode"] = new FieldMap("Citycode","city","citycode",false,FM_TYPE_VARCHAR,45,null,false);
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
			self::$KM["fk_adress_city"] = new KeyMap("fk_adress_city", "Idcity", "Address", "City", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_placelocation_city"] = new KeyMap("fk_placelocation_city", "Idcity", "PlaceLocation", "City", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_city_institution1"] = new KeyMap("fk_city_institution1", "Institution", "Institution", "Idinstitution", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_city_state1"] = new KeyMap("fk_city_state1", "State", "State", "Idstate", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>