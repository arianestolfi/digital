<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Nhistory.php");

/**
 * NhistoryController is the controller class for the Nhistory object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class NhistoryController extends AppBaseController
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
	 * Displays a list view of Nhistory objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Nhistory records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new NhistoryCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Idhistory,Actor,Cost,Date,Description,Ispublic,Institution'
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

				$nhistories = $this->Phreezer->Query('Nhistory',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $nhistories->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $nhistories->TotalResults;
				$output->totalPages = $nhistories->TotalPages;
				$output->pageSize = $nhistories->PageSize;
				$output->currentPage = $nhistories->CurrentPage;
			}
			else
			{
				// return all results
				$nhistories = $this->Phreezer->Query('Nhistory',$criteria);
				$output->rows = $nhistories->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Nhistory record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idhistory');
			$nhistory = $this->Phreezer->Get('Nhistory',$pk);
			$this->RenderJSON($nhistory, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Nhistory record and render response as JSON
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

			$nhistory = new Nhistory($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $nhistory->Idhistory = $this->SafeGetVal($json, 'idhistory');

			$nhistory->Actor = $this->SafeGetVal($json, 'actor');
			$nhistory->Cost = $this->SafeGetVal($json, 'cost');
			$nhistory->Date = $this->SafeGetVal($json, 'date');
			$nhistory->Description = $this->SafeGetVal($json, 'description');
			$nhistory->Ispublic = $this->SafeGetVal($json, 'ispublic');
			$nhistory->Institution = $this->SafeGetVal($json, 'institution');

			$nhistory->Validate();
			$errors = $nhistory->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$nhistory->Save();
				$this->RenderJSON($nhistory, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Nhistory record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idhistory');
			$nhistory = $this->Phreezer->Get('Nhistory',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $nhistory->Idhistory = $this->SafeGetVal($json, 'idhistory', $nhistory->Idhistory);

			$nhistory->Actor = $this->SafeGetVal($json, 'actor', $nhistory->Actor);
			$nhistory->Cost = $this->SafeGetVal($json, 'cost', $nhistory->Cost);
			$nhistory->Date = $this->SafeGetVal($json, 'date', $nhistory->Date);
			$nhistory->Description = $this->SafeGetVal($json, 'description', $nhistory->Description);
			$nhistory->Ispublic = $this->SafeGetVal($json, 'ispublic', $nhistory->Ispublic);
			$nhistory->Institution = $this->SafeGetVal($json, 'institution', $nhistory->Institution);

			$nhistory->Validate();
			$errors = $nhistory->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$nhistory->Save();
				$this->RenderJSON($nhistory, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Nhistory record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idhistory');
			$nhistory = $this->Phreezer->Get('Nhistory',$pk);

			$nhistory->Delete();

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
