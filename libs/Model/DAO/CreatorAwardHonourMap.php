<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * CreatorAwardHonourMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the CreatorAwardHonourDAO to the creator_award_honour datastore.
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
class CreatorAwardHonourMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","creator_award_honour","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["Description"] = new FieldMap("Description","creator_award_honour","description",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Grantedby"] = new FieldMap("Grantedby","creator_award_honour","grantedby",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Title"] = new FieldMap("Title","creator_award_honour","title",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Type"] = new FieldMap("Type","creator_award_honour","type",false,FM_TYPE_VARCHAR,100,null,false);
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
		}
		return self::$KM;
	}

}

?>