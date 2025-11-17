<?php
include_once("config.php");
include_once("models/Song.php");
include_once("models/Album.php"); // Ganti Artist dengan Album
include_once("views/SongView.php");

class SongController
{
  private $song;
  private $album; // Ganti artist dengan album

  function __construct()
  {
    $this->song = new Song(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    $this->album = new Album(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  public function index()
  {
    $this->song->open();
    $this->album->open(); 

    $this->song->getSong();
    $this->album->getAlbum(); // Mengambil data album untuk dropdown

    $data = array(
      'song' => array(),
      'album' => array() // Ganti 'artist' menjadi 'album'
    );

    // Push data lagu
    while ($row = $this->song->getResult()) {
      array_push($data['song'], $row);
    }
    
    // Push data album
    $this->album->getAlbum(); // Ambil result set baru
    while ($row = $this->album->getResult()) {
      array_push($data['album'], $row);
    }

    $this->song->close();
    $this->album->close(); 

    $view = new SongView();
    $view->render($data);
  }

  function add($data)
  {
    $this->song->open();
    $this->song->add($data);
    $this->song->close();
  }

  function edit()
  {
    // Akan kita implementasi
  }

  function delete($id)
  {
    $this->song->open();
    $this->song->delete($id);
    $this->song->close();
  }
}