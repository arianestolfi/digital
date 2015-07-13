<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Transcription.php");

/**
 * TranscriptionController is the controller class for the Transcription object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class TranscriptionController extends AppBaseController
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
	 * Displays a list view of Transcription objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Transcription records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new TranscriptionCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Idtranscription,Iditem,Idmedia,Transcription,Notes,Language'
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

				$transcriptions = $this->Phreezer->Query('Transcription',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $transcriptions->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $transcriptions->TotalResults;
				$output->totalPages = $transcriptions->TotalPages;
				$output->pageSize = $transcriptions->PageSize;
				$output->currentPage = $transcriptions->CurrentPage;
			}
			else
			{
				// return all results
				$transcriptions = $this->Phreezer->Query('Transcription',$criteria);
				$output->rows = $transcriptions->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Transcription record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idtranscription');
			$transcription = $this->Phreezer->Get('Transcription',$pk);
			$this->RenderJSON($transcription, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Transcription record and render response as JSON
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

			$transcription = new Transcription($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $transcription->Idtranscription = $this->SafeGetVal($json, 'idtranscription');

			$transcription->Iditem = $this->SafeGetVal($json, 'iditem');
			$transcription->Idmedia = $this->SafeGetVal($json, 'idmedia');
			$transcription->Transcription = $this->SafeGetVal($json, 'transcription');
			$transcription->Notes = $this->SafeGetVal($json, 'notes');
			$transcription->Language = $this->SafeGetVal($json, 'language');

			$transcription->Validate();
			$errors = $transcription->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$transcription->Save();
				$this->RenderJSON($transcription, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Transcription record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idtranscription');
			$transcription = $this->Phreezer->Get('Transcription',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $transcription->Idtranscription = $this->SafeGetVal($json, 'idtranscription', $transcription->Idtranscription);

			$transcription->Iditem = $this->SafeGetVal($json, 'iditem', $transcription->Iditem);
			$transcription->Idmedia = $this->SafeGetVal($json, 'idmedia', $transcription->Idmedia);
			$transcription->Transcription = $this->SafeGetVal($json, 'transcription', $transcription->Transcription);
			$transcription->Notes = $this->SafeGetVal($json, 'notes', $transcription->Notes);
			$transcription->Language = $this->SafeGetVal($json, 'language', $transcription->Language);

			$transcription->Validate();
			$errors = $transcription->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$transcription->Save();
				$this->RenderJSON($transcription, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Transcription record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idtranscription');
			$transcription = $this->Phreezer->Get('Transcription',$pk);

			$transcription->Delete();

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
