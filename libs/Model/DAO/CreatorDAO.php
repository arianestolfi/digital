<?php
/** @package Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("CreatorMap.php");

/**
 * CreatorDAO provides object-oriented access to the creator table.  This
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
class CreatorDAO extends Phreezable
{
	/** @var int */
	public $Idcreator;

	/** @var int */
	public $Institution;

	/** @var string */
	public $Type;

	/** @var string */
	public $Name;

	/** @var string */
	public $Notes;

	/** @var string */
	public $Birthdate;

	/** @var string */
	public $Deathdate;

	/** @var string */
	public $Nationality;

	/** @var string */
	public $Maincontact;


	/**
	 * Returns a dataset of Contact objects with matching Idcreator
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetIdContacts($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fk_contact_creator1", $criteria);
	}

	/**
	 * Returns a dataset of CreatorContact objects with matching Creator
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetCreatorContacts($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fk_creatorcontact_creator", $criteria);
	}

	/**
	 * Returns a dataset of CreatorHistory objects with matching Creator
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetCreatorHistorys($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "FK_kv28ykd90gnj9a3ika7vvbsib", $criteria);
	}

	/**
	 * Returns a dataset of CreatorReference objects with matching Creator
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetCreatorReferences($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "FK_ly7e216u77lqiatnysrm1um6", $criteria);
	}

	/**
	 * Returns a dataset of Creatorname objects with matching Creator
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetCreatornames($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fk_creatorname_creator", $criteria);
	}

	/**
	 * Returns a dataset of ExpositionCreator objects with matching Creator
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetExpositionCreators($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "FK_rqs393faxa7qvmarkbh38rhay", $criteria);
	}

	/**
	 * Returns a dataset of History objects with matching Creator
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetHistorys($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fk_history_creator", $criteria);
	}

	/**
	 * Returns a dataset of Itemcreator objects with matching Creator
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetItemcreators($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fk_document_has_creator_creator1", $criteria);
	}

	/**
	 * Returns a dataset of Reference objects with matching Creator
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetReferences($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fk_reference_creator", $criteria);
	}

	/**
	 * Returns the foreign object based on the value of Institution
	 * @return Institution
	 */
	public function GetInstitution()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_creator_institution1");
	}


}
?>