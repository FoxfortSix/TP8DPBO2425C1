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

    function statusPlaylist($id)
    {
        $query = "";
        return $this->execute($query);
    }
}