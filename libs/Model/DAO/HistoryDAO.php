<?php
/** @package Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("HistoryMap.php");

/**
 * HistoryDAO provides object-oriented access to the history table.  This
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
class HistoryDAO extends Phreezable
{
	/** @var int */
	public $Id;

	/** @var string */
	public $Type;

	/** @var string */
	public $Description;

	/** @var string */
	public $Date;

	/** @var string */
	public $Actor;

	/** @var int */
	public $Item;

	/** @var int */
	public $Institution;

	/** @var string */
	public $Idexposition;

	/** @var float */
	public $Cost;

	/** @var int */
	public $Creator;

	/** @var bit */
	public $Ispublic;


	/**
	 * Returns a dataset of HistoryMedia objects with matching HistoryIdhistory
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetHistoryMedias($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fk_historymedia_history", $criteria);
	}

	/**
	 * Returns the foreign object based on the value of Creator
	 * @return Creator
	 */
	public function GetCreator()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_history_creator");
	}

	/**
	 * Returns the foreign object based on the value of Institution
	 * @return Institution
	 */
	public function GetInstitution()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_history_institution1");
	}

	/**
	 * Returns the foreign object based on the value of Item
	 * @return Item
	 */
	public function GetItem()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_history_item1");
	}


}
?>