<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Repsonse;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    public function download_routine ($batch_no)
    {
        $filepath = public_path('routine/'. $batch_no. ".pdf");
        return Response::download($filepath); 
    }
}
