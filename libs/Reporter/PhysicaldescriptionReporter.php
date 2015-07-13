<?php
/** @package    Digital::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Physicaldescription object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Digital::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PhysicaldescriptionReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `physicaldescription` table
	public $CustomFieldExample;

	public $Id;
	public $Item;
	public $Apexiso;
	public $Arabicpagenumbering;
	public $Asaiso;
	public $Boundtype;
	public $Color;
	public $Colorsystem;
	public $Columnnumber;
	public $Compressionmethod;
	public $Contentcolor;
	public $Contentextent;
	public $Contentfinishing;
	public $Contentsubstract;
	public $Contenttype;
	public $Covercolor;
	public $Coverfinishing;
	public $Coversubstract;
	public $Defaultapplication;
	public $Dustjacketcolor;
	public $Dustjacketfinishing;
	public $Dustjacketsubstract;
	public $Endpaper;
	public $Exif;
	public $Format;
	public $Framerate;
	public $Hasdustjacket;
	public $Hassound;
	public $Hasspecialfold;
	public $Iscompressed;
	public $Lengthtxt;
	public $Master;
	public $Media;
	public $Mediasupport;
	public $Movements;
	public $Other;
	public $Projectionmode;
	public $Romanpage;
	public $Sizetxt;
	public $Soundsystem;
	public $Specialfold;
	public $Specialpagenumebring;
	public $Technique;
	public $Timecode;
	public $Tinting;
	public $Titlepage;
	public $Totaltime;
	public $Type;
	public $Writingformat;

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
			,`physicaldescription`.`id` as Id
			,`physicaldescription`.`item` as Item
			,`physicaldescription`.`apexiso` as Apexiso
			,`physicaldescription`.`arabicpagenumbering` as Arabicpagenumbering
			,`physicaldescription`.`asaiso` as Asaiso
			,`physicaldescription`.`boundtype` as Boundtype
			,`physicaldescription`.`color` as Color
			,`physicaldescription`.`colorsystem` as Colorsystem
			,`physicaldescription`.`columnnumber` as Columnnumber
			,`physicaldescription`.`compressionmethod` as Compressionmethod
			,`physicaldescription`.`contentcolor` as Contentcolor
			,`physicaldescription`.`contentextent` as Contentextent
			,`physicaldescription`.`contentfinishing` as Contentfinishing
			,`physicaldescription`.`contentsubstract` as Contentsubstract
			,`physicaldescription`.`contenttype` as Contenttype
			,`physicaldescription`.`covercolor` as Covercolor
			,`physicaldescription`.`coverfinishing` as Coverfinishing
			,`physicaldescription`.`coversubstract` as Coversubstract
			,`physicaldescription`.`defaultapplication` as Defaultapplication
			,`physicaldescription`.`dustjacketcolor` as Dustjacketcolor
			,`physicaldescription`.`dustjacketfinishing` as Dustjacketfinishing
			,`physicaldescription`.`dustjacketsubstract` as Dustjacketsubstract
			,`physicaldescription`.`endpaper` as Endpaper
			,`physicaldescription`.`exif` as Exif
			,`physicaldescription`.`format` as Format
			,`physicaldescription`.`framerate` as Framerate
			,`physicaldescription`.`hasdustjacket` as Hasdustjacket
			,`physicaldescription`.`hassound` as Hassound
			,`physicaldescription`.`hasspecialfold` as Hasspecialfold
			,`physicaldescription`.`iscompressed` as Iscompressed
			,`physicaldescription`.`lengthtxt` as Lengthtxt
			,`physicaldescription`.`master` as Master
			,`physicaldescription`.`media` as Media
			,`physicaldescription`.`mediasupport` as Mediasupport
			,`physicaldescription`.`movements` as Movements
			,`physicaldescription`.`other` as Other
			,`physicaldescription`.`projectionmode` as Projectionmode
			,`physicaldescription`.`romanpage` as Romanpage
			,`physicaldescription`.`sizetxt` as Sizetxt
			,`physicaldescription`.`soundsystem` as Soundsystem
			,`physicaldescription`.`specialfold` as Specialfold
			,`physicaldescription`.`specialpagenumebring` as Specialpagenumebring
			,`physicaldescription`.`technique` as Technique
			,`physicaldescription`.`timecode` as Timecode
			,`physicaldescription`.`tinting` as Tinting
			,`physicaldescription`.`titlepage` as Titlepage
			,`physicaldescription`.`totaltime` as Totaltime
			,`physicaldescription`.`type` as Type
			,`physicaldescription`.`writingformat` as Writingformat
		from `physicaldescription`";

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
		$sql = "select count(1) as counter from `physicaldescription`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>