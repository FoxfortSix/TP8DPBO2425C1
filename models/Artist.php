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
        $query = "INSERT INTO artist (name) VALUES ('$nama')";

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
        $query = "UPDATE artist SET name = '$nama' WHERE id = $id";
        return $this->execute($query);
    }
}