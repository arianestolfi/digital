<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Nreference.php");

/**
 * NreferenceController is the controller class for the Nreference object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class NreferenceController extends AppBaseController
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
	 * Displays a list view of Nreference objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Nreference records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new NreferenceCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,Author,Description,OtherInformation,Text,Title,Institution'
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

				$nreferences = $this->Phreezer->Query('Nreference',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $nreferences->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $nreferences->TotalResults;
				$output->totalPages = $nreferences->TotalPages;
				$output->pageSize = $nreferences->PageSize;
				$output->currentPage = $nreferences->CurrentPage;
			}
			else
			{
				// return all results
				$nreferences = $this->Phreezer->Query('Nreference',$criteria);
				$output->rows = $nreferences->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Nreference record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$nreference = $this->Phreezer->Get('Nreference',$pk);
			$this->RenderJSON($nreference, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Nreference record and render response as JSON
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

			$nreference = new Nreference($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $nreference->Id = $this->SafeGetVal($json, 'id');

			$nreference->Author = $this->SafeGetVal($json, 'author');
			$nreference->Description = $this->SafeGetVal($json, 'description');
			$nreference->OtherInformation = $this->SafeGetVal($json, 'otherInformation');
			$nreference->Text = $this->SafeGetVal($json, 'text');
			$nreference->Title = $this->SafeGetVal($json, 'title');
			$nreference->Institution = $this->SafeGetVal($json, 'institution');

			$nreference->Validate();
			$errors = $nreference->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$nreference->Save();
				$this->RenderJSON($nreference, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Nreference record and render response as JSON
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
			$nreference = $this->Phreezer->Get('Nreference',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $nreference->Id = $this->SafeGetVal($json, 'id', $nreference->Id);

			$nreference->Author = $this->SafeGetVal($json, 'author', $nreference->Author);
			$nreference->Description = $this->SafeGetVal($json, 'description', $nreference->Description);
			$nreference->OtherInformation = $this->SafeGetVal($json, 'otherInformation', $nreference->OtherInformation);
			$nreference->Text = $this->SafeGetVal($json, 'text', $nreference->Text);
			$nreference->Title = $this->SafeGetVal($json, 'title', $nreference->Title);
			$nreference->Institution = $this->SafeGetVal($json, 'institution', $nreference->Institution);

			$nreference->Validate();
			$errors = $nreference->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$nreference->Save();
				$this->RenderJSON($nreference, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Nreference record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$nreference = $this->Phreezer->Get('Nreference',$pk);

			$nreference->Delete();

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
