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

} else if (isset($_POST['add_song'])) {
    $playlist->addSongToPlaylist($_POST);
    header("location:playlist.php?id_detail=" . $_POST['id_playlist']);

} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $playlist->delete($id);
    header("location:playlist.php");

} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $playlist->editPage($id);
    
} else if (!empty($_GET['id_detail'])) {
    $id = $_GET['id_detail'];
    $playlist->detailPage($id);

} else if (!empty($_GET['id_hapus_lagu']) && !empty($_GET['id_playlist'])) {
    $id_lagu = $_GET['id_hapus_lagu'];
    $id_playlist = $_GET['id_playlist'];
    $playlist->removeSongFromPlaylist($id_playlist, $id_lagu);
    header("location:playlist.php?id_detail=" . $id_playlist);

} else {
    $playlist->index();
}