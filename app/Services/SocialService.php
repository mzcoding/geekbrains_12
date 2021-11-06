<?php declare(strict_types=1);

namespace App\Services;

use App\Contracts\Social;
use App\Models\User as Model;
use Laravel\Socialite\Contracts\User;

class SocialService implements Social
{

	public function loginUser(User $user): string
	{
		$auth = Model::where('email', $user->getEmail())->first();
		if($auth) {
			$auth->name = $user->getName();
			$auth->avatar = $user->getAvatar();
			if($auth->save()) {
				\Auth::loginUsingId($auth->id);
				return route('account');
			}
		}

		//todo: register here

		throw new \Exception("User not found");
	}
}