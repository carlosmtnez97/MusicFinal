<?php 

use Firebase\JWT\JWT;

class Controller_Songs extends Controller_Rest
{
    private $key = "dejr334irj3irji3r4j3rji3jiSj3jri";
    
    public function post_create()
    {
        try {

        
            if ( empty($_POST['title']) || empty($_POST['artist']) || empty($_POST['url']) ) 
            {
                $json = $this->response(array(
                    'code' => 400,
                    'message' =>  'Falta algun campo'
                ));
                return $json;
            }

            $title = $_POST['title'];
            $artist = $_POST['artist'];
            $url = $_POST['url'];

            $input = $_POST;

            $song = new Model_Songs();
                
            $song->title = $input['title'];
            $song->artist = $input['artist'];
            $song->url = $input['url'];
            $song->reproductions = 0; 
            $song->save();
            
            $json = $this->response(array(
                'code' => 200,
                'message' => 'Canción creada',
                'data' => []
            ));
          
            return $json;
           
   
        } 
        catch (Exception $e) 
        {
            $json = $this->response(array(
                'code' => 500,
                'message' => $e->getMessage()
            ));
            return $json;
        }
    }
        
    

    public function post_delete()
    {
        $song = Model_Songs::find($_POST['id']);
        $title = $song->title;
        $song->delete();
        $json = $this->response(array(
            'code' => 200,
            'message' => 'Canción eliminada',
            'data' => $title
        ));
        return $json;
    }

     public function get_songs()
    {
        /*return $this->respuesta(500, 'trace');
        exit;*/
        $songs = Model_Songs::find('all');
        return $this->response(Arr::reindex($songs));
    }



    
    public function post_editSong(){
       
        try {
            $header = apache_request_headers();
            if (isset($header['Authorization'])) 
                {
                    $token = $header['Authorization'];
                    $dataJwtSong = JWT::decode($token, $this->key, array('HS256'));
                }
            if (empty($_POST['title'])|| empty($_POST['artist'])|| empty($_POST['url'])) 
                {
                    $json = $this->response(array(
                        'code' => 400,
                        'message' =>  'Hay campos vacios',
                        'data' => []
                    ));
                    return $json;
                }
                    $input = $_POST;
                    
                   
                    $song = Model_Songs::find($dataJwtSong->id);
                    $song->title = '';
                    $song->artist = '';
                    $song->url = '';
                    
                    
               
                    $song->save();
                    $song->title = $input['title'];
                    $song->artist = $input['artist'];
                    $song->url = $input['url'];
                    $song->save();
                                
                    $json = $this->response(array(
                        'code' => 200,
                        'message' =>  'Cancion editada',
                        'data' => []
                ));
                return $json;
                
        } catch (Exception $e) {
            if($e->getCode() == 23000)
            {
                return $this->response(array(
                    'code' => 500,
                    'message' => $e->getMessage(),
                    'data' => []
                    ));
            }
        }
    }

    public function post_addSong(){
        
    }            

}