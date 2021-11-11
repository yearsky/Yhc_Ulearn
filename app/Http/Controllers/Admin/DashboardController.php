<?php
/**
 * PHP Version 7.1.7-1
 * Functions for dashboard
 *
 * @category  File
 * @package   Dashboard
 * @author    Mohamed Yahya
 * @copyright ULEARN  
 * @license   BSD Licence
 * @link      Link
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Models\Gallery;
use Image;
use SiteHelpers;
use App\Models\WithdrawRequest;
use App\Models\Instructor;

/**
 * Class contain functions for admin
 *
 * @category  Class
 * @package   Dashboard
 * @author    Mohamed Yahya
 * @copyright ULEARN
 * @license   BSD Licence
 * @link      Link
 */
class DashboardController extends Controller
{
    /**
     * Function to display the dashboard contents for admin
     *
     * @param array $request All input values from form
     *
     * @return contents to display in dashboard
     */
    public function __invoke()
    {
        $courses = DB::table('courses')
                        ->select('courses.*', 'categories.name as category_name', 'instructors.first_name as instructor_name')
                        ->leftJoin('categories', 'categories.id', '=', 'courses.category_id')
                        ->leftJoin('instructors', 'instructors.id', '=', 'courses.instructor_id')
                        ->paginate(5);
        $metrics = Instructor::admin_metrics();
        return view('admin.dashboard.index', compact('courses', 'metrics'));
    }

    public function showGallery()
    {
        $gallery = Gallery::all();
        return view('admin.dashboard.gallery',compact('gallery'));
    }
   
    public function getForm($galleryId='',Request $request)
    {
        if($galleryId) {
            $gallery = Gallery::find($galleryId);
        }else{
            $gallery = $this->getColumnTable('gallery');
        }
        return view('admin.dashboard.galleryForm', compact('gallery'));
    }

    public function saveGallery($gallery_id='',Request $request)
    {
        // echo '<pre>';print_r($_POST);exit;
        $gallery_id = $request->input('gallery_id');

        $validation_rules = ['gallery_title' => 'required|string'];

        $validator = Validator::make($request->all(),$validation_rules);

        // Stop if validation fails
        if ($validator->fails()) {
            return $this->return_output('error', 'error', $validator, 'back', '422');
        }

        if ($gallery_id) {
            $gallery = Gallery::find($gallery_id);
            $success_message = 'Gallery updated successfully';
        } else {
            $gallery = new Gallery();
            $success_message = 'Gallery added successfully';

        }

        $gallery->title = $request->input('gallery_title');
        $gallery->is_active = $request->input('is_active');

        if (Input::hasFile('gallery_image') && Input::has('gallery_image_base64')) {
            //delete old file
            $old_image = $request->input('old_gallery_image');
            if (Storage::exists($old_image)) {
                Storage::delete($old_image);
            }

            //get filename
            $file_name   = $request->file('gallery_image')->getClientOriginalName();

            // returns Intervention\Image\Image
            $image_make = Image::make($request->input('gallery_image_base64'))->encode('jpg');

            // create path
            $path = "gallery";
            
            //check if the file name is already exists
            $new_file_name = SiteHelpers::checkFileName($path, $file_name);

            //save the image using storage
            Storage::put($path."/".$new_file_name, $image_make->__toString(), 'public');

            $gallery->path = $path."/".$new_file_name;
            
        }

        $gallery->save();

        return $this->return_output('flash', 'success', $success_message, 'admin/gallery', '200');
    }

    public function deleteGallery($galleryId)
    {
        Gallery::destroy($galleryId);
        return $this->return_output('flash', 'success', 'Gallery deleted successfully', 'admin/gallery', '200');
    }
    
}
