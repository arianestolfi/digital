<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Contact.php");

/**
 * ContactController is the controller class for the Contact object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ContactController extends AppBaseController
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
	 * Displays a list view of Contact objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Contact records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ContactCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Idcontact,Institution,Iditem,Idexposition,Idholder,Idcreator,User,Contactname,Urla,Contactcall,Company,Uri,Identity,Federaltaxcode,Statetaxcode,Countytaxcode'
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

				$contacts = $this->Phreezer->Query('Contact',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $contacts->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $contacts->TotalResults;
				$output->totalPages = $contacts->TotalPages;
				$output->pageSize = $contacts->PageSize;
				$output->currentPage = $contacts->CurrentPage;
			}
			else
			{
				// return all results
				$contacts = $this->Phreezer->Query('Contact',$criteria);
				$output->rows = $contacts->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Contact record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idcontact');
			$contact = $this->Phreezer->Get('Contact',$pk);
			$this->RenderJSON($contact, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Contact record and render response as JSON
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

			$contact = new Contact($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $contact->Idcontact = $this->SafeGetVal($json, 'idcontact');

			$contact->Institution = $this->SafeGetVal($json, 'institution');
			$contact->Iditem = $this->SafeGetVal($json, 'iditem');
			$contact->Idexposition = $this->SafeGetVal($json, 'idexposition');
			$contact->Idholder = $this->SafeGetVal($json, 'idholder');
			$contact->Idcreator = $this->SafeGetVal($json, 'idcreator');
			$contact->User = $this->SafeGetVal($json, 'user');
			$contact->Contactname = $this->SafeGetVal($json, 'contactname');
			$contact->Urla = $this->SafeGetVal($json, 'urla');
			$contact->Contactcall = $this->SafeGetVal($json, 'contactcall');
			$contact->Company = $this->SafeGetVal($json, 'company');
			$contact->Uri = $this->SafeGetVal($json, 'uri');
			$contact->Identity = $this->SafeGetVal($json, 'identity');
			$contact->Federaltaxcode = $this->SafeGetVal($json, 'federaltaxcode');
			$contact->Statetaxcode = $this->SafeGetVal($json, 'statetaxcode');
			$contact->Countytaxcode = $this->SafeGetVal($json, 'countytaxcode');

			$contact->Validate();
			$errors = $contact->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$contact->Save();
				$this->RenderJSON($contact, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Contact record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idcontact');
			$contact = $this->Phreezer->Get('Contact',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $contact->Idcontact = $this->SafeGetVal($json, 'idcontact', $contact->Idcontact);

			$contact->Institution = $this->SafeGetVal($json, 'institution', $contact->Institution);
			$contact->Iditem = $this->SafeGetVal($json, 'iditem', $contact->Iditem);
			$contact->Idexposition = $this->SafeGetVal($json, 'idexposition', $contact->Idexposition);
			$contact->Idholder = $this->SafeGetVal($json, 'idholder', $contact->Idholder);
			$contact->Idcreator = $this->SafeGetVal($json, 'idcreator', $contact->Idcreator);
			$contact->User = $this->SafeGetVal($json, 'user', $contact->User);
			$contact->Contactname = $this->SafeGetVal($json, 'contactname', $contact->Contactname);
			$contact->Urla = $this->SafeGetVal($json, 'urla', $contact->Urla);
			$contact->Contactcall = $this->SafeGetVal($json, 'contactcall', $contact->Contactcall);
			$contact->Company = $this->SafeGetVal($json, 'company', $contact->Company);
			$contact->Uri = $this->SafeGetVal($json, 'uri', $contact->Uri);
			$contact->Identity = $this->SafeGetVal($json, 'identity', $contact->Identity);
			$contact->Federaltaxcode = $this->SafeGetVal($json, 'federaltaxcode', $contact->Federaltaxcode);
			$contact->Statetaxcode = $this->SafeGetVal($json, 'statetaxcode', $contact->Statetaxcode);
			$contact->Countytaxcode = $this->SafeGetVal($json, 'countytaxcode', $contact->Countytaxcode);

			$contact->Validate();
			$errors = $contact->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$contact->Save();
				$this->RenderJSON($contact, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Contact record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idcontact');
			$contact = $this->Phreezer->Get('Contact',$pk);

			$contact->Delete();

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
