<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * NreferenceMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the NreferenceDAO to the nreference datastore.
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
class NreferenceMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","nreference","id",true,FM_TYPE_BIGINT,20,null,true);
			self::$FM["Author"] = new FieldMap("Author","nreference","author",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Description"] = new FieldMap("Description","nreference","description",false,FM_TYPE_VARCHAR,500,null,false);
			self::$FM["OtherInformation"] = new FieldMap("OtherInformation","nreference","other_information",false,FM_TYPE_VARCHAR,5000,null,false);
			self::$FM["Text"] = new FieldMap("Text","nreference","text",false,FM_TYPE_VARCHAR,5000,null,false);
			self::$FM["Title"] = new FieldMap("Title","nreference","title",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Institution"] = new FieldMap("Institution","nreference","institution",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["FK_r7ovmckudaqk0px6wtotfyy8c"] = new KeyMap("FK_r7ovmckudaqk0px6wtotfyy8c", "Id", "CreatorReference", "Reference", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_bn9yeqjkv398d64fdibt6jbys"] = new KeyMap("FK_bn9yeqjkv398d64fdibt6jbys", "Id", "ExpositionReference", "Reference", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_360fxrl1q9vf3b3yu70b0lxl1"] = new KeyMap("FK_360fxrl1q9vf3b3yu70b0lxl1", "Institution", "Institution", "Idinstitution", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>