<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/ExpositionCreator.php");

/**
 * ExpositionCreatorController is the controller class for the ExpositionCreator object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ExpositionCreatorController extends AppBaseController
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
	 * Displays a list view of ExpositionCreator objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for ExpositionCreator records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ExpositionCreatorCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,Attributed,Location,Type,Creator,Exposition'
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

				$expositioncreators = $this->Phreezer->Query('ExpositionCreator',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $expositioncreators->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $expositioncreators->TotalResults;
				$output->totalPages = $expositioncreators->TotalPages;
				$output->pageSize = $expositioncreators->PageSize;
				$output->currentPage = $expositioncreators->CurrentPage;
			}
			else
			{
				// return all results
				$expositioncreators = $this->Phreezer->Query('ExpositionCreator',$criteria);
				$output->rows = $expositioncreators->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single ExpositionCreator record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$expositioncreator = $this->Phreezer->Get('ExpositionCreator',$pk);
			$this->RenderJSON($expositioncreator, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new ExpositionCreator record and render response as JSON
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

			$expositioncreator = new ExpositionCreator($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $expositioncreator->Id = $this->SafeGetVal($json, 'id');

			$expositioncreator->Attributed = $this->SafeGetVal($json, 'attributed');
			$expositioncreator->Location = $this->SafeGetVal($json, 'location');
			$expositioncreator->Type = $this->SafeGetVal($json, 'type');
			$expositioncreator->Creator = $this->SafeGetVal($json, 'creator');
			$expositioncreator->Exposition = $this->SafeGetVal($json, 'exposition');

			$expositioncreator->Validate();
			$errors = $expositioncreator->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$expositioncreator->Save();
				$this->RenderJSON($expositioncreator, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing ExpositionCreator record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('id');
			$expositioncreator = $this->Phreezer->Get('ExpositionCreator',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $expositioncreator->Id = $this->SafeGetVal($json, 'id', $expositioncreator->Id);

			$expositioncreator->Attributed = $this->SafeGetVal($json, 'attributed', $expositioncreator->Attributed);
			$expositioncreator->Location = $this->SafeGetVal($json, 'location', $expositioncreator->Location);
			$expositioncreator->Type = $this->SafeGetVal($json, 'type', $expositioncreator->Type);
			$expositioncreator->Creator = $this->SafeGetVal($json, 'creator', $expositioncreator->Creator);
			$expositioncreator->Exposition = $this->SafeGetVal($json, 'exposition', $expositioncreator->Exposition);

			$expositioncreator->Validate();
			$errors = $expositioncreator->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$expositioncreator->Save();
				$this->RenderJSON($expositioncreator, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing ExpositionCreator record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$expositioncreator = $this->Phreezer->Get('ExpositionCreator',$pk);

			$expositioncreator->Delete();

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
