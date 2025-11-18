<?php

class Artist extends DB
{
    function getArtist()
    {
        $query = "SELECT * FROM artist";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama = $data['tname'];
        $country = $data['tcountry']; 
        
        $query = "INSERT INTO artist (name, country) VALUES ('$nama', '$country')";

        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM artist WHERE id = $id";

        return $this->execute($query);
    }

    function getArtistById($id)
    {
        $query = "SELECT * FROM artist WHERE id = $id";
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $nama = $data['tname'];
        $country = $data['tcountry'];

        $query = "UPDATE artist SET name = '$nama', country = '$country' WHERE id = $id";
        
        return $this->execute($query);
    }
}