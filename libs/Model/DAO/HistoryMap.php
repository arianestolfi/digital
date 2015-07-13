<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * HistoryMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the HistoryDAO to the history datastore.
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
class HistoryMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","history","id",true,FM_TYPE_BIGINT,20,null,true);
			self::$FM["Type"] = new FieldMap("Type","history","type",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Description"] = new FieldMap("Description","history","description",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Date"] = new FieldMap("Date","history","date",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Actor"] = new FieldMap("Actor","history","actor",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Item"] = new FieldMap("Item","history","item",false,FM_TYPE_BIGINT,20,null,false);
			self::$FM["Institution"] = new FieldMap("Institution","history","institution",false,FM_TYPE_INT,11,null,false);
			self::$FM["Idexposition"] = new FieldMap("Idexposition","history","idexposition",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Cost"] = new FieldMap("Cost","history","cost",false,FM_TYPE_DECIMAL,12.2,null,false);
			self::$FM["Creator"] = new FieldMap("Creator","history","creator",false,FM_TYPE_INT,11,null,false);
			self::$FM["Ispublic"] = new FieldMap("Ispublic","history","isPublic",false,FM_TYPE_UNKNOWN,1,null,false);
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
			self::$KM["fk_historymedia_history"] = new KeyMap("fk_historymedia_history", "Id", "HistoryMedia", "HistoryIdhistory", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_history_creator"] = new KeyMap("fk_history_creator", "Creator", "Creator", "Idcreator", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_history_institution1"] = new KeyMap("fk_history_institution1", "Institution", "Institution", "Idinstitution", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_history_item1"] = new KeyMap("fk_history_item1", "Item", "Item", "Iditem", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>