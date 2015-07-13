<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * TitleMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the TitleDAO to the title datastore.
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
class TitleMap implements IDaoMap, IDaoMap2
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
			self::$FM["Idtitle"] = new FieldMap("Idtitle","title","idtitle",true,FM_TYPE_INT,11,null,true);
			self::$FM["Name"] = new FieldMap("Name","title","name",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Value"] = new FieldMap("Value","title","value",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Item"] = new FieldMap("Item","title","item",false,FM_TYPE_BIGINT,20,null,false);
			self::$FM["Institution"] = new FieldMap("Institution","title","institution",false,FM_TYPE_INT,11,null,false);
			self::$FM["Defaulttitle"] = new FieldMap("Defaulttitle","title","defaulttitle",false,FM_TYPE_UNKNOWN,1,null,false);
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
			self::$KM["fk_title_institution1"] = new KeyMap("fk_title_institution1", "Institution", "Institution", "Idinstitution", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_title_item1"] = new KeyMap("fk_title_item1", "Item", "Item", "Iditem", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>