<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Imagine;
use App\Image;
use Carbon\Carbon;

class SmallImage extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $image;
    //protected $name;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($image)
    {
        //
        $this->image = $image;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $image = $this->image;

        Imagine::make(public_path('images/' . $image->filePath))->resize('150', '100')->save(  public_path('SmallImages/'. $image->filePath) );
    }
}
