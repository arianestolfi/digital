<?php
/** @package Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("AddressMap.php");

/**
 * AddressDAO provides object-oriented access to the address table.  This
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
class AddressDAO extends Phreezable
{
	/** @var int */
	public $Idaddress;

	/** @var int */
	public $City;

	/** @var int */
	public $Contact;

	/** @var string */
	public $Street;

	/** @var string */
	public $Number;

	/** @var string */
	public $Complement;

	/** @var string */
	public $Zipcode;

	/** @var string */
	public $Otherinformation;


	/**
	 * Returns the foreign object based on the value of Contact
	 * @return Contact
	 */
	public function GetContact()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_address_contact1");
	}

	/**
	 * Returns the foreign object based on the value of City
	 * @return City
	 */
	public function GetCity()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_adress_city");
	}


}
?>