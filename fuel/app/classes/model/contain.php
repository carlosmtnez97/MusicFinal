<?php 
class Model_Users extends Orm\Model
{
    protected static $_table_name = 'contain';
    protected static $_primary_key = array('id_list', 'id_song');
    protected static $_properties = array(
        'id_list',
        'id_song'
    );
protected static $_belongs_to = array(
        'lists' => array(
            'key_from' => 'id_list',
            'model_to' => 'Model_Lists',
            'key_to' => 'id',
            'cascade_save' => false,
            'cascade_delete' => false,
        ),
        'songs' => array(
            'key_from' => 'id_song',
            'model_to' => 'Model_Songs',
            'key_to' => 'id',
            'cascade_save' => false,
            'cascade_delete' => false,
        )
    );
}