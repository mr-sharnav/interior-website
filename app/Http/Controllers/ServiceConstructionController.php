<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class ServiceConstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $constructionDetails = SubCategory::where('category_id','2')->get();
    return view('admin.construction.index',compact('constructionDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.construction.create');
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
            'construction_image' => 'required',
        ],[
            'title.required'     => 'Please Enter Project Title',
            'construction_image.required' => 'Please Select an Image',
        ]);

        $serviceInterior = new SubCategory();
        $serviceInterior->title = $request->title;
        $serviceInterior->category_id = '2';


        if ($request->hasFile('construction_image')) {
            $file = $request->file('construction_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace(' ', '_', $request->title).time() . 'construction_image.' . $extension;
            $file->move('construction/picture/', $fileName);
            $serviceInterior->image ='/construction/picture/'. $fileName;
        } else {
            return "Please select image";
        }
        $serviceInterior->save();

        return redirect()->route('construction.index')->with('success','Information saved succesfully');
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
        //
    }
}
