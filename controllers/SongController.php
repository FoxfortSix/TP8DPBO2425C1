<?php
include_once("config.php");
include_once("models/Song.php");
include_once("models/Album.php"); 
include_once("views/SongView.php");
include_once("views/SongEditView.php");

class SongController
{
  private $song;
  private $album; 

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
    $this->album->getAlbum(); 
    $data = array('song' => array(), 'album' => array());
    while ($row = $this->song->getResult()) {
      array_push($data['song'], $row);
    }
    $this->album->getAlbum(); 
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

  function editPage($id)
  {
    $this->song->open();
    $this->album->open();
    
    $this->song->getSongById($id);
    $data_song = $this->song->getResult();
    
    $this->album->getAlbum();
    $data_albums = array();
    while ($row = $this->album->getResult()) {
      array_push($data_albums, $row);
    }
    
    $this->song->close();
    $this->album->close();

    $data = array(
      'song' => $data_song,
      'albums' => $data_albums
    );

    $view = new SongEditView();
    $view->render($data);
  }

  function update($data)
  {
    $id = $data['id'];
    $this->song->open();
    $this->song->update($id, $data);
    $this->song->close();
  }

  function delete($id)
  {
    // ... (fungsi delete() tetap sama) ...
    $this->song->open();
    $this->song->delete($id);
    $this->song->close();
  }
}