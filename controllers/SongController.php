<?php
include_once("config.php");
include_once("models/Song.php");
include_once("models/Artist.php");
include_once("views/SongView.php");

class SongController
{
  private $song;
  private $artist;

  function __construct()
  {
    $this->song = new Song(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    $this->artist = new Artist(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  public function index()
  {
    $this->song->open();
    $this->artist->open();

    $this->song->getSong();
    $this->artist->getArtist();

    $data = array(
      'song' => array(),
      'artist' => array()
    );

    while ($row = $this->song->getResult()) {
      array_push($data['song'], $row);
    }
    while ($row = $this->artist->getResult()) {
      array_push($data['artist'], $row);
    }

    $this->song->close();
    $this->artist->close();

    $view = new SongView();
    $view->render($data);
  }

  function add()
  {
  }

  function edit()
  {
  }

  function delete()
  {
  }
}
