<?php
require_once '../includes/init.php';
if(empty($_GET['photo']))
{
    redirect('photos.php');
}

$photo = Photo::find_by_id($_GET['photo']);

if($photo)
{
    $del = $photo->del_photo();
    if($del)
        redirect('photos.php');

}