<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Jobs\cutUrl;

class routeController extends Controller
{
  public function getShortUrl(Request $request){
    $url = new cutUrl($request->url);
    if($url->checkUrl() == false){
      return $url->getUrl();
    }else{
      return $url->checkUrl();
    }
  }

  public function redirectUrl($shortCode){
    $url = new cutUrl($shortCode);
    return $url->redirectUrl();
  }
}
