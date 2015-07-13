<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * CreatorMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the CreatorDAO to the creator datastore.
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
class CreatorMap implements IDaoMap, IDaoMap2
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
			self::$FM["Idcreator"] = new FieldMap("Idcreator","creator","idcreator",true,FM_TYPE_INT,11,null,true);
			self::$FM["Institution"] = new FieldMap("Institution","creator","institution",false,FM_TYPE_INT,11,null,false);
			self::$FM["Type"] = new FieldMap("Type","creator","type",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Name"] = new FieldMap("Name","creator","name",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Notes"] = new FieldMap("Notes","creator","notes",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Birthdate"] = new FieldMap("Birthdate","creator","birthdate",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Deathdate"] = new FieldMap("Deathdate","creator","deathdate",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Nationality"] = new FieldMap("Nationality","creator","nationality",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Maincontact"] = new FieldMap("Maincontact","creator","maincontact",false,FM_TYPE_VARCHAR,45,null,false);
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
			self::$KM["fk_contact_creator1"] = new KeyMap("fk_contact_creator1", "Idcreator", "Contact", "Idcreator", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_creatorcontact_creator"] = new KeyMap("fk_creatorcontact_creator", "Idcreator", "CreatorContact", "Creator", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_kv28ykd90gnj9a3ika7vvbsib"] = new KeyMap("FK_kv28ykd90gnj9a3ika7vvbsib", "Idcreator", "CreatorHistory", "Creator", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_ly7e216u77lqiatnysrm1um6"] = new KeyMap("FK_ly7e216u77lqiatnysrm1um6", "Idcreator", "CreatorReference", "Creator", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_creatorname_creator"] = new KeyMap("fk_creatorname_creator", "Idcreator", "Creatorname", "Creator", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_rqs393faxa7qvmarkbh38rhay"] = new KeyMap("FK_rqs393faxa7qvmarkbh38rhay", "Idcreator", "ExpositionCreator", "Creator", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_history_creator"] = new KeyMap("fk_history_creator", "Idcreator", "History", "Creator", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_document_has_creator_creator1"] = new KeyMap("fk_document_has_creator_creator1", "Idcreator", "Itemcreator", "Creator", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_reference_creator"] = new KeyMap("fk_reference_creator", "Idcreator", "Reference", "Creator", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_creator_institution1"] = new KeyMap("fk_creator_institution1", "Institution", "Institution", "Idinstitution", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>