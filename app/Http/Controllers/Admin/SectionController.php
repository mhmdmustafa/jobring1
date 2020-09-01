<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    public function sections(){
        Session::put('page','sections');
        $sections=Section::get();
        return view('admin.sections.sections')->with(compact('sections'));
    }
    public function updateSectionStatus(Request $request){
        if($request->ajax()){
            $data=$request->all();
            // echo '<prev>';print_r($data);die;
            if($data['status']=='Active'){
                $status=0;

            }else {
                $status=1;
            }
            Section::where('id',$data['section_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);
        }
    }
    public function addEditSection(Request $request,$id=null){
        if ($id==""){
            $title='Add Section';
            $section=new Section();
            $sectionData=array();

            $custom_message='Section Added Successfully';

        }else{
            $title='Edit Section';
            $sectionData=Section::where('id',$id)->first();

            $section=Section::find($id);
            $custom_message='Section Updated Successfully';

        }
        if($request->isMethod('post')){
            $data=$request->all();

            $rules = [
                'section_name' => 'required',
                'description'=>'required',
            ];
            $messages = [
                'section_name.required' => 'Name is Required',
                'description.required'=>'section is required',
            ];
            $this->validate($request, $rules, $messages);

            if(empty($data['description'])){
                $data['description']='';
            }

            $section->section_name=$data['section_name'];
            $section->description=$data['description'];
            $section->status=1;
            $section->save();
            Session::flash('success_message', $custom_message);
            return redirect('/admin/sections');
        }

        return view('admin.sections.add_edit_section')->with(compact('title','sectionData'));

    }
    public function deleteSection($id){
        Section::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Section Deleted');

    }
}
