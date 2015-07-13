<?php
/** @package    Digital::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Storage object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Digital::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class StorageReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `storage` table
	public $CustomFieldExample;

	public $Idstorage;
	public $Host;
	public $Local;
	public $Username;
	public $Password;
	public $Folder;
	public $Urlftp;
	public $Urlhttp;
	public $Ipaddress;
	public $Full;
	public $Usedspace;
	public $Diskcapacity;
	public $Institution;
	public $Defaultstorage;
	public $Port;
	public $Status;

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
			,`storage`.`idstorage` as Idstorage
			,`storage`.`host` as Host
			,`storage`.`local` as Local
			,`storage`.`username` as Username
			,`storage`.`password` as Password
			,`storage`.`folder` as Folder
			,`storage`.`urlftp` as Urlftp
			,`storage`.`urlhttp` as Urlhttp
			,`storage`.`ipaddress` as Ipaddress
			,`storage`.`full` as Full
			,`storage`.`usedspace` as Usedspace
			,`storage`.`diskcapacity` as Diskcapacity
			,`storage`.`institution` as Institution
			,`storage`.`defaultstorage` as Defaultstorage
			,`storage`.`port` as Port
			,`storage`.`status` as Status
		from `storage`";

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
		$sql = "select count(1) as counter from `storage`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>