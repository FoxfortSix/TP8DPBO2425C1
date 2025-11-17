<?php
include_once("config.php");
include_once("models/Playlist.php");
include_once("views/PlaylistView.php");

class PlaylistController
{
  private $playlist;

  function __construct()
  {
    $this->playlist = new Playlist(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  public function index()
  {
    $this->playlist->open();
    
    $this->playlist->getPlaylist();
    
    $data = array(
      'playlist' => array()
    );

    while ($row = $this->playlist->getResult()) {
      array_push($data['playlist'], $row);
    }
    
    $this->playlist->close();

    $view = new PlaylistView();
    $view->render($data);
  }

  function add($data)
  {
    $this->playlist->open();
    $this->playlist->add($data);
    $this->playlist->close();
  }

  function edit($id)
  {
  }

  function delete($id)
  {
    $this->playlist->open();
    $this->playlist->delete($id);
    $this->playlist->close();
  }
}