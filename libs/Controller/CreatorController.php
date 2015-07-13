<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Creator.php");

/**
 * CreatorController is the controller class for the Creator object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class CreatorController extends AppBaseController
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
	 * Displays a list view of Creator objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Creator records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new CreatorCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Idcreator,Institution,Type,Name,Notes,Birthdate,Deathdate,Nationality,Maincontact'
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

				$creators = $this->Phreezer->Query('Creator',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $creators->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $creators->TotalResults;
				$output->totalPages = $creators->TotalPages;
				$output->pageSize = $creators->PageSize;
				$output->currentPage = $creators->CurrentPage;
			}
			else
			{
				// return all results
				$creators = $this->Phreezer->Query('Creator',$criteria);
				$output->rows = $creators->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Creator record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idcreator');
			$creator = $this->Phreezer->Get('Creator',$pk);
			$this->RenderJSON($creator, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Creator record and render response as JSON
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

			$creator = new Creator($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $creator->Idcreator = $this->SafeGetVal($json, 'idcreator');

			$creator->Institution = $this->SafeGetVal($json, 'institution');
			$creator->Type = $this->SafeGetVal($json, 'type');
			$creator->Name = $this->SafeGetVal($json, 'name');
			$creator->Notes = $this->SafeGetVal($json, 'notes');
			$creator->Birthdate = $this->SafeGetVal($json, 'birthdate');
			$creator->Deathdate = $this->SafeGetVal($json, 'deathdate');
			$creator->Nationality = $this->SafeGetVal($json, 'nationality');
			$creator->Maincontact = $this->SafeGetVal($json, 'maincontact');

			$creator->Validate();
			$errors = $creator->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$creator->Save();
				$this->RenderJSON($creator, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Creator record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idcreator');
			$creator = $this->Phreezer->Get('Creator',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $creator->Idcreator = $this->SafeGetVal($json, 'idcreator', $creator->Idcreator);

			$creator->Institution = $this->SafeGetVal($json, 'institution', $creator->Institution);
			$creator->Type = $this->SafeGetVal($json, 'type', $creator->Type);
			$creator->Name = $this->SafeGetVal($json, 'name', $creator->Name);
			$creator->Notes = $this->SafeGetVal($json, 'notes', $creator->Notes);
			$creator->Birthdate = $this->SafeGetVal($json, 'birthdate', $creator->Birthdate);
			$creator->Deathdate = $this->SafeGetVal($json, 'deathdate', $creator->Deathdate);
			$creator->Nationality = $this->SafeGetVal($json, 'nationality', $creator->Nationality);
			$creator->Maincontact = $this->SafeGetVal($json, 'maincontact', $creator->Maincontact);

			$creator->Validate();
			$errors = $creator->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$creator->Save();
				$this->RenderJSON($creator, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Creator record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idcreator');
			$creator = $this->Phreezer->Get('Creator',$pk);

			$creator->Delete();

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
