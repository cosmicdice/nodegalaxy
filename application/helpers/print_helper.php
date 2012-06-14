<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('p'))
{
	function p($str) {
		echo(htmlentities($str,null,'utf-8'));
	}
}
if ( ! function_exists('h'))
{
	function h($str) {
		return htmlentities($str,null,'utf-8');
	}
}

