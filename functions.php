<?php
/**
 * Created by PhpStorm.
 * User: Jan
 * Date: 14.01.14
 * Time: 02:33
 */


function convertBBCode($text)
{
	return $text;
}

function insertData($table, $data)
{
	global $phpBBDb, $phpBBMySQLConnection;

	$sql = "INSERT INTO {$phpBBMySQLConnection['prefix']}{$table} SET ";

	foreach($data as $key => $value)
	{
		$sql	.= "´".$key."´ = '".$value."',";
	}

	$sql	= substr($sql, 0, -1).';';
	$phpBBDb->query($sql);
}

function updateData($table, $data, $where = '1=1')
{
	global $phpBBDb, $phpBBMySQLConnection;

	$sql = "UPDATE {$phpBBMySQLConnection['prefix']}{$table} SET ";

	foreach($data as $key => $value)
	{
		$sql	.= "´".$key."´ = '".$value."',";
	}

	$sql	= substr($sql, 0, -1).' ';
	$sql	.= "WHERE {$where};";

	$phpBBDb->query($sql);
}