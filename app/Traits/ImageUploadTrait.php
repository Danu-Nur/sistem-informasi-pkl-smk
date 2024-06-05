<?php

namespace App\Traits;

use File;

trait ImageUploadTrait
{

    public function uploadImage($request, $inputName, $path)
    {
        if ($request->hasFile($inputName)) {

            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '_' . date('d-m-Y_His') . '.' . $ext;
            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }
    }

    public function updateImage($request, $inputName, $path, $oldPath = null)
    {
        if ($request->hasFile($inputName)) {
            if (File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }
            // $image = $request->{$inputName};
            // $ext = $image->getClientOriginalExtension();
            // $imageName = 'media_' . uniqid() . '_' . date('d-m-Y_H:i:s') . '.' . $ext;
            // $image->move(public_path($path), $imageName);

            // return $path . '/' . $imageName;
            return $this->updateImage($request, $inputName, $path);
        }
    }

    public function deleteImage($path)
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
