<?php
/** @package Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("InstitutionMediaMap.php");

/**
 * InstitutionMediaDAO provides object-oriented access to the institution_media table.  This
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
class InstitutionMediaDAO extends Phreezable
{
	/** @var int */
	public $Id;

	/** @var int */
	public $InstitutionIdinstitution;

	/** @var int */
	public $MediasIdmedia;


	/**
	 * Returns the foreign object based on the value of MediasIdmedia
	 * @return Media
	 */
	public function GetSMedia()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_institutionmedia_media");
	}

	/**
	 * Returns the foreign object based on the value of InstitutionIdinstitution
	 * @return Institution
	 */
	public function GetInstitution()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_institutionmedia_institution");
	}


}
?>