<?php

namespace Controllers\Api\V1;

use Utils\Controller;

class SongsController extends Controller {

    public function actionCreate() {
        if($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Methods: GET, POST");
            header("Access-Control-Allow-Headers: content-type");
            echo "";
        }

        if($_SERVER["REQUEST_METHOD"] === 'POST') {
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Methods: GET, POST");
            header("Access-Control-Allow-Headers: content-type");
            echo var_dump($_POST);
            
            $stmt = $this->db->prepare('INSERT INTO songs(id, spotify_id, cover_url, artist, title) 
                VALUES(NULL, :id, :cover_url, :artist, :title);');
            $stmt->execute(
                [ ':id' => htmlspecialchars($_POST["id"]),
                  ':cover_url' => htmlspecialchars($_POST["cover_url"]),
                  ':artist' => htmlspecialchars($_POST["artist"]),
                  ':title' => htmlspecialchars($_POST["title"])
                ]);
            
        }
    }

    public function actionIndex() {
        
        $stmt = $this->db->query('SELECT * FROM songs');
        $data = [];
        while ($row = $stmt->fetch())
        {
            $song = [
                'id' => $row['spotify_id'],
                'album_cover_url' => $row['cover_url'],
                'artist' => $row['artist'],
                'title' => $row['title']
            ];
            array_push($data, (object)$song);
        }
        header("Content-Type: application/json; charset=\"utf-8\"");
        header("Access-Control-Allow-Origin: *");
        echo json_encode($data);
    }

    public function actionUpdate() {
        echo "Updating a song";
    }
    
    public function actionDelete($params) {
        parse_str($params, $query_params);
        $stmt = $this->db->prepare('DELETE FROM songs WHERE spotify_id = :id;');
        $stmt->execute([':id' => $query_params["id"]]);
    }
}