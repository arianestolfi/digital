<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * ContactCriteria allows custom querying for the Contact object.
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
class ContactCriteriaDAO extends Criteria
{

	public $Idcontact_Equals;
	public $Idcontact_NotEquals;
	public $Idcontact_IsLike;
	public $Idcontact_IsNotLike;
	public $Idcontact_BeginsWith;
	public $Idcontact_EndsWith;
	public $Idcontact_GreaterThan;
	public $Idcontact_GreaterThanOrEqual;
	public $Idcontact_LessThan;
	public $Idcontact_LessThanOrEqual;
	public $Idcontact_In;
	public $Idcontact_IsNotEmpty;
	public $Idcontact_IsEmpty;
	public $Idcontact_BitwiseOr;
	public $Idcontact_BitwiseAnd;
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
	public $Iditem_Equals;
	public $Iditem_NotEquals;
	public $Iditem_IsLike;
	public $Iditem_IsNotLike;
	public $Iditem_BeginsWith;
	public $Iditem_EndsWith;
	public $Iditem_GreaterThan;
	public $Iditem_GreaterThanOrEqual;
	public $Iditem_LessThan;
	public $Iditem_LessThanOrEqual;
	public $Iditem_In;
	public $Iditem_IsNotEmpty;
	public $Iditem_IsEmpty;
	public $Iditem_BitwiseOr;
	public $Iditem_BitwiseAnd;
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
	public $Idholder_Equals;
	public $Idholder_NotEquals;
	public $Idholder_IsLike;
	public $Idholder_IsNotLike;
	public $Idholder_BeginsWith;
	public $Idholder_EndsWith;
	public $Idholder_GreaterThan;
	public $Idholder_GreaterThanOrEqual;
	public $Idholder_LessThan;
	public $Idholder_LessThanOrEqual;
	public $Idholder_In;
	public $Idholder_IsNotEmpty;
	public $Idholder_IsEmpty;
	public $Idholder_BitwiseOr;
	public $Idholder_BitwiseAnd;
	public $Idcreator_Equals;
	public $Idcreator_NotEquals;
	public $Idcreator_IsLike;
	public $Idcreator_IsNotLike;
	public $Idcreator_BeginsWith;
	public $Idcreator_EndsWith;
	public $Idcreator_GreaterThan;
	public $Idcreator_GreaterThanOrEqual;
	public $Idcreator_LessThan;
	public $Idcreator_LessThanOrEqual;
	public $Idcreator_In;
	public $Idcreator_IsNotEmpty;
	public $Idcreator_IsEmpty;
	public $Idcreator_BitwiseOr;
	public $Idcreator_BitwiseAnd;
	public $User_Equals;
	public $User_NotEquals;
	public $User_IsLike;
	public $User_IsNotLike;
	public $User_BeginsWith;
	public $User_EndsWith;
	public $User_GreaterThan;
	public $User_GreaterThanOrEqual;
	public $User_LessThan;
	public $User_LessThanOrEqual;
	public $User_In;
	public $User_IsNotEmpty;
	public $User_IsEmpty;
	public $User_BitwiseOr;
	public $User_BitwiseAnd;
	public $Contactname_Equals;
	public $Contactname_NotEquals;
	public $Contactname_IsLike;
	public $Contactname_IsNotLike;
	public $Contactname_BeginsWith;
	public $Contactname_EndsWith;
	public $Contactname_GreaterThan;
	public $Contactname_GreaterThanOrEqual;
	public $Contactname_LessThan;
	public $Contactname_LessThanOrEqual;
	public $Contactname_In;
	public $Contactname_IsNotEmpty;
	public $Contactname_IsEmpty;
	public $Contactname_BitwiseOr;
	public $Contactname_BitwiseAnd;
	public $Urla_Equals;
	public $Urla_NotEquals;
	public $Urla_IsLike;
	public $Urla_IsNotLike;
	public $Urla_BeginsWith;
	public $Urla_EndsWith;
	public $Urla_GreaterThan;
	public $Urla_GreaterThanOrEqual;
	public $Urla_LessThan;
	public $Urla_LessThanOrEqual;
	public $Urla_In;
	public $Urla_IsNotEmpty;
	public $Urla_IsEmpty;
	public $Urla_BitwiseOr;
	public $Urla_BitwiseAnd;
	public $Contactcall_Equals;
	public $Contactcall_NotEquals;
	public $Contactcall_IsLike;
	public $Contactcall_IsNotLike;
	public $Contactcall_BeginsWith;
	public $Contactcall_EndsWith;
	public $Contactcall_GreaterThan;
	public $Contactcall_GreaterThanOrEqual;
	public $Contactcall_LessThan;
	public $Contactcall_LessThanOrEqual;
	public $Contactcall_In;
	public $Contactcall_IsNotEmpty;
	public $Contactcall_IsEmpty;
	public $Contactcall_BitwiseOr;
	public $Contactcall_BitwiseAnd;
	public $Company_Equals;
	public $Company_NotEquals;
	public $Company_IsLike;
	public $Company_IsNotLike;
	public $Company_BeginsWith;
	public $Company_EndsWith;
	public $Company_GreaterThan;
	public $Company_GreaterThanOrEqual;
	public $Company_LessThan;
	public $Company_LessThanOrEqual;
	public $Company_In;
	public $Company_IsNotEmpty;
	public $Company_IsEmpty;
	public $Company_BitwiseOr;
	public $Company_BitwiseAnd;
	public $Uri_Equals;
	public $Uri_NotEquals;
	public $Uri_IsLike;
	public $Uri_IsNotLike;
	public $Uri_BeginsWith;
	public $Uri_EndsWith;
	public $Uri_GreaterThan;
	public $Uri_GreaterThanOrEqual;
	public $Uri_LessThan;
	public $Uri_LessThanOrEqual;
	public $Uri_In;
	public $Uri_IsNotEmpty;
	public $Uri_IsEmpty;
	public $Uri_BitwiseOr;
	public $Uri_BitwiseAnd;
	public $Identity_Equals;
	public $Identity_NotEquals;
	public $Identity_IsLike;
	public $Identity_IsNotLike;
	public $Identity_BeginsWith;
	public $Identity_EndsWith;
	public $Identity_GreaterThan;
	public $Identity_GreaterThanOrEqual;
	public $Identity_LessThan;
	public $Identity_LessThanOrEqual;
	public $Identity_In;
	public $Identity_IsNotEmpty;
	public $Identity_IsEmpty;
	public $Identity_BitwiseOr;
	public $Identity_BitwiseAnd;
	public $Federaltaxcode_Equals;
	public $Federaltaxcode_NotEquals;
	public $Federaltaxcode_IsLike;
	public $Federaltaxcode_IsNotLike;
	public $Federaltaxcode_BeginsWith;
	public $Federaltaxcode_EndsWith;
	public $Federaltaxcode_GreaterThan;
	public $Federaltaxcode_GreaterThanOrEqual;
	public $Federaltaxcode_LessThan;
	public $Federaltaxcode_LessThanOrEqual;
	public $Federaltaxcode_In;
	public $Federaltaxcode_IsNotEmpty;
	public $Federaltaxcode_IsEmpty;
	public $Federaltaxcode_BitwiseOr;
	public $Federaltaxcode_BitwiseAnd;
	public $Statetaxcode_Equals;
	public $Statetaxcode_NotEquals;
	public $Statetaxcode_IsLike;
	public $Statetaxcode_IsNotLike;
	public $Statetaxcode_BeginsWith;
	public $Statetaxcode_EndsWith;
	public $Statetaxcode_GreaterThan;
	public $Statetaxcode_GreaterThanOrEqual;
	public $Statetaxcode_LessThan;
	public $Statetaxcode_LessThanOrEqual;
	public $Statetaxcode_In;
	public $Statetaxcode_IsNotEmpty;
	public $Statetaxcode_IsEmpty;
	public $Statetaxcode_BitwiseOr;
	public $Statetaxcode_BitwiseAnd;
	public $Countytaxcode_Equals;
	public $Countytaxcode_NotEquals;
	public $Countytaxcode_IsLike;
	public $Countytaxcode_IsNotLike;
	public $Countytaxcode_BeginsWith;
	public $Countytaxcode_EndsWith;
	public $Countytaxcode_GreaterThan;
	public $Countytaxcode_GreaterThanOrEqual;
	public $Countytaxcode_LessThan;
	public $Countytaxcode_LessThanOrEqual;
	public $Countytaxcode_In;
	public $Countytaxcode_IsNotEmpty;
	public $Countytaxcode_IsEmpty;
	public $Countytaxcode_BitwiseOr;
	public $Countytaxcode_BitwiseAnd;

}

?>