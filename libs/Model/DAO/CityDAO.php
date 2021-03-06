<?php
/** @package Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("CityMap.php");

/**
 * CityDAO provides object-oriented access to the city table.  This
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
class CityDAO extends Phreezable
{
	/** @var int */
	public $Idcity;

	/** @var int */
	public $State;

	/** @var int */
	public $Institution;

	/** @var bit */
	public $Citypublic;

	/** @var string */
	public $City;

	/** @var string */
	public $Citycode;


	/**
	 * Returns a dataset of Address objects with matching City
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetAddresss($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fk_adress_city", $criteria);
	}

	/**
	 * Returns a dataset of PlaceLocation objects with matching City
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetPlaceLocations($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fk_placelocation_city", $criteria);
	}

	/**
	 * Returns the foreign object based on the value of Institution
	 * @return Institution
	 */
	public function GetInstitution()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_city_institution1");
	}

	/**
	 * Returns the foreign object based on the value of State
	 * @return State
	 */
	public function GetState()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_city_state1");
	}


}
?>