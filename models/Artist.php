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
        // Lengkapi Query

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        // Lengkapi Query

        // Mengeksekusi query
        return $this->execute($query);
    }

    function statusArtist($id)
    {
        // Lengkapi Query

        // Mengeksekusi query
        return $this->execute($query);
    }
}
