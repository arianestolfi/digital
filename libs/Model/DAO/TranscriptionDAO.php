<?php
/** @package Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("TranscriptionMap.php");

/**
 * TranscriptionDAO provides object-oriented access to the transcription table.  This
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
class TranscriptionDAO extends Phreezable
{
	/** @var int */
	public $Idtranscription;

	/** @var int */
	public $Iditem;

	/** @var int */
	public $Idmedia;

	/** @var string */
	public $Transcription;

	/** @var string */
	public $Notes;

	/** @var string */
	public $Language;


	/**
	 * Returns the foreign object based on the value of Iditem
	 * @return Item
	 */
	public function GetIdItem()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_transcription_item1");
	}

	/**
	 * Returns the foreign object based on the value of Idmedia
	 * @return Media
	 */
	public function GetIdMedia()
	{
		return $this->_phreezer->GetManyToOne($this, "fk_transcription_media1");
	}


}
?>