<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ExpositionHistoryMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ExpositionHistoryDAO to the exposition_history datastore.
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
class ExpositionHistoryMap implements IDaoMap, IDaoMap2
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
			self::$FM["Idhistory"] = new FieldMap("Idhistory","exposition_history","idhistory",true,FM_TYPE_BIGINT,20,null,true);
			self::$FM["Type"] = new FieldMap("Type","exposition_history","type",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Idexposition"] = new FieldMap("Idexposition","exposition_history","idexposition",false,FM_TYPE_INT,11,null,false);
			self::$FM["History"] = new FieldMap("History","exposition_history","history",false,FM_TYPE_BIGINT,20,null,false);
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
			self::$KM["FK_g6g5n45iyajyahsp1dfaeff4b"] = new KeyMap("FK_g6g5n45iyajyahsp1dfaeff4b", "Idexposition", "Exposition", "Idexposition", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["FK_sfxtpv6nypctjcamcjgov1etg"] = new KeyMap("FK_sfxtpv6nypctjcamcjgov1etg", "History", "Nhistory", "Idhistory", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>