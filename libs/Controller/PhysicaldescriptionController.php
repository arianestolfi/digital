<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Physicaldescription.php");

/**
 * PhysicaldescriptionController is the controller class for the Physicaldescription object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class PhysicaldescriptionController extends AppBaseController
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
	 * Displays a list view of Physicaldescription objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Physicaldescription records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new PhysicaldescriptionCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,Item,Apexiso,Arabicpagenumbering,Asaiso,Boundtype,Color,Colorsystem,Columnnumber,Compressionmethod,Contentcolor,Contentextent,Contentfinishing,Contentsubstract,Contenttype,Covercolor,Coverfinishing,Coversubstract,Defaultapplication,Dustjacketcolor,Dustjacketfinishing,Dustjacketsubstract,Endpaper,Exif,Format,Framerate,Hasdustjacket,Hassound,Hasspecialfold,Iscompressed,Lengthtxt,Master,Media,Mediasupport,Movements,Other,Projectionmode,Romanpage,Sizetxt,Soundsystem,Specialfold,Specialpagenumebring,Technique,Timecode,Tinting,Titlepage,Totaltime,Type,Writingformat'
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

				$physicaldescriptions = $this->Phreezer->Query('Physicaldescription',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $physicaldescriptions->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $physicaldescriptions->TotalResults;
				$output->totalPages = $physicaldescriptions->TotalPages;
				$output->pageSize = $physicaldescriptions->PageSize;
				$output->currentPage = $physicaldescriptions->CurrentPage;
			}
			else
			{
				// return all results
				$physicaldescriptions = $this->Phreezer->Query('Physicaldescription',$criteria);
				$output->rows = $physicaldescriptions->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Physicaldescription record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$physicaldescription = $this->Phreezer->Get('Physicaldescription',$pk);
			$this->RenderJSON($physicaldescription, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Physicaldescription record and render response as JSON
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

			$physicaldescription = new Physicaldescription($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $physicaldescription->Id = $this->SafeGetVal($json, 'id');

			$physicaldescription->Item = $this->SafeGetVal($json, 'item');
			$physicaldescription->Apexiso = $this->SafeGetVal($json, 'apexiso');
			$physicaldescription->Arabicpagenumbering = $this->SafeGetVal($json, 'arabicpagenumbering');
			$physicaldescription->Asaiso = $this->SafeGetVal($json, 'asaiso');
			$physicaldescription->Boundtype = $this->SafeGetVal($json, 'boundtype');
			$physicaldescription->Color = $this->SafeGetVal($json, 'color');
			$physicaldescription->Colorsystem = $this->SafeGetVal($json, 'colorsystem');
			$physicaldescription->Columnnumber = $this->SafeGetVal($json, 'columnnumber');
			$physicaldescription->Compressionmethod = $this->SafeGetVal($json, 'compressionmethod');
			$physicaldescription->Contentcolor = $this->SafeGetVal($json, 'contentcolor');
			$physicaldescription->Contentextent = $this->SafeGetVal($json, 'contentextent');
			$physicaldescription->Contentfinishing = $this->SafeGetVal($json, 'contentfinishing');
			$physicaldescription->Contentsubstract = $this->SafeGetVal($json, 'contentsubstract');
			$physicaldescription->Contenttype = $this->SafeGetVal($json, 'contenttype');
			$physicaldescription->Covercolor = $this->SafeGetVal($json, 'covercolor');
			$physicaldescription->Coverfinishing = $this->SafeGetVal($json, 'coverfinishing');
			$physicaldescription->Coversubstract = $this->SafeGetVal($json, 'coversubstract');
			$physicaldescription->Defaultapplication = $this->SafeGetVal($json, 'defaultapplication');
			$physicaldescription->Dustjacketcolor = $this->SafeGetVal($json, 'dustjacketcolor');
			$physicaldescription->Dustjacketfinishing = $this->SafeGetVal($json, 'dustjacketfinishing');
			$physicaldescription->Dustjacketsubstract = $this->SafeGetVal($json, 'dustjacketsubstract');
			$physicaldescription->Endpaper = $this->SafeGetVal($json, 'endpaper');
			$physicaldescription->Exif = $this->SafeGetVal($json, 'exif');
			$physicaldescription->Format = $this->SafeGetVal($json, 'format');
			$physicaldescription->Framerate = $this->SafeGetVal($json, 'framerate');
			$physicaldescription->Hasdustjacket = $this->SafeGetVal($json, 'hasdustjacket');
			$physicaldescription->Hassound = $this->SafeGetVal($json, 'hassound');
			$physicaldescription->Hasspecialfold = $this->SafeGetVal($json, 'hasspecialfold');
			$physicaldescription->Iscompressed = $this->SafeGetVal($json, 'iscompressed');
			$physicaldescription->Lengthtxt = $this->SafeGetVal($json, 'lengthtxt');
			$physicaldescription->Master = $this->SafeGetVal($json, 'master');
			$physicaldescription->Media = $this->SafeGetVal($json, 'media');
			$physicaldescription->Mediasupport = $this->SafeGetVal($json, 'mediasupport');
			$physicaldescription->Movements = $this->SafeGetVal($json, 'movements');
			$physicaldescription->Other = $this->SafeGetVal($json, 'other');
			$physicaldescription->Projectionmode = $this->SafeGetVal($json, 'projectionmode');
			$physicaldescription->Romanpage = $this->SafeGetVal($json, 'romanpage');
			$physicaldescription->Sizetxt = $this->SafeGetVal($json, 'sizetxt');
			$physicaldescription->Soundsystem = $this->SafeGetVal($json, 'soundsystem');
			$physicaldescription->Specialfold = $this->SafeGetVal($json, 'specialfold');
			$physicaldescription->Specialpagenumebring = $this->SafeGetVal($json, 'specialpagenumebring');
			$physicaldescription->Technique = $this->SafeGetVal($json, 'technique');
			$physicaldescription->Timecode = $this->SafeGetVal($json, 'timecode');
			$physicaldescription->Tinting = $this->SafeGetVal($json, 'tinting');
			$physicaldescription->Titlepage = $this->SafeGetVal($json, 'titlepage');
			$physicaldescription->Totaltime = $this->SafeGetVal($json, 'totaltime');
			$physicaldescription->Type = $this->SafeGetVal($json, 'type');
			$physicaldescription->Writingformat = $this->SafeGetVal($json, 'writingformat');

			$physicaldescription->Validate();
			$errors = $physicaldescription->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$physicaldescription->Save();
				$this->RenderJSON($physicaldescription, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Physicaldescription record and render response as JSON
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
			$physicaldescription = $this->Phreezer->Get('Physicaldescription',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $physicaldescription->Id = $this->SafeGetVal($json, 'id', $physicaldescription->Id);

			$physicaldescription->Item = $this->SafeGetVal($json, 'item', $physicaldescription->Item);
			$physicaldescription->Apexiso = $this->SafeGetVal($json, 'apexiso', $physicaldescription->Apexiso);
			$physicaldescription->Arabicpagenumbering = $this->SafeGetVal($json, 'arabicpagenumbering', $physicaldescription->Arabicpagenumbering);
			$physicaldescription->Asaiso = $this->SafeGetVal($json, 'asaiso', $physicaldescription->Asaiso);
			$physicaldescription->Boundtype = $this->SafeGetVal($json, 'boundtype', $physicaldescription->Boundtype);
			$physicaldescription->Color = $this->SafeGetVal($json, 'color', $physicaldescription->Color);
			$physicaldescription->Colorsystem = $this->SafeGetVal($json, 'colorsystem', $physicaldescription->Colorsystem);
			$physicaldescription->Columnnumber = $this->SafeGetVal($json, 'columnnumber', $physicaldescription->Columnnumber);
			$physicaldescription->Compressionmethod = $this->SafeGetVal($json, 'compressionmethod', $physicaldescription->Compressionmethod);
			$physicaldescription->Contentcolor = $this->SafeGetVal($json, 'contentcolor', $physicaldescription->Contentcolor);
			$physicaldescription->Contentextent = $this->SafeGetVal($json, 'contentextent', $physicaldescription->Contentextent);
			$physicaldescription->Contentfinishing = $this->SafeGetVal($json, 'contentfinishing', $physicaldescription->Contentfinishing);
			$physicaldescription->Contentsubstract = $this->SafeGetVal($json, 'contentsubstract', $physicaldescription->Contentsubstract);
			$physicaldescription->Contenttype = $this->SafeGetVal($json, 'contenttype', $physicaldescription->Contenttype);
			$physicaldescription->Covercolor = $this->SafeGetVal($json, 'covercolor', $physicaldescription->Covercolor);
			$physicaldescription->Coverfinishing = $this->SafeGetVal($json, 'coverfinishing', $physicaldescription->Coverfinishing);
			$physicaldescription->Coversubstract = $this->SafeGetVal($json, 'coversubstract', $physicaldescription->Coversubstract);
			$physicaldescription->Defaultapplication = $this->SafeGetVal($json, 'defaultapplication', $physicaldescription->Defaultapplication);
			$physicaldescription->Dustjacketcolor = $this->SafeGetVal($json, 'dustjacketcolor', $physicaldescription->Dustjacketcolor);
			$physicaldescription->Dustjacketfinishing = $this->SafeGetVal($json, 'dustjacketfinishing', $physicaldescription->Dustjacketfinishing);
			$physicaldescription->Dustjacketsubstract = $this->SafeGetVal($json, 'dustjacketsubstract', $physicaldescription->Dustjacketsubstract);
			$physicaldescription->Endpaper = $this->SafeGetVal($json, 'endpaper', $physicaldescription->Endpaper);
			$physicaldescription->Exif = $this->SafeGetVal($json, 'exif', $physicaldescription->Exif);
			$physicaldescription->Format = $this->SafeGetVal($json, 'format', $physicaldescription->Format);
			$physicaldescription->Framerate = $this->SafeGetVal($json, 'framerate', $physicaldescription->Framerate);
			$physicaldescription->Hasdustjacket = $this->SafeGetVal($json, 'hasdustjacket', $physicaldescription->Hasdustjacket);
			$physicaldescription->Hassound = $this->SafeGetVal($json, 'hassound', $physicaldescription->Hassound);
			$physicaldescription->Hasspecialfold = $this->SafeGetVal($json, 'hasspecialfold', $physicaldescription->Hasspecialfold);
			$physicaldescription->Iscompressed = $this->SafeGetVal($json, 'iscompressed', $physicaldescription->Iscompressed);
			$physicaldescription->Lengthtxt = $this->SafeGetVal($json, 'lengthtxt', $physicaldescription->Lengthtxt);
			$physicaldescription->Master = $this->SafeGetVal($json, 'master', $physicaldescription->Master);
			$physicaldescription->Media = $this->SafeGetVal($json, 'media', $physicaldescription->Media);
			$physicaldescription->Mediasupport = $this->SafeGetVal($json, 'mediasupport', $physicaldescription->Mediasupport);
			$physicaldescription->Movements = $this->SafeGetVal($json, 'movements', $physicaldescription->Movements);
			$physicaldescription->Other = $this->SafeGetVal($json, 'other', $physicaldescription->Other);
			$physicaldescription->Projectionmode = $this->SafeGetVal($json, 'projectionmode', $physicaldescription->Projectionmode);
			$physicaldescription->Romanpage = $this->SafeGetVal($json, 'romanpage', $physicaldescription->Romanpage);
			$physicaldescription->Sizetxt = $this->SafeGetVal($json, 'sizetxt', $physicaldescription->Sizetxt);
			$physicaldescription->Soundsystem = $this->SafeGetVal($json, 'soundsystem', $physicaldescription->Soundsystem);
			$physicaldescription->Specialfold = $this->SafeGetVal($json, 'specialfold', $physicaldescription->Specialfold);
			$physicaldescription->Specialpagenumebring = $this->SafeGetVal($json, 'specialpagenumebring', $physicaldescription->Specialpagenumebring);
			$physicaldescription->Technique = $this->SafeGetVal($json, 'technique', $physicaldescription->Technique);
			$physicaldescription->Timecode = $this->SafeGetVal($json, 'timecode', $physicaldescription->Timecode);
			$physicaldescription->Tinting = $this->SafeGetVal($json, 'tinting', $physicaldescription->Tinting);
			$physicaldescription->Titlepage = $this->SafeGetVal($json, 'titlepage', $physicaldescription->Titlepage);
			$physicaldescription->Totaltime = $this->SafeGetVal($json, 'totaltime', $physicaldescription->Totaltime);
			$physicaldescription->Type = $this->SafeGetVal($json, 'type', $physicaldescription->Type);
			$physicaldescription->Writingformat = $this->SafeGetVal($json, 'writingformat', $physicaldescription->Writingformat);

			$physicaldescription->Validate();
			$errors = $physicaldescription->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$physicaldescription->Save();
				$this->RenderJSON($physicaldescription, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Physicaldescription record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$physicaldescription = $this->Phreezer->Get('Physicaldescription',$pk);

			$physicaldescription->Delete();

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
