<?php
include_once ("mysqli.php");

class AB{
    public function QueryALL($str)
    {
        $mysqli = mysqlli();
        $results = $mysqli->query($str);
        if ($results) {
            while ($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
            $results->free();
        } else $data = 0;
        $mysqli->close();
        return($data);
    }
    public function QueryONE($str){
        $mysqli = mysqlli();
        $results = $mysqli->query($str);
        if ($results) {
                $data = $row = $results->fetch_assoc();
            $results->free();
        } else $data = 0;
        $mysqli->close();
        return($data);
    }
    public function GetImgById($id)
    {
        $mysqli = mysqlli();
        $results = $mysqli->query("SELECT SRC,ALT,NAME FROM picture WHERE ID=$id");
        if ($results) {
            $data = $row = $results->fetch_assoc();
            $results->free();
        } else $data = 0;
        $mysqli->close();
        return($data);
    }
}

