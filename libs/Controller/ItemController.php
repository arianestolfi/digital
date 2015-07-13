<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Item.php");

/**
 * ItemController is the controller class for the Item object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ItemController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of Item objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Item records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ItemCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Iditem,Holder,Level,Institution,Inventoryid,Uritype,Uri,Keywords,Description,Uidtype,Uid,Class,Type,Iseletronic,Creationdate,Acquisitiondate,Scopecontent,Originalexistence,Originallocation,Repositorycode,Copyexistence,Copylocation,Legalaccess,Accesscondition,Reproductionrights,Reproductionrightsdescription,Itemdate,Publishdate,Publisher,Itematributes,Ispublic,Preliminaryrule,Punctuation,Notes,Otherinformation,Idfather,Titledefault,Subitem,Deletecomfirm,Typeitem,Edition,Isexposed,Isoriginal,Ispart,Haspart,Ispartof,Numberofcopies,Tobepublicin,Creationdateattributed,Itemdateattributed,Publishdateattributed,Serachdump,Itemmediadir'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$items = $this->Phreezer->Query('Item',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $items->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $items->TotalResults;
				$output->totalPages = $items->TotalPages;
				$output->pageSize = $items->PageSize;
				$output->currentPage = $items->CurrentPage;
			}
			else
			{
				// return all results
				$items = $this->Phreezer->Query('Item',$criteria);
				$output->rows = $items->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single Item record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('iditem');
			$item = $this->Phreezer->Get('Item',$pk);
			$this->RenderJSON($item, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Item record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$item = new Item($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $item->Iditem = $this->SafeGetVal($json, 'iditem');

			$item->Holder = $this->SafeGetVal($json, 'holder');
			$item->Level = $this->SafeGetVal($json, 'level');
			$item->Institution = $this->SafeGetVal($json, 'institution');
			$item->Inventoryid = $this->SafeGetVal($json, 'inventoryid');
			$item->Uritype = $this->SafeGetVal($json, 'uritype');
			$item->Uri = $this->SafeGetVal($json, 'uri');
			$item->Keywords = $this->SafeGetVal($json, 'keywords');
			$item->Description = $this->SafeGetVal($json, 'description');
			$item->Uidtype = $this->SafeGetVal($json, 'uidtype');
			$item->Uid = $this->SafeGetVal($json, 'uid');
			$item->Class = $this->SafeGetVal($json, 'class');
			$item->Type = $this->SafeGetVal($json, 'type');
			$item->Iseletronic = $this->SafeGetVal($json, 'iseletronic');
			$item->Creationdate = $this->SafeGetVal($json, 'creationdate');
			$item->Acquisitiondate = $this->SafeGetVal($json, 'acquisitiondate');
			$item->Scopecontent = $this->SafeGetVal($json, 'scopecontent');
			$item->Originalexistence = $this->SafeGetVal($json, 'originalexistence');
			$item->Originallocation = $this->SafeGetVal($json, 'originallocation');
			$item->Repositorycode = $this->SafeGetVal($json, 'repositorycode');
			$item->Copyexistence = $this->SafeGetVal($json, 'copyexistence');
			$item->Copylocation = $this->SafeGetVal($json, 'copylocation');
			$item->Legalaccess = $this->SafeGetVal($json, 'legalaccess');
			$item->Accesscondition = $this->SafeGetVal($json, 'accesscondition');
			$item->Reproductionrights = $this->SafeGetVal($json, 'reproductionrights');
			$item->Reproductionrightsdescription = $this->SafeGetVal($json, 'reproductionrightsdescription');
			$item->Itemdate = $this->SafeGetVal($json, 'itemdate');
			$item->Publishdate = $this->SafeGetVal($json, 'publishdate');
			$item->Publisher = $this->SafeGetVal($json, 'publisher');
			$item->Itematributes = $this->SafeGetVal($json, 'itematributes');
			$item->Ispublic = $this->SafeGetVal($json, 'ispublic');
			$item->Preliminaryrule = $this->SafeGetVal($json, 'preliminaryrule');
			$item->Punctuation = $this->SafeGetVal($json, 'punctuation');
			$item->Notes = $this->SafeGetVal($json, 'notes');
			$item->Otherinformation = $this->SafeGetVal($json, 'otherinformation');
			$item->Idfather = $this->SafeGetVal($json, 'idfather');
			$item->Titledefault = $this->SafeGetVal($json, 'titledefault');
			$item->Subitem = $this->SafeGetVal($json, 'subitem');
			$item->Deletecomfirm = $this->SafeGetVal($json, 'deletecomfirm');
			$item->Typeitem = $this->SafeGetVal($json, 'typeitem');
			$item->Edition = $this->SafeGetVal($json, 'edition');
			$item->Isexposed = $this->SafeGetVal($json, 'isexposed');
			$item->Isoriginal = $this->SafeGetVal($json, 'isoriginal');
			$item->Ispart = $this->SafeGetVal($json, 'ispart');
			$item->Haspart = $this->SafeGetVal($json, 'haspart');
			$item->Ispartof = $this->SafeGetVal($json, 'ispartof');
			$item->Numberofcopies = $this->SafeGetVal($json, 'numberofcopies');
			$item->Tobepublicin = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'tobepublicin')));
			$item->Creationdateattributed = $this->SafeGetVal($json, 'creationdateattributed');
			$item->Itemdateattributed = $this->SafeGetVal($json, 'itemdateattributed');
			$item->Publishdateattributed = $this->SafeGetVal($json, 'publishdateattributed');
			$item->Serachdump = $this->SafeGetVal($json, 'serachdump');
			$item->Itemmediadir = $this->SafeGetVal($json, 'itemmediadir');

			$item->Validate();
			$errors = $item->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$item->Save();
				$this->RenderJSON($item, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Item record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('iditem');
			$item = $this->Phreezer->Get('Item',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $item->Iditem = $this->SafeGetVal($json, 'iditem', $item->Iditem);

			$item->Holder = $this->SafeGetVal($json, 'holder', $item->Holder);
			$item->Level = $this->SafeGetVal($json, 'level', $item->Level);
			$item->Institution = $this->SafeGetVal($json, 'institution', $item->Institution);
			$item->Inventoryid = $this->SafeGetVal($json, 'inventoryid', $item->Inventoryid);
			$item->Uritype = $this->SafeGetVal($json, 'uritype', $item->Uritype);
			$item->Uri = $this->SafeGetVal($json, 'uri', $item->Uri);
			$item->Keywords = $this->SafeGetVal($json, 'keywords', $item->Keywords);
			$item->Description = $this->SafeGetVal($json, 'description', $item->Description);
			$item->Uidtype = $this->SafeGetVal($json, 'uidtype', $item->Uidtype);
			$item->Uid = $this->SafeGetVal($json, 'uid', $item->Uid);
			$item->Class = $this->SafeGetVal($json, 'class', $item->Class);
			$item->Type = $this->SafeGetVal($json, 'type', $item->Type);
			$item->Iseletronic = $this->SafeGetVal($json, 'iseletronic', $item->Iseletronic);
			$item->Creationdate = $this->SafeGetVal($json, 'creationdate', $item->Creationdate);
			$item->Acquisitiondate = $this->SafeGetVal($json, 'acquisitiondate', $item->Acquisitiondate);
			$item->Scopecontent = $this->SafeGetVal($json, 'scopecontent', $item->Scopecontent);
			$item->Originalexistence = $this->SafeGetVal($json, 'originalexistence', $item->Originalexistence);
			$item->Originallocation = $this->SafeGetVal($json, 'originallocation', $item->Originallocation);
			$item->Repositorycode = $this->SafeGetVal($json, 'repositorycode', $item->Repositorycode);
			$item->Copyexistence = $this->SafeGetVal($json, 'copyexistence', $item->Copyexistence);
			$item->Copylocation = $this->SafeGetVal($json, 'copylocation', $item->Copylocation);
			$item->Legalaccess = $this->SafeGetVal($json, 'legalaccess', $item->Legalaccess);
			$item->Accesscondition = $this->SafeGetVal($json, 'accesscondition', $item->Accesscondition);
			$item->Reproductionrights = $this->SafeGetVal($json, 'reproductionrights', $item->Reproductionrights);
			$item->Reproductionrightsdescription = $this->SafeGetVal($json, 'reproductionrightsdescription', $item->Reproductionrightsdescription);
			$item->Itemdate = $this->SafeGetVal($json, 'itemdate', $item->Itemdate);
			$item->Publishdate = $this->SafeGetVal($json, 'publishdate', $item->Publishdate);
			$item->Publisher = $this->SafeGetVal($json, 'publisher', $item->Publisher);
			$item->Itematributes = $this->SafeGetVal($json, 'itematributes', $item->Itematributes);
			$item->Ispublic = $this->SafeGetVal($json, 'ispublic', $item->Ispublic);
			$item->Preliminaryrule = $this->SafeGetVal($json, 'preliminaryrule', $item->Preliminaryrule);
			$item->Punctuation = $this->SafeGetVal($json, 'punctuation', $item->Punctuation);
			$item->Notes = $this->SafeGetVal($json, 'notes', $item->Notes);
			$item->Otherinformation = $this->SafeGetVal($json, 'otherinformation', $item->Otherinformation);
			$item->Idfather = $this->SafeGetVal($json, 'idfather', $item->Idfather);
			$item->Titledefault = $this->SafeGetVal($json, 'titledefault', $item->Titledefault);
			$item->Subitem = $this->SafeGetVal($json, 'subitem', $item->Subitem);
			$item->Deletecomfirm = $this->SafeGetVal($json, 'deletecomfirm', $item->Deletecomfirm);
			$item->Typeitem = $this->SafeGetVal($json, 'typeitem', $item->Typeitem);
			$item->Edition = $this->SafeGetVal($json, 'edition', $item->Edition);
			$item->Isexposed = $this->SafeGetVal($json, 'isexposed', $item->Isexposed);
			$item->Isoriginal = $this->SafeGetVal($json, 'isoriginal', $item->Isoriginal);
			$item->Ispart = $this->SafeGetVal($json, 'ispart', $item->Ispart);
			$item->Haspart = $this->SafeGetVal($json, 'haspart', $item->Haspart);
			$item->Ispartof = $this->SafeGetVal($json, 'ispartof', $item->Ispartof);
			$item->Numberofcopies = $this->SafeGetVal($json, 'numberofcopies', $item->Numberofcopies);
			$item->Tobepublicin = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'tobepublicin', $item->Tobepublicin)));
			$item->Creationdateattributed = $this->SafeGetVal($json, 'creationdateattributed', $item->Creationdateattributed);
			$item->Itemdateattributed = $this->SafeGetVal($json, 'itemdateattributed', $item->Itemdateattributed);
			$item->Publishdateattributed = $this->SafeGetVal($json, 'publishdateattributed', $item->Publishdateattributed);
			$item->Serachdump = $this->SafeGetVal($json, 'serachdump', $item->Serachdump);
			$item->Itemmediadir = $this->SafeGetVal($json, 'itemmediadir', $item->Itemmediadir);

			$item->Validate();
			$errors = $item->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$item->Save();
				$this->RenderJSON($item, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Item record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('iditem');
			$item = $this->Phreezer->Get('Item',$pk);

			$item->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>
