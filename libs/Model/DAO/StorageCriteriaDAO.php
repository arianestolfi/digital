<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * StorageCriteria allows custom querying for the Storage object.
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
class StorageCriteriaDAO extends Criteria
{

	public $Idstorage_Equals;
	public $Idstorage_NotEquals;
	public $Idstorage_IsLike;
	public $Idstorage_IsNotLike;
	public $Idstorage_BeginsWith;
	public $Idstorage_EndsWith;
	public $Idstorage_GreaterThan;
	public $Idstorage_GreaterThanOrEqual;
	public $Idstorage_LessThan;
	public $Idstorage_LessThanOrEqual;
	public $Idstorage_In;
	public $Idstorage_IsNotEmpty;
	public $Idstorage_IsEmpty;
	public $Idstorage_BitwiseOr;
	public $Idstorage_BitwiseAnd;
	public $Host_Equals;
	public $Host_NotEquals;
	public $Host_IsLike;
	public $Host_IsNotLike;
	public $Host_BeginsWith;
	public $Host_EndsWith;
	public $Host_GreaterThan;
	public $Host_GreaterThanOrEqual;
	public $Host_LessThan;
	public $Host_LessThanOrEqual;
	public $Host_In;
	public $Host_IsNotEmpty;
	public $Host_IsEmpty;
	public $Host_BitwiseOr;
	public $Host_BitwiseAnd;
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
	public $Folder_Equals;
	public $Folder_NotEquals;
	public $Folder_IsLike;
	public $Folder_IsNotLike;
	public $Folder_BeginsWith;
	public $Folder_EndsWith;
	public $Folder_GreaterThan;
	public $Folder_GreaterThanOrEqual;
	public $Folder_LessThan;
	public $Folder_LessThanOrEqual;
	public $Folder_In;
	public $Folder_IsNotEmpty;
	public $Folder_IsEmpty;
	public $Folder_BitwiseOr;
	public $Folder_BitwiseAnd;
	public $Urlftp_Equals;
	public $Urlftp_NotEquals;
	public $Urlftp_IsLike;
	public $Urlftp_IsNotLike;
	public $Urlftp_BeginsWith;
	public $Urlftp_EndsWith;
	public $Urlftp_GreaterThan;
	public $Urlftp_GreaterThanOrEqual;
	public $Urlftp_LessThan;
	public $Urlftp_LessThanOrEqual;
	public $Urlftp_In;
	public $Urlftp_IsNotEmpty;
	public $Urlftp_IsEmpty;
	public $Urlftp_BitwiseOr;
	public $Urlftp_BitwiseAnd;
	public $Urlhttp_Equals;
	public $Urlhttp_NotEquals;
	public $Urlhttp_IsLike;
	public $Urlhttp_IsNotLike;
	public $Urlhttp_BeginsWith;
	public $Urlhttp_EndsWith;
	public $Urlhttp_GreaterThan;
	public $Urlhttp_GreaterThanOrEqual;
	public $Urlhttp_LessThan;
	public $Urlhttp_LessThanOrEqual;
	public $Urlhttp_In;
	public $Urlhttp_IsNotEmpty;
	public $Urlhttp_IsEmpty;
	public $Urlhttp_BitwiseOr;
	public $Urlhttp_BitwiseAnd;
	public $Ipaddress_Equals;
	public $Ipaddress_NotEquals;
	public $Ipaddress_IsLike;
	public $Ipaddress_IsNotLike;
	public $Ipaddress_BeginsWith;
	public $Ipaddress_EndsWith;
	public $Ipaddress_GreaterThan;
	public $Ipaddress_GreaterThanOrEqual;
	public $Ipaddress_LessThan;
	public $Ipaddress_LessThanOrEqual;
	public $Ipaddress_In;
	public $Ipaddress_IsNotEmpty;
	public $Ipaddress_IsEmpty;
	public $Ipaddress_BitwiseOr;
	public $Ipaddress_BitwiseAnd;
	public $Full_Equals;
	public $Full_NotEquals;
	public $Full_IsLike;
	public $Full_IsNotLike;
	public $Full_BeginsWith;
	public $Full_EndsWith;
	public $Full_GreaterThan;
	public $Full_GreaterThanOrEqual;
	public $Full_LessThan;
	public $Full_LessThanOrEqual;
	public $Full_In;
	public $Full_IsNotEmpty;
	public $Full_IsEmpty;
	public $Full_BitwiseOr;
	public $Full_BitwiseAnd;
	public $Usedspace_Equals;
	public $Usedspace_NotEquals;
	public $Usedspace_IsLike;
	public $Usedspace_IsNotLike;
	public $Usedspace_BeginsWith;
	public $Usedspace_EndsWith;
	public $Usedspace_GreaterThan;
	public $Usedspace_GreaterThanOrEqual;
	public $Usedspace_LessThan;
	public $Usedspace_LessThanOrEqual;
	public $Usedspace_In;
	public $Usedspace_IsNotEmpty;
	public $Usedspace_IsEmpty;
	public $Usedspace_BitwiseOr;
	public $Usedspace_BitwiseAnd;
	public $Diskcapacity_Equals;
	public $Diskcapacity_NotEquals;
	public $Diskcapacity_IsLike;
	public $Diskcapacity_IsNotLike;
	public $Diskcapacity_BeginsWith;
	public $Diskcapacity_EndsWith;
	public $Diskcapacity_GreaterThan;
	public $Diskcapacity_GreaterThanOrEqual;
	public $Diskcapacity_LessThan;
	public $Diskcapacity_LessThanOrEqual;
	public $Diskcapacity_In;
	public $Diskcapacity_IsNotEmpty;
	public $Diskcapacity_IsEmpty;
	public $Diskcapacity_BitwiseOr;
	public $Diskcapacity_BitwiseAnd;
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
	public $Defaultstorage_Equals;
	public $Defaultstorage_NotEquals;
	public $Defaultstorage_IsLike;
	public $Defaultstorage_IsNotLike;
	public $Defaultstorage_BeginsWith;
	public $Defaultstorage_EndsWith;
	public $Defaultstorage_GreaterThan;
	public $Defaultstorage_GreaterThanOrEqual;
	public $Defaultstorage_LessThan;
	public $Defaultstorage_LessThanOrEqual;
	public $Defaultstorage_In;
	public $Defaultstorage_IsNotEmpty;
	public $Defaultstorage_IsEmpty;
	public $Defaultstorage_BitwiseOr;
	public $Defaultstorage_BitwiseAnd;
	public $Port_Equals;
	public $Port_NotEquals;
	public $Port_IsLike;
	public $Port_IsNotLike;
	public $Port_BeginsWith;
	public $Port_EndsWith;
	public $Port_GreaterThan;
	public $Port_GreaterThanOrEqual;
	public $Port_LessThan;
	public $Port_LessThanOrEqual;
	public $Port_In;
	public $Port_IsNotEmpty;
	public $Port_IsEmpty;
	public $Port_BitwiseOr;
	public $Port_BitwiseAnd;
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

}

?>