<?php
/** @package Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("PlaceLocationMap.php");

/**
 * PlaceLocationDAO provides object-oriented access to the place_location table.  This
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
class PlaceLocationDAO extends Phreezable
{
	/** @var int */
	public $Id;

	/** @var string */
	public $Complement;

	/** @var string */
	public $Latituded;

	/** @var string */
	public $Local;

	/** @var string */
	public $Longitude;

	/** @var string */
	public $Number;

	/** @var string */
	public $Otherinformation;

	/** @var string */
	public $Street;

	/** @var string */
	public $Type;

	/** @var string */
	public $Zipcode;

	/** @var int */
	public $City;

	/** @var int */
	public $Country;

	/** @var int */
	public $Institution;

	/** @var int */
	public $State;


	/**
	 * Returns a dataset of ExpositionPlacelocation objects with matching Placelocation
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetPlacelocationExpositionPlacelocations($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "FK_k75vo2tl0yd87up64gkti5kpf", $criteria);
	}

	/**
	 * Returns the foreign object based on the value of Institution
	 * @return Institution
	 */
	public function GetInstitution()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_placelocation_institution");
	}

	/**
	 * Returns the foreign object based on the value of Country
	 * @return Country
	 */
	public function GetCountry()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_placelocation_country");
	}

	/**
	 * Returns the foreign object based on the value of State
	 * @return State
	 */
	public function GetState()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_placelocation_state");
	}

	/**
	 * Returns the foreign object based on the value of City
	 * @return City
	 */
	public function GetCity()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_placelocation_city");
	}


}
?>