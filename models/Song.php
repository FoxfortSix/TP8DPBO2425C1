<?php

class Song extends DB
{
    function getSong()
    {
        $query = "SELECT 
                    song.id, 
                    song.title, 
                    song.release_year, 
                    album.title AS album_name, 
                    artist.name AS artist_name
                  FROM song
                  JOIN album ON song.album_id = album.id
                  JOIN artist ON album.artist_id = artist.id
                  ORDER BY song.id";
        
        return $this->execute($query);
    }

    function getAlbum()
    {
        $query = "SELECT album.id, album.title, artist.name 
                  FROM album 
                  JOIN artist ON album.artist_id = artist.id
                  ORDER BY artist.name, album.title";
        
        return $this->execute($query);
    }

    function add($data)
    {
        $judul = $data['tjudul'];
        $tahun_rilis = $data['tpenerbit']; 
        $album_id = $data['cmbalbum'];

        $query = "INSERT INTO song (title, release_year, album_id) 
                  VALUES ('$judul', '$tahun_rilis', '$album_id')";

        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM song WHERE id = $id";
        return $this->execute($query);
    }

    function getSongById($id)
    {
        $query = "SELECT * FROM song WHERE id = $id";
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $judul = $data['tjudul'];
        $tahun_rilis = $data['tpenerbit'];
        $album_id = $data['cmbalbum'];

        $query = "UPDATE song SET 
                    title = '$judul', 
                    release_year = '$tahun_rilis', 
                    album_id = '$album_id' 
                  WHERE id = $id";
        
        return $this->execute($query);
    }
}