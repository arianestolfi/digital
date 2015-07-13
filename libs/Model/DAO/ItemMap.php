<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ItemMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ItemDAO to the item datastore.
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
class ItemMap implements IDaoMap, IDaoMap2
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
			self::$FM["Iditem"] = new FieldMap("Iditem","item","iditem",true,FM_TYPE_BIGINT,20,null,true);
			self::$FM["Holder"] = new FieldMap("Holder","item","holder",false,FM_TYPE_INT,11,null,false);
			self::$FM["Level"] = new FieldMap("Level","item","level",false,FM_TYPE_INT,11,null,false);
			self::$FM["Institution"] = new FieldMap("Institution","item","institution",false,FM_TYPE_INT,11,null,false);
			self::$FM["Inventoryid"] = new FieldMap("Inventoryid","item","inventoryid",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Uritype"] = new FieldMap("Uritype","item","uritype",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Uri"] = new FieldMap("Uri","item","uri",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Keywords"] = new FieldMap("Keywords","item","keywords",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Description"] = new FieldMap("Description","item","description",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Uidtype"] = new FieldMap("Uidtype","item","uidtype",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Uid"] = new FieldMap("Uid","item","uid",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Class"] = new FieldMap("Class","item","class",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Type"] = new FieldMap("Type","item","type",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Iseletronic"] = new FieldMap("Iseletronic","item","iseletronic",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Creationdate"] = new FieldMap("Creationdate","item","creationdate",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Acquisitiondate"] = new FieldMap("Acquisitiondate","item","acquisitiondate",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Scopecontent"] = new FieldMap("Scopecontent","item","scopecontent",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Originalexistence"] = new FieldMap("Originalexistence","item","originalexistence",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Originallocation"] = new FieldMap("Originallocation","item","originallocation",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Repositorycode"] = new FieldMap("Repositorycode","item","repositorycode",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Copyexistence"] = new FieldMap("Copyexistence","item","copyexistence",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Copylocation"] = new FieldMap("Copylocation","item","copylocation",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Legalaccess"] = new FieldMap("Legalaccess","item","legalaccess",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Accesscondition"] = new FieldMap("Accesscondition","item","accesscondition",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Reproductionrights"] = new FieldMap("Reproductionrights","item","reproductionrights",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Reproductionrightsdescription"] = new FieldMap("Reproductionrightsdescription","item","reproductionrightsdescription",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Itemdate"] = new FieldMap("Itemdate","item","itemdate",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Publishdate"] = new FieldMap("Publishdate","item","publishdate",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Publisher"] = new FieldMap("Publisher","item","publisher",false,FM_TYPE_VARCHAR,250,null,false);
			self::$FM["Itematributes"] = new FieldMap("Itematributes","item","itematributes",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Ispublic"] = new FieldMap("Ispublic","item","ispublic",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Preliminaryrule"] = new FieldMap("Preliminaryrule","item","preliminaryrule",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Punctuation"] = new FieldMap("Punctuation","item","punctuation",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Notes"] = new FieldMap("Notes","item","notes",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Otherinformation"] = new FieldMap("Otherinformation","item","otherinformation",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Idfather"] = new FieldMap("Idfather","item","idfather",false,FM_TYPE_BIGINT,20,null,false);
			self::$FM["Titledefault"] = new FieldMap("Titledefault","item","titledefault",false,FM_TYPE_VARCHAR,250,null,false);
			self::$FM["Subitem"] = new FieldMap("Subitem","item","subitem",false,FM_TYPE_TINYINT,4,null,false);
			self::$FM["Deletecomfirm"] = new FieldMap("Deletecomfirm","item","deletecomfirm",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Typeitem"] = new FieldMap("Typeitem","item","typeitem",false,FM_TYPE_TINYINT,4,null,false);
			self::$FM["Edition"] = new FieldMap("Edition","item","edition",false,FM_TYPE_VARCHAR,250,null,false);
			self::$FM["Isexposed"] = new FieldMap("Isexposed","item","isexposed",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Isoriginal"] = new FieldMap("Isoriginal","item","isoriginal",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Ispart"] = new FieldMap("Ispart","item","ispart",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Haspart"] = new FieldMap("Haspart","item","haspart",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Ispartof"] = new FieldMap("Ispartof","item","ispartof",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Numberofcopies"] = new FieldMap("Numberofcopies","item","numberofcopies",false,FM_TYPE_INT,11,null,false);
			self::$FM["Tobepublicin"] = new FieldMap("Tobepublicin","item","tobepublicin",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Creationdateattributed"] = new FieldMap("Creationdateattributed","item","creationdateattributed",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Itemdateattributed"] = new FieldMap("Itemdateattributed","item","itemdateattributed",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Publishdateattributed"] = new FieldMap("Publishdateattributed","item","publishdateattributed",false,FM_TYPE_UNKNOWN,1,null,false);
			self::$FM["Serachdump"] = new FieldMap("Serachdump","item","serachdump",false,FM_TYPE_TEXT,null,null,false);
			self::$FM["Itemmediadir"] = new FieldMap("Itemmediadir","item","itemmediadir",false,FM_TYPE_VARCHAR,255,null,false);
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
			self::$KM["fk_document_item1"] = new KeyMap("fk_document_item1", "Iditem", "Documentation", "Item", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_expoitem_item"] = new KeyMap("fk_expoitem_item", "Iditem", "Expoitem", "Item", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_history_item1"] = new KeyMap("fk_history_item1", "Iditem", "History", "Item", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["FK_k77kiqsk4fg0wh48h5adn2x67"] = new KeyMap("FK_k77kiqsk4fg0wh48h5adn2x67", "Iditem", "Infobjectfond", "Item", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_itemmedia_item"] = new KeyMap("fk_itemmedia_item", "Iditem", "ItemMedia", "ItemIditem", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_itemcreator_item"] = new KeyMap("fk_itemcreator_item", "Iditem", "Itemcreator", "Item", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_itemdescription_item"] = new KeyMap("fk_itemdescription_item", "Iditem", "Itemdescription", "Item", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_item_dimension"] = new KeyMap("fk_item_dimension", "Iditem", "Itemdimension", "Item", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_item_inscription"] = new KeyMap("fk_item_inscription", "Iditem", "Iteminscription", "Tem", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_item_physical"] = new KeyMap("fk_item_physical", "Iditem", "Physicaldescription", "Item", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_reference_item1"] = new KeyMap("fk_reference_item1", "Iditem", "Reference", "Item", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_title_item1"] = new KeyMap("fk_title_item1", "Iditem", "Title", "Item", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_transcription_item1"] = new KeyMap("fk_transcription_item1", "Iditem", "Transcription", "Iditem", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_item_holder1"] = new KeyMap("fk_item_holder1", "Holder", "Holder", "Idholder", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_item_level"] = new KeyMap("fk_item_level", "Level", "Level", "Idlevel", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_item_institution1"] = new KeyMap("fk_item_institution1", "Institution", "Institution", "Idinstitution", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>