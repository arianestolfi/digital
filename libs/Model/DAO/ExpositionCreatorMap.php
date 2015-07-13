<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ExpositionCreatorMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ExpositionCreatorDAO to the exposition_creator datastore.
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
class ExpositionCreatorMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","exposition_creator","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["Attributed"] = new FieldMap("Attributed","exposition_creator","attributed",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Location"] = new FieldMap("Location","exposition_creator","location",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Type"] = new FieldMap("Type","exposition_creator","type",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Creator"] = new FieldMap("Creator","exposition_creator","creator",false,FM_TYPE_INT,11,null,false);
			self::$FM["Exposition"] = new FieldMap("Exposition","exposition_creator","exposition",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["FK_kwh7ariugb0qjrwhpo3rai1uy"] = new KeyMap("FK_kwh7ariugb0qjrwhpo3rai1uy", "Exposition", "Exposition", "Idexposition", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["FK_rqs393faxa7qvmarkbh38rhay"] = new KeyMap("FK_rqs393faxa7qvmarkbh38rhay", "Creator", "Creator", "Idcreator", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>