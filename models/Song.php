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
        return $this->execute($query);
    }

    function delete($id)
    {
        return $this->execute($query);
    }

    function statusSong($id)
    {
        return $this->execute($query);
    }
}
