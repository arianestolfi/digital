<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * TranscriptionMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the TranscriptionDAO to the transcription datastore.
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
class TranscriptionMap implements IDaoMap, IDaoMap2
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
			self::$FM["Idtranscription"] = new FieldMap("Idtranscription","transcription","idtranscription",true,FM_TYPE_INT,11,null,true);
			self::$FM["Iditem"] = new FieldMap("Iditem","transcription","iditem",false,FM_TYPE_BIGINT,20,null,false);
			self::$FM["Idmedia"] = new FieldMap("Idmedia","transcription","idmedia",false,FM_TYPE_BIGINT,20,null,false);
			self::$FM["Transcription"] = new FieldMap("Transcription","transcription","transcription",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Notes"] = new FieldMap("Notes","transcription","notes",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Language"] = new FieldMap("Language","transcription","language",false,FM_TYPE_VARCHAR,45,null,false);
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
			self::$KM["fk_transcription_item1"] = new KeyMap("fk_transcription_item1", "Iditem", "Item", "Iditem", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_transcription_media1"] = new KeyMap("fk_transcription_media1", "Idmedia", "Media", "Idmedia", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>