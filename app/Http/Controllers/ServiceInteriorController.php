<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceInteriorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interiorDetails = SubCategory::where('category_id','1')->get();
        
        return view('admin.interior.index', compact('interiorDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     


        return view('admin.interior.create');
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
            'interior_image' => 'required',
        ],[
            'title.required'     => 'Please Enter Project Title',
            'interior_image.required' => 'Please Select an Image',
        ]);

        $serviceInterior = new SubCategory();
        $serviceInterior->title = $request->title;
        $serviceInterior->category_id = '1';


        if ($request->hasFile('interior_image')) {
            $file = $request->file('interior_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace(' ', '_', $request->title).time() . 'interior_image.' . $extension;
            $file->move('interior/picture/', $fileName);
            $serviceInterior->image = $fileName;
        } else {
            return "Please select image";
        }
        $serviceInterior->save();

        return redirect()->route('interior.index')->with('success','Information saved succesfully');
       
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
       $serviceInteriorEdit = SubCategory::find($id);

       return view('admin.interior.edit',compact('serviceInteriorEdit'));
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
        

        $serviceInterior = SubCategory::find($id);
        $serviceInterior->title = $request->title;
       


        if ($request->hasFile('interior_image'))
         {
             $oldfile ='interior/picture/'.$serviceInterior->image;

             if (File::exists($oldfile)) 
             {
                File::delete($oldfile);
             }


            $file = $request->file('interior_image');
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace(' ', '_', $request->title).time() . 'interior_image.' . $extension;
            $file->move('interior/picture/', $fileName);
            $serviceInterior->image = $fileName;
        }
        $serviceInterior->update();
   

        return redirect()->route('interior.index')->with('success','Information Update succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        SubCategory::find($id)->delete();
        return redirect()->route('interior.index')->with('success','Deleted Succesfully');
    }
   
}
