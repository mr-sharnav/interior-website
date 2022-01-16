<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProjectInteriorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $detail = Project::where('category_id', '1')->get();
        return view('admin.projects.interior.index', compact('detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceList = SubCategory::where('category_id','1')->get();
        return view('admin.projects.interior.create',compact('serviceList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'    => 'required',
            'sub_category_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ], [
            'title.required'     => 'Please Enter Project Title',
            'sub_category_id.required' => 'Please Select A Service',
            'short_description.required' => 'Please Enter Short Description',
            'long_description.required' => 'Please Enter Long Description',
        ]);

        $service = new Project();
        $service->title = $request->title;
        $service->short_description = $request->short_description;
        $service->description = $request->long_description;
        $service->subcategory_id = $request->sub_category_id;
        $service->category_id = '1';
        $service->save();

        return redirect()->route('projectinterior.index')->with('success', 'Information saved succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projectList =Project::find($id);
        $serviceList = SubCategory::where('category_id','1')->get();
 
       return view('admin.projects.interior.edit',compact('projectList','serviceList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Project::find($id);
        $service->title = $request->title;
        $service->short_description = $request->short_description;
        $service->description = $request->long_description;
        $service->subcategory_id = $request->sub_category_id;
        $service->update();

        return redirect()->route('projectinterior.index')->with('success', 'Information Update succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
        return redirect()->route('projectinterior.index')->with('success','Deleted Succesfully');
    }
}
