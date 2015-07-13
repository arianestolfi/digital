<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ExpositionReferenceMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ExpositionReferenceDAO to the exposition_reference datastore.
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
class ExpositionReferenceMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","exposition_reference","id",true,FM_TYPE_BIGINT,20,null,true);
			self::$FM["Type"] = new FieldMap("Type","exposition_reference","type",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Exposition"] = new FieldMap("Exposition","exposition_reference","exposition",false,FM_TYPE_INT,11,null,false);
			self::$FM["Reference"] = new FieldMap("Reference","exposition_reference","reference",false,FM_TYPE_BIGINT,20,null,false);
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
			self::$KM["FK_1v8ywvb944diagioy8oulgjfi"] = new KeyMap("FK_1v8ywvb944diagioy8oulgjfi", "Exposition", "Exposition", "Idexposition", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["FK_bn9yeqjkv398d64fdibt6jbys"] = new KeyMap("FK_bn9yeqjkv398d64fdibt6jbys", "Reference", "Nreference", "Id", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>