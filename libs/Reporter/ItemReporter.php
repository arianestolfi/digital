<?php
/** @package    Digital::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Item object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Digital::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ItemReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `item` table
	public $CustomFieldExample;

	public $Iditem;
	public $Holder;
	public $Level;
	public $Institution;
	public $Inventoryid;
	public $Uritype;
	public $Uri;
	public $Keywords;
	public $Description;
	public $Uidtype;
	public $Uid;
	public $Class;
	public $Type;
	public $Iseletronic;
	public $Creationdate;
	public $Acquisitiondate;
	public $Scopecontent;
	public $Originalexistence;
	public $Originallocation;
	public $Repositorycode;
	public $Copyexistence;
	public $Copylocation;
	public $Legalaccess;
	public $Accesscondition;
	public $Reproductionrights;
	public $Reproductionrightsdescription;
	public $Itemdate;
	public $Publishdate;
	public $Publisher;
	public $Itematributes;
	public $Ispublic;
	public $Preliminaryrule;
	public $Punctuation;
	public $Notes;
	public $Otherinformation;
	public $Idfather;
	public $Titledefault;
	public $Subitem;
	public $Deletecomfirm;
	public $Typeitem;
	public $Edition;
	public $Isexposed;
	public $Isoriginal;
	public $Ispart;
	public $Haspart;
	public $Ispartof;
	public $Numberofcopies;
	public $Tobepublicin;
	public $Creationdateattributed;
	public $Itemdateattributed;
	public $Publishdateattributed;
	public $Serachdump;
	public $Itemmediadir;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`item`.`iditem` as Iditem
			,`item`.`holder` as Holder
			,`item`.`level` as Level
			,`item`.`institution` as Institution
			,`item`.`inventoryid` as Inventoryid
			,`item`.`uritype` as Uritype
			,`item`.`uri` as Uri
			,`item`.`keywords` as Keywords
			,`item`.`description` as Description
			,`item`.`uidtype` as Uidtype
			,`item`.`uid` as Uid
			,`item`.`class` as Class
			,`item`.`type` as Type
			,`item`.`iseletronic` as Iseletronic
			,`item`.`creationdate` as Creationdate
			,`item`.`acquisitiondate` as Acquisitiondate
			,`item`.`scopecontent` as Scopecontent
			,`item`.`originalexistence` as Originalexistence
			,`item`.`originallocation` as Originallocation
			,`item`.`repositorycode` as Repositorycode
			,`item`.`copyexistence` as Copyexistence
			,`item`.`copylocation` as Copylocation
			,`item`.`legalaccess` as Legalaccess
			,`item`.`accesscondition` as Accesscondition
			,`item`.`reproductionrights` as Reproductionrights
			,`item`.`reproductionrightsdescription` as Reproductionrightsdescription
			,`item`.`itemdate` as Itemdate
			,`item`.`publishdate` as Publishdate
			,`item`.`publisher` as Publisher
			,`item`.`itematributes` as Itematributes
			,`item`.`ispublic` as Ispublic
			,`item`.`preliminaryrule` as Preliminaryrule
			,`item`.`punctuation` as Punctuation
			,`item`.`notes` as Notes
			,`item`.`otherinformation` as Otherinformation
			,`item`.`idfather` as Idfather
			,`item`.`titledefault` as Titledefault
			,`item`.`subitem` as Subitem
			,`item`.`deletecomfirm` as Deletecomfirm
			,`item`.`typeitem` as Typeitem
			,`item`.`edition` as Edition
			,`item`.`isexposed` as Isexposed
			,`item`.`isoriginal` as Isoriginal
			,`item`.`ispart` as Ispart
			,`item`.`haspart` as Haspart
			,`item`.`ispartof` as Ispartof
			,`item`.`numberofcopies` as Numberofcopies
			,`item`.`tobepublicin` as Tobepublicin
			,`item`.`creationdateattributed` as Creationdateattributed
			,`item`.`itemdateattributed` as Itemdateattributed
			,`item`.`publishdateattributed` as Publishdateattributed
			,`item`.`serachdump` as Serachdump
			,`item`.`itemmediadir` as Itemmediadir
		from `item`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `item`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>