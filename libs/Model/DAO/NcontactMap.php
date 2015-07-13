<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * NcontactMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the NcontactDAO to the ncontact datastore.
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
class NcontactMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","ncontact","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["Call_"] = new FieldMap("Call_","ncontact","call_",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Company"] = new FieldMap("Company","ncontact","company",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["CountyTaxcode"] = new FieldMap("CountyTaxcode","ncontact","county_taxcode",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["FederalTaxcode"] = new FieldMap("FederalTaxcode","ncontact","federal_taxcode",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Identity"] = new FieldMap("Identity","ncontact","identity",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Name"] = new FieldMap("Name","ncontact","name",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["StateTaxcode"] = new FieldMap("StateTaxcode","ncontact","state_taxcode",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Uri"] = new FieldMap("Uri","ncontact","uri",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Urla"] = new FieldMap("Urla","ncontact","urla",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Institution"] = new FieldMap("Institution","ncontact","institution",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["FK_q27ejta8y2arisfx6k2v8y01v"] = new KeyMap("FK_q27ejta8y2arisfx6k2v8y01v", "Institution", "Institution", "Idinstitution", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>