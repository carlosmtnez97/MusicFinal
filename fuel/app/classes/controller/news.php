<?php

use Firebase\JWT\JWT;

class Controller_News extends Controller_Rest
{

	private $key = "dejr334irj3irji3r4j3rji3jiSj3jri";
	public function post_create()
    {
    	try {
            
            if ( empty($_POST['title']), empty($_POST['description']))
            {
                $json = $this->response(array(
                    'code' => 400,
                    'message' =>  'Falta algun campo'
                ));
                return $json;            }

            $new = $_POST['title'];
            $new = $_POST['description'];

            if($this->isNewCreated($new))
            {
                $json = $this->response(array(
                    'code' => 400,
                    'message' => 'La noticia ya existe',
                    'data' => []
                ));
                return $json;
            }

            $input = $_POST;
            $new = new Model_News();
            $new->title = $input['title'];
            $new->description = $input['description'];
            $new->id_user = 1;
            $new->save();
    
            $json = $this->response(array(
                'code' => 200,
                'message' => 'Noticia creada',
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
     public function get_news()
    {
        /*return $this->respuesta(500, 'trace');
        exit;*/
        $news = Model_Lists::find('all');
        return $this->response(Arr::reindex($lists));
    }

        public function isNewCreated($title)
    {
        $news = Model_Lists::find('all', array(
            'where' => array(
                array('title', $title)
            )
        ));
        
        if(count($news) < 1)  {
            return false;
        }
        else 
        {
            return true;
        }
    }

}