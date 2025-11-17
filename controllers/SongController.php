<?php
include_once("config.php");
include_once("models/Song.php");
include_once("models/Artist.php");
include_once("views/SongView.php");

class SongController
{
  // Properti kontroller
  private $song;
  private $artist;

  // Konstruktor
  function __construct()
  {
    $this->song = new Song(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    $this->artist = new Artist(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  // Method umum
  public function index()
  {
    // Membuka jalur ke database
    $this->song->open();
    $this->artist->open();

    // Meneruskan request dari view
    $this->song->getSong();
    $this->artist->getArtist();

    // Inisiasi variabel berbentuk array untuk menyimpan kedua data table
    $data = array(
      'song' => array(),
      'artist' => array()
    );

    // Push 1 per 1 data yang berbentuk objek dan diteruskan ke variabel yg telah dibuat sebelumnya
    while ($row = $this->song->getResult()) {
      array_push($data['song'], $row);
    }
    while ($row = $this->artist->getResult()) {
      array_push($data['artist'], $row);
    }

    // Menutup jalur
    $this->song->close();
    $this->artist->close();

    // Inisiasi variable untuk memanggil kelas views dan meneruskan datanya
    $view = new SongView();
    $view->render($data);
  }

  function add()
  {
    // Lengkapin controller untuk melakukan add data
  }

  function edit()
  {
    // Lengkapin controller untuk melakukan edit data
  }

  function delete()
  {
    // Lengkapin controller untuk melakukan delete data
  }
}
