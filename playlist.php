<?php

include_once("views/Template.php");
include_once("models/DB.php");
include_once("controllers/PlaylistController.php");

$playlist = new PlaylistController();

if (isset($_POST['add'])) {
    // Memanggil method add di controller
    $playlist->add($_POST);
    header("location:playlist.php");

} else if (!empty($_GET['id_hapus'])) {
    // Memanggil method delete di controller
    $id = $_GET['id_hapus'];
    $playlist->delete($id);
    header("location:playlist.php");

} else if (!empty($_GET['id_edit'])) {
    // Memanggil method edit di controller
    $id = $_GET['id_edit'];
    $playlist->edit($id);
    header("location:playlist.php");
    
} else {
    // Tampilkan halaman utama
    $playlist->index();
}