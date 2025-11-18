<?php
include_once("views/Template.php");

class SongEditView
{
  public function render($data)
  {
    $songData = $data['song'];
    list($id, $judul, $tahun, $album_id) = $songData;

    $dataAlbum = null;
    foreach ($data['albums'] as $val) {
      list($id_album, $title_album, $artist_name) = $val;
      
      $selected = ($id_album == $album_id) ? 'selected' : '';
      
      $dataAlbum .= "<option value='" . $id_album . "' " . $selected . ">" . $artist_name . " - " . $title_album . "</option>";
    }

    $tpl = new Template("templates/song_edit.html");

    $tpl->replace("DATA_ID", $id);
    $tpl->replace("DATA_JUDUL", $judul);
    $tpl->replace("DATA_TAHUN", $tahun);
    $tpl->replace("OPTION_ALBUM", $dataAlbum);
    
    $tpl->write();
  }
}