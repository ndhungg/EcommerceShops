<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LocationController extends Controller
{

   public function __construct()
   {
    
   }

   public function getLocation(){
    echo 123321; die();
   }

}
