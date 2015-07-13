<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Exposition.php");

/**
 * ExpositionController is the controller class for the Exposition object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ExpositionController extends AppBaseController
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
	 * Displays a list view of Exposition objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Exposition records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ExpositionCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Idexposition,Institution,Location,Curator,Initialdate,Enddate,Description,Notes,Name,Exposubtype,Expotype,Iscarriedbyotherinstitution,Isinternational,Otherinfo'
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

				$expositions = $this->Phreezer->Query('Exposition',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $expositions->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $expositions->TotalResults;
				$output->totalPages = $expositions->TotalPages;
				$output->pageSize = $expositions->PageSize;
				$output->currentPage = $expositions->CurrentPage;
			}
			else
			{
				// return all results
				$expositions = $this->Phreezer->Query('Exposition',$criteria);
				$output->rows = $expositions->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Exposition record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idexposition');
			$exposition = $this->Phreezer->Get('Exposition',$pk);
			$this->RenderJSON($exposition, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Exposition record and render response as JSON
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

			$exposition = new Exposition($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $exposition->Idexposition = $this->SafeGetVal($json, 'idexposition');

			$exposition->Institution = $this->SafeGetVal($json, 'institution');
			$exposition->Location = $this->SafeGetVal($json, 'location');
			$exposition->Curator = $this->SafeGetVal($json, 'curator');
			$exposition->Initialdate = $this->SafeGetVal($json, 'initialdate');
			$exposition->Enddate = $this->SafeGetVal($json, 'enddate');
			$exposition->Description = $this->SafeGetVal($json, 'description');
			$exposition->Notes = $this->SafeGetVal($json, 'notes');
			$exposition->Name = $this->SafeGetVal($json, 'name');
			$exposition->Exposubtype = $this->SafeGetVal($json, 'exposubtype');
			$exposition->Expotype = $this->SafeGetVal($json, 'expotype');
			$exposition->Iscarriedbyotherinstitution = $this->SafeGetVal($json, 'iscarriedbyotherinstitution');
			$exposition->Isinternational = $this->SafeGetVal($json, 'isinternational');
			$exposition->Otherinfo = $this->SafeGetVal($json, 'otherinfo');

			$exposition->Validate();
			$errors = $exposition->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$exposition->Save();
				$this->RenderJSON($exposition, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Exposition record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idexposition');
			$exposition = $this->Phreezer->Get('Exposition',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $exposition->Idexposition = $this->SafeGetVal($json, 'idexposition', $exposition->Idexposition);

			$exposition->Institution = $this->SafeGetVal($json, 'institution', $exposition->Institution);
			$exposition->Location = $this->SafeGetVal($json, 'location', $exposition->Location);
			$exposition->Curator = $this->SafeGetVal($json, 'curator', $exposition->Curator);
			$exposition->Initialdate = $this->SafeGetVal($json, 'initialdate', $exposition->Initialdate);
			$exposition->Enddate = $this->SafeGetVal($json, 'enddate', $exposition->Enddate);
			$exposition->Description = $this->SafeGetVal($json, 'description', $exposition->Description);
			$exposition->Notes = $this->SafeGetVal($json, 'notes', $exposition->Notes);
			$exposition->Name = $this->SafeGetVal($json, 'name', $exposition->Name);
			$exposition->Exposubtype = $this->SafeGetVal($json, 'exposubtype', $exposition->Exposubtype);
			$exposition->Expotype = $this->SafeGetVal($json, 'expotype', $exposition->Expotype);
			$exposition->Iscarriedbyotherinstitution = $this->SafeGetVal($json, 'iscarriedbyotherinstitution', $exposition->Iscarriedbyotherinstitution);
			$exposition->Isinternational = $this->SafeGetVal($json, 'isinternational', $exposition->Isinternational);
			$exposition->Otherinfo = $this->SafeGetVal($json, 'otherinfo', $exposition->Otherinfo);

			$exposition->Validate();
			$errors = $exposition->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$exposition->Save();
				$this->RenderJSON($exposition, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Exposition record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idexposition');
			$exposition = $this->Phreezer->Get('Exposition',$pk);

			$exposition->Delete();

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
