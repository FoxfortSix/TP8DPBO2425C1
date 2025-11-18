<?php
include_once("views/Template.php");

class ArtistEditView
{
  public function render($data)
  {
    list($id, $nama, $country) = $data; 

    $tpl = new Template("templates/artist_edit.html");

    $tpl->replace("DATA_ID", $id);
    $tpl->replace("DATA_NAMA", $nama);
    $tpl->replace("DATA_COUNTRY", $country);
    
    $tpl->write();
  }
}