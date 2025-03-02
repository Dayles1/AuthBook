<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function uploadPhoto($file, $path='uploads')
    {
        $photoName=md5(time().$file->getFilename()).'.'.$file->getClientOriginalExtansion();
        return $file->storeAs($path,$photoName,'public');
    }
    public function deletePhoto($path)
    {
        $fullpath=storage_path('app/public/'.$path);
        if(file_exists($fullpath))
        {
        unlink($fullpath);
    }
}
