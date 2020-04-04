<?php

namespace App\Http\Controllers;

use App\FileUpload;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    // show form
    public function index() {
        return view('upload');
    }

    // file upload
    public function upload(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'files' => 'required'
        ])->validate();

        $total_files = count($request->file('files'));

        foreach ($request->file('files') as $file) {
            // rename & upload files to uploads folder
            $name = uniqid() . '_' . time(). '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/uploads';
            $file->move($path, $name);

            // store in db
            $fileUpload = new FileUpload();
            $fileUpload->filename = $name;
            $fileUpload->save();
        }

        return back()->with("success", $total_files . " files uploaded successfully");
    }
}
