<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * FondMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the FondDAO to the fond datastore.
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
class FondMap implements IDaoMap, IDaoMap2
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
			self::$FM["Idfond"] = new FieldMap("Idfond","fond","idfond",true,FM_TYPE_INT,11,null,true);
			self::$FM["Institution"] = new FieldMap("Institution","fond","institution",false,FM_TYPE_INT,11,null,false);
			self::$FM["Fond"] = new FieldMap("Fond","fond","fond",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Description"] = new FieldMap("Description","fond","description",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Otherinformation"] = new FieldMap("Otherinformation","fond","otherinformation",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Countitem"] = new FieldMap("Countitem","fond","countitem",false,FM_TYPE_INT,11,null,false);
			self::$FM["Type"] = new FieldMap("Type","fond","type",false,FM_TYPE_VARCHAR,45,null,false);
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
			self::$KM["fk_fondlevel_fond"] = new KeyMap("fk_fondlevel_fond", "Idfond", "FondLevel", "FondIdfond", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_fironk10lq67q4j0a3oue8ldg"] = new KeyMap("FK_fironk10lq67q4j0a3oue8ldg", "Idfond", "Infobjectfond", "Fond", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_serie_fond1"] = new KeyMap("fk_serie_fond1", "Idfond", "Level", "Fond", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_fond_institution1"] = new KeyMap("fk_fond_institution1", "Institution", "Institution", "Idinstitution", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>