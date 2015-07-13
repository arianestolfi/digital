<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Storage.php");

/**
 * StorageController is the controller class for the Storage object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class StorageController extends AppBaseController
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
	 * Displays a list view of Storage objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Storage records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new StorageCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Idstorage,Host,Local,Username,Password,Folder,Urlftp,Urlhttp,Ipaddress,Full,Usedspace,Diskcapacity,Institution,Defaultstorage,Port,Status'
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

				$storages = $this->Phreezer->Query('Storage',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $storages->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $storages->TotalResults;
				$output->totalPages = $storages->TotalPages;
				$output->pageSize = $storages->PageSize;
				$output->currentPage = $storages->CurrentPage;
			}
			else
			{
				// return all results
				$storages = $this->Phreezer->Query('Storage',$criteria);
				$output->rows = $storages->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Storage record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idstorage');
			$storage = $this->Phreezer->Get('Storage',$pk);
			$this->RenderJSON($storage, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Storage record and render response as JSON
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

			$storage = new Storage($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $storage->Idstorage = $this->SafeGetVal($json, 'idstorage');

			$storage->Host = $this->SafeGetVal($json, 'host');
			$storage->Local = $this->SafeGetVal($json, 'local');
			$storage->Username = $this->SafeGetVal($json, 'username');
			$storage->Password = $this->SafeGetVal($json, 'password');
			$storage->Folder = $this->SafeGetVal($json, 'folder');
			$storage->Urlftp = $this->SafeGetVal($json, 'urlftp');
			$storage->Urlhttp = $this->SafeGetVal($json, 'urlhttp');
			$storage->Ipaddress = $this->SafeGetVal($json, 'ipaddress');
			$storage->Full = $this->SafeGetVal($json, 'full');
			$storage->Usedspace = $this->SafeGetVal($json, 'usedspace');
			$storage->Diskcapacity = $this->SafeGetVal($json, 'diskcapacity');
			$storage->Institution = $this->SafeGetVal($json, 'institution');
			$storage->Defaultstorage = $this->SafeGetVal($json, 'defaultstorage');
			$storage->Port = $this->SafeGetVal($json, 'port');
			$storage->Status = $this->SafeGetVal($json, 'status');

			$storage->Validate();
			$errors = $storage->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$storage->Save();
				$this->RenderJSON($storage, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Storage record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idstorage');
			$storage = $this->Phreezer->Get('Storage',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $storage->Idstorage = $this->SafeGetVal($json, 'idstorage', $storage->Idstorage);

			$storage->Host = $this->SafeGetVal($json, 'host', $storage->Host);
			$storage->Local = $this->SafeGetVal($json, 'local', $storage->Local);
			$storage->Username = $this->SafeGetVal($json, 'username', $storage->Username);
			$storage->Password = $this->SafeGetVal($json, 'password', $storage->Password);
			$storage->Folder = $this->SafeGetVal($json, 'folder', $storage->Folder);
			$storage->Urlftp = $this->SafeGetVal($json, 'urlftp', $storage->Urlftp);
			$storage->Urlhttp = $this->SafeGetVal($json, 'urlhttp', $storage->Urlhttp);
			$storage->Ipaddress = $this->SafeGetVal($json, 'ipaddress', $storage->Ipaddress);
			$storage->Full = $this->SafeGetVal($json, 'full', $storage->Full);
			$storage->Usedspace = $this->SafeGetVal($json, 'usedspace', $storage->Usedspace);
			$storage->Diskcapacity = $this->SafeGetVal($json, 'diskcapacity', $storage->Diskcapacity);
			$storage->Institution = $this->SafeGetVal($json, 'institution', $storage->Institution);
			$storage->Defaultstorage = $this->SafeGetVal($json, 'defaultstorage', $storage->Defaultstorage);
			$storage->Port = $this->SafeGetVal($json, 'port', $storage->Port);
			$storage->Status = $this->SafeGetVal($json, 'status', $storage->Status);

			$storage->Validate();
			$errors = $storage->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$storage->Save();
				$this->RenderJSON($storage, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Storage record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idstorage');
			$storage = $this->Phreezer->Get('Storage',$pk);

			$storage->Delete();

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
