<?php

include_once("views/Template.php");
include_once("models/DB.php");
include_once("controllers/AlbumController.php");

$album = new AlbumController();

if (isset($_POST['add'])) {
    $album->add($_POST);
    header("location:album.php");

} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $album->delete($id);
    header("location:album.php");

} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $album->edit($id);
    header("location:album.php");
    
} else {
    $album->index();
}