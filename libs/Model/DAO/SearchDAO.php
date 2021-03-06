<?php
/** @package Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("SearchMap.php");

/**
 * SearchDAO provides object-oriented access to the search table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Digital::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class SearchDAO extends Phreezable
{
	/** @var int */
	public $Idsearch;

	/** @var int */
	public $User;

	/** @var string */
	public $Name;

	/** @var string */
	public $Info;

	/** @var int */
	public $Type;

	/** @var date */
	public $Datecreate;


	/**
	 * Returns the foreign object based on the value of User
	 * @return User
	 */
	public function GetUser()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_search_user1");
	}


}
?>