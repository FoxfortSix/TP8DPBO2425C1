<?php
include_once("views/Template.php");

class PlaylistDetailView
{
  public function render($data)
  {
    $playlistInfo = $data['playlist'];
    list($id_playlist, $nama_playlist) = $playlistInfo;

    $dataLaguDiPlaylist = null;
    if (empty($data['songs_in'])) {
        $dataLaguDiPlaylist = "<tr><td colspan='3' class='text-center'>Belum ada lagu di playlist ini.</td></tr>";
    } else {
        foreach ($data['songs_in'] as $val) {
          list($id_lagu, $judul_lagu, $nama_artist) = $val;
          $dataLaguDiPlaylist .= "<tr>
                <td>" . $judul_lagu . "</td>
                <td>" . $nama_artist . "</td>
                <td>
                  <a href='playlist.php?id_hapus_lagu=" . $id_lagu . "&id_playlist=" . $id_playlist . "' class='btn btn-danger btn-sm'>Hapus</a>
                </td>
              </tr>";
        }
    }

    $optionLagu = null;
    if (empty($data['songs_not_in'])) {
        $optionLagu = "<option value='' disabled>Semua lagu sudah ada di playlist.</option>";
    } else {
        foreach ($data['songs_not_in'] as $val) {
          list($id_lagu, $judul_lagu, $nama_artist) = $val;
          $optionLagu .= "<option value='" . $id_lagu . "'>" . $nama_artist . " - " . $judul_lagu . "</option>";
        }
    }

    $tpl = new Template("templates/playlist_detail.html");

    $tpl->replace("DATA_ID_PLAYLIST", $id_playlist);
    $tpl->replace("DATA_NAMA_PLAYLIST", $nama_playlist);
    $tpl->replace("DATA_LAGU_DI_PLAYLIST", $dataLaguDiPlaylist);
    $tpl->replace("OPTION_LAGU", $optionLagu);
    
    $tpl->write();
  }
}