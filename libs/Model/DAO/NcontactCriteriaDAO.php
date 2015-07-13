<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * NcontactCriteria allows custom querying for the Ncontact object.
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
class NcontactCriteriaDAO extends Criteria
{

	public $Id_Equals;
	public $Id_NotEquals;
	public $Id_IsLike;
	public $Id_IsNotLike;
	public $Id_BeginsWith;
	public $Id_EndsWith;
	public $Id_GreaterThan;
	public $Id_GreaterThanOrEqual;
	public $Id_LessThan;
	public $Id_LessThanOrEqual;
	public $Id_In;
	public $Id_IsNotEmpty;
	public $Id_IsEmpty;
	public $Id_BitwiseOr;
	public $Id_BitwiseAnd;
	public $Call__Equals;
	public $Call__NotEquals;
	public $Call__IsLike;
	public $Call__IsNotLike;
	public $Call__BeginsWith;
	public $Call__EndsWith;
	public $Call__GreaterThan;
	public $Call__GreaterThanOrEqual;
	public $Call__LessThan;
	public $Call__LessThanOrEqual;
	public $Call__In;
	public $Call__IsNotEmpty;
	public $Call__IsEmpty;
	public $Call__BitwiseOr;
	public $Call__BitwiseAnd;
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
	public $CountyTaxcode_Equals;
	public $CountyTaxcode_NotEquals;
	public $CountyTaxcode_IsLike;
	public $CountyTaxcode_IsNotLike;
	public $CountyTaxcode_BeginsWith;
	public $CountyTaxcode_EndsWith;
	public $CountyTaxcode_GreaterThan;
	public $CountyTaxcode_GreaterThanOrEqual;
	public $CountyTaxcode_LessThan;
	public $CountyTaxcode_LessThanOrEqual;
	public $CountyTaxcode_In;
	public $CountyTaxcode_IsNotEmpty;
	public $CountyTaxcode_IsEmpty;
	public $CountyTaxcode_BitwiseOr;
	public $CountyTaxcode_BitwiseAnd;
	public $FederalTaxcode_Equals;
	public $FederalTaxcode_NotEquals;
	public $FederalTaxcode_IsLike;
	public $FederalTaxcode_IsNotLike;
	public $FederalTaxcode_BeginsWith;
	public $FederalTaxcode_EndsWith;
	public $FederalTaxcode_GreaterThan;
	public $FederalTaxcode_GreaterThanOrEqual;
	public $FederalTaxcode_LessThan;
	public $FederalTaxcode_LessThanOrEqual;
	public $FederalTaxcode_In;
	public $FederalTaxcode_IsNotEmpty;
	public $FederalTaxcode_IsEmpty;
	public $FederalTaxcode_BitwiseOr;
	public $FederalTaxcode_BitwiseAnd;
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
	public $StateTaxcode_Equals;
	public $StateTaxcode_NotEquals;
	public $StateTaxcode_IsLike;
	public $StateTaxcode_IsNotLike;
	public $StateTaxcode_BeginsWith;
	public $StateTaxcode_EndsWith;
	public $StateTaxcode_GreaterThan;
	public $StateTaxcode_GreaterThanOrEqual;
	public $StateTaxcode_LessThan;
	public $StateTaxcode_LessThanOrEqual;
	public $StateTaxcode_In;
	public $StateTaxcode_IsNotEmpty;
	public $StateTaxcode_IsEmpty;
	public $StateTaxcode_BitwiseOr;
	public $StateTaxcode_BitwiseAnd;
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

}

?>