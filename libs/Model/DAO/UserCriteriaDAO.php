<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * UserCriteria allows custom querying for the User object.
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
class UserCriteriaDAO extends Criteria
{

	public $Iduser_Equals;
	public $Iduser_NotEquals;
	public $Iduser_IsLike;
	public $Iduser_IsNotLike;
	public $Iduser_BeginsWith;
	public $Iduser_EndsWith;
	public $Iduser_GreaterThan;
	public $Iduser_GreaterThanOrEqual;
	public $Iduser_LessThan;
	public $Iduser_LessThanOrEqual;
	public $Iduser_In;
	public $Iduser_IsNotEmpty;
	public $Iduser_IsEmpty;
	public $Iduser_BitwiseOr;
	public $Iduser_BitwiseAnd;
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
	public $Fullname_Equals;
	public $Fullname_NotEquals;
	public $Fullname_IsLike;
	public $Fullname_IsNotLike;
	public $Fullname_BeginsWith;
	public $Fullname_EndsWith;
	public $Fullname_GreaterThan;
	public $Fullname_GreaterThanOrEqual;
	public $Fullname_LessThan;
	public $Fullname_LessThanOrEqual;
	public $Fullname_In;
	public $Fullname_IsNotEmpty;
	public $Fullname_IsEmpty;
	public $Fullname_BitwiseOr;
	public $Fullname_BitwiseAnd;
	public $Username_Equals;
	public $Username_NotEquals;
	public $Username_IsLike;
	public $Username_IsNotLike;
	public $Username_BeginsWith;
	public $Username_EndsWith;
	public $Username_GreaterThan;
	public $Username_GreaterThanOrEqual;
	public $Username_LessThan;
	public $Username_LessThanOrEqual;
	public $Username_In;
	public $Username_IsNotEmpty;
	public $Username_IsEmpty;
	public $Username_BitwiseOr;
	public $Username_BitwiseAnd;
	public $Password_Equals;
	public $Password_NotEquals;
	public $Password_IsLike;
	public $Password_IsNotLike;
	public $Password_BeginsWith;
	public $Password_EndsWith;
	public $Password_GreaterThan;
	public $Password_GreaterThanOrEqual;
	public $Password_LessThan;
	public $Password_LessThanOrEqual;
	public $Password_In;
	public $Password_IsNotEmpty;
	public $Password_IsEmpty;
	public $Password_BitwiseOr;
	public $Password_BitwiseAnd;
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
	public $Code_Equals;
	public $Code_NotEquals;
	public $Code_IsLike;
	public $Code_IsNotLike;
	public $Code_BeginsWith;
	public $Code_EndsWith;
	public $Code_GreaterThan;
	public $Code_GreaterThanOrEqual;
	public $Code_LessThan;
	public $Code_LessThanOrEqual;
	public $Code_In;
	public $Code_IsNotEmpty;
	public $Code_IsEmpty;
	public $Code_BitwiseOr;
	public $Code_BitwiseAnd;
	public $Timezone_Equals;
	public $Timezone_NotEquals;
	public $Timezone_IsLike;
	public $Timezone_IsNotLike;
	public $Timezone_BeginsWith;
	public $Timezone_EndsWith;
	public $Timezone_GreaterThan;
	public $Timezone_GreaterThanOrEqual;
	public $Timezone_LessThan;
	public $Timezone_LessThanOrEqual;
	public $Timezone_In;
	public $Timezone_IsNotEmpty;
	public $Timezone_IsEmpty;
	public $Timezone_BitwiseOr;
	public $Timezone_BitwiseAnd;
	public $Lastlogin_Equals;
	public $Lastlogin_NotEquals;
	public $Lastlogin_IsLike;
	public $Lastlogin_IsNotLike;
	public $Lastlogin_BeginsWith;
	public $Lastlogin_EndsWith;
	public $Lastlogin_GreaterThan;
	public $Lastlogin_GreaterThanOrEqual;
	public $Lastlogin_LessThan;
	public $Lastlogin_LessThanOrEqual;
	public $Lastlogin_In;
	public $Lastlogin_IsNotEmpty;
	public $Lastlogin_IsEmpty;
	public $Lastlogin_BitwiseOr;
	public $Lastlogin_BitwiseAnd;
	public $Status_Equals;
	public $Status_NotEquals;
	public $Status_IsLike;
	public $Status_IsNotLike;
	public $Status_BeginsWith;
	public $Status_EndsWith;
	public $Status_GreaterThan;
	public $Status_GreaterThanOrEqual;
	public $Status_LessThan;
	public $Status_LessThanOrEqual;
	public $Status_In;
	public $Status_IsNotEmpty;
	public $Status_IsEmpty;
	public $Status_BitwiseOr;
	public $Status_BitwiseAnd;
	public $Admin_Equals;
	public $Admin_NotEquals;
	public $Admin_IsLike;
	public $Admin_IsNotLike;
	public $Admin_BeginsWith;
	public $Admin_EndsWith;
	public $Admin_GreaterThan;
	public $Admin_GreaterThanOrEqual;
	public $Admin_LessThan;
	public $Admin_LessThanOrEqual;
	public $Admin_In;
	public $Admin_IsNotEmpty;
	public $Admin_IsEmpty;
	public $Admin_BitwiseOr;
	public $Admin_BitwiseAnd;

}

?>