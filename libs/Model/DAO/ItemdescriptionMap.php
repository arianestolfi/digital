<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ItemdescriptionMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ItemdescriptionDAO to the itemdescription datastore.
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
class ItemdescriptionMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","itemdescription","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["Item"] = new FieldMap("Item","itemdescription","item",false,FM_TYPE_BIGINT,20,null,false);
			self::$FM["Abstracttext"] = new FieldMap("Abstracttext","itemdescription","abstracttext",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Accrual"] = new FieldMap("Accrual","itemdescription","accrual",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Appraisaldesstructionschedulling"] = new FieldMap("Appraisaldesstructionschedulling","itemdescription","appraisaldesstructionschedulling",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Arrangement"] = new FieldMap("Arrangement","itemdescription","arrangement",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Broadcastmethod"] = new FieldMap("Broadcastmethod","itemdescription","broadcastmethod",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Era"] = new FieldMap("Era","itemdescription","era",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Fromcorporate"] = new FieldMap("Fromcorporate","itemdescription","fromcorporate",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Frompersonal"] = new FieldMap("Frompersonal","itemdescription","frompersonal",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Geographiccoodnates"] = new FieldMap("Geographiccoodnates","itemdescription","geographiccoodnates",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Geographicname"] = new FieldMap("Geographicname","itemdescription","geographicname",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Label"] = new FieldMap("Label","itemdescription","label",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Language"] = new FieldMap("Language","itemdescription","language",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Mediapresentation"] = new FieldMap("Mediapresentation","itemdescription","mediapresentation",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Movement"] = new FieldMap("Movement","itemdescription","movement",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Other"] = new FieldMap("Other","itemdescription","other",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Period"] = new FieldMap("Period","itemdescription","period",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Periodicity"] = new FieldMap("Periodicity","itemdescription","periodicity",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Preservationstatus"] = new FieldMap("Preservationstatus","itemdescription","preservationstatus",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Scope"] = new FieldMap("Scope","itemdescription","scope",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Style"] = new FieldMap("Style","itemdescription","style",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Subject"] = new FieldMap("Subject","itemdescription","subject",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Tableofcontents"] = new FieldMap("Tableofcontents","itemdescription","tableofcontents",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Targetaudience"] = new FieldMap("Targetaudience","itemdescription","targetaudience",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Tocorporate"] = new FieldMap("Tocorporate","itemdescription","tocorporate",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Topersonal"] = new FieldMap("Topersonal","itemdescription","topersonal",false,FM_TYPE_VARCHAR,100,null,false);
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
			self::$KM["fk_itemdescription_item"] = new KeyMap("fk_itemdescription_item", "Item", "Item", "Iditem", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>