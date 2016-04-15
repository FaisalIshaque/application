<?php

namespace App\Http\Controllers;

use Imagine;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use App\Image;

use Input;

use App\Jobs\LargeImage;
use App\Jobs\MediumImage;
use App\Jobs\SmallImage;


class ImageController extends Controller
{
    //
	public function upload(){

		return view('images.imagesupload');
	}

	public function store(Request $request)
	{
		$image = new Image;
		
		$this->validate($request,[
			'title' => 'required|min:5',
			'description' => 'required',
			'image' => 'required'
			]);

		$image->title = $request->title;
		$image->description = $request->description;

		if($request->hasFile('image'))
		{
			$file = $request->file('image');
			
			$name = $file->getClientOriginalName();

			$image->filePath = $name;
			
			//$destinationPath = 'images';

			//Input::file('image')->move($destinationPath, $name);

			$image->save();

			Imagine::make($file)->resize('100', '100')->save('images/'. $name);

			
			$job_small = (new SmallImage($image))->onQueue('small');;

			$this->dispatch($job_small);

			
			$job_medium = (new MediumImage($image))->onQueue('medium');;

			$this->dispatch($job_medium);

			
			$job_large = (new LargeImage($image))->onQueue('large');;

			$this->dispatch($job_large);

		}

		$image->save();

		$this->upload();

		return redirect('show')->with('success','Image Uploaded Successfully');
	}

	public function show(Request $request)
	{
		$images = Image::all();

		return view('images.imagesshow', compact('images'));
	}
}
