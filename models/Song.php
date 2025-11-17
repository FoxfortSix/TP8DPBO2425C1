<?php

class Song extends DB
{
    function getSong()
    {
        $query = "SELECT * FROM song";
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

    function statusSong($id)
    {
        // Lengkapi Query

        // Mengeksekusi query
        return $this->execute($query);
    }
}
