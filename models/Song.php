<?php

class Song extends DB
{
    function getSong()
    {
        // Query untuk mengambil data lagu, nama album, dan nama artist
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
        // Query untuk mengambil data album (untuk dropdown)
        $query = "SELECT album.id, album.title, artist.name 
                  FROM album 
                  JOIN artist ON album.artist_id = artist.id
                  ORDER BY artist.name, album.title";
        
        return $this->execute($query);
    }

    function add($data)
    {
        $judul = $data['tjudul'];
        $tahun_rilis = $data['tp_enerbit']; // Sesuaikan dengan name di HTML
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

    // Fungsi lain bisa ditambahkan untuk update
}