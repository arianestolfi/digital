<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Title.php");

/**
 * TitleController is the controller class for the Title object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class TitleController extends AppBaseController
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
	 * Displays a list view of Title objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Title records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new TitleCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Idtitle,Name,Value,Item,Institution,Defaulttitle'
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

				$titles = $this->Phreezer->Query('Title',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $titles->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $titles->TotalResults;
				$output->totalPages = $titles->TotalPages;
				$output->pageSize = $titles->PageSize;
				$output->currentPage = $titles->CurrentPage;
			}
			else
			{
				// return all results
				$titles = $this->Phreezer->Query('Title',$criteria);
				$output->rows = $titles->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Title record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idtitle');
			$title = $this->Phreezer->Get('Title',$pk);
			$this->RenderJSON($title, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Title record and render response as JSON
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

			$title = new Title($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $title->Idtitle = $this->SafeGetVal($json, 'idtitle');

			$title->Name = $this->SafeGetVal($json, 'name');
			$title->Value = $this->SafeGetVal($json, 'value');
			$title->Item = $this->SafeGetVal($json, 'item');
			$title->Institution = $this->SafeGetVal($json, 'institution');
			$title->Defaulttitle = $this->SafeGetVal($json, 'defaulttitle');

			$title->Validate();
			$errors = $title->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$title->Save();
				$this->RenderJSON($title, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Title record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idtitle');
			$title = $this->Phreezer->Get('Title',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $title->Idtitle = $this->SafeGetVal($json, 'idtitle', $title->Idtitle);

			$title->Name = $this->SafeGetVal($json, 'name', $title->Name);
			$title->Value = $this->SafeGetVal($json, 'value', $title->Value);
			$title->Item = $this->SafeGetVal($json, 'item', $title->Item);
			$title->Institution = $this->SafeGetVal($json, 'institution', $title->Institution);
			$title->Defaulttitle = $this->SafeGetVal($json, 'defaulttitle', $title->Defaulttitle);

			$title->Validate();
			$errors = $title->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$title->Save();
				$this->RenderJSON($title, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Title record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idtitle');
			$title = $this->Phreezer->Get('Title',$pk);

			$title->Delete();

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
