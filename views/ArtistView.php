<?php
class ArtistView
{
  public function render($data)
  {
    $no = 1;
    $dataArtist = null;
    foreach ($data as $val) {
        list($id, $nama, $country) = $val;
        $dataArtist .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $nama . "</td>
                    <td>" . $country . "</td> 
                    <td>
                    <a href='artist.php?id_edit=" . $id .  "' class='btn btn-warning''>Edit</a>
                    <a href='artist.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";      
    }

    $tpl = new Template("templates/artist.html");
    $tpl->replace("JUDUL", "Artist");
    $tpl->replace("DATA_TABEL", $dataArtist);
    $tpl->write();
  }
}