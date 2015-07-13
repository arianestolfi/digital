<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * SearchMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the SearchDAO to the search datastore.
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
class SearchMap implements IDaoMap, IDaoMap2
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
			self::$FM["Idsearch"] = new FieldMap("Idsearch","search","idsearch",true,FM_TYPE_INT,11,null,true);
			self::$FM["User"] = new FieldMap("User","search","user",false,FM_TYPE_INT,11,null,false);
			self::$FM["Name"] = new FieldMap("Name","search","name",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Info"] = new FieldMap("Info","search","info",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Type"] = new FieldMap("Type","search","type",false,FM_TYPE_INT,11,null,false);
			self::$FM["Datecreate"] = new FieldMap("Datecreate","search","datecreate",false,FM_TYPE_DATETIME,null,null,false);
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
			self::$KM["fk_search_user1"] = new KeyMap("fk_search_user1", "User", "User", "Iduser", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>