<?php
function saveImage($file){
       return $file->store('image','public');;
}