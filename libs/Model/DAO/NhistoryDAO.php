<?php
/** @package Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("NhistoryMap.php");

/**
 * NhistoryDAO provides object-oriented access to the nhistory table.  This
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
class NhistoryDAO extends Phreezable
{
	/** @var int */
	public $Idhistory;

	/** @var string */
	public $Actor;

	/** @var float */
	public $Cost;

	/** @var string */
	public $Date;

	/** @var string */
	public $Description;

	/** @var bit */
	public $Ispublic;

	/** @var int */
	public $Institution;


	/**
	 * Returns a dataset of CreatorHistory objects with matching History
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetHistoryCreatorHistorys($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fk_creatorhistory", $criteria);
	}

	/**
	 * Returns a dataset of ExpositionHistory objects with matching History
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetHistoryExpositionHistorys($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "FK_sfxtpv6nypctjcamcjgov1etg", $criteria);
	}

	/**
	 * Returns the foreign object based on the value of Institution
	 * @return Institution
	 */
	public function GetInstitution()
	{
		return $this->_phreezer->GetManyToOne($this, "FK_19r8lwpjqv2j4hcqpjkwb1nsc");
	}


}
?>