<?php 
namespace Fuel\Migrations;
class Privacity
{
    function up()
    {
        \DBUtil::create_table('privacity', array(
            'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
            'profile' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'friends' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'lists' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'notifications' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'localization' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            
        ), array('id'));
        \DB::query("INSERT INTO privacity (id, profile, friends, lists, notifications, localization) VALUES ('1', NULL, NULL, NULL, NULL, NULL);")->execute();
    }
    function down()
    {
       \DBUtil::drop_table('privacity');
    }
}