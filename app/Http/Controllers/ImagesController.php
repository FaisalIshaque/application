<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Input;
use Validator;
use Redirect;

use Session;

class ImagesController extends Controller
{
    //
    
    public function index(Request $request)
    {
        $images = $request->all();

        return view('images.upload', compact('images'));
    }

    public function upload()
    {
    	//getting all of the post data
    	$file = array('image' => Input::file('image') );

    	//setting up rules
    	$rules = array('image' => 'required', );

    	$validator = Validator::make($file, $rules);

    	if ($validator->fails())
    	{
    		return Redirect('upload')->withInput()->withErrors($validator);
    	}

    	else
    	{
    		if(Input::file('image')->isValid())
    		{
    			$destinationPath = 'images.upload';

    			$extension = Input::file('image')->getClientOriginalExtension();

    			$filename = rand(11111,99999).'.'.$extension;

    			Input::file('image')->move($destinationPath, $filename);

    			Session::flash('success','Upload Successful');

    			return Redirect('upload');
    		}
    	}
    }

}
