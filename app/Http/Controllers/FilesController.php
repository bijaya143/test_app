<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FilesController extends Controller
{
    public function createFile()
    {
        return view('files.index');
    }

    public function uploadFile(Request $request)
    {
        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'mimes:jpeg,jpg,png'
        ]);

        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path('files'), $name);  
                $data[] = $name;  
            }
         }


         $file= new File();
         $file->filenames=json_encode($data);
         $file->save();

         return back()->with('message', 'Images uploaded successfully!');

    }
    public function showFile()
    { 
        
        $files = File::all();
        //dd($files);
        return view('files.show', compact('files'));
    }
}
