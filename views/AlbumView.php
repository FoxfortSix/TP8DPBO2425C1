<?php
include_once("views/Template.php");

class AlbumView
{
  public function render($data)
  {
    $no = 1;
    $dataAlbum = null;
    $dataArtist = null;

    foreach ($data['album'] as $val) {
      list($id, $title, $release_year, $artist_name) = $val;
      $dataAlbum .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $title . "</td>
                    <td>" . $release_year . "</td>
                    <td>" . $artist_name . "</td>
                    <td>
                    <a href='album.php?id_edit=" . $id .  "' class='btn btn-warning''>Edit</a>
                    <a href='album.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
    }

    foreach ($data['artist'] as $val) {
      list($id, $nama) = $val;
      $dataArtist .= "<option value='" . $id . "'>" . $nama . "</option>";
    }

    $tpl = new Template("templates/album.html");

    $tpl->replace("JUDUL", "Album");
    $tpl->replace("OPTION_ARTIST", $dataArtist);
    $tpl->replace("DATA_TABEL_ALBUM", $dataAlbum);
    $tpl->write();
  }
}