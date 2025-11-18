<?php

class Album extends DB
{
    function getAlbum()
    {
        $query = "SELECT album.id, album.title, album.release_year, artist.name AS artist_name 
                  FROM album 
                  JOIN artist ON album.artist_id = artist.id 
                  ORDER BY album.id";
        
        return $this->execute($query);
    }

    function getArtist()
    {
        $query = "SELECT * FROM artist";
        return $this->execute($query);
    }

    function add($data)
    {
        $judul = $data['tjudul'];
        $tahun = $data['ttahun'];
        $artist_id = $data['cmbartist'];

        $query = "INSERT INTO album (title, release_year, artist_id) 
                  VALUES ('$judul', '$tahun', '$artist_id')";

        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM album WHERE id = $id";

        return $this->execute($query);
    }

    function getAlbumById($id)
    {
        $query = "SELECT * FROM album WHERE id = $id";
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $judul = $data['tjudul'];
        $tahun = $data['ttahun'];
        $artist_id = $data['cmbartist'];

        $query = "UPDATE album SET 
                    title = '$judul', 
                    release_year = '$tahun', 
                    artist_id = '$artist_id' 
                  WHERE id = $id";
        
        return $this->execute($query);
    }
}