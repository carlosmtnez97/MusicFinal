<?php 
use \Firebase\JWT\JWT;
class Controller_Privacidad extends Controller_Rest
{
    private $key = "juf3dhu3hufdchv3xui3ucxj";
    public function post_privacidadAmigos()
    {
        try
            {
                $headers = apache_request_headers();
                $token = $headers['Authorization'];
                $dataJwtUser = JWT::decode($token, $this->key, array('HS256'));
        
      
                $users = Model_Usuarios::find('all', array(
                    'where' => array(
                        array('id', $dataJwtUser->id),
                        array('username', $dataJwtUser->username),
                        array('password', $dataJwtUser->password)
               
                    )
                 ));
            }    
            catch (Exception $e)
            {
                $json = $this->response(array(
                    'code' => 500,
                    'message' => $e->getMessage(),
                    'data' => []
                ));
                return $json;
               
            }
            $privacidad = Model_Privacidad::find('all', array(
                        'where' => array(
                            array('id_usuario', $dataJwtUser->id),
                            
                        )          
                    ));
            
           
            
            
            if ( ! empty($privacidad) )
            {
                   
                foreach ($privacidad as $key => $privado)
                {
                    
                }
                        
                       
                     
                 if($privado->amigos == 1)
                    {
                    $privado->amigos = 2;
                        $privado->save();
                      
                    }
                    else
                    {
                        $privado->amigos =1;
                        $privado->save();
                    }
                   
                if($privado->amigos == 1)
                    {
                        $json = $this->response(array(
                            'code' => 200,
                            'message' => 'Campo amigos puesto en privado',
                            'data' => $privado
                        ));
                return $json;
                    }
                    else
                    {
                        $json = $this->response(array(
                            'code' => 200,
                            'message' => 'Campo amigos puesto en publico',
                            'data' => $privado
                        ));
                return $json;
                    }
                
               
            }
            else
            {
                return $this->response(array(
                    'code' => 400,
                    'message' => 'Usuario  no encontrado',
                    'data' => []
                    ));
            }
               
    }
    public function post_privacidadPerfil()
    {
        try
            {
                $headers = apache_request_headers();
                $token = $headers['Authorization'];
                $dataJwtUser = JWT::decode($token, $this->key, array('HS256'));
        
      
                $users = Model_Usuarios::find('all', array(
                    'where' => array(
                        array('id', $dataJwtUser->id),
                        array('username', $dataJwtUser->username),
                        array('password', $dataJwtUser->password)
               
                    )
                 ));
            }    
            catch (Exception $e)
            {
                $json = $this->response(array(
                    'code' => 500,
                    'message' => $e->getMessage(),
                    'data' => []
                ));
                return $json;
               
            }
            $privacidad = Model_Privacidad::find('all', array(
                        'where' => array(
                            array('id_usuario', $dataJwtUser->id),
                            
                        )          
                    ));
            
           
            
            
            if ( ! empty($privacidad) )
            {
                   
                foreach ($privacidad as $key => $privado)
                {
                    
                }
                        
                       
                     
                 if($privado->perfil == 1)
                    {
                    $privado->perfil = 2;
                        $privado->save();
                      
                    }
                    else
                    {
                        $privado->perfil =1;
                        $privado->save();
                    }
                   
                if($privado->perfil == 1)
                    {
                        $json = $this->response(array(
                            'code' => 200,
                            'message' => 'Campo perfil puesto en privado',
                            'data' => $privado
                        ));
                return $json;
                    }
                    else
                    {
                        $json = $this->response(array(
                            'code' => 200,
                            'message' => 'Campo perfil puesto en publico',
                            'data' => $privado
                        ));
                return $json;
                    }
                
               
            }
            else
            {
                return $this->response(array(
                    'code' => 400,
                    'message' => 'Usuario  no encontrado',
                    'data' => []
                    ));
            }
               
    }
    public function post_privacidadNotificaciones()
    {
        try
            {
                $headers = apache_request_headers();
                $token = $headers['Authorization'];
                $dataJwtUser = JWT::decode($token, $this->key, array('HS256'));
        
      
                $users = Model_Usuarios::find('all', array(
                    'where' => array(
                        array('id', $dataJwtUser->id),
                        array('username', $dataJwtUser->username),
                        array('password', $dataJwtUser->password)
               
                    )
                 ));
            }    
            catch (Exception $e)
            {
                $json = $this->response(array(
                    'code' => 500,
                    'message' => $e->getMessage(),
                    'data' => []
                ));
                return $json;
               
            }
            $privacidad = Model_Privacidad::find('all', array(
                        'where' => array(
                            array('id_usuario', $dataJwtUser->id),
                            
                        )          
                    ));
            
           
            
            
            if ( ! empty($privacidad) )
            {
                   
                foreach ($privacidad as $key => $privado)
                {
                    
                }
                        
                       
                     
                 if($privado->notificaciones == 1)
                    {
                    $privado->notificaciones = 2;
                        $privado->save();
                      
                    }
                    else
                    {
                        $privado->notificaciones =1;
                        $privado->save();
                    }
                   
                if($privado->notificaciones == 1)
                    {
                        $json = $this->response(array(
                            'code' => 200,
                            'message' => 'Campo notificaciones puesto en privado',
                            'data' => $privado
                        ));
                return $json;
                    }
                    else
                    {
                        $json = $this->response(array(
                            'code' => 200,
                            'message' => 'Campo notificaciones puesto en publico',
                            'data' => $privado
                        ));
                return $json;
                    }
                
               
            }
            else
            {
                return $this->response(array(
                    'code' => 400,
                    'message' => 'Usuario  no encontrado',
                    'data' => []
                    ));
            }
               
    }
    public function post_privacidadListas()
    {
        try
            {
                $headers = apache_request_headers();
                $token = $headers['Authorization'];
                $dataJwtUser = JWT::decode($token, $this->key, array('HS256'));
        
      
                $users = Model_Usuarios::find('all', array(
                    'where' => array(
                        array('id', $dataJwtUser->id),
                        array('username', $dataJwtUser->username),
                        array('password', $dataJwtUser->password)
               
                    )
                 ));
            }    
            catch (Exception $e)
            {
                $json = $this->response(array(
                    'code' => 500,
                    'message' => $e->getMessage(),
                    'data' => []
                ));
                return $json;
               
            }
            $privacidad = Model_Privacidad::find('all', array(
                        'where' => array(
                            array('id_usuario', $dataJwtUser->id),
                            
                        )          
                    ));
            
           
            
            
            if ( ! empty($privacidad) )
            {
                   
                foreach ($privacidad as $key => $privado)
                {
                    
                }
                        
                       
                     
                 if($privado->listas == 1)
                    {
                    $privado->listas = 2;
                        $privado->save();
                      
                    }
                    else
                    {
                        $privado->listas =1;
                        $privado->save();
                    }
                   
                if($privado->listas == 1)
                    {
                        $json = $this->response(array(
                            'code' => 200,
                            'message' => 'Campo listas puesto en privado',
                            'data' => $privado
                        ));
                return $json;
                    }
                    else
                    {
                        $json = $this->response(array(
                            'code' => 200,
                            'message' => 'Campo listas puesto en publico',
                            'data' => $privado
                        ));
                return $json;
                    }
                
               
            }
            else
            {
                return $this->response(array(
                    'code' => 400,
                    'message' => 'Usuario  no encontrado',
                    'data' => []
                    ));
            }
               
    }
    public function post_privacidadUbicacion()
    {
        try
            {
                $headers = apache_request_headers();
                $token = $headers['Authorization'];
                $dataJwtUser = JWT::decode($token, $this->key, array('HS256'));
        
      
                $users = Model_Usuarios::find('all', array(
                    'where' => array(
                        array('id', $dataJwtUser->id),
                        array('username', $dataJwtUser->username),
                        array('password', $dataJwtUser->password)
               
                    )
                 ));
            }    
            catch (Exception $e)
            {
                $json = $this->response(array(
                    'code' => 500,
                    'message' => $e->getMessage(),
                    'data' => []
                ));
                return $json;
               
            }
            $privacidad = Model_Privacidad::find('all', array(
                        'where' => array(
                            array('id_usuario', $dataJwtUser->id),
                            
                        )          
                    ));
            
           
            
            
            if ( ! empty($privacidad) )
            {
                   
                foreach ($privacidad as $key => $privado)
                {
                    
                }
                        
                       
                     
                 if($privado->ubicacion == 1)
                    {
                    $privado->ubicacion = 2;
                        $privado->save();
                      
                    }
                    else
                    {
                        $privado->ubicacion =1;
                        $privado->save();
                    }
                   
                if($privado->ubicacion == 1)
                    {
                        $json = $this->response(array(
                            'code' => 200,
                            'message' => 'Campo ubicacion puesto en privado',
                            'data' => $privado
                        ));
                return $json;
                    }
                    else
                    {
                        $json = $this->response(array(
                            'code' => 200,
                            'message' => 'Campo ubicacion puesto en publico',
                            'data' => $privado
                        ));
                return $json;
                    }
                
               
            }
            else
            {
                return $this->response(array(
                    'code' => 400,
                    'message' => 'Usuario  no encontrado',
                    'data' => []
                    ));
            }
               
    }
}