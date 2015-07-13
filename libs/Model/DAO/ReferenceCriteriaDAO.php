<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * ReferenceCriteria allows custom querying for the Reference object.
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
class ReferenceCriteriaDAO extends Criteria
{

	public $Idreference_Equals;
	public $Idreference_NotEquals;
	public $Idreference_IsLike;
	public $Idreference_IsNotLike;
	public $Idreference_BeginsWith;
	public $Idreference_EndsWith;
	public $Idreference_GreaterThan;
	public $Idreference_GreaterThanOrEqual;
	public $Idreference_LessThan;
	public $Idreference_LessThanOrEqual;
	public $Idreference_In;
	public $Idreference_IsNotEmpty;
	public $Idreference_IsEmpty;
	public $Idreference_BitwiseOr;
	public $Idreference_BitwiseAnd;
	public $Item_Equals;
	public $Item_NotEquals;
	public $Item_IsLike;
	public $Item_IsNotLike;
	public $Item_BeginsWith;
	public $Item_EndsWith;
	public $Item_GreaterThan;
	public $Item_GreaterThanOrEqual;
	public $Item_LessThan;
	public $Item_LessThanOrEqual;
	public $Item_In;
	public $Item_IsNotEmpty;
	public $Item_IsEmpty;
	public $Item_BitwiseOr;
	public $Item_BitwiseAnd;
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
	public $Creator_Equals;
	public $Creator_NotEquals;
	public $Creator_IsLike;
	public $Creator_IsNotLike;
	public $Creator_BeginsWith;
	public $Creator_EndsWith;
	public $Creator_GreaterThan;
	public $Creator_GreaterThanOrEqual;
	public $Creator_LessThan;
	public $Creator_LessThanOrEqual;
	public $Creator_In;
	public $Creator_IsNotEmpty;
	public $Creator_IsEmpty;
	public $Creator_BitwiseOr;
	public $Creator_BitwiseAnd;
	public $Referencetype_Equals;
	public $Referencetype_NotEquals;
	public $Referencetype_IsLike;
	public $Referencetype_IsNotLike;
	public $Referencetype_BeginsWith;
	public $Referencetype_EndsWith;
	public $Referencetype_GreaterThan;
	public $Referencetype_GreaterThanOrEqual;
	public $Referencetype_LessThan;
	public $Referencetype_LessThanOrEqual;
	public $Referencetype_In;
	public $Referencetype_IsNotEmpty;
	public $Referencetype_IsEmpty;
	public $Referencetype_BitwiseOr;
	public $Referencetype_BitwiseAnd;
	public $Referencetitle_Equals;
	public $Referencetitle_NotEquals;
	public $Referencetitle_IsLike;
	public $Referencetitle_IsNotLike;
	public $Referencetitle_BeginsWith;
	public $Referencetitle_EndsWith;
	public $Referencetitle_GreaterThan;
	public $Referencetitle_GreaterThanOrEqual;
	public $Referencetitle_LessThan;
	public $Referencetitle_LessThanOrEqual;
	public $Referencetitle_In;
	public $Referencetitle_IsNotEmpty;
	public $Referencetitle_IsEmpty;
	public $Referencetitle_BitwiseOr;
	public $Referencetitle_BitwiseAnd;
	public $Referencedescription_Equals;
	public $Referencedescription_NotEquals;
	public $Referencedescription_IsLike;
	public $Referencedescription_IsNotLike;
	public $Referencedescription_BeginsWith;
	public $Referencedescription_EndsWith;
	public $Referencedescription_GreaterThan;
	public $Referencedescription_GreaterThanOrEqual;
	public $Referencedescription_LessThan;
	public $Referencedescription_LessThanOrEqual;
	public $Referencedescription_In;
	public $Referencedescription_IsNotEmpty;
	public $Referencedescription_IsEmpty;
	public $Referencedescription_BitwiseOr;
	public $Referencedescription_BitwiseAnd;
	public $Referenceauthor_Equals;
	public $Referenceauthor_NotEquals;
	public $Referenceauthor_IsLike;
	public $Referenceauthor_IsNotLike;
	public $Referenceauthor_BeginsWith;
	public $Referenceauthor_EndsWith;
	public $Referenceauthor_GreaterThan;
	public $Referenceauthor_GreaterThanOrEqual;
	public $Referenceauthor_LessThan;
	public $Referenceauthor_LessThanOrEqual;
	public $Referenceauthor_In;
	public $Referenceauthor_IsNotEmpty;
	public $Referenceauthor_IsEmpty;
	public $Referenceauthor_BitwiseOr;
	public $Referenceauthor_BitwiseAnd;
	public $Referencetext_Equals;
	public $Referencetext_NotEquals;
	public $Referencetext_IsLike;
	public $Referencetext_IsNotLike;
	public $Referencetext_BeginsWith;
	public $Referencetext_EndsWith;
	public $Referencetext_GreaterThan;
	public $Referencetext_GreaterThanOrEqual;
	public $Referencetext_LessThan;
	public $Referencetext_LessThanOrEqual;
	public $Referencetext_In;
	public $Referencetext_IsNotEmpty;
	public $Referencetext_IsEmpty;
	public $Referencetext_BitwiseOr;
	public $Referencetext_BitwiseAnd;
	public $Otherinformations_Equals;
	public $Otherinformations_NotEquals;
	public $Otherinformations_IsLike;
	public $Otherinformations_IsNotLike;
	public $Otherinformations_BeginsWith;
	public $Otherinformations_EndsWith;
	public $Otherinformations_GreaterThan;
	public $Otherinformations_GreaterThanOrEqual;
	public $Otherinformations_LessThan;
	public $Otherinformations_LessThanOrEqual;
	public $Otherinformations_In;
	public $Otherinformations_IsNotEmpty;
	public $Otherinformations_IsEmpty;
	public $Otherinformations_BitwiseOr;
	public $Otherinformations_BitwiseAnd;

}

?>