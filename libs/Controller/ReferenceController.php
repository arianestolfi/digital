<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Reference.php");

/**
 * ReferenceController is the controller class for the Reference object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ReferenceController extends AppBaseController
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
	 * Displays a list view of Reference objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Reference records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ReferenceCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Idreference,Item,Institution,Creator,Referencetype,Referencetitle,Referencedescription,Referenceauthor,Referencetext,Otherinformations'
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

				$references = $this->Phreezer->Query('Reference',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $references->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $references->TotalResults;
				$output->totalPages = $references->TotalPages;
				$output->pageSize = $references->PageSize;
				$output->currentPage = $references->CurrentPage;
			}
			else
			{
				// return all results
				$references = $this->Phreezer->Query('Reference',$criteria);
				$output->rows = $references->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Reference record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idreference');
			$reference = $this->Phreezer->Get('Reference',$pk);
			$this->RenderJSON($reference, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Reference record and render response as JSON
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

			$reference = new Reference($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $reference->Idreference = $this->SafeGetVal($json, 'idreference');

			$reference->Item = $this->SafeGetVal($json, 'item');
			$reference->Institution = $this->SafeGetVal($json, 'institution');
			$reference->Creator = $this->SafeGetVal($json, 'creator');
			$reference->Referencetype = $this->SafeGetVal($json, 'referencetype');
			$reference->Referencetitle = $this->SafeGetVal($json, 'referencetitle');
			$reference->Referencedescription = $this->SafeGetVal($json, 'referencedescription');
			$reference->Referenceauthor = $this->SafeGetVal($json, 'referenceauthor');
			$reference->Referencetext = $this->SafeGetVal($json, 'referencetext');
			$reference->Otherinformations = $this->SafeGetVal($json, 'otherinformations');

			$reference->Validate();
			$errors = $reference->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$reference->Save();
				$this->RenderJSON($reference, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Reference record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idreference');
			$reference = $this->Phreezer->Get('Reference',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $reference->Idreference = $this->SafeGetVal($json, 'idreference', $reference->Idreference);

			$reference->Item = $this->SafeGetVal($json, 'item', $reference->Item);
			$reference->Institution = $this->SafeGetVal($json, 'institution', $reference->Institution);
			$reference->Creator = $this->SafeGetVal($json, 'creator', $reference->Creator);
			$reference->Referencetype = $this->SafeGetVal($json, 'referencetype', $reference->Referencetype);
			$reference->Referencetitle = $this->SafeGetVal($json, 'referencetitle', $reference->Referencetitle);
			$reference->Referencedescription = $this->SafeGetVal($json, 'referencedescription', $reference->Referencedescription);
			$reference->Referenceauthor = $this->SafeGetVal($json, 'referenceauthor', $reference->Referenceauthor);
			$reference->Referencetext = $this->SafeGetVal($json, 'referencetext', $reference->Referencetext);
			$reference->Otherinformations = $this->SafeGetVal($json, 'otherinformations', $reference->Otherinformations);

			$reference->Validate();
			$errors = $reference->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$reference->Save();
				$this->RenderJSON($reference, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Reference record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idreference');
			$reference = $this->Phreezer->Get('Reference',$pk);

			$reference->Delete();

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
