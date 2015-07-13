<?php
/** @package    Digital::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Itemdescription object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Digital::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ItemdescriptionReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `itemdescription` table
	public $CustomFieldExample;

	public $Id;
	public $Item;
	public $Abstracttext;
	public $Accrual;
	public $Appraisaldesstructionschedulling;
	public $Arrangement;
	public $Broadcastmethod;
	public $Era;
	public $Fromcorporate;
	public $Frompersonal;
	public $Geographiccoodnates;
	public $Geographicname;
	public $Label;
	public $Language;
	public $Mediapresentation;
	public $Movement;
	public $Other;
	public $Period;
	public $Periodicity;
	public $Preservationstatus;
	public $Scope;
	public $Style;
	public $Subject;
	public $Tableofcontents;
	public $Targetaudience;
	public $Tocorporate;
	public $Topersonal;

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
			,`itemdescription`.`id` as Id
			,`itemdescription`.`item` as Item
			,`itemdescription`.`abstracttext` as Abstracttext
			,`itemdescription`.`accrual` as Accrual
			,`itemdescription`.`appraisaldesstructionschedulling` as Appraisaldesstructionschedulling
			,`itemdescription`.`arrangement` as Arrangement
			,`itemdescription`.`broadcastmethod` as Broadcastmethod
			,`itemdescription`.`era` as Era
			,`itemdescription`.`fromcorporate` as Fromcorporate
			,`itemdescription`.`frompersonal` as Frompersonal
			,`itemdescription`.`geographiccoodnates` as Geographiccoodnates
			,`itemdescription`.`geographicname` as Geographicname
			,`itemdescription`.`label` as Label
			,`itemdescription`.`language` as Language
			,`itemdescription`.`mediapresentation` as Mediapresentation
			,`itemdescription`.`movement` as Movement
			,`itemdescription`.`other` as Other
			,`itemdescription`.`period` as Period
			,`itemdescription`.`periodicity` as Periodicity
			,`itemdescription`.`preservationstatus` as Preservationstatus
			,`itemdescription`.`scope` as Scope
			,`itemdescription`.`style` as Style
			,`itemdescription`.`subject` as Subject
			,`itemdescription`.`tableofcontents` as Tableofcontents
			,`itemdescription`.`targetaudience` as Targetaudience
			,`itemdescription`.`tocorporate` as Tocorporate
			,`itemdescription`.`topersonal` as Topersonal
		from `itemdescription`";

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
		$sql = "select count(1) as counter from `itemdescription`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>