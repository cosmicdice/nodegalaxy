<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('css_url'))
{
	function css_url($nom)
	{
		return base_url() . 'assets/css/' . $nom . '.css';
	}
}

if ( ! function_exists('js_url'))
{
	function js_url($nom)
	{
		return base_url() . 'assets/js/' . $nom . '.js';
	}
}

if ( ! function_exists('img_url'))
{
	function img_url($nom)
	{
		return base_url() . 'assets/img/' . $nom;
	}
}

if ( ! function_exists('img'))
{
	function img($nom, $alt = '')
	{
		return '<img src="' . img_url($nom) . '" alt="' . $alt . '" />';
	}
}


if ( ! function_exists('bootcss_url'))
{
	function bootcss_url()
	{
		return base_url() . 'assets/bootstrap/css/bootstrap.min.css';
	}
}

if ( ! function_exists('bootjs_url'))
{
	function bootjs_url()
	{
		return base_url() . 'assets/bootstrap/js/bootstrap.min.js';
	}
}

if ( ! function_exists('datatablescss_url'))
{
	function datatablescss_url()
	{
		return base_url() . 'assets/datatables/media/css/datatables.css';
	}
}

if ( ! function_exists('datatablesjs_url'))
{
	function datatablesjs_url()
	{
		return base_url() . 'assets/datatables/media/js/jquery.dataTables.min.js';
	}
}

