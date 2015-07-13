<?php
/** @package    Digital::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the PlaceLocation object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Digital::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PlaceLocationReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `place_location` table
	public $CustomFieldExample;

	public $Id;
	public $Complement;
	public $Latituded;
	public $Local;
	public $Longitude;
	public $Number;
	public $Otherinformation;
	public $Street;
	public $Type;
	public $Zipcode;
	public $City;
	public $Country;
	public $Institution;
	public $State;

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
			,`place_location`.`id` as Id
			,`place_location`.`complement` as Complement
			,`place_location`.`latituded` as Latituded
			,`place_location`.`local` as Local
			,`place_location`.`longitude` as Longitude
			,`place_location`.`number` as Number
			,`place_location`.`otherinformation` as Otherinformation
			,`place_location`.`street` as Street
			,`place_location`.`type` as Type
			,`place_location`.`zipcode` as Zipcode
			,`place_location`.`city` as City
			,`place_location`.`country` as Country
			,`place_location`.`institution` as Institution
			,`place_location`.`state` as State
		from `place_location`";

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
		$sql = "select count(1) as counter from `place_location`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>