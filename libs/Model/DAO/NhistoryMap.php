<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * NhistoryMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the NhistoryDAO to the nhistory datastore.
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
class NhistoryMap implements IDaoMap, IDaoMap2
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
			self::$FM["Idhistory"] = new FieldMap("Idhistory","nhistory","idhistory",true,FM_TYPE_BIGINT,20,null,true);
			self::$FM["Actor"] = new FieldMap("Actor","nhistory","actor",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Cost"] = new FieldMap("Cost","nhistory","cost",false,FM_TYPE_DECIMAL,12.0,null,false);
			self::$FM["Date"] = new FieldMap("Date","nhistory","date",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Description"] = new FieldMap("Description","nhistory","description",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Ispublic"] = new FieldMap("Ispublic","nhistory","isPublic",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Institution"] = new FieldMap("Institution","nhistory","institution",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["fk_creatorhistory"] = new KeyMap("fk_creatorhistory", "Idhistory", "CreatorHistory", "History", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_sfxtpv6nypctjcamcjgov1etg"] = new KeyMap("FK_sfxtpv6nypctjcamcjgov1etg", "Idhistory", "ExpositionHistory", "History", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_19r8lwpjqv2j4hcqpjkwb1nsc"] = new KeyMap("FK_19r8lwpjqv2j4hcqpjkwb1nsc", "Institution", "Institution", "Idinstitution", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>