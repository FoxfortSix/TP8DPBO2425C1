<?php
include_once("config.php");
include_once("models/Artist.php");
include_once("views/Artistview.php");
include_once("views/ArtistEditView.php");

class ArtistController
{
  private $artist;

  function __construct()
  {
    $this->artist = new Artist(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  public function index()
  {
    $this->artist->open();
    $this->artist->getArtist();
    $data = array();
    while ($row = $this->artist->getResult()) {
      array_push($data, $row);
    }
    $this->artist->close();
    $view = new ArtistView();
    $view->render($data);
  }

  function add($data)
  {
    $this->artist->open();
    $this->artist->add($data);
    $this->artist->close();
  }

  function editPage($id)
  {
    $this->artist->open();
    $this->artist->getArtistById($id);
    $data = $this->artist->getResult();
    $this.artist->close();

    $view = new ArtistEditView();
    $view->render($data);
  }
  
  function update($data)
  {
    $id = $data['id'];
    $this->artist->open();
    $this->artist->update($id, $data);
    $this->artist->close();
  }

  function delete($id)
  {
    $this->artist->open();
    $this->artist->delete($id);
    $this->artist->close();
  }
}