<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/PlaceLocation.php");

/**
 * PlaceLocationController is the controller class for the PlaceLocation object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class PlaceLocationController extends AppBaseController
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
	 * Displays a list view of PlaceLocation objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for PlaceLocation records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new PlaceLocationCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,Complement,Latituded,Local,Longitude,Number,Otherinformation,Street,Type,Zipcode,City,Country,Institution,State'
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

				$placelocations = $this->Phreezer->Query('PlaceLocation',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $placelocations->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $placelocations->TotalResults;
				$output->totalPages = $placelocations->TotalPages;
				$output->pageSize = $placelocations->PageSize;
				$output->currentPage = $placelocations->CurrentPage;
			}
			else
			{
				// return all results
				$placelocations = $this->Phreezer->Query('PlaceLocation',$criteria);
				$output->rows = $placelocations->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single PlaceLocation record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$placelocation = $this->Phreezer->Get('PlaceLocation',$pk);
			$this->RenderJSON($placelocation, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new PlaceLocation record and render response as JSON
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

			$placelocation = new PlaceLocation($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $placelocation->Id = $this->SafeGetVal($json, 'id');

			$placelocation->Complement = $this->SafeGetVal($json, 'complement');
			$placelocation->Latituded = $this->SafeGetVal($json, 'latituded');
			$placelocation->Local = $this->SafeGetVal($json, 'local');
			$placelocation->Longitude = $this->SafeGetVal($json, 'longitude');
			$placelocation->Number = $this->SafeGetVal($json, 'number');
			$placelocation->Otherinformation = $this->SafeGetVal($json, 'otherinformation');
			$placelocation->Street = $this->SafeGetVal($json, 'street');
			$placelocation->Type = $this->SafeGetVal($json, 'type');
			$placelocation->Zipcode = $this->SafeGetVal($json, 'zipcode');
			$placelocation->City = $this->SafeGetVal($json, 'city');
			$placelocation->Country = $this->SafeGetVal($json, 'country');
			$placelocation->Institution = $this->SafeGetVal($json, 'institution');
			$placelocation->State = $this->SafeGetVal($json, 'state');

			$placelocation->Validate();
			$errors = $placelocation->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$placelocation->Save();
				$this->RenderJSON($placelocation, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing PlaceLocation record and render response as JSON
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
			$placelocation = $this->Phreezer->Get('PlaceLocation',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $placelocation->Id = $this->SafeGetVal($json, 'id', $placelocation->Id);

			$placelocation->Complement = $this->SafeGetVal($json, 'complement', $placelocation->Complement);
			$placelocation->Latituded = $this->SafeGetVal($json, 'latituded', $placelocation->Latituded);
			$placelocation->Local = $this->SafeGetVal($json, 'local', $placelocation->Local);
			$placelocation->Longitude = $this->SafeGetVal($json, 'longitude', $placelocation->Longitude);
			$placelocation->Number = $this->SafeGetVal($json, 'number', $placelocation->Number);
			$placelocation->Otherinformation = $this->SafeGetVal($json, 'otherinformation', $placelocation->Otherinformation);
			$placelocation->Street = $this->SafeGetVal($json, 'street', $placelocation->Street);
			$placelocation->Type = $this->SafeGetVal($json, 'type', $placelocation->Type);
			$placelocation->Zipcode = $this->SafeGetVal($json, 'zipcode', $placelocation->Zipcode);
			$placelocation->City = $this->SafeGetVal($json, 'city', $placelocation->City);
			$placelocation->Country = $this->SafeGetVal($json, 'country', $placelocation->Country);
			$placelocation->Institution = $this->SafeGetVal($json, 'institution', $placelocation->Institution);
			$placelocation->State = $this->SafeGetVal($json, 'state', $placelocation->State);

			$placelocation->Validate();
			$errors = $placelocation->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$placelocation->Save();
				$this->RenderJSON($placelocation, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing PlaceLocation record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$placelocation = $this->Phreezer->Get('PlaceLocation',$pk);

			$placelocation->Delete();

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
