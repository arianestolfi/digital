<?php
/** @package Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("InfobjectfondMap.php");

/**
 * InfobjectfondDAO provides object-oriented access to the infobjectfond table.  This
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
class InfobjectfondDAO extends Phreezable
{
	/** @var int */
	public $Id;

	/** @var int */
	public $Fond;

	/** @var int */
	public $Item;


	/**
	 * Returns the foreign object based on the value of Fond
	 * @return Fond
	 */
	public function GetFond()
	{
		return $this->_phreezer->GetManyToOne($this, "FK_fironk10lq67q4j0a3oue8ldg");
	}

	/**
	 * Returns the foreign object based on the value of Item
	 * @return Item
	 */
	public function GetItem()
	{
		return $this->_phreezer->GetManyToOne($this, "FK_k77kiqsk4fg0wh48h5adn2x67");
	}


}
?>