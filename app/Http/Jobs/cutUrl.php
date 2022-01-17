<?php

namespace App\Http\Jobs;
use App\Models\url;
use Config;


class cutUrl{

protected $data;

public function __construct($data){
  $this->data = $data;
}

public function checkUrl(){
  $url = url::where('url',$this->data)->get();
  if(count($url) > 0){
    return $url[0]->redirectUrl;
  }else{
    return false;
  }
}

public function getUrl(){
  $shortCode = strtolower(substr(hash('md5',$this->data),-6));
  $newShortUrl = Config::get('app.url').'/'.$shortCode;
  $this->saveUrl($newShortUrl,$shortCode);
  return $newShortUrl;
}

public function redirectUrl(){
  $url = url::where('shortCode',$this->data)->get();
  if(count($url) > 0){
    return redirect('http://'.$url[0]->url);
  }else{
    return false;
  }
}

private function saveUrl($newShortUrl,$shortCode){
  $shortUrl = new url;
  $shortUrl->fill(['url' => $this->data,'redirectUrl' => $newShortUrl, 'shortCode' => $shortCode]);
  $shortUrl->save();
}

}

?>
