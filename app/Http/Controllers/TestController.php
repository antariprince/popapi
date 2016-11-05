<?php

namespace App\Http\Controllers;

use Storage;
use Validator;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('test');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'document' => 'required|image',
        ]);

        $file = $request->file('document');

        $exists = Storage::disk('s3')
            ->exists($file->getClientOriginalName());

        if (! $exists) {
            $s3 = Storage::disk('s3')
                ->put($file->getClientOriginalName(), file_get_contents($file), 'public');
        }

        return 'file already exists';
    }
}
