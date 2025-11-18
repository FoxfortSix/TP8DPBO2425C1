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

    function getPlaylistById($id)
    {
        $query = "SELECT * FROM playlist WHERE id = $id";
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $nama = $data['tname'];
        $query = "UPDATE playlist SET name = '$nama' WHERE id = $id";
        return $this->execute($query);
    }
}