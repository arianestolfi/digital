<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * PlaceLocationCriteria allows custom querying for the PlaceLocation object.
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
class PlaceLocationCriteriaDAO extends Criteria
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
	public $Complement_Equals;
	public $Complement_NotEquals;
	public $Complement_IsLike;
	public $Complement_IsNotLike;
	public $Complement_BeginsWith;
	public $Complement_EndsWith;
	public $Complement_GreaterThan;
	public $Complement_GreaterThanOrEqual;
	public $Complement_LessThan;
	public $Complement_LessThanOrEqual;
	public $Complement_In;
	public $Complement_IsNotEmpty;
	public $Complement_IsEmpty;
	public $Complement_BitwiseOr;
	public $Complement_BitwiseAnd;
	public $Latituded_Equals;
	public $Latituded_NotEquals;
	public $Latituded_IsLike;
	public $Latituded_IsNotLike;
	public $Latituded_BeginsWith;
	public $Latituded_EndsWith;
	public $Latituded_GreaterThan;
	public $Latituded_GreaterThanOrEqual;
	public $Latituded_LessThan;
	public $Latituded_LessThanOrEqual;
	public $Latituded_In;
	public $Latituded_IsNotEmpty;
	public $Latituded_IsEmpty;
	public $Latituded_BitwiseOr;
	public $Latituded_BitwiseAnd;
	public $Local_Equals;
	public $Local_NotEquals;
	public $Local_IsLike;
	public $Local_IsNotLike;
	public $Local_BeginsWith;
	public $Local_EndsWith;
	public $Local_GreaterThan;
	public $Local_GreaterThanOrEqual;
	public $Local_LessThan;
	public $Local_LessThanOrEqual;
	public $Local_In;
	public $Local_IsNotEmpty;
	public $Local_IsEmpty;
	public $Local_BitwiseOr;
	public $Local_BitwiseAnd;
	public $Longitude_Equals;
	public $Longitude_NotEquals;
	public $Longitude_IsLike;
	public $Longitude_IsNotLike;
	public $Longitude_BeginsWith;
	public $Longitude_EndsWith;
	public $Longitude_GreaterThan;
	public $Longitude_GreaterThanOrEqual;
	public $Longitude_LessThan;
	public $Longitude_LessThanOrEqual;
	public $Longitude_In;
	public $Longitude_IsNotEmpty;
	public $Longitude_IsEmpty;
	public $Longitude_BitwiseOr;
	public $Longitude_BitwiseAnd;
	public $Number_Equals;
	public $Number_NotEquals;
	public $Number_IsLike;
	public $Number_IsNotLike;
	public $Number_BeginsWith;
	public $Number_EndsWith;
	public $Number_GreaterThan;
	public $Number_GreaterThanOrEqual;
	public $Number_LessThan;
	public $Number_LessThanOrEqual;
	public $Number_In;
	public $Number_IsNotEmpty;
	public $Number_IsEmpty;
	public $Number_BitwiseOr;
	public $Number_BitwiseAnd;
	public $Otherinformation_Equals;
	public $Otherinformation_NotEquals;
	public $Otherinformation_IsLike;
	public $Otherinformation_IsNotLike;
	public $Otherinformation_BeginsWith;
	public $Otherinformation_EndsWith;
	public $Otherinformation_GreaterThan;
	public $Otherinformation_GreaterThanOrEqual;
	public $Otherinformation_LessThan;
	public $Otherinformation_LessThanOrEqual;
	public $Otherinformation_In;
	public $Otherinformation_IsNotEmpty;
	public $Otherinformation_IsEmpty;
	public $Otherinformation_BitwiseOr;
	public $Otherinformation_BitwiseAnd;
	public $Street_Equals;
	public $Street_NotEquals;
	public $Street_IsLike;
	public $Street_IsNotLike;
	public $Street_BeginsWith;
	public $Street_EndsWith;
	public $Street_GreaterThan;
	public $Street_GreaterThanOrEqual;
	public $Street_LessThan;
	public $Street_LessThanOrEqual;
	public $Street_In;
	public $Street_IsNotEmpty;
	public $Street_IsEmpty;
	public $Street_BitwiseOr;
	public $Street_BitwiseAnd;
	public $Type_Equals;
	public $Type_NotEquals;
	public $Type_IsLike;
	public $Type_IsNotLike;
	public $Type_BeginsWith;
	public $Type_EndsWith;
	public $Type_GreaterThan;
	public $Type_GreaterThanOrEqual;
	public $Type_LessThan;
	public $Type_LessThanOrEqual;
	public $Type_In;
	public $Type_IsNotEmpty;
	public $Type_IsEmpty;
	public $Type_BitwiseOr;
	public $Type_BitwiseAnd;
	public $Zipcode_Equals;
	public $Zipcode_NotEquals;
	public $Zipcode_IsLike;
	public $Zipcode_IsNotLike;
	public $Zipcode_BeginsWith;
	public $Zipcode_EndsWith;
	public $Zipcode_GreaterThan;
	public $Zipcode_GreaterThanOrEqual;
	public $Zipcode_LessThan;
	public $Zipcode_LessThanOrEqual;
	public $Zipcode_In;
	public $Zipcode_IsNotEmpty;
	public $Zipcode_IsEmpty;
	public $Zipcode_BitwiseOr;
	public $Zipcode_BitwiseAnd;
	public $City_Equals;
	public $City_NotEquals;
	public $City_IsLike;
	public $City_IsNotLike;
	public $City_BeginsWith;
	public $City_EndsWith;
	public $City_GreaterThan;
	public $City_GreaterThanOrEqual;
	public $City_LessThan;
	public $City_LessThanOrEqual;
	public $City_In;
	public $City_IsNotEmpty;
	public $City_IsEmpty;
	public $City_BitwiseOr;
	public $City_BitwiseAnd;
	public $Country_Equals;
	public $Country_NotEquals;
	public $Country_IsLike;
	public $Country_IsNotLike;
	public $Country_BeginsWith;
	public $Country_EndsWith;
	public $Country_GreaterThan;
	public $Country_GreaterThanOrEqual;
	public $Country_LessThan;
	public $Country_LessThanOrEqual;
	public $Country_In;
	public $Country_IsNotEmpty;
	public $Country_IsEmpty;
	public $Country_BitwiseOr;
	public $Country_BitwiseAnd;
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
	public $State_Equals;
	public $State_NotEquals;
	public $State_IsLike;
	public $State_IsNotLike;
	public $State_BeginsWith;
	public $State_EndsWith;
	public $State_GreaterThan;
	public $State_GreaterThanOrEqual;
	public $State_LessThan;
	public $State_LessThanOrEqual;
	public $State_In;
	public $State_IsNotEmpty;
	public $State_IsEmpty;
	public $State_BitwiseOr;
	public $State_BitwiseAnd;

}

?>