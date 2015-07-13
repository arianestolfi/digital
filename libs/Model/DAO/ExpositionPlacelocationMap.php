<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ExpositionPlacelocationMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ExpositionPlacelocationDAO to the exposition_placelocation datastore.
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
class ExpositionPlacelocationMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","exposition_placelocation","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["Type"] = new FieldMap("Type","exposition_placelocation","type",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Contact"] = new FieldMap("Contact","exposition_placelocation","contact",false,FM_TYPE_INT,11,null,false);
			self::$FM["Placelocation"] = new FieldMap("Placelocation","exposition_placelocation","placelocation",false,FM_TYPE_BIGINT,20,null,false);
			self::$FM["Exposition"] = new FieldMap("Exposition","exposition_placelocation","exposition",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["FK_anby2ek1hm7l0n2v7s11ajdmj"] = new KeyMap("FK_anby2ek1hm7l0n2v7s11ajdmj", "Contact", "Contact", "Idcontact", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["FK_eidy94mayop8hv1jwy5rjt3p7"] = new KeyMap("FK_eidy94mayop8hv1jwy5rjt3p7", "Exposition", "Exposition", "Idexposition", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["FK_k75vo2tl0yd87up64gkti5kpf"] = new KeyMap("FK_k75vo2tl0yd87up64gkti5kpf", "Placelocation", "PlaceLocation", "Id", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>