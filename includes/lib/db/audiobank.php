<?php
namespace lib\db;


class audiobank
{

	public static function insert()
	{
		\dash\db\config::public_insert('audiobank', ...func_get_args());
		return \dash\db::insert_id();
	}


	public static function multi_insert()
	{
		return \dash\db\config::public_multi_insert('audiobank', ...func_get_args());
	}


	public static function update()
	{
		return \dash\db\config::public_update('audiobank', ...func_get_args());
	}


	public static function get()
	{
		return \dash\db\config::public_get('audiobank', ...func_get_args());
	}

	public static function get_count()
	{
		return \dash\db\config::public_get_count('audiobank', ...func_get_args());
	}


	public static function search()
	{
		$result = \dash\db\config::public_search('audiobank', ...func_get_args());
		return $result;
	}

}
?>
