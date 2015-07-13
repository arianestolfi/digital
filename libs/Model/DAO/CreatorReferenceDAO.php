<?php
/** @package Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("CreatorReferenceMap.php");

/**
 * CreatorReferenceDAO provides object-oriented access to the creator_reference table.  This
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
class CreatorReferenceDAO extends Phreezable
{
	/** @var int */
	public $Id;

	/** @var string */
	public $Type;

	/** @var int */
	public $Creator;

	/** @var int */
	public $Reference;


	/**
	 * Returns the foreign object based on the value of Creator
	 * @return Creator
	 */
	public function GetCreator()
	{
		return $this->_phreezer->GetManyToOne($this, "FK_ly7e216u77lqiatnysrm1um6");
	}

	/**
	 * Returns the foreign object based on the value of Reference
	 * @return Nreference
	 */
	public function GetReferenceNreference()
	{
		return $this->_phreezer->GetManyToOne($this, "FK_r7ovmckudaqk0px6wtotfyy8c");
	}


}
?>