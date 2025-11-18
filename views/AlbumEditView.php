<?php
include_once("views/Template.php");

class AlbumEditView
{
  public function render($data)
  {
    $albumData = $data['album'];
    list($id, $judul, $tahun, $artist_id) = $albumData;

    $dataArtist = null;
    foreach ($data['artists'] as $val) {
      list($id_artist, $nama_artist) = $val;
      
      $selected = ($id_artist == $artist_id) ? 'selected' : '';
      
      $dataArtist .= "<option value='" . $id_artist . "' " . $selected . ">" . $nama_artist . "</option>";
    }

    $tpl = new Template("templates/album_edit.html");

    $tpl->replace("DATA_ID", $id);
    $tpl->replace("DATA_JUDUL", $judul);
    $tpl->replace("DATA_TAHUN", $tahun);
    $tpl->replace("OPTION_ARTIST", $dataArtist);
    
    $tpl->write();
  }
}