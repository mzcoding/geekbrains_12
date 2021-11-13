<?php declare(strict_types=1);

namespace App\Services;

use Auth;
use Illuminate\Http\UploadedFile;

class ImageService
{
   public function imageUpload(UploadedFile $file): string
   {
       $fileExtension = $file->getClientOriginalExtension();
	   $fileName = uniqid('n_') . "." . $fileExtension;

	   return $file->storeAs(Auth::id(), $fileName, 'news');
   }
}