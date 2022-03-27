<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('post_title'))
{
	function post_title($post)
	{
		if (config_item('language') == 'indonesian')
            return $post->title_id;
        else
		    return $post->title_en;
	}
}

if ( ! function_exists('post_summary'))
{
	function post_summary($post)
	{
		if (config_item('language') == 'indonesian')
            return $post->summaryid;
        else
		    return $post->summaryen;
	}
}

if ( ! function_exists('post_content'))
{
	function post_content($post)
	{
		if (config_item('language') == 'indonesian')
            return $post->content_id;
        else
		    return $post->content_en;
	}
}

if ( ! function_exists('post_metatitle'))
{
	function post_metatitle($post)
	{
		if (config_item('language') == 'indonesian')
            return $post->metatitleid;
        else
		    return $post->metatitleen;
	}
}

if ( ! function_exists('post_metacontent'))
{
	function post_metacontent($post)
	{
		if (config_item('language') == 'indonesian')
            return $post->metacontentid;
        else
		    return $post->metacontenten;
	}
}