<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Ncontact.php");

/**
 * NcontactController is the controller class for the Ncontact object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class NcontactController extends AppBaseController
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
	 * Displays a list view of Ncontact objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Ncontact records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new NcontactCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,Call_,Company,CountyTaxcode,FederalTaxcode,Identity,Name,StateTaxcode,Uri,Urla,Institution'
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

				$ncontacts = $this->Phreezer->Query('Ncontact',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $ncontacts->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $ncontacts->TotalResults;
				$output->totalPages = $ncontacts->TotalPages;
				$output->pageSize = $ncontacts->PageSize;
				$output->currentPage = $ncontacts->CurrentPage;
			}
			else
			{
				// return all results
				$ncontacts = $this->Phreezer->Query('Ncontact',$criteria);
				$output->rows = $ncontacts->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Ncontact record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$ncontact = $this->Phreezer->Get('Ncontact',$pk);
			$this->RenderJSON($ncontact, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Ncontact record and render response as JSON
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

			$ncontact = new Ncontact($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $ncontact->Id = $this->SafeGetVal($json, 'id');

			$ncontact->Call_ = $this->SafeGetVal($json, 'call_');
			$ncontact->Company = $this->SafeGetVal($json, 'company');
			$ncontact->CountyTaxcode = $this->SafeGetVal($json, 'countyTaxcode');
			$ncontact->FederalTaxcode = $this->SafeGetVal($json, 'federalTaxcode');
			$ncontact->Identity = $this->SafeGetVal($json, 'identity');
			$ncontact->Name = $this->SafeGetVal($json, 'name');
			$ncontact->StateTaxcode = $this->SafeGetVal($json, 'stateTaxcode');
			$ncontact->Uri = $this->SafeGetVal($json, 'uri');
			$ncontact->Urla = $this->SafeGetVal($json, 'urla');
			$ncontact->Institution = $this->SafeGetVal($json, 'institution');

			$ncontact->Validate();
			$errors = $ncontact->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$ncontact->Save();
				$this->RenderJSON($ncontact, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Ncontact record and render response as JSON
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
			$ncontact = $this->Phreezer->Get('Ncontact',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $ncontact->Id = $this->SafeGetVal($json, 'id', $ncontact->Id);

			$ncontact->Call_ = $this->SafeGetVal($json, 'call_', $ncontact->Call_);
			$ncontact->Company = $this->SafeGetVal($json, 'company', $ncontact->Company);
			$ncontact->CountyTaxcode = $this->SafeGetVal($json, 'countyTaxcode', $ncontact->CountyTaxcode);
			$ncontact->FederalTaxcode = $this->SafeGetVal($json, 'federalTaxcode', $ncontact->FederalTaxcode);
			$ncontact->Identity = $this->SafeGetVal($json, 'identity', $ncontact->Identity);
			$ncontact->Name = $this->SafeGetVal($json, 'name', $ncontact->Name);
			$ncontact->StateTaxcode = $this->SafeGetVal($json, 'stateTaxcode', $ncontact->StateTaxcode);
			$ncontact->Uri = $this->SafeGetVal($json, 'uri', $ncontact->Uri);
			$ncontact->Urla = $this->SafeGetVal($json, 'urla', $ncontact->Urla);
			$ncontact->Institution = $this->SafeGetVal($json, 'institution', $ncontact->Institution);

			$ncontact->Validate();
			$errors = $ncontact->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$ncontact->Save();
				$this->RenderJSON($ncontact, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Ncontact record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$ncontact = $this->Phreezer->Get('Ncontact',$pk);

			$ncontact->Delete();

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
