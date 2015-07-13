<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Institution.php");

/**
 * InstitutionController is the controller class for the Institution object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class InstitutionController extends AppBaseController
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
	 * Displays a list view of Institution objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Institution records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new InstitutionCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Idinstitution,Name,Description,Uri,Otherinformation,Code,Timezone,Thumbnail'
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

				$institutions = $this->Phreezer->Query('Institution',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $institutions->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $institutions->TotalResults;
				$output->totalPages = $institutions->TotalPages;
				$output->pageSize = $institutions->PageSize;
				$output->currentPage = $institutions->CurrentPage;
			}
			else
			{
				// return all results
				$institutions = $this->Phreezer->Query('Institution',$criteria);
				$output->rows = $institutions->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Institution record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idinstitution');
			$institution = $this->Phreezer->Get('Institution',$pk);
			$this->RenderJSON($institution, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Institution record and render response as JSON
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

			$institution = new Institution($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $institution->Idinstitution = $this->SafeGetVal($json, 'idinstitution');

			$institution->Name = $this->SafeGetVal($json, 'name');
			$institution->Description = $this->SafeGetVal($json, 'description');
			$institution->Uri = $this->SafeGetVal($json, 'uri');
			$institution->Otherinformation = $this->SafeGetVal($json, 'otherinformation');
			$institution->Code = $this->SafeGetVal($json, 'code');
			$institution->Timezone = $this->SafeGetVal($json, 'timezone');
			$institution->Thumbnail = $this->SafeGetVal($json, 'thumbnail');

			$institution->Validate();
			$errors = $institution->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$institution->Save();
				$this->RenderJSON($institution, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Institution record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idinstitution');
			$institution = $this->Phreezer->Get('Institution',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $institution->Idinstitution = $this->SafeGetVal($json, 'idinstitution', $institution->Idinstitution);

			$institution->Name = $this->SafeGetVal($json, 'name', $institution->Name);
			$institution->Description = $this->SafeGetVal($json, 'description', $institution->Description);
			$institution->Uri = $this->SafeGetVal($json, 'uri', $institution->Uri);
			$institution->Otherinformation = $this->SafeGetVal($json, 'otherinformation', $institution->Otherinformation);
			$institution->Code = $this->SafeGetVal($json, 'code', $institution->Code);
			$institution->Timezone = $this->SafeGetVal($json, 'timezone', $institution->Timezone);
			$institution->Thumbnail = $this->SafeGetVal($json, 'thumbnail', $institution->Thumbnail);

			$institution->Validate();
			$errors = $institution->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$institution->Save();
				$this->RenderJSON($institution, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Institution record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idinstitution');
			$institution = $this->Phreezer->Get('Institution',$pk);

			$institution->Delete();

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
