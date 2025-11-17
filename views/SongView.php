<?php

class SongView
{
  public function render($data)
  {
    $no = 1;
    $dataSong = null;
    $dataGrup = null;
    foreach ($data['song'] as $val) {
      list($id, $title, $release_year, $artist_id) = $val;
      $dataSong .= "<tr class='text-center align-middle'>
                <td>" . $no++ . "</td>
                <td>" . $title . "</td>
                <td>" . $release_year . "</td>
                <td>" . $artist_id . "</td>";

      $dataSong .= "
              <td>
                <a href='index.php?id_edit=" . $id .  "' class='btn btn-warning mb-2 mb-md-0 mb-lg-0 mb-xl-0' '>Edit</a>
                <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
              </td></tr>";
    }

    foreach ($data['artist'] as $val) {
      list($id, $nama, $status) = $val;
      $dataGrup .= "<option value='" . $id . "'>" . $nama . "</option>";
    }

    $tpl = new Template("templates/index.html");

    $tpl->replace("JUDUL", "Home");
    $tpl->replace("OPTION", $dataGrup);
    $tpl->replace("DATA_TABEL", $dataSong);
    $tpl->write();
  }
}
