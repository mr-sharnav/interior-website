<?php

namespace App\Http\Controllers;

use App\Models\ProjectImage;
use Illuminate\Http\Request;

class ProjectConstructionImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $consProjectID = $request->constructionid;
        $projectTitle = $request->title;
        $consImageList = ProjectImage::where('project_id',$consProjectID)->get();
      
        return view('admin.projects.construction.image.index',compact('consProjectID','consImageList','projectTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'image'    => 'required',
            
        ],[
            'image.required'     => 'Please Select Images',
    
        ]);

        $image = $request->file('image');

        foreach($image as $images){

          
                $file = $images;
                $extension = $file->getClientOriginalExtension();
                $fileName = str_replace(' ', '_', hexdec(uniqid())).time() . 'project_construction_image.' . $extension;
                $file->move('project/picture', $fileName);
                $projectImage = new ProjectImage();
                $projectImage->image = $fileName;
                $projectImage->project_id = $request->projectid;
                $projectImage->save();
            }

         return redirect()->route('project-construction-image.index')->with('success','Images Uploaded Successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProjectImage::find($id)->delete();
        return redirect()->route('project-construction-image.index')->with('success','Deleted Succesfully');
    }
}
