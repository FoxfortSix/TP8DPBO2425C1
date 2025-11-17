<?php

include_once("views/Template.php");
include_once("models/DB.php");
include_once("controllers/ArtistController.php");

$artist = new ArtistController();

if (isset($_POST['add'])) {
    // Lengkapi untuk menambahkan data

    header("location:artist.php");
} else if (!empty($_GET['id_hapus'])) {
    // Lengkapi untuk menghapus data
    $id = $_GET['id_hapus'];

    header("location:artist.php");
} else if (!empty($_GET['id_edit'])) {
    // Lengkapi untuk mengedit data
    $id = $_GET['id_edit'];

    header("location:artist.php");
} else {
    $artist->index();
}
