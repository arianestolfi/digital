<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * PhysicaldescriptionMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PhysicaldescriptionDAO to the physicaldescription datastore.
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
class PhysicaldescriptionMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","physicaldescription","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["Item"] = new FieldMap("Item","physicaldescription","item",false,FM_TYPE_BIGINT,20,null,false);
			self::$FM["Apexiso"] = new FieldMap("Apexiso","physicaldescription","apexiso",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Arabicpagenumbering"] = new FieldMap("Arabicpagenumbering","physicaldescription","arabicpagenumbering",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Asaiso"] = new FieldMap("Asaiso","physicaldescription","asaiso",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Boundtype"] = new FieldMap("Boundtype","physicaldescription","boundtype",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Color"] = new FieldMap("Color","physicaldescription","color",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Colorsystem"] = new FieldMap("Colorsystem","physicaldescription","colorsystem",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Columnnumber"] = new FieldMap("Columnnumber","physicaldescription","columnnumber",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Compressionmethod"] = new FieldMap("Compressionmethod","physicaldescription","compressionmethod",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Contentcolor"] = new FieldMap("Contentcolor","physicaldescription","contentcolor",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Contentextent"] = new FieldMap("Contentextent","physicaldescription","contentextent",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Contentfinishing"] = new FieldMap("Contentfinishing","physicaldescription","contentfinishing",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Contentsubstract"] = new FieldMap("Contentsubstract","physicaldescription","contentsubstract",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Contenttype"] = new FieldMap("Contenttype","physicaldescription","contenttype",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Covercolor"] = new FieldMap("Covercolor","physicaldescription","covercolor",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Coverfinishing"] = new FieldMap("Coverfinishing","physicaldescription","coverfinishing",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Coversubstract"] = new FieldMap("Coversubstract","physicaldescription","coversubstract",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Defaultapplication"] = new FieldMap("Defaultapplication","physicaldescription","defaultapplication",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Dustjacketcolor"] = new FieldMap("Dustjacketcolor","physicaldescription","dustjacketcolor",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Dustjacketfinishing"] = new FieldMap("Dustjacketfinishing","physicaldescription","dustjacketfinishing",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Dustjacketsubstract"] = new FieldMap("Dustjacketsubstract","physicaldescription","dustjacketsubstract",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Endpaper"] = new FieldMap("Endpaper","physicaldescription","endpaper",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Exif"] = new FieldMap("Exif","physicaldescription","exif",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Format"] = new FieldMap("Format","physicaldescription","format",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Framerate"] = new FieldMap("Framerate","physicaldescription","framerate",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Hasdustjacket"] = new FieldMap("Hasdustjacket","physicaldescription","hasdustjacket",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Hassound"] = new FieldMap("Hassound","physicaldescription","hassound",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Hasspecialfold"] = new FieldMap("Hasspecialfold","physicaldescription","hasspecialfold",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Iscompressed"] = new FieldMap("Iscompressed","physicaldescription","iscompressed",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Lengthtxt"] = new FieldMap("Lengthtxt","physicaldescription","lengthtxt",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Master"] = new FieldMap("Master","physicaldescription","master",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Media"] = new FieldMap("Media","physicaldescription","media",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Mediasupport"] = new FieldMap("Mediasupport","physicaldescription","mediasupport",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Movements"] = new FieldMap("Movements","physicaldescription","movements",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Other"] = new FieldMap("Other","physicaldescription","other",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Projectionmode"] = new FieldMap("Projectionmode","physicaldescription","projectionmode",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Romanpage"] = new FieldMap("Romanpage","physicaldescription","romanpage",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Sizetxt"] = new FieldMap("Sizetxt","physicaldescription","sizetxt",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Soundsystem"] = new FieldMap("Soundsystem","physicaldescription","soundsystem",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Specialfold"] = new FieldMap("Specialfold","physicaldescription","specialfold",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Specialpagenumebring"] = new FieldMap("Specialpagenumebring","physicaldescription","specialpagenumebring",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Technique"] = new FieldMap("Technique","physicaldescription","technique",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Timecode"] = new FieldMap("Timecode","physicaldescription","timecode",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Tinting"] = new FieldMap("Tinting","physicaldescription","tinting",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Titlepage"] = new FieldMap("Titlepage","physicaldescription","titlepage",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Totaltime"] = new FieldMap("Totaltime","physicaldescription","totaltime",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Type"] = new FieldMap("Type","physicaldescription","type",false,FM_TYPE_VARCHAR,100,null,false);
			self::$FM["Writingformat"] = new FieldMap("Writingformat","physicaldescription","writingformat",false,FM_TYPE_VARCHAR,100,null,false);
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
			self::$KM["fk_item_physical"] = new KeyMap("fk_item_physical", "Item", "Item", "Iditem", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>