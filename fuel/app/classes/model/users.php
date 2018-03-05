<?php 
class Model_Users extends Orm\Model
{
    protected static $_table_name = 'users';
    protected static $_primary_key = array('id');
    protected static $_properties = array(
        'id', // both validation & typing observers will ignore the PK
        'username' => array(
            'data_type' => 'varchar'   
        ),
         'email' => array(
            'data_type' => 'varchar'   
        ),
         'password' => array(
            'data_type' => 'varchar'   
        ),
         'id_device' => array(
            'data_type' => 'varchar'   
        ),
         'image_profile' => array(
            'data_type' => 'varchar'   
        ),
         'x' => array(
            'data_type' => 'decimal'   
        ),
         'y' => array(
            'data_type' => 'decimal'   
        ),
         'active' => array(
            'data_type' => 'int'   
        ),
         'birthday' => array(
            'data_type' => 'varchar'   
        ),
         'city' => array(
            'data_type' => 'varchar'   
        ),
         'description' => array(
            'data_type' => 'varchar'   
        ),
        'id_rol',
        'id_privacity'
    );
protected static $_belongs_to = array(
        'roles' => array(
            'key_from' => 'id_rol',
            'model_to' => 'Model_Roles',
            'key_to' => 'id',
            'cascade_save' => false,
            'cascade_delete' => false,
        ),
        'privacity' => array(
            'key_from' => 'id_privacity',
            'model_to' => 'Model_Privacity',
            'key_to' => 'id',
            'cascade_save' => false,
            'cascade_delete' => false,
        )
    );
}