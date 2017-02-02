<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ShortUrl;
use Validator, Session;

class ShortUrlController extends Controller
{
    public function index(){
     // $url = url('/').'/'.$this->generate_short_code().'<br>';
     // return $url;
    }

    public function save_url(Request $request){
      $rules = [
			        'long_url' => 'required',
	           ];
	  //$message = [ 'short_url.unique' => 'Short url is already exist! Please generate again.' ];

      $validator = Validator::make($request->all(), $rules);

	    if ($validator->fails()) {
	    	dd($validator);
            return redirect('/add_url')
                        ->withErrors($validator)
                        ->withInput();
         }else{

         	$shortUrl = new ShortUrl();
            $shortUrl->long_url = $request->long_url;
            $shortUrl->short_code = $this->generate_short_code();
            $result = $shortUrl->save();
      
            Session::flash('url_message','Your shorten url is <a href="'.url('/').'/'.$shortUrl->short_code.'">'.url('/').'/'.$shortUrl->short_code.'</a>');

            return redirect('/add_url');
         }

    }


    public function generate_short_code(){
      return base_convert(microtime(false), 6, 36);
      
    }
    public function visit_url($short_code){
      //return $short_code;
    	$url = ShortUrl::select('long_url')->where('short_code',$short_code)->first();
        return redirect($url->long_url);
    }
    

}
