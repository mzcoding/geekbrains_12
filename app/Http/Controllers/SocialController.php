<?php

namespace App\Http\Controllers;

use App\Contracts\Social;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function link()
	{
		return Socialite::driver('vkontakte')->redirect();
	}

	public function callback(Social $social)
	{
	  try {
		  return redirect(
			  $social->loginUser(
				  Socialite::driver('vkontakte')->user()
			  )
		  );
	  }catch(\Exception $e) {
		  \Log::error($e->getMessage() . PHP_EOL, $e->getTrace());
		  dd($e->getMessage());
	  }
	}
}
