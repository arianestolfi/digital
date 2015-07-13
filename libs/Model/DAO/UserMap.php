<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * UserMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the UserDAO to the user datastore.
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
class UserMap implements IDaoMap, IDaoMap2
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
			self::$FM["Iduser"] = new FieldMap("Iduser","user","iduser",true,FM_TYPE_INT,11,null,true);
			self::$FM["Institution"] = new FieldMap("Institution","user","institution",false,FM_TYPE_INT,11,null,false);
			self::$FM["Fullname"] = new FieldMap("Fullname","user","fullname",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Username"] = new FieldMap("Username","user","username",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Password"] = new FieldMap("Password","user","password",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Notes"] = new FieldMap("Notes","user","notes",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Code"] = new FieldMap("Code","user","code",false,FM_TYPE_VARCHAR,8,null,false);
			self::$FM["Timezone"] = new FieldMap("Timezone","user","timezone",false,FM_TYPE_INT,11,null,false);
			self::$FM["Lastlogin"] = new FieldMap("Lastlogin","user","lastlogin",false,FM_TYPE_TIMESTAMP,null,null,false);
			self::$FM["Status"] = new FieldMap("Status","user","status",false,FM_TYPE_TINYINT,4,null,false);
			self::$FM["Admin"] = new FieldMap("Admin","user","admin",false,FM_TYPE_UNKNOWN,1,null,false);
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
			self::$KM["fk_contact_user"] = new KeyMap("fk_contact_user", "Iduser", "Contact", "User", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_search_user1"] = new KeyMap("fk_search_user1", "Iduser", "Search", "User", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_user_has_role_user1"] = new KeyMap("fk_user_has_role_user1", "Iduser", "Userrole", "User", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_user_institution1"] = new KeyMap("fk_user_institution1", "Institution", "Institution", "Idinstitution", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_user_timezone"] = new KeyMap("fk_user_timezone", "Timezone", "Timezones", "Idtimezone", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>