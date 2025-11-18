<?php
include_once("config.php");
include_once("models/Playlist.php");
include_once("views/PlaylistView.php");
include_once("views/PlaylistEditView.php");
include_once("views/PlaylistDetailView.php"); // TAMBAH VIEW BARU

class PlaylistController
{
  private $playlist;

  function __construct()
  {
    $this->playlist = new Playlist(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  // ... (fungsi index, add, editPage, update, delete tetap sama) ...
  public function index()
  {
    $this->playlist->open();
    $this->playlist->getPlaylist();
    $data = array('playlist' => array());
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
  function editPage($id)
  {
    $this->playlist->open();
    $this->playlist->getPlaylistById($id);
    $data = $this->playlist->getResult();
    $this->playlist->close();
    $view = new PlaylistEditView();
    $view->render($data);
  }
  function update($data)
  {
    $id = $data['id'];
    $this->playlist->open();
    $this->playlist->update($id, $data);
    $this->playlist->close();
  }
  function delete($id)
  {
    $this->playlist->open();
    $this->playlist->delete($id);
    $this->playlist->close();
  }
    function detailPage($id)
  {
    $this->playlist->open();
        $this->playlist->getPlaylistById($id);
    $data_playlist = $this->playlist->getResult();
    
    $this->playlist->getSongsInPlaylist($id);
    $data_songs_in = array();
    while ($row = $this->playlist->getResult()) {
        array_push($data_songs_in, $row);
    }
    
    $this->playlist->getSongsNotInPlaylist($id);
    $data_songs_not_in = array();
    while ($row = $this->playlist->getResult()) {
        array_push($data_songs_not_in, $row);
    }
    
    $this->playlist->close();

    $data = array(
      'playlist' => $data_playlist,
      'songs_in' => $data_songs_in,
      'songs_not_in' => $data_songs_not_in
    );

    $view = new PlaylistDetailView();
    $view->render($data);
  }

  function addSongToPlaylist($data)
  {
    $playlist_id = $data['id_playlist'];
    $song_id = $data['id_song'];
    
    $this->playlist->open();
    $this->playlist->addSongToPlaylist($playlist_id, $song_id);
    $this->playlist->close();
  }

  function removeSongFromPlaylist($playlist_id, $song_id)
  {
    $this->playlist->open();
    $this->playlist->removeSongFromPlaylist($playlist_id, $song_id);
    $this->playlist->close();
  }
}