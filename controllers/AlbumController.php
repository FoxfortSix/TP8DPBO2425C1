<?php
include_once("config.php");
include_once("models/Album.php");
include_once("views/AlbumView.php");
include_once("views/AlbumEditView.php");

class AlbumController
{
  private $album;
  private $artist;

  function __construct()
  {
    $this->album = new Album(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    include_once("models/Artist.php");
    $this->artist = new Artist(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  public function index()
  {
    $this->album->open();
    $this->album->getAlbum();
    $this->album->getArtist();
    $data = array('album' => array(), 'artist' => array());
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

  function editPage($id)
  {
    $this->album->open();
    $this->artist->open();
    
    $this->album->getAlbumById($id);
    $data_album = $this->album->getResult();
    
    $this->artist->getArtist();
    $data_artists = array();
    while ($row = $this->artist->getResult()) {
      array_push($data_artists, $row);
    }
    
    $this->album->close();
    $this->artist->close();

    $data = array(
      'album' => $data_album,
      'artists' => $data_artists
    );

    $view = new AlbumEditView();
    $view->render($data);
  }

  function update($data)
  {
    $id = $data['id'];
    $this->album->open();
    $this->album->update($id, $data);
    $this->album->close();
  }

  function delete($id)
  {
    $this->album->open();
    $this->album->delete($id);
    $this->album->close();
  }
}