<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Search.php");

/**
 * SearchController is the controller class for the Search object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class SearchController extends AppBaseController
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
	 * Displays a list view of Search objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Search records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new SearchCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Idsearch,User,Name,Info,Type,Datecreate'
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

				$searches = $this->Phreezer->Query('Search',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $searches->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $searches->TotalResults;
				$output->totalPages = $searches->TotalPages;
				$output->pageSize = $searches->PageSize;
				$output->currentPage = $searches->CurrentPage;
			}
			else
			{
				// return all results
				$searches = $this->Phreezer->Query('Search',$criteria);
				$output->rows = $searches->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Search record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idsearch');
			$search = $this->Phreezer->Get('Search',$pk);
			$this->RenderJSON($search, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Search record and render response as JSON
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

			$search = new Search($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $search->Idsearch = $this->SafeGetVal($json, 'idsearch');

			$search->User = $this->SafeGetVal($json, 'user');
			$search->Name = $this->SafeGetVal($json, 'name');
			$search->Info = $this->SafeGetVal($json, 'info');
			$search->Type = $this->SafeGetVal($json, 'type');
			$search->Datecreate = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'datecreate')));

			$search->Validate();
			$errors = $search->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$search->Save();
				$this->RenderJSON($search, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Search record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idsearch');
			$search = $this->Phreezer->Get('Search',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $search->Idsearch = $this->SafeGetVal($json, 'idsearch', $search->Idsearch);

			$search->User = $this->SafeGetVal($json, 'user', $search->User);
			$search->Name = $this->SafeGetVal($json, 'name', $search->Name);
			$search->Info = $this->SafeGetVal($json, 'info', $search->Info);
			$search->Type = $this->SafeGetVal($json, 'type', $search->Type);
			$search->Datecreate = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'datecreate', $search->Datecreate)));

			$search->Validate();
			$errors = $search->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$search->Save();
				$this->RenderJSON($search, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Search record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idsearch');
			$search = $this->Phreezer->Get('Search',$pk);

			$search->Delete();

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
