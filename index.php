<?php
include_once("views/Template.php");
include_once("models/DB.php");
include_once("controllers/SongController.php");

$member = new SongController();

if (isset($_POST['add'])) {
    // Lengkapi bagian untuk mengambil post data

    header("location:index.php");
} else if (!empty($_GET['id_hapus'])) {
    // Lengkapi bagian untuk menghapus data
    $id = $_GET['id_hapus'];

    header("location:index.php");
} else if (!empty($_GET['id_edit'])) {
    // Lengkapi bagian untuk mengedit status data
    $id = $_GET['id_edit'];

    header("location:index.php");
} else {
    $member->index();
}
