<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Itemcreator.php");

/**
 * ItemcreatorController is the controller class for the Itemcreator object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ItemcreatorController extends AppBaseController
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
	 * Displays a list view of Itemcreator objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Itemcreator records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ItemcreatorCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Iditemcreator,Item,Creator,Type,Location,Attributed'
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

				$itemcreators = $this->Phreezer->Query('Itemcreator',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $itemcreators->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $itemcreators->TotalResults;
				$output->totalPages = $itemcreators->TotalPages;
				$output->pageSize = $itemcreators->PageSize;
				$output->currentPage = $itemcreators->CurrentPage;
			}
			else
			{
				// return all results
				$itemcreators = $this->Phreezer->Query('Itemcreator',$criteria);
				$output->rows = $itemcreators->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Itemcreator record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('iditemcreator');
			$itemcreator = $this->Phreezer->Get('Itemcreator',$pk);
			$this->RenderJSON($itemcreator, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Itemcreator record and render response as JSON
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

			$itemcreator = new Itemcreator($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $itemcreator->Iditemcreator = $this->SafeGetVal($json, 'iditemcreator');

			$itemcreator->Item = $this->SafeGetVal($json, 'item');
			$itemcreator->Creator = $this->SafeGetVal($json, 'creator');
			$itemcreator->Type = $this->SafeGetVal($json, 'type');
			$itemcreator->Location = $this->SafeGetVal($json, 'location');
			$itemcreator->Attributed = $this->SafeGetVal($json, 'attributed');

			$itemcreator->Validate();
			$errors = $itemcreator->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$itemcreator->Save();
				$this->RenderJSON($itemcreator, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Itemcreator record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('iditemcreator');
			$itemcreator = $this->Phreezer->Get('Itemcreator',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $itemcreator->Iditemcreator = $this->SafeGetVal($json, 'iditemcreator', $itemcreator->Iditemcreator);

			$itemcreator->Item = $this->SafeGetVal($json, 'item', $itemcreator->Item);
			$itemcreator->Creator = $this->SafeGetVal($json, 'creator', $itemcreator->Creator);
			$itemcreator->Type = $this->SafeGetVal($json, 'type', $itemcreator->Type);
			$itemcreator->Location = $this->SafeGetVal($json, 'location', $itemcreator->Location);
			$itemcreator->Attributed = $this->SafeGetVal($json, 'attributed', $itemcreator->Attributed);

			$itemcreator->Validate();
			$errors = $itemcreator->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$itemcreator->Save();
				$this->RenderJSON($itemcreator, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Itemcreator record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('iditemcreator');
			$itemcreator = $this->Phreezer->Get('Itemcreator',$pk);

			$itemcreator->Delete();

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
