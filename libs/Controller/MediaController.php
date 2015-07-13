<?php
/** @package    DIGITAL::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Media.php");

/**
 * MediaController is the controller class for the Media object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package DIGITAL::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class MediaController extends AppBaseController
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
	 * Displays a list view of Media objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Media records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new MediaCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Idmedia,Idhistory,Storage,Iddocumentation,Institution,Idreference,Mediatype,Mediaurl,Digitizationdate,Digitizationresponsable,Polarity,Colorspace,Iccprofile,Xresolution,Yresolution,Thumbnail,Digitizationequipment,Format,Ispublic,Ordername,Sent,Exif,Textual,Sizemedia,Nameoriginal,Mainmedia,Mediadir,Thumbnaildir,Thumbnailurl'
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

				$medias = $this->Phreezer->Query('Media',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $medias->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $medias->TotalResults;
				$output->totalPages = $medias->TotalPages;
				$output->pageSize = $medias->PageSize;
				$output->currentPage = $medias->CurrentPage;
			}
			else
			{
				// return all results
				$medias = $this->Phreezer->Query('Media',$criteria);
				$output->rows = $medias->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Media record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idmedia');
			$media = $this->Phreezer->Get('Media',$pk);
			$this->RenderJSON($media, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Media record and render response as JSON
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

			$media = new Media($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $media->Idmedia = $this->SafeGetVal($json, 'idmedia');

			$media->Idhistory = $this->SafeGetVal($json, 'idhistory');
			$media->Storage = $this->SafeGetVal($json, 'storage');
			$media->Iddocumentation = $this->SafeGetVal($json, 'iddocumentation');
			$media->Institution = $this->SafeGetVal($json, 'institution');
			$media->Idreference = $this->SafeGetVal($json, 'idreference');
			$media->Mediatype = $this->SafeGetVal($json, 'mediatype');
			$media->Mediaurl = $this->SafeGetVal($json, 'mediaurl');
			$media->Digitizationdate = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'digitizationdate')));
			$media->Digitizationresponsable = $this->SafeGetVal($json, 'digitizationresponsable');
			$media->Polarity = $this->SafeGetVal($json, 'polarity');
			$media->Colorspace = $this->SafeGetVal($json, 'colorspace');
			$media->Iccprofile = $this->SafeGetVal($json, 'iccprofile');
			$media->Xresolution = $this->SafeGetVal($json, 'xresolution');
			$media->Yresolution = $this->SafeGetVal($json, 'yresolution');
			$media->Thumbnail = $this->SafeGetVal($json, 'thumbnail');
			$media->Digitizationequipment = $this->SafeGetVal($json, 'digitizationequipment');
			$media->Format = $this->SafeGetVal($json, 'format');
			$media->Ispublic = $this->SafeGetVal($json, 'ispublic');
			$media->Ordername = $this->SafeGetVal($json, 'ordername');
			$media->Sent = $this->SafeGetVal($json, 'sent');
			$media->Exif = $this->SafeGetVal($json, 'exif');
			$media->Textual = $this->SafeGetVal($json, 'textual');
			$media->Sizemedia = $this->SafeGetVal($json, 'sizemedia');
			$media->Nameoriginal = $this->SafeGetVal($json, 'nameoriginal');
			$media->Mainmedia = $this->SafeGetVal($json, 'mainmedia');
			$media->Mediadir = $this->SafeGetVal($json, 'mediadir');
			$media->Thumbnaildir = $this->SafeGetVal($json, 'thumbnaildir');
			$media->Thumbnailurl = $this->SafeGetVal($json, 'thumbnailurl');

			$media->Validate();
			$errors = $media->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$media->Save();
				$this->RenderJSON($media, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Media record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idmedia');
			$media = $this->Phreezer->Get('Media',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $media->Idmedia = $this->SafeGetVal($json, 'idmedia', $media->Idmedia);

			$media->Idhistory = $this->SafeGetVal($json, 'idhistory', $media->Idhistory);
			$media->Storage = $this->SafeGetVal($json, 'storage', $media->Storage);
			$media->Iddocumentation = $this->SafeGetVal($json, 'iddocumentation', $media->Iddocumentation);
			$media->Institution = $this->SafeGetVal($json, 'institution', $media->Institution);
			$media->Idreference = $this->SafeGetVal($json, 'idreference', $media->Idreference);
			$media->Mediatype = $this->SafeGetVal($json, 'mediatype', $media->Mediatype);
			$media->Mediaurl = $this->SafeGetVal($json, 'mediaurl', $media->Mediaurl);
			$media->Digitizationdate = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'digitizationdate', $media->Digitizationdate)));
			$media->Digitizationresponsable = $this->SafeGetVal($json, 'digitizationresponsable', $media->Digitizationresponsable);
			$media->Polarity = $this->SafeGetVal($json, 'polarity', $media->Polarity);
			$media->Colorspace = $this->SafeGetVal($json, 'colorspace', $media->Colorspace);
			$media->Iccprofile = $this->SafeGetVal($json, 'iccprofile', $media->Iccprofile);
			$media->Xresolution = $this->SafeGetVal($json, 'xresolution', $media->Xresolution);
			$media->Yresolution = $this->SafeGetVal($json, 'yresolution', $media->Yresolution);
			$media->Thumbnail = $this->SafeGetVal($json, 'thumbnail', $media->Thumbnail);
			$media->Digitizationequipment = $this->SafeGetVal($json, 'digitizationequipment', $media->Digitizationequipment);
			$media->Format = $this->SafeGetVal($json, 'format', $media->Format);
			$media->Ispublic = $this->SafeGetVal($json, 'ispublic', $media->Ispublic);
			$media->Ordername = $this->SafeGetVal($json, 'ordername', $media->Ordername);
			$media->Sent = $this->SafeGetVal($json, 'sent', $media->Sent);
			$media->Exif = $this->SafeGetVal($json, 'exif', $media->Exif);
			$media->Textual = $this->SafeGetVal($json, 'textual', $media->Textual);
			$media->Sizemedia = $this->SafeGetVal($json, 'sizemedia', $media->Sizemedia);
			$media->Nameoriginal = $this->SafeGetVal($json, 'nameoriginal', $media->Nameoriginal);
			$media->Mainmedia = $this->SafeGetVal($json, 'mainmedia', $media->Mainmedia);
			$media->Mediadir = $this->SafeGetVal($json, 'mediadir', $media->Mediadir);
			$media->Thumbnaildir = $this->SafeGetVal($json, 'thumbnaildir', $media->Thumbnaildir);
			$media->Thumbnailurl = $this->SafeGetVal($json, 'thumbnailurl', $media->Thumbnailurl);

			$media->Validate();
			$errors = $media->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$media->Save();
				$this->RenderJSON($media, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Media record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idmedia');
			$media = $this->Phreezer->Get('Media',$pk);

			$media->Delete();

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
