<?php 
namespace Fuel\Migrations;
class Users
{
    function up()
    {
        \DBUtil::create_table('users', array(
            'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
            'username' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'email' => array('type' => 'varchar', 'constraint' => 100),
            'password' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'id_device' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'image_profile' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'x' => array('type' => 'decimal', 'constraint' => 30, 'null' => true),
            'y' => array('type' => 'decimal', 'constraint' => 30, 'null' => true),
            'active' => array('type' => 'int', 'constraint' => 1),
            'birthday' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'city' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'description' => array('type' => 'varchar', 'constraint' => 100, 'null' => true),
            'id_rol' => array('type' => 'int', 'constraint' => 11),
            'id_privacity' => array('type' => 'int', 'constraint' => 11),
        ), array('id'), false, 'InnoDB', 'utf8_unicode_ci',
		    array(
		        array(
		            'constraint' => 'foreignKeyFromUsersToRoles',
		            'key' => 'id_rol',
		            'reference' => array(
		                'table' => 'roles',
		                'column' => 'id',
		            ),
		            'on_update' => 'CASCADE',
		            'on_delete' => 'RESTRICT'
		        ),
		        array(
		            'constraint' => 'foreignKeyFromUsersToPrivacity',
		            'key' => 'id_privacity',
		            'reference' => array(
		                'table' => 'privacity',
		                'column' => 'id',
		            ),
		            'on_update' => 'CASCADE',
		            'on_delete' => 'RESTRICT'
		        )
		    )
		);
		\DB::query("INSERT INTO users  (`id`, `username`, `email`, `password`, `id_device`, `image_profile`, `x`, `y`, `active`, `birthday`, `city`, `description`, `id_rol`, `id_privacity`) VALUES (NULL, 'admin', 'admin@cev.com', '12345', NULL, NULL, NULL, NULL, '0',  NULL, NULL, NULL, '1', '1');")->execute();
    }
    function down()
    {
       \DBUtil::drop_table('users');
    }
}