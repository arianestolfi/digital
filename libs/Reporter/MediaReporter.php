<?php
/** @package    Digital::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Media object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Digital::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class MediaReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `media` table
	public $CustomFieldExample;

	public $Idmedia;
	public $Idhistory;
	public $Storage;
	public $Iddocumentation;
	public $Institution;
	public $Idreference;
	public $Mediatype;
	public $Mediaurl;
	public $Digitizationdate;
	public $Digitizationresponsable;
	public $Polarity;
	public $Colorspace;
	public $Iccprofile;
	public $Xresolution;
	public $Yresolution;
	public $Thumbnail;
	public $Digitizationequipment;
	public $Format;
	public $Ispublic;
	public $Ordername;
	public $Sent;
	public $Exif;
	public $Textual;
	public $Sizemedia;
	public $Nameoriginal;
	public $Mainmedia;
	public $Mediadir;
	public $Thumbnaildir;
	public $Thumbnailurl;

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
			,`media`.`idmedia` as Idmedia
			,`media`.`idhistory` as Idhistory
			,`media`.`storage` as Storage
			,`media`.`iddocumentation` as Iddocumentation
			,`media`.`institution` as Institution
			,`media`.`idreference` as Idreference
			,`media`.`mediatype` as Mediatype
			,`media`.`mediaurl` as Mediaurl
			,`media`.`digitizationdate` as Digitizationdate
			,`media`.`digitizationresponsable` as Digitizationresponsable
			,`media`.`polarity` as Polarity
			,`media`.`colorspace` as Colorspace
			,`media`.`iccprofile` as Iccprofile
			,`media`.`xresolution` as Xresolution
			,`media`.`yresolution` as Yresolution
			,`media`.`thumbnail` as Thumbnail
			,`media`.`digitizationequipment` as Digitizationequipment
			,`media`.`format` as Format
			,`media`.`ispublic` as Ispublic
			,`media`.`ordername` as Ordername
			,`media`.`sent` as Sent
			,`media`.`exif` as Exif
			,`media`.`textual` as Textual
			,`media`.`sizemedia` as Sizemedia
			,`media`.`nameoriginal` as Nameoriginal
			,`media`.`mainmedia` as Mainmedia
			,`media`.`mediadir` as Mediadir
			,`media`.`thumbnaildir` as Thumbnaildir
			,`media`.`thumbnailurl` as Thumbnailurl
		from `media`";

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
		$sql = "select count(1) as counter from `media`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>