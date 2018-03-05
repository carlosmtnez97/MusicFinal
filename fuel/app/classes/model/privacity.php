<?php 
class Model_Privacity extends Orm\Model
{
    protected static $_table_name = 'privacity';
    protected static $_primary_key = array('id');
    protected static $_properties = array(
        'id',
        'profile' => array(
            'data_type' => 'varchar'   
        ),
        'friends' => array(
            'data_type' => 'varchar'   
        ),
        'lists' => array(
            'data_type' => 'varchar'   
        ),
        'notifications' => array(
            'data_type' => 'varchar'   
        ),
        'localization' => array(
            'data_type' => 'varchar'   
        ),
       
    );
     protected static $_has_many = array(
        'users' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Users',
            'key_to' => 'id_user',
            'cascade_save' => false,
            'cascade_delete' => false,
        )
    );
 }
            