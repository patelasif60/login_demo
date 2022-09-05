<?php

use Carbon\Carbon;

if (!function_exists('uploadImageToLocal')) {
    function uploadImageToLocal($image, $imagePath)
    {
        $originalImage= $image;
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = storage_path('app/public').$imagePath;
        $thumbnailImage->resize(150,150);
        $time = time().$originalImage->getClientOriginalName();
        $filename = $thumbnailPath.$time;
        $path = $imagePath.$time;
        $thumbnailImage->save($filename); 
        $disk = Storage::disk('public');
        $imageUrl = $disk->url($path);
        $image = [
            'url' => $imageUrl,
            'file_name'	=>$time,
        ];

        return $image;
    }
}
if (!function_exists('formatFileName')) {
    function formatFileName($fileName) {
        return preg_replace("![^a-z0-9]+!i", "_",  $fileName);
    }
}