<?php
include_once("views/Template.php");

class PlaylistView
{
  public function render($data)
  {
    $no = 1;
    $dataPlaylist = null;

    foreach ($data['playlist'] as $val) {
      list($id, $name, $date_created) = $val;
      $dataPlaylist .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $name . "</td>
                    <td>" . $date_created . "</td>
                    <td>
                    <a href='playlist.php?id_detail=" . $id .  "' class='btn btn-info'>Detail</a>
                    <a href='playlist.php?id_edit=" . $id .  "' class='btn btn-warning''>Edit</a>
                    <a href='playlist.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
    }

    $tpl = new Template("templates/playlist.html");

    $tpl->replace("JUDUL", "Playlist");
    $tpl->replace("DATA_TABEL_PLAYLIST", $dataPlaylist);
    $tpl->write();
  }
}