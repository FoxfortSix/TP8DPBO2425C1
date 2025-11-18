<?php

include_once("views/Template.php");
include_once("models/DB.php");
include_once("controllers/PlaylistController.php");

$playlist = new PlaylistController();

if (isset($_POST['add'])) {
    $playlist->add($_POST);
    header("location:playlist.php");

} else if (isset($_POST['update'])) {
    $playlist->update($_POST);
    header("location:playlist.php");

} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $playlist->delete($id);
    header("location:playlist.php");

} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $playlist->editPage($id);
    
} else {
    $playlist->index();
}