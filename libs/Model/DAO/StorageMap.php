<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * StorageMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the StorageDAO to the storage datastore.
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
class StorageMap implements IDaoMap, IDaoMap2
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
			self::$FM["Idstorage"] = new FieldMap("Idstorage","storage","idstorage",true,FM_TYPE_INT,11,null,true);
			self::$FM["Host"] = new FieldMap("Host","storage","host",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Local"] = new FieldMap("Local","storage","local",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Username"] = new FieldMap("Username","storage","username",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Password"] = new FieldMap("Password","storage","password",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Folder"] = new FieldMap("Folder","storage","folder",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Urlftp"] = new FieldMap("Urlftp","storage","urlftp",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Urlhttp"] = new FieldMap("Urlhttp","storage","urlhttp",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Ipaddress"] = new FieldMap("Ipaddress","storage","ipaddress",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Full"] = new FieldMap("Full","storage","full",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Usedspace"] = new FieldMap("Usedspace","storage","usedspace",false,FM_TYPE_BIGINT,20,null,false);
			self::$FM["Diskcapacity"] = new FieldMap("Diskcapacity","storage","diskcapacity",false,FM_TYPE_BIGINT,20,null,false);
			self::$FM["Institution"] = new FieldMap("Institution","storage","institution",false,FM_TYPE_INT,11,null,false);
			self::$FM["Defaultstorage"] = new FieldMap("Defaultstorage","storage","defaultstorage",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Port"] = new FieldMap("Port","storage","port",false,FM_TYPE_INT,11,null,false);
			self::$FM["Status"] = new FieldMap("Status","storage","status",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["FK_hrmsbocvkwn14rnyh8qj55dfc"] = new KeyMap("FK_hrmsbocvkwn14rnyh8qj55dfc", "Idstorage", "StorageMedia", "StorageIdstorage", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>