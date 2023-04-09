<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use DB;

class AssessmentController extends Controller
{
    
    public function dashboard(Request $request)
    {
     $categories = Category::with('childrenCategories')->whereNull('category_id')->orderBy('id','DESC')->get();
     $admin_count = User::where('user_type','1')->count();
     $users_count = User::where('user_type','2')->count();
     return view('admin.dashboard.index',compact('admin_count','users_count','categories'));
    }

    public function usersList(Request $request)
    {
        $limit = 50;
        $all_users = User::where('is_deleted','0')->where('is_active','1')->orderBy('id','DESC');
        $all_users = $all_users->paginate($limit);
        return view('admin.users.index', compact('all_users'))
            ->with('i', ($request->input('page', 1) - 1) * $limit);
    }

    public function categoriesList(Request $request)
    {
        $categories = Category::with('childrenCategories')->whereNull('category_id')->orderBy('id','DESC')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function createCategory(Request $request)
    {   
        $data = $this->validate($request, [
              'name'      => 'required|max:255|string',
              'category_id' => 'sometimes|nullable|numeric'
        ]);  
        Category::create($data);    
        return redirect()->route('categories.index')->with('success','Category created successfully');
    }

    public function addSubCategory(Request $request,$id)
    {   
        $data = $this->validate($request, [
              'name'      => 'required|max:255|string',
        ]);  
        $data['category_id'] = $id;
        Category::create($data);    
        return redirect()->route('categories.index')->with('success','Sub category created successfully');
    }

    public function updateCategory(Request $request,$id)
    {   
        $data = $this->validate($request, [
            'name'  => 'required|max:255|string'
        ]);
        Category::whereId($id)->update($data);
        return redirect()->route('categories.index')->with('success','Category updated successfully');
    }

    public function deleteCategory(Request $request,$id)
    {   
        $check_if_parent = Category::find($id);   
        if ($check_if_parent->categories) {
            $check_if_parent->categories()->delete();
        }
        $check_if_parent->delete();
        return redirect()->route('categories.index')->with('success','Category deleted successfully');
    }








}
