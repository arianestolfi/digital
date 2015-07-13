<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/CreatorReference.php");

/**
 * CreatorReferenceController is the controller class for the CreatorReference object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class CreatorReferenceController extends AppBaseController
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
	 * Displays a list view of CreatorReference objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for CreatorReference records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new CreatorReferenceCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,Type,Creator,Reference'
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

				$creatorreferences = $this->Phreezer->Query('CreatorReference',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $creatorreferences->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $creatorreferences->TotalResults;
				$output->totalPages = $creatorreferences->TotalPages;
				$output->pageSize = $creatorreferences->PageSize;
				$output->currentPage = $creatorreferences->CurrentPage;
			}
			else
			{
				// return all results
				$creatorreferences = $this->Phreezer->Query('CreatorReference',$criteria);
				$output->rows = $creatorreferences->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single CreatorReference record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$creatorreference = $this->Phreezer->Get('CreatorReference',$pk);
			$this->RenderJSON($creatorreference, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new CreatorReference record and render response as JSON
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

			$creatorreference = new CreatorReference($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $creatorreference->Id = $this->SafeGetVal($json, 'id');

			$creatorreference->Type = $this->SafeGetVal($json, 'type');
			$creatorreference->Creator = $this->SafeGetVal($json, 'creator');
			$creatorreference->Reference = $this->SafeGetVal($json, 'reference');

			$creatorreference->Validate();
			$errors = $creatorreference->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$creatorreference->Save();
				$this->RenderJSON($creatorreference, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing CreatorReference record and render response as JSON
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
			$creatorreference = $this->Phreezer->Get('CreatorReference',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $creatorreference->Id = $this->SafeGetVal($json, 'id', $creatorreference->Id);

			$creatorreference->Type = $this->SafeGetVal($json, 'type', $creatorreference->Type);
			$creatorreference->Creator = $this->SafeGetVal($json, 'creator', $creatorreference->Creator);
			$creatorreference->Reference = $this->SafeGetVal($json, 'reference', $creatorreference->Reference);

			$creatorreference->Validate();
			$errors = $creatorreference->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$creatorreference->Save();
				$this->RenderJSON($creatorreference, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing CreatorReference record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$creatorreference = $this->Phreezer->Get('CreatorReference',$pk);

			$creatorreference->Delete();

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
