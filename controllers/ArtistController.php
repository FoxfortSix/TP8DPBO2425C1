<?php
include_once("config.php");
include_once("models/Artist.php");
include_once("views/Artistview.php");

class ArtistController
{
  // Properti kontroller
  private $artist;

  // Konstruktor Controller Artist
  function __construct()
  {
    $this->artist = new Artist(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  // Method yang mengarahkan ke halaman umum controller artist
  public function index()
  {
    // Menyambungkan/membuka jalur ke database
    $this->artist->open();

    // Meneruskan request umum dari views (mengambil data artist) 
    $this->artist->getArtist();

    // Inisiasi variabel untuk menyimpan data artist
    $data = array();

    // Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
    while ($row = $this->artist->getResult()) {
      array_push($data, $row);
    }

    // Menutup jalur ke database
    $this->artist->close();

    // Meneruskannya ke view
    $view = new ArtistView();
    $view->render($data);
  }

  function add()
  {
    // Lengkapi controller untuk melakukan add data
  }

  function edit()
  {
    // Lengkapi controller untuk melakukan edit data
  }

  function delete()
  {
    // Lengkapi controller untuk melakukan delete data
  }
}
