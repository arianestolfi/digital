<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * PlaceLocationMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PlaceLocationDAO to the place_location datastore.
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
class PlaceLocationMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","place_location","id",true,FM_TYPE_BIGINT,20,null,true);
			self::$FM["Complement"] = new FieldMap("Complement","place_location","complement",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Latituded"] = new FieldMap("Latituded","place_location","latituded",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Local"] = new FieldMap("Local","place_location","local",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Longitude"] = new FieldMap("Longitude","place_location","longitude",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Number"] = new FieldMap("Number","place_location","number",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Otherinformation"] = new FieldMap("Otherinformation","place_location","otherinformation",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Street"] = new FieldMap("Street","place_location","street",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Type"] = new FieldMap("Type","place_location","type",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Zipcode"] = new FieldMap("Zipcode","place_location","zipcode",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["City"] = new FieldMap("City","place_location","city",false,FM_TYPE_INT,11,null,false);
			self::$FM["Country"] = new FieldMap("Country","place_location","country",false,FM_TYPE_INT,11,null,false);
			self::$FM["Institution"] = new FieldMap("Institution","place_location","institution",false,FM_TYPE_INT,11,null,false);
			self::$FM["State"] = new FieldMap("State","place_location","state",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["FK_k75vo2tl0yd87up64gkti5kpf"] = new KeyMap("FK_k75vo2tl0yd87up64gkti5kpf", "Id", "ExpositionPlacelocation", "Placelocation", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_placelocation_institution"] = new KeyMap("fk_placelocation_institution", "Institution", "Institution", "Idinstitution", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_placelocation_country"] = new KeyMap("fk_placelocation_country", "Country", "Country", "Idcountry", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_placelocation_state"] = new KeyMap("fk_placelocation_state", "State", "State", "Idstate", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_placelocation_city"] = new KeyMap("fk_placelocation_city", "City", "City", "Idcity", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>