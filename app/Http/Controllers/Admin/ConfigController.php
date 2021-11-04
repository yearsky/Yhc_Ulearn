<?php
/**
 * PHP Version 7.1.7-1
 * Functions for users
 *
 * @category  File
 * @package   Config
 * @author    Mohamed Yahya
 * @copyright ULEARN  
 * @license   BSD Licence
 * @link      Link
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Image;
use SiteHelpers;

/**
 * Class contain functions for admin
 *
 * @category  Class
 * @package   Config
 * @author    Mohamed Yahya
 * @copyright ULEARN
 * @license   BSD Licence
 * @link      Link
 */
class ConfigController extends Controller
{
   
    public function saveConfig(Request $request)
    {
        $files = Input::file();

        //get the input values from form
        $input = $request->all();
        $code = $request->input('code');

        unset($input['_token']);
        unset($input['code']);

        foreach($files as $file_key => $file_array) {
            //delete old file
            if (Storage::exists($input['old_'.$file_key])) {
                Storage::delete($input['old_'.$file_key]);
            }
            unset($input['old_'.$file_key]);
            //save the file in original name
            $file_name = $request->file($file_key)->getClientOriginalName();
            // create path
            $path = "config";

            //check if the file name is already exists
            $new_file_name = SiteHelpers::checkFileName($path, $file_name);

            $path = $request->file($file_key)->storeAs($path, $new_file_name);
            
            //upload the image and save the image name in array, to save it in DB
            $input[$file_key] = $path;
        }

        //save the 
        Config::save_options($code, $input);
        return $this->return_output('flash', 'success', 'saved', 'back', '200');
    }

    public function pageHome(Request $request)
    {
        $config = Config::get_options('pageHome');
        return view('admin.config.page_home', compact('config'));
    }

    public function pageAbout(Request $request)
    {
        $config = Config::get_options('pageAbout');
        return view('admin.config.page_about', compact('config'));
    }

    public function pageContact(Request $request)
    {
        $config = Config::get_options('pageContact');
        return view('admin.config.page_contact', compact('config'));
    }

    public function settingGeneral(Request $request)
    {
        $config = Config::get_options('settingGeneral');
        return view('admin.config.setting_general', compact('config'));
    }

    public function settingPayment(Request $request)
    {
        $config = Config::get_options('settingPayment');
        return view('admin.config.setting_payment', compact('config'));
    }

    public function settingEmail(Request $request)
    {
        $config = Config::get_options('settingEmail');
        return view('admin.config.setting_email', compact('config'));
    }

    public function showSlider()
    {
        $slider = Slider::all();
        return view('admin.config.setting_slider',compact('slider'));
        // return $slider;
    }

    public function getForm($slide_id='', Request $request)
    {
        if($slide_id) {
            $slider = Slider::find($slide_id);
        }else{
            $slider = $this->getColumnTable('table_slider');
        }
        return view('admin.config.slideForm', compact('slider'));
        // return $slider;
    }

    public function saveSlider(Request $request)
    {
        $slider_id = $request->input('slide_id');

        $validation_rules = ['slide_title' => 'required|string'];

        $validator = Validator::make($request->all(),$validation_rules);

        // Stop if validation fails
        if ($validator->fails()) {
            return $this->return_output('error', 'error', $validator, 'back', '422');
        }

        if ($slider_id) {
            $slide = Slider::find($slider_id);
            $success_message = 'Slider updated successfully';
        } else {
            $slide = new Slider();
            $success_message = 'Slider added successfully';
        }
        $slide->title = $request->input('slide_title');
        $slide->desc = $request->input('description');
        $slide->link = '';
        $slide->is_active = $request->input('is_active');
        
        if (Input::hasFile('slide_image') && Input::has('slide_image_base64')) {
            //delete old file
            $old_image = $request->input('old_slide_image');
            if (Storage::exists($old_image)) {
                Storage::delete($old_image);
            }

            //get filename
            $file_name   = $request->file('slide_image')->getClientOriginalName();

            // returns Intervention\Image\Image
            $image_make = Image::make($request->input('slide_image_base64'))->encode('jpg');

            // create path
            $path = "slider";
            
            //check if the file name is already exists
            $new_file_name = SiteHelpers::checkFileName($path, $file_name);

            //save the image using storage
            Storage::put($path."/".$new_file_name, $image_make->__toString(), 'public');

            $slide->image = $path."/".$new_file_name;
            
        }

        $slide->save();
        return $this->return_output('flash', 'success', $success_message, 'admin/config/setting-slider', '200');
    }

    public function deleteSlider($slide_id)
    {
        Slider::destroy($slide_id);
        return $this->return_output('flash', 'success', 'Slider deleted successfully', 'admin/config/setting-slider', '200');
    }
}
