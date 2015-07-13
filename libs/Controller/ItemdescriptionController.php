<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Itemdescription.php");

/**
 * ItemdescriptionController is the controller class for the Itemdescription object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ItemdescriptionController extends AppBaseController
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
	 * Displays a list view of Itemdescription objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Itemdescription records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ItemdescriptionCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,Item,Abstracttext,Accrual,Appraisaldesstructionschedulling,Arrangement,Broadcastmethod,Era,Fromcorporate,Frompersonal,Geographiccoodnates,Geographicname,Label,Language,Mediapresentation,Movement,Other,Period,Periodicity,Preservationstatus,Scope,Style,Subject,Tableofcontents,Targetaudience,Tocorporate,Topersonal'
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

				$itemdescriptions = $this->Phreezer->Query('Itemdescription',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $itemdescriptions->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $itemdescriptions->TotalResults;
				$output->totalPages = $itemdescriptions->TotalPages;
				$output->pageSize = $itemdescriptions->PageSize;
				$output->currentPage = $itemdescriptions->CurrentPage;
			}
			else
			{
				// return all results
				$itemdescriptions = $this->Phreezer->Query('Itemdescription',$criteria);
				$output->rows = $itemdescriptions->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Itemdescription record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$itemdescription = $this->Phreezer->Get('Itemdescription',$pk);
			$this->RenderJSON($itemdescription, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Itemdescription record and render response as JSON
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

			$itemdescription = new Itemdescription($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $itemdescription->Id = $this->SafeGetVal($json, 'id');

			$itemdescription->Item = $this->SafeGetVal($json, 'item');
			$itemdescription->Abstracttext = $this->SafeGetVal($json, 'abstracttext');
			$itemdescription->Accrual = $this->SafeGetVal($json, 'accrual');
			$itemdescription->Appraisaldesstructionschedulling = $this->SafeGetVal($json, 'appraisaldesstructionschedulling');
			$itemdescription->Arrangement = $this->SafeGetVal($json, 'arrangement');
			$itemdescription->Broadcastmethod = $this->SafeGetVal($json, 'broadcastmethod');
			$itemdescription->Era = $this->SafeGetVal($json, 'era');
			$itemdescription->Fromcorporate = $this->SafeGetVal($json, 'fromcorporate');
			$itemdescription->Frompersonal = $this->SafeGetVal($json, 'frompersonal');
			$itemdescription->Geographiccoodnates = $this->SafeGetVal($json, 'geographiccoodnates');
			$itemdescription->Geographicname = $this->SafeGetVal($json, 'geographicname');
			$itemdescription->Label = $this->SafeGetVal($json, 'label');
			$itemdescription->Language = $this->SafeGetVal($json, 'language');
			$itemdescription->Mediapresentation = $this->SafeGetVal($json, 'mediapresentation');
			$itemdescription->Movement = $this->SafeGetVal($json, 'movement');
			$itemdescription->Other = $this->SafeGetVal($json, 'other');
			$itemdescription->Period = $this->SafeGetVal($json, 'period');
			$itemdescription->Periodicity = $this->SafeGetVal($json, 'periodicity');
			$itemdescription->Preservationstatus = $this->SafeGetVal($json, 'preservationstatus');
			$itemdescription->Scope = $this->SafeGetVal($json, 'scope');
			$itemdescription->Style = $this->SafeGetVal($json, 'style');
			$itemdescription->Subject = $this->SafeGetVal($json, 'subject');
			$itemdescription->Tableofcontents = $this->SafeGetVal($json, 'tableofcontents');
			$itemdescription->Targetaudience = $this->SafeGetVal($json, 'targetaudience');
			$itemdescription->Tocorporate = $this->SafeGetVal($json, 'tocorporate');
			$itemdescription->Topersonal = $this->SafeGetVal($json, 'topersonal');

			$itemdescription->Validate();
			$errors = $itemdescription->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$itemdescription->Save();
				$this->RenderJSON($itemdescription, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Itemdescription record and render response as JSON
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
			$itemdescription = $this->Phreezer->Get('Itemdescription',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $itemdescription->Id = $this->SafeGetVal($json, 'id', $itemdescription->Id);

			$itemdescription->Item = $this->SafeGetVal($json, 'item', $itemdescription->Item);
			$itemdescription->Abstracttext = $this->SafeGetVal($json, 'abstracttext', $itemdescription->Abstracttext);
			$itemdescription->Accrual = $this->SafeGetVal($json, 'accrual', $itemdescription->Accrual);
			$itemdescription->Appraisaldesstructionschedulling = $this->SafeGetVal($json, 'appraisaldesstructionschedulling', $itemdescription->Appraisaldesstructionschedulling);
			$itemdescription->Arrangement = $this->SafeGetVal($json, 'arrangement', $itemdescription->Arrangement);
			$itemdescription->Broadcastmethod = $this->SafeGetVal($json, 'broadcastmethod', $itemdescription->Broadcastmethod);
			$itemdescription->Era = $this->SafeGetVal($json, 'era', $itemdescription->Era);
			$itemdescription->Fromcorporate = $this->SafeGetVal($json, 'fromcorporate', $itemdescription->Fromcorporate);
			$itemdescription->Frompersonal = $this->SafeGetVal($json, 'frompersonal', $itemdescription->Frompersonal);
			$itemdescription->Geographiccoodnates = $this->SafeGetVal($json, 'geographiccoodnates', $itemdescription->Geographiccoodnates);
			$itemdescription->Geographicname = $this->SafeGetVal($json, 'geographicname', $itemdescription->Geographicname);
			$itemdescription->Label = $this->SafeGetVal($json, 'label', $itemdescription->Label);
			$itemdescription->Language = $this->SafeGetVal($json, 'language', $itemdescription->Language);
			$itemdescription->Mediapresentation = $this->SafeGetVal($json, 'mediapresentation', $itemdescription->Mediapresentation);
			$itemdescription->Movement = $this->SafeGetVal($json, 'movement', $itemdescription->Movement);
			$itemdescription->Other = $this->SafeGetVal($json, 'other', $itemdescription->Other);
			$itemdescription->Period = $this->SafeGetVal($json, 'period', $itemdescription->Period);
			$itemdescription->Periodicity = $this->SafeGetVal($json, 'periodicity', $itemdescription->Periodicity);
			$itemdescription->Preservationstatus = $this->SafeGetVal($json, 'preservationstatus', $itemdescription->Preservationstatus);
			$itemdescription->Scope = $this->SafeGetVal($json, 'scope', $itemdescription->Scope);
			$itemdescription->Style = $this->SafeGetVal($json, 'style', $itemdescription->Style);
			$itemdescription->Subject = $this->SafeGetVal($json, 'subject', $itemdescription->Subject);
			$itemdescription->Tableofcontents = $this->SafeGetVal($json, 'tableofcontents', $itemdescription->Tableofcontents);
			$itemdescription->Targetaudience = $this->SafeGetVal($json, 'targetaudience', $itemdescription->Targetaudience);
			$itemdescription->Tocorporate = $this->SafeGetVal($json, 'tocorporate', $itemdescription->Tocorporate);
			$itemdescription->Topersonal = $this->SafeGetVal($json, 'topersonal', $itemdescription->Topersonal);

			$itemdescription->Validate();
			$errors = $itemdescription->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$itemdescription->Save();
				$this->RenderJSON($itemdescription, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Itemdescription record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$itemdescription = $this->Phreezer->Get('Itemdescription',$pk);

			$itemdescription->Delete();

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
