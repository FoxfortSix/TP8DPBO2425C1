<?php
include_once("config.php");
include_once("models/Album.php");
include_once("views/AlbumView.php");

class AlbumController
{
  private $album;

  function __construct()
  {
    $this->album = new Album(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  public function index()
  {
    $this->album->open();
    
    $this->album->getAlbum();
    $this->album->getArtist();
    
    $data = array(
      'album' => array(),
      'artist' => array()
    );

    while ($row = $this->album->getResult()) {
      array_push($data['album'], $row);
    }
    $this->album->getArtist();
    while ($row = $this->album->getResult()) {
      array_push($data['artist'], $row);
    }

    $this->album->close();
    $view = new AlbumView();
    $view->render($data);
  }

  function add($data)
  {
    $this->album->open();
    $this->album->add($data);
    $this->album->close();
  }

  function edit($id)
  {
  }

  function delete($id)
  {
    $this->album->open();
    $this->album->delete($id);
    $this->album->close();
  }
}