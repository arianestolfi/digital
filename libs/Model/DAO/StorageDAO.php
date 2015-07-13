<?php
/** @package Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("StorageMap.php");

/**
 * StorageDAO provides object-oriented access to the storage table.  This
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
class StorageDAO extends Phreezable
{
	/** @var int */
	public $Idstorage;

	/** @var string */
	public $Host;

	/** @var string */
	public $Local;

	/** @var string */
	public $Username;

	/** @var string */
	public $Password;

	/** @var string */
	public $Folder;

	/** @var string */
	public $Urlftp;

	/** @var string */
	public $Urlhttp;

	/** @var string */
	public $Ipaddress;

	/** @var bit */
	public $Full;

	/** @var int */
	public $Usedspace;

	/** @var int */
	public $Diskcapacity;

	/** @var int */
	public $Institution;

	/** @var bit */
	public $Defaultstorage;

	/** @var int */
	public $Port;

	/** @var int */
	public $Status;


	/**
	 * Returns a dataset of StorageMedia objects with matching StorageIdstorage
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetStorageMedias($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "FK_hrmsbocvkwn14rnyh8qj55dfc", $criteria);
	}


}
?>