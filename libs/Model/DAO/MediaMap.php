<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * MediaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the MediaDAO to the media datastore.
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
class MediaMap implements IDaoMap, IDaoMap2
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
			self::$FM["Idmedia"] = new FieldMap("Idmedia","media","idmedia",true,FM_TYPE_BIGINT,20,null,true);
			self::$FM["Idhistory"] = new FieldMap("Idhistory","media","idhistory",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Storage"] = new FieldMap("Storage","media","storage",false,FM_TYPE_INT,11,null,false);
			self::$FM["Iddocumentation"] = new FieldMap("Iddocumentation","media","iddocumentation",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Institution"] = new FieldMap("Institution","media","institution",false,FM_TYPE_INT,11,null,false);
			self::$FM["Idreference"] = new FieldMap("Idreference","media","idreference",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Mediatype"] = new FieldMap("Mediatype","media","mediatype",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Mediaurl"] = new FieldMap("Mediaurl","media","mediaurl",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Digitizationdate"] = new FieldMap("Digitizationdate","media","digitizationdate",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Digitizationresponsable"] = new FieldMap("Digitizationresponsable","media","digitizationresponsable",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Polarity"] = new FieldMap("Polarity","media","polarity",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Colorspace"] = new FieldMap("Colorspace","media","colorspace",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Iccprofile"] = new FieldMap("Iccprofile","media","iccprofile",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Xresolution"] = new FieldMap("Xresolution","media","xresolution",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Yresolution"] = new FieldMap("Yresolution","media","yresolution",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Thumbnail"] = new FieldMap("Thumbnail","media","thumbnail",false,FM_TYPE_BLOB,null,null,false);
			self::$FM["Digitizationequipment"] = new FieldMap("Digitizationequipment","media","digitizationequipment",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Format"] = new FieldMap("Format","media","format",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Ispublic"] = new FieldMap("Ispublic","media","ispublic",false,FM_TYPE_VARCHAR,1,null,false);
			self::$FM["Ordername"] = new FieldMap("Ordername","media","ordername",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Sent"] = new FieldMap("Sent","media","sent",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Exif"] = new FieldMap("Exif","media","exif",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Textual"] = new FieldMap("Textual","media","textual",false,FM_TYPE_LONGTEXT,null,null,false);
			self::$FM["Sizemedia"] = new FieldMap("Sizemedia","media","sizemedia",false,FM_TYPE_BIGINT,20,null,false);
			self::$FM["Nameoriginal"] = new FieldMap("Nameoriginal","media","nameoriginal",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Mainmedia"] = new FieldMap("Mainmedia","media","mainmedia",false,FM_TYPE_VARCHAR,1,null,false);
			self::$FM["Mediadir"] = new FieldMap("Mediadir","media","mediadir",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Thumbnaildir"] = new FieldMap("Thumbnaildir","media","thumbnaildir",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Thumbnailurl"] = new FieldMap("Thumbnailurl","media","thumbnailurl",false,FM_TYPE_VARCHAR,255,null,false);
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
			self::$KM["FK_documentationmedia_media"] = new KeyMap("FK_documentationmedia_media", "Idmedia", "DocumentationMedia", "MediasIdmedia", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_historymedia_media"] = new KeyMap("fk_historymedia_media", "Idmedia", "HistoryMedia", "MediasIdmedia", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_institutionmedia_media"] = new KeyMap("fk_institutionmedia_media", "Idmedia", "InstitutionMedia", "MediasIdmedia", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_itemmedia_media"] = new KeyMap("fk_itemmedia_media", "Idmedia", "ItemMedia", "MediasIdmedia", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_refmedia_media"] = new KeyMap("fk_refmedia_media", "Idmedia", "ReferenceMedia", "MediasIdmedia", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_nmymba781jas5ih7fojmm9435"] = new KeyMap("FK_nmymba781jas5ih7fojmm9435", "Idmedia", "StorageMedia", "MediasIdmedia", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_transcription_media1"] = new KeyMap("fk_transcription_media1", "Idmedia", "Transcription", "Idmedia", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_media_institution1"] = new KeyMap("fk_media_institution1", "Institution", "Institution", "Idinstitution", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>