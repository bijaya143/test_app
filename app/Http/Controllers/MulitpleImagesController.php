<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MulitpleImage;

class MulitpleImagesController extends Controller
{
    public function index()
    {
        $images = MulitpleImage::all();
        return view('images.index', compact('images'));
    }

    public function create()
    {
        return view('images.create');
    }

    public function upload(Request $request)
    {


        $this->validate($request, [
                'filenames' => 'required',
                'filenames.*' => 'mimes:jpg,png,jpeg'
        ]);


        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path().'/files/', $name);  
                $data[] = $name;  
            }
         }


         $file= new MulitpleImage();
         $file->filenames=json_encode($data);
         $file->save();


        return back()->with('message', 'Images has been successfully added');
    }
}

