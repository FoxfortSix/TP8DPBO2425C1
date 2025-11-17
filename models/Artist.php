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
        $query = "INSERT INTO artist (name) VALUES ('$nama')";

        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM artist WHERE id = $id";

        return $this->execute($query);
    }

    function statusArtist($id)
    {
        $query = "";

        return $this->execute($query);
    }
}