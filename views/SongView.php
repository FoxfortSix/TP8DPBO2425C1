<?php
include_once("views/Template.php");

class SongView
{
  public function render($data)
  {
    $no = 1;
    $dataSong = null;
    $dataAlbum = null;


    foreach ($data['song'] as $val) {
      list($id, $title, $release_year, $album_name, $artist_name) = $val;
      
      $dataSong .= "<tr class='text-center align-middle'>
                <td>" . $no++ . "</td>
                <td>" . $title . "</td>
                <td>" . $release_year . "</td>
                <td>" . $album_name . "</td>
                <td>" . $artist_name . "</td>";

      $dataSong .= "
              <td>
                <a href='index.php?id_edit=" . $id .  "' class='mb-2 btn btn-warning mb-md-0 mb-lg-0 mb-xl-0' '>Edit</a>
                <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
              </td></tr>";
    }

    foreach ($data['album'] as $val) {
      list($id, $title, $artist_name) = $val;
      $dataAlbum .= "<option value='" . $id . "'>" . $artist_name . " - " . $title . "</option>";
    }

    $tpl = new Template("templates/index.html");

    $tpl->replace("JUDUL", "Home");
    $tpl->replace("OPTION_ALBUM", $dataAlbum);
    $tpl->replace("DATA_TABEL", $dataSong);
    $tpl->write();
  }
}