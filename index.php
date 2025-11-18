<?php
include_once("views/Template.php");
include_once("models/DB.php");
include_once("controllers/SongController.php");

$song = new SongController(); 

if (isset($_POST['add'])) {
    $song->add($_POST);
    header("location:index.php");

} else if (isset($_POST['update'])) {
    $song->update($_POST);
    header("location:index.php");

} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $song->delete($id);
    header("location:index.php");

} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $song->editPage($id);
    
} else {
    $song->index();
}