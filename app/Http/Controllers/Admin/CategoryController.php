<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    public function categories(){
       Session::put('page','categories');
        $categories=Category::with('section','parentCategory')->get();
       return view('admin.categories.categories')->with(compact('categories'));
   }
    public function addEditCategory(Request $request,$id=null){
        if ($id==""){
            $title='Add Category';
            $category=new Category;
            $categoryData=array();
            $getCategories=array();
            $custom_message='Category Added Successfully';

        }else{
            $title='Edit Category';
            $categoryData=Category::where('id',$id)->first();
            $getCategories=Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$categoryData['section_id']])->get();
            $category=Category::find($id);
            $custom_message='Category Updated Successfully';

        }
        if($request->isMethod('post')){
            $data=$request->all();

            $rules = [
                'category_name' => 'required',
                'section_id'=>'required',
            ];
            $messages = [
                'category_name.required' => 'Name is Required',
                'section_id.required'=>'section is required',
               ];
            $this->validate($request, $rules, $messages);

            if(empty($data['description'])){
                $data['description']='';
            }

            $category->parent_id=$data['parent_id'];
            $category->section_id=$data['section_id'];
            $category->category_name=$data['category_name'];
            $category->description=$data['description'];
            $category->status=1;
            $category->save();
            Session::flash('success_message', $custom_message);
            return redirect('/admin/categories');
        }
        $getSections=Section::get();
        return view('admin.categories.add_edit_category')->with(compact('title','categoryData','getCategories','getSections'));

    }
    public function updateCategoryStatus(Request $request){
        if($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == 'Active') {
                $status = 0;
            } else {
                $status = 1;
            }
            Category::where('id', $data['category_id'])->update(['status' => $status]);
            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
        }
    }
    public function appendCategoriesLevel(Request $request){
        if($request->ajax()){
            $data=$request->all();
            $getCategories=Category::with('subcategories')->where(['parent_id'=>0,'status'=>1])->get();
            return view('admin.categories.append_categories_level')->with(compact('getCategories'));
        }
    }
    public function deleteCategory($id){
        Category::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Category Deleted');

    }

}
