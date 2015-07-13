<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ItemcreatorMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ItemcreatorDAO to the itemcreator datastore.
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
class ItemcreatorMap implements IDaoMap, IDaoMap2
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
			self::$FM["Iditemcreator"] = new FieldMap("Iditemcreator","itemcreator","iditemcreator",true,FM_TYPE_INT,11,null,true);
			self::$FM["Item"] = new FieldMap("Item","itemcreator","item",false,FM_TYPE_BIGINT,20,null,false);
			self::$FM["Creator"] = new FieldMap("Creator","itemcreator","creator",false,FM_TYPE_INT,11,null,false);
			self::$FM["Type"] = new FieldMap("Type","itemcreator","type",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Location"] = new FieldMap("Location","itemcreator","location",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Attributed"] = new FieldMap("Attributed","itemcreator","attributed",false,FM_TYPE_UNKNOWN,1,null,false);
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
			self::$KM["fk_document_has_creator_creator1"] = new KeyMap("fk_document_has_creator_creator1", "Creator", "Creator", "Idcreator", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_itemcreator_item"] = new KeyMap("fk_itemcreator_item", "Item", "Item", "Iditem", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>