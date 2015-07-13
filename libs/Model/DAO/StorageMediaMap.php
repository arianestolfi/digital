<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * StorageMediaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the StorageMediaDAO to the storage_media datastore.
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
class StorageMediaMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","storage_media","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["StorageIdstorage"] = new FieldMap("StorageIdstorage","storage_media","storage_idstorage",false,FM_TYPE_INT,11,null,false);
			self::$FM["MediasIdmedia"] = new FieldMap("MediasIdmedia","storage_media","medias_idmedia",false,FM_TYPE_BIGINT,20,null,false);
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
			self::$KM["FK_hrmsbocvkwn14rnyh8qj55dfc"] = new KeyMap("FK_hrmsbocvkwn14rnyh8qj55dfc", "StorageIdstorage", "Storage", "Idstorage", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["FK_nmymba781jas5ih7fojmm9435"] = new KeyMap("FK_nmymba781jas5ih7fojmm9435", "MediasIdmedia", "Media", "Idmedia", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>