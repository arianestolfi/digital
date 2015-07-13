<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * ExpositionCriteria allows custom querying for the Exposition object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package Digital::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ExpositionCriteriaDAO extends Criteria
{

	public $Idexposition_Equals;
	public $Idexposition_NotEquals;
	public $Idexposition_IsLike;
	public $Idexposition_IsNotLike;
	public $Idexposition_BeginsWith;
	public $Idexposition_EndsWith;
	public $Idexposition_GreaterThan;
	public $Idexposition_GreaterThanOrEqual;
	public $Idexposition_LessThan;
	public $Idexposition_LessThanOrEqual;
	public $Idexposition_In;
	public $Idexposition_IsNotEmpty;
	public $Idexposition_IsEmpty;
	public $Idexposition_BitwiseOr;
	public $Idexposition_BitwiseAnd;
	public $Institution_Equals;
	public $Institution_NotEquals;
	public $Institution_IsLike;
	public $Institution_IsNotLike;
	public $Institution_BeginsWith;
	public $Institution_EndsWith;
	public $Institution_GreaterThan;
	public $Institution_GreaterThanOrEqual;
	public $Institution_LessThan;
	public $Institution_LessThanOrEqual;
	public $Institution_In;
	public $Institution_IsNotEmpty;
	public $Institution_IsEmpty;
	public $Institution_BitwiseOr;
	public $Institution_BitwiseAnd;
	public $Location_Equals;
	public $Location_NotEquals;
	public $Location_IsLike;
	public $Location_IsNotLike;
	public $Location_BeginsWith;
	public $Location_EndsWith;
	public $Location_GreaterThan;
	public $Location_GreaterThanOrEqual;
	public $Location_LessThan;
	public $Location_LessThanOrEqual;
	public $Location_In;
	public $Location_IsNotEmpty;
	public $Location_IsEmpty;
	public $Location_BitwiseOr;
	public $Location_BitwiseAnd;
	public $Curator_Equals;
	public $Curator_NotEquals;
	public $Curator_IsLike;
	public $Curator_IsNotLike;
	public $Curator_BeginsWith;
	public $Curator_EndsWith;
	public $Curator_GreaterThan;
	public $Curator_GreaterThanOrEqual;
	public $Curator_LessThan;
	public $Curator_LessThanOrEqual;
	public $Curator_In;
	public $Curator_IsNotEmpty;
	public $Curator_IsEmpty;
	public $Curator_BitwiseOr;
	public $Curator_BitwiseAnd;
	public $Initialdate_Equals;
	public $Initialdate_NotEquals;
	public $Initialdate_IsLike;
	public $Initialdate_IsNotLike;
	public $Initialdate_BeginsWith;
	public $Initialdate_EndsWith;
	public $Initialdate_GreaterThan;
	public $Initialdate_GreaterThanOrEqual;
	public $Initialdate_LessThan;
	public $Initialdate_LessThanOrEqual;
	public $Initialdate_In;
	public $Initialdate_IsNotEmpty;
	public $Initialdate_IsEmpty;
	public $Initialdate_BitwiseOr;
	public $Initialdate_BitwiseAnd;
	public $Enddate_Equals;
	public $Enddate_NotEquals;
	public $Enddate_IsLike;
	public $Enddate_IsNotLike;
	public $Enddate_BeginsWith;
	public $Enddate_EndsWith;
	public $Enddate_GreaterThan;
	public $Enddate_GreaterThanOrEqual;
	public $Enddate_LessThan;
	public $Enddate_LessThanOrEqual;
	public $Enddate_In;
	public $Enddate_IsNotEmpty;
	public $Enddate_IsEmpty;
	public $Enddate_BitwiseOr;
	public $Enddate_BitwiseAnd;
	public $Description_Equals;
	public $Description_NotEquals;
	public $Description_IsLike;
	public $Description_IsNotLike;
	public $Description_BeginsWith;
	public $Description_EndsWith;
	public $Description_GreaterThan;
	public $Description_GreaterThanOrEqual;
	public $Description_LessThan;
	public $Description_LessThanOrEqual;
	public $Description_In;
	public $Description_IsNotEmpty;
	public $Description_IsEmpty;
	public $Description_BitwiseOr;
	public $Description_BitwiseAnd;
	public $Notes_Equals;
	public $Notes_NotEquals;
	public $Notes_IsLike;
	public $Notes_IsNotLike;
	public $Notes_BeginsWith;
	public $Notes_EndsWith;
	public $Notes_GreaterThan;
	public $Notes_GreaterThanOrEqual;
	public $Notes_LessThan;
	public $Notes_LessThanOrEqual;
	public $Notes_In;
	public $Notes_IsNotEmpty;
	public $Notes_IsEmpty;
	public $Notes_BitwiseOr;
	public $Notes_BitwiseAnd;
	public $Name_Equals;
	public $Name_NotEquals;
	public $Name_IsLike;
	public $Name_IsNotLike;
	public $Name_BeginsWith;
	public $Name_EndsWith;
	public $Name_GreaterThan;
	public $Name_GreaterThanOrEqual;
	public $Name_LessThan;
	public $Name_LessThanOrEqual;
	public $Name_In;
	public $Name_IsNotEmpty;
	public $Name_IsEmpty;
	public $Name_BitwiseOr;
	public $Name_BitwiseAnd;
	public $Exposubtype_Equals;
	public $Exposubtype_NotEquals;
	public $Exposubtype_IsLike;
	public $Exposubtype_IsNotLike;
	public $Exposubtype_BeginsWith;
	public $Exposubtype_EndsWith;
	public $Exposubtype_GreaterThan;
	public $Exposubtype_GreaterThanOrEqual;
	public $Exposubtype_LessThan;
	public $Exposubtype_LessThanOrEqual;
	public $Exposubtype_In;
	public $Exposubtype_IsNotEmpty;
	public $Exposubtype_IsEmpty;
	public $Exposubtype_BitwiseOr;
	public $Exposubtype_BitwiseAnd;
	public $Expotype_Equals;
	public $Expotype_NotEquals;
	public $Expotype_IsLike;
	public $Expotype_IsNotLike;
	public $Expotype_BeginsWith;
	public $Expotype_EndsWith;
	public $Expotype_GreaterThan;
	public $Expotype_GreaterThanOrEqual;
	public $Expotype_LessThan;
	public $Expotype_LessThanOrEqual;
	public $Expotype_In;
	public $Expotype_IsNotEmpty;
	public $Expotype_IsEmpty;
	public $Expotype_BitwiseOr;
	public $Expotype_BitwiseAnd;
	public $Iscarriedbyotherinstitution_Equals;
	public $Iscarriedbyotherinstitution_NotEquals;
	public $Iscarriedbyotherinstitution_IsLike;
	public $Iscarriedbyotherinstitution_IsNotLike;
	public $Iscarriedbyotherinstitution_BeginsWith;
	public $Iscarriedbyotherinstitution_EndsWith;
	public $Iscarriedbyotherinstitution_GreaterThan;
	public $Iscarriedbyotherinstitution_GreaterThanOrEqual;
	public $Iscarriedbyotherinstitution_LessThan;
	public $Iscarriedbyotherinstitution_LessThanOrEqual;
	public $Iscarriedbyotherinstitution_In;
	public $Iscarriedbyotherinstitution_IsNotEmpty;
	public $Iscarriedbyotherinstitution_IsEmpty;
	public $Iscarriedbyotherinstitution_BitwiseOr;
	public $Iscarriedbyotherinstitution_BitwiseAnd;
	public $Isinternational_Equals;
	public $Isinternational_NotEquals;
	public $Isinternational_IsLike;
	public $Isinternational_IsNotLike;
	public $Isinternational_BeginsWith;
	public $Isinternational_EndsWith;
	public $Isinternational_GreaterThan;
	public $Isinternational_GreaterThanOrEqual;
	public $Isinternational_LessThan;
	public $Isinternational_LessThanOrEqual;
	public $Isinternational_In;
	public $Isinternational_IsNotEmpty;
	public $Isinternational_IsEmpty;
	public $Isinternational_BitwiseOr;
	public $Isinternational_BitwiseAnd;
	public $Otherinfo_Equals;
	public $Otherinfo_NotEquals;
	public $Otherinfo_IsLike;
	public $Otherinfo_IsNotLike;
	public $Otherinfo_BeginsWith;
	public $Otherinfo_EndsWith;
	public $Otherinfo_GreaterThan;
	public $Otherinfo_GreaterThanOrEqual;
	public $Otherinfo_LessThan;
	public $Otherinfo_LessThanOrEqual;
	public $Otherinfo_In;
	public $Otherinfo_IsNotEmpty;
	public $Otherinfo_IsEmpty;
	public $Otherinfo_BitwiseOr;
	public $Otherinfo_BitwiseAnd;

}

?>