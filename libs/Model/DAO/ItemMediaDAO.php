<?php
/** @package Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("ItemMediaMap.php");

/**
 * ItemMediaDAO provides object-oriented access to the item_media table.  This
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
class ItemMediaDAO extends Phreezable
{
	/** @var int */
	public $Id;

	/** @var int */
	public $ItemIditem;

	/** @var int */
	public $MediasIdmedia;


	/**
	 * Returns the foreign object based on the value of ItemIditem
	 * @return Item
	 */
	public function GetItem()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_itemmedia_item");
	}

	/**
	 * Returns the foreign object based on the value of MediasIdmedia
	 * @return Media
	 */
	public function GetSMedia()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_itemmedia_media");
	}


}
?>