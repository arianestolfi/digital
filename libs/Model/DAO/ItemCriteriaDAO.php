<?php
/** @package    Digital::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * ItemCriteria allows custom querying for the Item object.
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
class ItemCriteriaDAO extends Criteria
{

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
	public $Holder_Equals;
	public $Holder_NotEquals;
	public $Holder_IsLike;
	public $Holder_IsNotLike;
	public $Holder_BeginsWith;
	public $Holder_EndsWith;
	public $Holder_GreaterThan;
	public $Holder_GreaterThanOrEqual;
	public $Holder_LessThan;
	public $Holder_LessThanOrEqual;
	public $Holder_In;
	public $Holder_IsNotEmpty;
	public $Holder_IsEmpty;
	public $Holder_BitwiseOr;
	public $Holder_BitwiseAnd;
	public $Level_Equals;
	public $Level_NotEquals;
	public $Level_IsLike;
	public $Level_IsNotLike;
	public $Level_BeginsWith;
	public $Level_EndsWith;
	public $Level_GreaterThan;
	public $Level_GreaterThanOrEqual;
	public $Level_LessThan;
	public $Level_LessThanOrEqual;
	public $Level_In;
	public $Level_IsNotEmpty;
	public $Level_IsEmpty;
	public $Level_BitwiseOr;
	public $Level_BitwiseAnd;
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
	public $Inventoryid_Equals;
	public $Inventoryid_NotEquals;
	public $Inventoryid_IsLike;
	public $Inventoryid_IsNotLike;
	public $Inventoryid_BeginsWith;
	public $Inventoryid_EndsWith;
	public $Inventoryid_GreaterThan;
	public $Inventoryid_GreaterThanOrEqual;
	public $Inventoryid_LessThan;
	public $Inventoryid_LessThanOrEqual;
	public $Inventoryid_In;
	public $Inventoryid_IsNotEmpty;
	public $Inventoryid_IsEmpty;
	public $Inventoryid_BitwiseOr;
	public $Inventoryid_BitwiseAnd;
	public $Uritype_Equals;
	public $Uritype_NotEquals;
	public $Uritype_IsLike;
	public $Uritype_IsNotLike;
	public $Uritype_BeginsWith;
	public $Uritype_EndsWith;
	public $Uritype_GreaterThan;
	public $Uritype_GreaterThanOrEqual;
	public $Uritype_LessThan;
	public $Uritype_LessThanOrEqual;
	public $Uritype_In;
	public $Uritype_IsNotEmpty;
	public $Uritype_IsEmpty;
	public $Uritype_BitwiseOr;
	public $Uritype_BitwiseAnd;
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
	public $Keywords_Equals;
	public $Keywords_NotEquals;
	public $Keywords_IsLike;
	public $Keywords_IsNotLike;
	public $Keywords_BeginsWith;
	public $Keywords_EndsWith;
	public $Keywords_GreaterThan;
	public $Keywords_GreaterThanOrEqual;
	public $Keywords_LessThan;
	public $Keywords_LessThanOrEqual;
	public $Keywords_In;
	public $Keywords_IsNotEmpty;
	public $Keywords_IsEmpty;
	public $Keywords_BitwiseOr;
	public $Keywords_BitwiseAnd;
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
	public $Uidtype_Equals;
	public $Uidtype_NotEquals;
	public $Uidtype_IsLike;
	public $Uidtype_IsNotLike;
	public $Uidtype_BeginsWith;
	public $Uidtype_EndsWith;
	public $Uidtype_GreaterThan;
	public $Uidtype_GreaterThanOrEqual;
	public $Uidtype_LessThan;
	public $Uidtype_LessThanOrEqual;
	public $Uidtype_In;
	public $Uidtype_IsNotEmpty;
	public $Uidtype_IsEmpty;
	public $Uidtype_BitwiseOr;
	public $Uidtype_BitwiseAnd;
	public $Uid_Equals;
	public $Uid_NotEquals;
	public $Uid_IsLike;
	public $Uid_IsNotLike;
	public $Uid_BeginsWith;
	public $Uid_EndsWith;
	public $Uid_GreaterThan;
	public $Uid_GreaterThanOrEqual;
	public $Uid_LessThan;
	public $Uid_LessThanOrEqual;
	public $Uid_In;
	public $Uid_IsNotEmpty;
	public $Uid_IsEmpty;
	public $Uid_BitwiseOr;
	public $Uid_BitwiseAnd;
	public $Class_Equals;
	public $Class_NotEquals;
	public $Class_IsLike;
	public $Class_IsNotLike;
	public $Class_BeginsWith;
	public $Class_EndsWith;
	public $Class_GreaterThan;
	public $Class_GreaterThanOrEqual;
	public $Class_LessThan;
	public $Class_LessThanOrEqual;
	public $Class_In;
	public $Class_IsNotEmpty;
	public $Class_IsEmpty;
	public $Class_BitwiseOr;
	public $Class_BitwiseAnd;
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
	public $Iseletronic_Equals;
	public $Iseletronic_NotEquals;
	public $Iseletronic_IsLike;
	public $Iseletronic_IsNotLike;
	public $Iseletronic_BeginsWith;
	public $Iseletronic_EndsWith;
	public $Iseletronic_GreaterThan;
	public $Iseletronic_GreaterThanOrEqual;
	public $Iseletronic_LessThan;
	public $Iseletronic_LessThanOrEqual;
	public $Iseletronic_In;
	public $Iseletronic_IsNotEmpty;
	public $Iseletronic_IsEmpty;
	public $Iseletronic_BitwiseOr;
	public $Iseletronic_BitwiseAnd;
	public $Creationdate_Equals;
	public $Creationdate_NotEquals;
	public $Creationdate_IsLike;
	public $Creationdate_IsNotLike;
	public $Creationdate_BeginsWith;
	public $Creationdate_EndsWith;
	public $Creationdate_GreaterThan;
	public $Creationdate_GreaterThanOrEqual;
	public $Creationdate_LessThan;
	public $Creationdate_LessThanOrEqual;
	public $Creationdate_In;
	public $Creationdate_IsNotEmpty;
	public $Creationdate_IsEmpty;
	public $Creationdate_BitwiseOr;
	public $Creationdate_BitwiseAnd;
	public $Acquisitiondate_Equals;
	public $Acquisitiondate_NotEquals;
	public $Acquisitiondate_IsLike;
	public $Acquisitiondate_IsNotLike;
	public $Acquisitiondate_BeginsWith;
	public $Acquisitiondate_EndsWith;
	public $Acquisitiondate_GreaterThan;
	public $Acquisitiondate_GreaterThanOrEqual;
	public $Acquisitiondate_LessThan;
	public $Acquisitiondate_LessThanOrEqual;
	public $Acquisitiondate_In;
	public $Acquisitiondate_IsNotEmpty;
	public $Acquisitiondate_IsEmpty;
	public $Acquisitiondate_BitwiseOr;
	public $Acquisitiondate_BitwiseAnd;
	public $Scopecontent_Equals;
	public $Scopecontent_NotEquals;
	public $Scopecontent_IsLike;
	public $Scopecontent_IsNotLike;
	public $Scopecontent_BeginsWith;
	public $Scopecontent_EndsWith;
	public $Scopecontent_GreaterThan;
	public $Scopecontent_GreaterThanOrEqual;
	public $Scopecontent_LessThan;
	public $Scopecontent_LessThanOrEqual;
	public $Scopecontent_In;
	public $Scopecontent_IsNotEmpty;
	public $Scopecontent_IsEmpty;
	public $Scopecontent_BitwiseOr;
	public $Scopecontent_BitwiseAnd;
	public $Originalexistence_Equals;
	public $Originalexistence_NotEquals;
	public $Originalexistence_IsLike;
	public $Originalexistence_IsNotLike;
	public $Originalexistence_BeginsWith;
	public $Originalexistence_EndsWith;
	public $Originalexistence_GreaterThan;
	public $Originalexistence_GreaterThanOrEqual;
	public $Originalexistence_LessThan;
	public $Originalexistence_LessThanOrEqual;
	public $Originalexistence_In;
	public $Originalexistence_IsNotEmpty;
	public $Originalexistence_IsEmpty;
	public $Originalexistence_BitwiseOr;
	public $Originalexistence_BitwiseAnd;
	public $Originallocation_Equals;
	public $Originallocation_NotEquals;
	public $Originallocation_IsLike;
	public $Originallocation_IsNotLike;
	public $Originallocation_BeginsWith;
	public $Originallocation_EndsWith;
	public $Originallocation_GreaterThan;
	public $Originallocation_GreaterThanOrEqual;
	public $Originallocation_LessThan;
	public $Originallocation_LessThanOrEqual;
	public $Originallocation_In;
	public $Originallocation_IsNotEmpty;
	public $Originallocation_IsEmpty;
	public $Originallocation_BitwiseOr;
	public $Originallocation_BitwiseAnd;
	public $Repositorycode_Equals;
	public $Repositorycode_NotEquals;
	public $Repositorycode_IsLike;
	public $Repositorycode_IsNotLike;
	public $Repositorycode_BeginsWith;
	public $Repositorycode_EndsWith;
	public $Repositorycode_GreaterThan;
	public $Repositorycode_GreaterThanOrEqual;
	public $Repositorycode_LessThan;
	public $Repositorycode_LessThanOrEqual;
	public $Repositorycode_In;
	public $Repositorycode_IsNotEmpty;
	public $Repositorycode_IsEmpty;
	public $Repositorycode_BitwiseOr;
	public $Repositorycode_BitwiseAnd;
	public $Copyexistence_Equals;
	public $Copyexistence_NotEquals;
	public $Copyexistence_IsLike;
	public $Copyexistence_IsNotLike;
	public $Copyexistence_BeginsWith;
	public $Copyexistence_EndsWith;
	public $Copyexistence_GreaterThan;
	public $Copyexistence_GreaterThanOrEqual;
	public $Copyexistence_LessThan;
	public $Copyexistence_LessThanOrEqual;
	public $Copyexistence_In;
	public $Copyexistence_IsNotEmpty;
	public $Copyexistence_IsEmpty;
	public $Copyexistence_BitwiseOr;
	public $Copyexistence_BitwiseAnd;
	public $Copylocation_Equals;
	public $Copylocation_NotEquals;
	public $Copylocation_IsLike;
	public $Copylocation_IsNotLike;
	public $Copylocation_BeginsWith;
	public $Copylocation_EndsWith;
	public $Copylocation_GreaterThan;
	public $Copylocation_GreaterThanOrEqual;
	public $Copylocation_LessThan;
	public $Copylocation_LessThanOrEqual;
	public $Copylocation_In;
	public $Copylocation_IsNotEmpty;
	public $Copylocation_IsEmpty;
	public $Copylocation_BitwiseOr;
	public $Copylocation_BitwiseAnd;
	public $Legalaccess_Equals;
	public $Legalaccess_NotEquals;
	public $Legalaccess_IsLike;
	public $Legalaccess_IsNotLike;
	public $Legalaccess_BeginsWith;
	public $Legalaccess_EndsWith;
	public $Legalaccess_GreaterThan;
	public $Legalaccess_GreaterThanOrEqual;
	public $Legalaccess_LessThan;
	public $Legalaccess_LessThanOrEqual;
	public $Legalaccess_In;
	public $Legalaccess_IsNotEmpty;
	public $Legalaccess_IsEmpty;
	public $Legalaccess_BitwiseOr;
	public $Legalaccess_BitwiseAnd;
	public $Accesscondition_Equals;
	public $Accesscondition_NotEquals;
	public $Accesscondition_IsLike;
	public $Accesscondition_IsNotLike;
	public $Accesscondition_BeginsWith;
	public $Accesscondition_EndsWith;
	public $Accesscondition_GreaterThan;
	public $Accesscondition_GreaterThanOrEqual;
	public $Accesscondition_LessThan;
	public $Accesscondition_LessThanOrEqual;
	public $Accesscondition_In;
	public $Accesscondition_IsNotEmpty;
	public $Accesscondition_IsEmpty;
	public $Accesscondition_BitwiseOr;
	public $Accesscondition_BitwiseAnd;
	public $Reproductionrights_Equals;
	public $Reproductionrights_NotEquals;
	public $Reproductionrights_IsLike;
	public $Reproductionrights_IsNotLike;
	public $Reproductionrights_BeginsWith;
	public $Reproductionrights_EndsWith;
	public $Reproductionrights_GreaterThan;
	public $Reproductionrights_GreaterThanOrEqual;
	public $Reproductionrights_LessThan;
	public $Reproductionrights_LessThanOrEqual;
	public $Reproductionrights_In;
	public $Reproductionrights_IsNotEmpty;
	public $Reproductionrights_IsEmpty;
	public $Reproductionrights_BitwiseOr;
	public $Reproductionrights_BitwiseAnd;
	public $Reproductionrightsdescription_Equals;
	public $Reproductionrightsdescription_NotEquals;
	public $Reproductionrightsdescription_IsLike;
	public $Reproductionrightsdescription_IsNotLike;
	public $Reproductionrightsdescription_BeginsWith;
	public $Reproductionrightsdescription_EndsWith;
	public $Reproductionrightsdescription_GreaterThan;
	public $Reproductionrightsdescription_GreaterThanOrEqual;
	public $Reproductionrightsdescription_LessThan;
	public $Reproductionrightsdescription_LessThanOrEqual;
	public $Reproductionrightsdescription_In;
	public $Reproductionrightsdescription_IsNotEmpty;
	public $Reproductionrightsdescription_IsEmpty;
	public $Reproductionrightsdescription_BitwiseOr;
	public $Reproductionrightsdescription_BitwiseAnd;
	public $Itemdate_Equals;
	public $Itemdate_NotEquals;
	public $Itemdate_IsLike;
	public $Itemdate_IsNotLike;
	public $Itemdate_BeginsWith;
	public $Itemdate_EndsWith;
	public $Itemdate_GreaterThan;
	public $Itemdate_GreaterThanOrEqual;
	public $Itemdate_LessThan;
	public $Itemdate_LessThanOrEqual;
	public $Itemdate_In;
	public $Itemdate_IsNotEmpty;
	public $Itemdate_IsEmpty;
	public $Itemdate_BitwiseOr;
	public $Itemdate_BitwiseAnd;
	public $Publishdate_Equals;
	public $Publishdate_NotEquals;
	public $Publishdate_IsLike;
	public $Publishdate_IsNotLike;
	public $Publishdate_BeginsWith;
	public $Publishdate_EndsWith;
	public $Publishdate_GreaterThan;
	public $Publishdate_GreaterThanOrEqual;
	public $Publishdate_LessThan;
	public $Publishdate_LessThanOrEqual;
	public $Publishdate_In;
	public $Publishdate_IsNotEmpty;
	public $Publishdate_IsEmpty;
	public $Publishdate_BitwiseOr;
	public $Publishdate_BitwiseAnd;
	public $Publisher_Equals;
	public $Publisher_NotEquals;
	public $Publisher_IsLike;
	public $Publisher_IsNotLike;
	public $Publisher_BeginsWith;
	public $Publisher_EndsWith;
	public $Publisher_GreaterThan;
	public $Publisher_GreaterThanOrEqual;
	public $Publisher_LessThan;
	public $Publisher_LessThanOrEqual;
	public $Publisher_In;
	public $Publisher_IsNotEmpty;
	public $Publisher_IsEmpty;
	public $Publisher_BitwiseOr;
	public $Publisher_BitwiseAnd;
	public $Itematributes_Equals;
	public $Itematributes_NotEquals;
	public $Itematributes_IsLike;
	public $Itematributes_IsNotLike;
	public $Itematributes_BeginsWith;
	public $Itematributes_EndsWith;
	public $Itematributes_GreaterThan;
	public $Itematributes_GreaterThanOrEqual;
	public $Itematributes_LessThan;
	public $Itematributes_LessThanOrEqual;
	public $Itematributes_In;
	public $Itematributes_IsNotEmpty;
	public $Itematributes_IsEmpty;
	public $Itematributes_BitwiseOr;
	public $Itematributes_BitwiseAnd;
	public $Ispublic_Equals;
	public $Ispublic_NotEquals;
	public $Ispublic_IsLike;
	public $Ispublic_IsNotLike;
	public $Ispublic_BeginsWith;
	public $Ispublic_EndsWith;
	public $Ispublic_GreaterThan;
	public $Ispublic_GreaterThanOrEqual;
	public $Ispublic_LessThan;
	public $Ispublic_LessThanOrEqual;
	public $Ispublic_In;
	public $Ispublic_IsNotEmpty;
	public $Ispublic_IsEmpty;
	public $Ispublic_BitwiseOr;
	public $Ispublic_BitwiseAnd;
	public $Preliminaryrule_Equals;
	public $Preliminaryrule_NotEquals;
	public $Preliminaryrule_IsLike;
	public $Preliminaryrule_IsNotLike;
	public $Preliminaryrule_BeginsWith;
	public $Preliminaryrule_EndsWith;
	public $Preliminaryrule_GreaterThan;
	public $Preliminaryrule_GreaterThanOrEqual;
	public $Preliminaryrule_LessThan;
	public $Preliminaryrule_LessThanOrEqual;
	public $Preliminaryrule_In;
	public $Preliminaryrule_IsNotEmpty;
	public $Preliminaryrule_IsEmpty;
	public $Preliminaryrule_BitwiseOr;
	public $Preliminaryrule_BitwiseAnd;
	public $Punctuation_Equals;
	public $Punctuation_NotEquals;
	public $Punctuation_IsLike;
	public $Punctuation_IsNotLike;
	public $Punctuation_BeginsWith;
	public $Punctuation_EndsWith;
	public $Punctuation_GreaterThan;
	public $Punctuation_GreaterThanOrEqual;
	public $Punctuation_LessThan;
	public $Punctuation_LessThanOrEqual;
	public $Punctuation_In;
	public $Punctuation_IsNotEmpty;
	public $Punctuation_IsEmpty;
	public $Punctuation_BitwiseOr;
	public $Punctuation_BitwiseAnd;
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
	public $Idfather_Equals;
	public $Idfather_NotEquals;
	public $Idfather_IsLike;
	public $Idfather_IsNotLike;
	public $Idfather_BeginsWith;
	public $Idfather_EndsWith;
	public $Idfather_GreaterThan;
	public $Idfather_GreaterThanOrEqual;
	public $Idfather_LessThan;
	public $Idfather_LessThanOrEqual;
	public $Idfather_In;
	public $Idfather_IsNotEmpty;
	public $Idfather_IsEmpty;
	public $Idfather_BitwiseOr;
	public $Idfather_BitwiseAnd;
	public $Titledefault_Equals;
	public $Titledefault_NotEquals;
	public $Titledefault_IsLike;
	public $Titledefault_IsNotLike;
	public $Titledefault_BeginsWith;
	public $Titledefault_EndsWith;
	public $Titledefault_GreaterThan;
	public $Titledefault_GreaterThanOrEqual;
	public $Titledefault_LessThan;
	public $Titledefault_LessThanOrEqual;
	public $Titledefault_In;
	public $Titledefault_IsNotEmpty;
	public $Titledefault_IsEmpty;
	public $Titledefault_BitwiseOr;
	public $Titledefault_BitwiseAnd;
	public $Subitem_Equals;
	public $Subitem_NotEquals;
	public $Subitem_IsLike;
	public $Subitem_IsNotLike;
	public $Subitem_BeginsWith;
	public $Subitem_EndsWith;
	public $Subitem_GreaterThan;
	public $Subitem_GreaterThanOrEqual;
	public $Subitem_LessThan;
	public $Subitem_LessThanOrEqual;
	public $Subitem_In;
	public $Subitem_IsNotEmpty;
	public $Subitem_IsEmpty;
	public $Subitem_BitwiseOr;
	public $Subitem_BitwiseAnd;
	public $Deletecomfirm_Equals;
	public $Deletecomfirm_NotEquals;
	public $Deletecomfirm_IsLike;
	public $Deletecomfirm_IsNotLike;
	public $Deletecomfirm_BeginsWith;
	public $Deletecomfirm_EndsWith;
	public $Deletecomfirm_GreaterThan;
	public $Deletecomfirm_GreaterThanOrEqual;
	public $Deletecomfirm_LessThan;
	public $Deletecomfirm_LessThanOrEqual;
	public $Deletecomfirm_In;
	public $Deletecomfirm_IsNotEmpty;
	public $Deletecomfirm_IsEmpty;
	public $Deletecomfirm_BitwiseOr;
	public $Deletecomfirm_BitwiseAnd;
	public $Typeitem_Equals;
	public $Typeitem_NotEquals;
	public $Typeitem_IsLike;
	public $Typeitem_IsNotLike;
	public $Typeitem_BeginsWith;
	public $Typeitem_EndsWith;
	public $Typeitem_GreaterThan;
	public $Typeitem_GreaterThanOrEqual;
	public $Typeitem_LessThan;
	public $Typeitem_LessThanOrEqual;
	public $Typeitem_In;
	public $Typeitem_IsNotEmpty;
	public $Typeitem_IsEmpty;
	public $Typeitem_BitwiseOr;
	public $Typeitem_BitwiseAnd;
	public $Edition_Equals;
	public $Edition_NotEquals;
	public $Edition_IsLike;
	public $Edition_IsNotLike;
	public $Edition_BeginsWith;
	public $Edition_EndsWith;
	public $Edition_GreaterThan;
	public $Edition_GreaterThanOrEqual;
	public $Edition_LessThan;
	public $Edition_LessThanOrEqual;
	public $Edition_In;
	public $Edition_IsNotEmpty;
	public $Edition_IsEmpty;
	public $Edition_BitwiseOr;
	public $Edition_BitwiseAnd;
	public $Isexposed_Equals;
	public $Isexposed_NotEquals;
	public $Isexposed_IsLike;
	public $Isexposed_IsNotLike;
	public $Isexposed_BeginsWith;
	public $Isexposed_EndsWith;
	public $Isexposed_GreaterThan;
	public $Isexposed_GreaterThanOrEqual;
	public $Isexposed_LessThan;
	public $Isexposed_LessThanOrEqual;
	public $Isexposed_In;
	public $Isexposed_IsNotEmpty;
	public $Isexposed_IsEmpty;
	public $Isexposed_BitwiseOr;
	public $Isexposed_BitwiseAnd;
	public $Isoriginal_Equals;
	public $Isoriginal_NotEquals;
	public $Isoriginal_IsLike;
	public $Isoriginal_IsNotLike;
	public $Isoriginal_BeginsWith;
	public $Isoriginal_EndsWith;
	public $Isoriginal_GreaterThan;
	public $Isoriginal_GreaterThanOrEqual;
	public $Isoriginal_LessThan;
	public $Isoriginal_LessThanOrEqual;
	public $Isoriginal_In;
	public $Isoriginal_IsNotEmpty;
	public $Isoriginal_IsEmpty;
	public $Isoriginal_BitwiseOr;
	public $Isoriginal_BitwiseAnd;
	public $Ispart_Equals;
	public $Ispart_NotEquals;
	public $Ispart_IsLike;
	public $Ispart_IsNotLike;
	public $Ispart_BeginsWith;
	public $Ispart_EndsWith;
	public $Ispart_GreaterThan;
	public $Ispart_GreaterThanOrEqual;
	public $Ispart_LessThan;
	public $Ispart_LessThanOrEqual;
	public $Ispart_In;
	public $Ispart_IsNotEmpty;
	public $Ispart_IsEmpty;
	public $Ispart_BitwiseOr;
	public $Ispart_BitwiseAnd;
	public $Haspart_Equals;
	public $Haspart_NotEquals;
	public $Haspart_IsLike;
	public $Haspart_IsNotLike;
	public $Haspart_BeginsWith;
	public $Haspart_EndsWith;
	public $Haspart_GreaterThan;
	public $Haspart_GreaterThanOrEqual;
	public $Haspart_LessThan;
	public $Haspart_LessThanOrEqual;
	public $Haspart_In;
	public $Haspart_IsNotEmpty;
	public $Haspart_IsEmpty;
	public $Haspart_BitwiseOr;
	public $Haspart_BitwiseAnd;
	public $Ispartof_Equals;
	public $Ispartof_NotEquals;
	public $Ispartof_IsLike;
	public $Ispartof_IsNotLike;
	public $Ispartof_BeginsWith;
	public $Ispartof_EndsWith;
	public $Ispartof_GreaterThan;
	public $Ispartof_GreaterThanOrEqual;
	public $Ispartof_LessThan;
	public $Ispartof_LessThanOrEqual;
	public $Ispartof_In;
	public $Ispartof_IsNotEmpty;
	public $Ispartof_IsEmpty;
	public $Ispartof_BitwiseOr;
	public $Ispartof_BitwiseAnd;
	public $Numberofcopies_Equals;
	public $Numberofcopies_NotEquals;
	public $Numberofcopies_IsLike;
	public $Numberofcopies_IsNotLike;
	public $Numberofcopies_BeginsWith;
	public $Numberofcopies_EndsWith;
	public $Numberofcopies_GreaterThan;
	public $Numberofcopies_GreaterThanOrEqual;
	public $Numberofcopies_LessThan;
	public $Numberofcopies_LessThanOrEqual;
	public $Numberofcopies_In;
	public $Numberofcopies_IsNotEmpty;
	public $Numberofcopies_IsEmpty;
	public $Numberofcopies_BitwiseOr;
	public $Numberofcopies_BitwiseAnd;
	public $Tobepublicin_Equals;
	public $Tobepublicin_NotEquals;
	public $Tobepublicin_IsLike;
	public $Tobepublicin_IsNotLike;
	public $Tobepublicin_BeginsWith;
	public $Tobepublicin_EndsWith;
	public $Tobepublicin_GreaterThan;
	public $Tobepublicin_GreaterThanOrEqual;
	public $Tobepublicin_LessThan;
	public $Tobepublicin_LessThanOrEqual;
	public $Tobepublicin_In;
	public $Tobepublicin_IsNotEmpty;
	public $Tobepublicin_IsEmpty;
	public $Tobepublicin_BitwiseOr;
	public $Tobepublicin_BitwiseAnd;
	public $Creationdateattributed_Equals;
	public $Creationdateattributed_NotEquals;
	public $Creationdateattributed_IsLike;
	public $Creationdateattributed_IsNotLike;
	public $Creationdateattributed_BeginsWith;
	public $Creationdateattributed_EndsWith;
	public $Creationdateattributed_GreaterThan;
	public $Creationdateattributed_GreaterThanOrEqual;
	public $Creationdateattributed_LessThan;
	public $Creationdateattributed_LessThanOrEqual;
	public $Creationdateattributed_In;
	public $Creationdateattributed_IsNotEmpty;
	public $Creationdateattributed_IsEmpty;
	public $Creationdateattributed_BitwiseOr;
	public $Creationdateattributed_BitwiseAnd;
	public $Itemdateattributed_Equals;
	public $Itemdateattributed_NotEquals;
	public $Itemdateattributed_IsLike;
	public $Itemdateattributed_IsNotLike;
	public $Itemdateattributed_BeginsWith;
	public $Itemdateattributed_EndsWith;
	public $Itemdateattributed_GreaterThan;
	public $Itemdateattributed_GreaterThanOrEqual;
	public $Itemdateattributed_LessThan;
	public $Itemdateattributed_LessThanOrEqual;
	public $Itemdateattributed_In;
	public $Itemdateattributed_IsNotEmpty;
	public $Itemdateattributed_IsEmpty;
	public $Itemdateattributed_BitwiseOr;
	public $Itemdateattributed_BitwiseAnd;
	public $Publishdateattributed_Equals;
	public $Publishdateattributed_NotEquals;
	public $Publishdateattributed_IsLike;
	public $Publishdateattributed_IsNotLike;
	public $Publishdateattributed_BeginsWith;
	public $Publishdateattributed_EndsWith;
	public $Publishdateattributed_GreaterThan;
	public $Publishdateattributed_GreaterThanOrEqual;
	public $Publishdateattributed_LessThan;
	public $Publishdateattributed_LessThanOrEqual;
	public $Publishdateattributed_In;
	public $Publishdateattributed_IsNotEmpty;
	public $Publishdateattributed_IsEmpty;
	public $Publishdateattributed_BitwiseOr;
	public $Publishdateattributed_BitwiseAnd;
	public $Serachdump_Equals;
	public $Serachdump_NotEquals;
	public $Serachdump_IsLike;
	public $Serachdump_IsNotLike;
	public $Serachdump_BeginsWith;
	public $Serachdump_EndsWith;
	public $Serachdump_GreaterThan;
	public $Serachdump_GreaterThanOrEqual;
	public $Serachdump_LessThan;
	public $Serachdump_LessThanOrEqual;
	public $Serachdump_In;
	public $Serachdump_IsNotEmpty;
	public $Serachdump_IsEmpty;
	public $Serachdump_BitwiseOr;
	public $Serachdump_BitwiseAnd;
	public $Itemmediadir_Equals;
	public $Itemmediadir_NotEquals;
	public $Itemmediadir_IsLike;
	public $Itemmediadir_IsNotLike;
	public $Itemmediadir_BeginsWith;
	public $Itemmediadir_EndsWith;
	public $Itemmediadir_GreaterThan;
	public $Itemmediadir_GreaterThanOrEqual;
	public $Itemmediadir_LessThan;
	public $Itemmediadir_LessThanOrEqual;
	public $Itemmediadir_In;
	public $Itemmediadir_IsNotEmpty;
	public $Itemmediadir_IsEmpty;
	public $Itemmediadir_BitwiseOr;
	public $Itemmediadir_BitwiseAnd;

}

?>