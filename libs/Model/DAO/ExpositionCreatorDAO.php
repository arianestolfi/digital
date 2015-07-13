<?php
/** @package Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("ExpositionCreatorMap.php");

/**
 * ExpositionCreatorDAO provides object-oriented access to the exposition_creator table.  This
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
class ExpositionCreatorDAO extends Phreezable
{
	/** @var int */
	public $Id;

	/** @var bit */
	public $Attributed;

	/** @var string */
	public $Location;

	/** @var string */
	public $Type;

	/** @var int */
	public $Creator;

	/** @var int */
	public $Exposition;


	/**
	 * Returns the foreign object based on the value of Exposition
	 * @return Exposition
	 */
	public function GetExposition()
	{
		return $this->_phreezer->GetManyToOne($this, "FK_kwh7ariugb0qjrwhpo3rai1uy");
	}

	/**
	 * Returns the foreign object based on the value of Creator
	 * @return Creator
	 */
	public function GetCreator()
	{
		return $this->_phreezer->GetManyToOne($this, "FK_rqs393faxa7qvmarkbh38rhay");
	}


}
?>