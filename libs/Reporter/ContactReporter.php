<?php
/** @package    Digital::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Contact object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Digital::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ContactReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `contact` table
	public $CustomFieldExample;

	public $Idcontact;
	public $Institution;
	public $Iditem;
	public $Idexposition;
	public $Idholder;
	public $Idcreator;
	public $User;
	public $Contactname;
	public $Urla;
	public $Contactcall;
	public $Company;
	public $Uri;
	public $Identity;
	public $Federaltaxcode;
	public $Statetaxcode;
	public $Countytaxcode;

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
			,`contact`.`idcontact` as Idcontact
			,`contact`.`institution` as Institution
			,`contact`.`iditem` as Iditem
			,`contact`.`idexposition` as Idexposition
			,`contact`.`idholder` as Idholder
			,`contact`.`idcreator` as Idcreator
			,`contact`.`user` as User
			,`contact`.`contactname` as Contactname
			,`contact`.`urla` as Urla
			,`contact`.`contactcall` as Contactcall
			,`contact`.`company` as Company
			,`contact`.`uri` as Uri
			,`contact`.`identity` as Identity
			,`contact`.`federaltaxcode` as Federaltaxcode
			,`contact`.`statetaxcode` as Statetaxcode
			,`contact`.`countytaxcode` as Countytaxcode
		from `contact`";

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
		$sql = "select count(1) as counter from `contact`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>