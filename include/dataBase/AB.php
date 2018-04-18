<?php
include_once("mysqli.php");

class AB{
    public function QueryALL($query)
    {
        $mysqli = mysqlli();
        $results = $mysqli->query($query);
        if ($results) {
            while ($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
            $results->free();
        } else $data = 0;
        $mysqli->close();
        return($data);
    }
    public static function QueryONE($query){
        $mysqli = mysqlli();
        $results = $mysqli->query($query);
        if ($results) {
            if(gettype($results)!="boolean") {
                $data = $row = $results->fetch_assoc();
                $results->free();
            }
        } else $data = 0;
        $mysqli->close();
        return($data);
    }
    public function GetImgById($id)
    {
        $id = htmlspecialchars($id);
        $mysqli = mysqlli();
        $results = $mysqli->query("SELECT SRC,ALT,NAME FROM picture WHERE ID=$id");
        if ($results) {
            $data = $row = $results->fetch_assoc();
            $results->free();
        } else $data = 0;
        $mysqli->close();
        return($data);
    }
    public function LastId($bd){
        $mysqli = mysqlli();
        $results = $mysqli->query("SELECT * FROM $bd ORDER BY ID DESC");
        if ($results) {

                $data[] = $results->fetch_assoc();

            $results->free();
        } else $data = 0;
        $mysqli->close();
        return($data[0]['ID']);
    }
}

