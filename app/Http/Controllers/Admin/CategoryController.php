<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class CategoryController extends Controller
{
  // DONE all CategoryController 
  public function index()
  {
    $categories = Category::all();
    return view('admin.categories.index', compact('categories'));
  }

  public function getForm($category_id = '', Request $request)
  {
    if ($category_id) {
      $category = Category::find($category_id);
    } else {
      $category = $this->getColumnTable('categories');
    }
    return view('admin.categories.form', compact('category'));
  }

  public function saveCategory(Request $request)
  {
    $category_id = $request->input('category_id');
    $validation_rules = ['name' => 'required|string|max:50'];
    $validator = Validator::make($request->all(), $validation_rules);

    // Stop if validation fails
    if ($validator->fails()) {
      return $this->return_output('error', 'error', $validator, 'back', '422');
    }

    if ($category_id) {
      $category = Category::find($category_id);
      $success_message = 'Berhasil Update Kategori';
    } else {
      $category = new Category();
      $success_message = 'Berhasil Menambahkan Kategori';
      //create slug only while add
      $slug = $request->input('name');
      $slug = str_slug($slug, '-');
      $results = DB::select(DB::raw("SELECT count(*) as total from categories where slug REGEXP '^{$slug}(-[0-9]+)?$' "));
      $finalSlug = ($results['0']->total > 0) ? "{$slug}-{$results['0']->total}" : $slug;
      $category->slug = $finalSlug;
    }
    
    $category->name = $request->input('name');
    $category->icon_class = $request->input('icon_class');
    $category->is_active = $request->input('is_active');
    $category->save();
    return $this->return_output('flash', 'success', $success_message, 'admin/categories', '200');
  }

  public function deleteCategory($category_id)
  {
    Category::destroy($category_id);
    return $this->return_output('flash', 'success', 'Berhasil Menghapus Kategori', 'admin/categories', '200');
  }
}
