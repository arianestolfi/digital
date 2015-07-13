<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/ExpositionPlacelocation.php");

/**
 * ExpositionPlacelocationController is the controller class for the ExpositionPlacelocation object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ExpositionPlacelocationController extends AppBaseController
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
	 * Displays a list view of ExpositionPlacelocation objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for ExpositionPlacelocation records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ExpositionPlacelocationCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,Type,Contact,Placelocation,Exposition'
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

				$expositionplacelocations = $this->Phreezer->Query('ExpositionPlacelocation',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $expositionplacelocations->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $expositionplacelocations->TotalResults;
				$output->totalPages = $expositionplacelocations->TotalPages;
				$output->pageSize = $expositionplacelocations->PageSize;
				$output->currentPage = $expositionplacelocations->CurrentPage;
			}
			else
			{
				// return all results
				$expositionplacelocations = $this->Phreezer->Query('ExpositionPlacelocation',$criteria);
				$output->rows = $expositionplacelocations->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single ExpositionPlacelocation record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$expositionplacelocation = $this->Phreezer->Get('ExpositionPlacelocation',$pk);
			$this->RenderJSON($expositionplacelocation, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new ExpositionPlacelocation record and render response as JSON
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

			$expositionplacelocation = new ExpositionPlacelocation($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $expositionplacelocation->Id = $this->SafeGetVal($json, 'id');

			$expositionplacelocation->Type = $this->SafeGetVal($json, 'type');
			$expositionplacelocation->Contact = $this->SafeGetVal($json, 'contact');
			$expositionplacelocation->Placelocation = $this->SafeGetVal($json, 'placelocation');
			$expositionplacelocation->Exposition = $this->SafeGetVal($json, 'exposition');

			$expositionplacelocation->Validate();
			$errors = $expositionplacelocation->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$expositionplacelocation->Save();
				$this->RenderJSON($expositionplacelocation, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing ExpositionPlacelocation record and render response as JSON
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
			$expositionplacelocation = $this->Phreezer->Get('ExpositionPlacelocation',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $expositionplacelocation->Id = $this->SafeGetVal($json, 'id', $expositionplacelocation->Id);

			$expositionplacelocation->Type = $this->SafeGetVal($json, 'type', $expositionplacelocation->Type);
			$expositionplacelocation->Contact = $this->SafeGetVal($json, 'contact', $expositionplacelocation->Contact);
			$expositionplacelocation->Placelocation = $this->SafeGetVal($json, 'placelocation', $expositionplacelocation->Placelocation);
			$expositionplacelocation->Exposition = $this->SafeGetVal($json, 'exposition', $expositionplacelocation->Exposition);

			$expositionplacelocation->Validate();
			$errors = $expositionplacelocation->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$expositionplacelocation->Save();
				$this->RenderJSON($expositionplacelocation, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing ExpositionPlacelocation record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$expositionplacelocation = $this->Phreezer->Get('ExpositionPlacelocation',$pk);

			$expositionplacelocation->Delete();

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
