<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * IteminscriptionMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the IteminscriptionDAO to the iteminscription datastore.
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
class IteminscriptionMap implements IDaoMap, IDaoMap2
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
			self::$FM["D"] = new FieldMap("D","iteminscription","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["Tem"] = new FieldMap("Tem","iteminscription","item",false,FM_TYPE_BIGINT,20,null,false);
			self::$FM["Nscriptiontype"] = new FieldMap("Nscriptiontype","iteminscription","inscriptiontype",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Nscriptiondescription"] = new FieldMap("Nscriptiondescription","iteminscription","inscriptiondescription",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Nscriptionlocation"] = new FieldMap("Nscriptionlocation","iteminscription","inscriptionlocation",false,FM_TYPE_VARCHAR,100,null,false);
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
			self::$KM["fk_item_inscription"] = new KeyMap("fk_item_inscription", "Tem", "Item", "Iditem", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>