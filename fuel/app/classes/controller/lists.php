<?php

use Firebase\JWT\JWT;

class Controller_Lists extends Controller_Rest
{

	private $key = "dejr334irj3irji3r4j3rji3jiSj3jri";
	public function post_create()
    {
    	try {
            
            if ( empty($_POST['title']))
            {
                $json = $this->response(array(
                    'code' => 400,
                    'message' =>  'Falta algun campo'
                ));
                return $json;            }

            $list = $_POST['title'];

            if($this->isListCreated($list))
            {
                $json = $this->response(array(
                    'code' => 400,
                    'message' => 'Lista ya existe',
                    'data' => []
                ));
                return $json;
            }

            $input = $_POST;
            $list = new Model_Lists();
            $list->title = $input['title'];
            $list->editable = 1;
            $list->id_user = 1;
            $list->save();
            /*
            $dataToken = array(
                        "title" => $list,
                        
                    );

                    $token = JWT::encode($dataToken, $this->$key);
                    */
            $json = $this->response(array(
                'code' => 200,
                'message' => 'Lista creada',
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
     public function get_lists()
    {
        /*return $this->respuesta(500, 'trace');
        exit;*/
        $lists = Model_Lists::find('all');
        return $this->response(Arr::reindex($lists));
    }

        public function isListCreated($title)
    {
        $lists = Model_Lists::find('all', array(
            'where' => array(
                array('title', $title)
            )
        ));
        
        if(count($lists) < 1)  {
            return false;
        }
        else 
        {
            return true;
        }
    }

}