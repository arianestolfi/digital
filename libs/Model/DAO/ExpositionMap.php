<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ExpositionMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ExpositionDAO to the exposition datastore.
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
class ExpositionMap implements IDaoMap, IDaoMap2
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
			self::$FM["Idexposition"] = new FieldMap("Idexposition","exposition","idexposition",true,FM_TYPE_INT,11,null,true);
			self::$FM["Institution"] = new FieldMap("Institution","exposition","institution",false,FM_TYPE_INT,11,null,false);
			self::$FM["Location"] = new FieldMap("Location","exposition","location",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Curator"] = new FieldMap("Curator","exposition","curator",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Initialdate"] = new FieldMap("Initialdate","exposition","initialdate",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Enddate"] = new FieldMap("Enddate","exposition","enddate",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Description"] = new FieldMap("Description","exposition","description",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Notes"] = new FieldMap("Notes","exposition","notes",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Name"] = new FieldMap("Name","exposition","name",false,FM_TYPE_VARCHAR,250,null,false);
			self::$FM["Exposubtype"] = new FieldMap("Exposubtype","exposition","exposubtype",false,FM_TYPE_VARCHAR,250,null,false);
			self::$FM["Expotype"] = new FieldMap("Expotype","exposition","expotype",false,FM_TYPE_VARCHAR,250,null,false);
			self::$FM["Iscarriedbyotherinstitution"] = new FieldMap("Iscarriedbyotherinstitution","exposition","iscarriedbyotherinstitution",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Isinternational"] = new FieldMap("Isinternational","exposition","isinternational",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Otherinfo"] = new FieldMap("Otherinfo","exposition","otherinfo",false,FM_TYPE_VARCHAR,250,null,false);
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
			self::$KM["fk_expoitem_exposition"] = new KeyMap("fk_expoitem_exposition", "Idexposition", "Expoitem", "Exposition", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_kwh7ariugb0qjrwhpo3rai1uy"] = new KeyMap("FK_kwh7ariugb0qjrwhpo3rai1uy", "Idexposition", "ExpositionCreator", "Exposition", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_ai09pidrxa780uxmakwlex92c"] = new KeyMap("FK_ai09pidrxa780uxmakwlex92c", "Idexposition", "ExpositionDimension", "Exposition", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_g6g5n45iyajyahsp1dfaeff4b"] = new KeyMap("FK_g6g5n45iyajyahsp1dfaeff4b", "Idexposition", "ExpositionHistory", "Idexposition", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_eidy94mayop8hv1jwy5rjt3p7"] = new KeyMap("FK_eidy94mayop8hv1jwy5rjt3p7", "Idexposition", "ExpositionPlacelocation", "Exposition", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_1v8ywvb944diagioy8oulgjfi"] = new KeyMap("FK_1v8ywvb944diagioy8oulgjfi", "Idexposition", "ExpositionReference", "Exposition", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_exposition_institution1"] = new KeyMap("fk_exposition_institution1", "Institution", "Institution", "Idinstitution", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>