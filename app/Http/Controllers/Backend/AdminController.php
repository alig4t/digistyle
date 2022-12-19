<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class AdminController extends Controller
{


    public function EditorUploadImage()
    {

        // return request()->file('upload');

        if (request()->has('upload')) {
            $file = request()->file('upload');
            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
            $imagePath = "/images/uploads/{$year}/{$month}/";
            $filename = Carbon::now()->timestamp .".".  $file->getClientOriginalExtension();
            $file->move(public_path($imagePath), $filename);
            $url = $imagePath . $filename;
            // return "<script>window.parent.CKEDITOR.tools.callFunction(1,'{$url}','') </script>";
            // return "<script>window.parent.CKEDITOR.tools.callFunction(1 , '{$url}' , '')</script>";
            return response()->json(['fileName' => $filename, 'uploaded'=> 1, 'url' => $url]);
        }

    }


    protected function uploadImage($file, $slug, $sizes)
    {

        $year = Carbon::now()->year;
        $imagePath = "/images/brands/{$year}/";
        $filename = "brand-" . mt_rand(111, 999) . "-" . $slug;
        $imageExt = '.' . $file->getClientOriginalExtension();

        $file = $file->move(public_path($imagePath), $filename . $imageExt);

        if (count($sizes) > 0) {

            $url['images'] = $this->resize($file->getRealPath(), $sizes, $imagePath, $filename, $imageExt);
            $url['thumb'] = $url['images'][$sizes[0][0]];
            // dd($url);
            return $url;
        }

        return $imagePath . $filename . $imageExt;
    }

    private function resize($path, $sizes, $imagePath, $filename, $ext)
    {
        $images['original'] = $imagePath . $filename . $ext;
        foreach ($sizes as $size) {
            $images[$size[0]] = $imagePath . $filename . "_{$size[0]}" . $ext;

            Image::make($path)->fit($size[0], $size[1], function ($constraint) {
                // $constraint->aspectRatio();
                // $constraint->upsize();
            }, 'top')->save(public_path($images[$size[0]]));
        }

        return $images;
    }
}
