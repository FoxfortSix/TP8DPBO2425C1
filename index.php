<?php
include_once("views/Template.php");
include_once("models/DB.php");
include_once("controllers/SongController.php");

$song = new SongController(); // Ganti nama variabel $member

if (isset($_POST['add'])) {
    // Lengkapi bagian untuk mengambil post data
    // Memanggil method add di controller
    $song->add($_POST);
    header("location:index.php");

} else if (!empty($_GET['id_hapus'])) {
    // Lengkapi bagian untuk menghapus data
    // Memanggil method delete di controller
    $id = $_GET['id_hapus'];
    $song->delete($id);
    header("location:index.php");

} else if (!empty($_GET['id_edit'])) {
    // Lengkapi bagian untuk mengedit status data
    // Memanggil method edit di controller
    $id = $_GET['id_edit'];
    $song->edit($id);
    header("location:index.php");
    
} else {
    $song->index();
}