<?php

include_once("views/Template.php");
include_once("models/DB.php");
include_once("controllers/ArtistController.php");

$artist = new ArtistController();

if (isset($_POST['add'])) {
    $artist->add($_POST);
    header("location:artist.php");

} else if (isset($_POST['update'])) {
    $artist->update($_POST);
    header("location:artist.php");

} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $artist->delete($id);
    header("location:artist.php");

} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $artist->editPage($id);

} else {
    $artist->index();
}