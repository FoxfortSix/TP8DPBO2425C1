<?php
include_once("views/Template.php");

class PlaylistEditView
{
  public function render($data)
  {
    list($id, $nama) = $data;

    $tpl = new Template("templates/playlist_edit.html");

    $tpl->replace("DATA_ID", $id);
    $tpl->replace("DATA_NAMA", $nama);
    
    $tpl->write();
  }
}