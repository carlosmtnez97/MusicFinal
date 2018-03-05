<?php 
namespace Fuel\Migrations;
class Follow
{
    function up()
    {
        \DBUtil::create_table('follow', array(
            'id_followed' => array('type' => 'int', 'constraint' => 11),
            'id_follower' => array('type' => 'int', 'constraint' => 11),
        ), array('id_followed', 'id_follower'), false, 'InnoDB', 'utf8_unicode_ci',
		    array(
		        array(
		            'constraint' => 'foreignKeyFromFollowToFollowed',
		            'key' => 'id_followed',
		            'reference' => array(
		                'table' => 'users',
		                'column' => 'id',
		            ),
		            'on_update' => 'CASCADE',
		            'on_delete' => 'RESTRICT'
		        ),
		        array(
		            'constraint' => 'foreignKeyFromFollowToFollower',
		            'key' => 'id_follower',
		            'reference' => array(
		                'table' => 'users',
		                'column' => 'id',
		            ),
		            'on_update' => 'CASCADE',
		            'on_delete' => 'RESTRICT'
		        )
		    )
		);
    }
    function down()
    {
       \DBUtil::drop_table('follow');
    }
}