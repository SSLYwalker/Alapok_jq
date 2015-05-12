<?php

if (!defined('easyframework_inited')) 
	exit('No direct script access allowed');

/**
 *  @file html.php
 *  @brief Html helper 
 *  @author Vajay Attila
 *  @email vajay.attila@gmail.com
 *  @date 2014-07-30
 *  @copyright MIT License (MIT)
 */

 /**
 *  @brief Echo html begin 
 */
if ( ! function_exists('echohtmlbegin')){
    function echohtmlbegin()
    {
        echo '<!DOCTYPE html>'."\r\n";
        echo '<html>'."\r\n";
    }
}

/**
 *  @brief Echo html end 
 */
if ( ! function_exists('echohtmlend')){
    function echohtmlend()
    {
        echo '</html>'."\r\n";
    }
}

/**
 *  @brief Echo html head 
 *  
 *  @param [in] $codepage The html codepage. Default value is UTF-8.
 */
if ( ! function_exists('echoheader')){
    function echoheader($codepage='UTF-8')
    {
        echo '<head>'."\r\n";
        echo '<meta http-equiv="Content-Type" content="text/html; charset='.$codepage.'" >'."\r\n";
        echo '</head>'."\r\n";
    }
}

/**
 *  @brief Echo body begin
 */
if ( ! function_exists('echobodybegin')){
    function echobodybegin()
    {
        echo '<body>'."\r\n";
    }
}

/**
 *  @brief Echo body end
 */
if ( ! function_exists('echobodyend')){
    function echobodyend()
    {
        echo '</body>'."\r\n";
    }
}
 
require_once('helpers/utils.php');
 
if(!defined('html_inited'))
 {
	define('html_inited', true);
    
/**
	 *  @brief Get logger version
	 *  
	 *  @retval logger version
	 */    
	if ( ! function_exists('gethtmlversion'))
	{
		function gethtmlversion()
		{
			return '1.0.0.1';
		}
	}	
	log_message(LOGGER_SYSTEM, 'html helper is inited. version:'.gethtmlversion());	
	adddependency('html', gethtmlversion(), COMPONENT_HELPER, 'utils', '1.0.0.2', COMPONENT_HELPER);    
}
 
 
 ?>