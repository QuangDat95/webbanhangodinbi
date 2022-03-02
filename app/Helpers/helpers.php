<?php
function saveImage($file){
       return $file->store('image','public');;
}

function deleteImage($file){
    if ($file) {
        Storage::delete('/public/' . $file);
    }
}