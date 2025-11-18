<?php

class Playlist extends DB
{
    function getPlaylist()
    {
        $query = "SELECT * FROM playlist ORDER BY id";
        return $this->execute($query);
    }
    function add($data)
    {
        $nama = $data['tname'];
        $query = "INSERT INTO playlist (name) VALUES ('$nama')";
        return $this->execute($query);
    }
    function delete($id)
    {
        $query = "DELETE FROM playlist WHERE id = $id";
        return $this->execute($query);
    }
    function getPlaylistById($id)
    {
        $query = "SELECT * FROM playlist WHERE id = $id";
        return $this->execute($query);
    }
    function update($id, $data)
    {
        $nama = $data['tname'];
        $query = "UPDATE playlist SET name = '$nama' WHERE id = $id";
        return $this->execute($query);
    }

    function getSongsInPlaylist($playlist_id)
    {
        $query = "SELECT song.id, song.title, artist.name AS artist_name
                  FROM song
                  JOIN playlist_song ON song.id = playlist_song.song_id
                  JOIN album ON song.album_id = album.id
                  JOIN artist ON album.artist_id = artist.id
                  WHERE playlist_song.playlist_id = $playlist_id";
        return $this->execute($query);
    }

    function getSongsNotInPlaylist($playlist_id)
    {
        $query = "SELECT song.id, song.title, artist.name AS artist_name
                  FROM song
                  JOIN album ON song.album_id = album.id
                  JOIN artist ON album.artist_id = artist.id
                  WHERE song.id NOT IN (
                      SELECT song_id FROM playlist_song WHERE playlist_id = $playlist_id
                  )";
        return $this->execute($query);
    }
    function addSongToPlaylist($playlist_id, $song_id)
    {
        $query = "INSERT INTO playlist_song (playlist_id, song_id)
                  VALUES ($playlist_id, $song_id)";
        return $this->execute($query);
    }

    function removeSongFromPlaylist($playlist_id, $song_id)
    {
        $query = "DELETE FROM playlist_song 
                  WHERE playlist_id = $playlist_id AND song_id = $song_id";
        return $this->execute($query);
    }
}