<?php

if (!defined('easyframework_inited')) 
	exit('No direct script access allowed');

/**
 *  @file logger.php
 *  @brief Logger helper 
 *  @author Vajay Attila (https://code.google.com/p/easy-logger-helper/)
 *  @email vajay.attila@gmail.com
 *  @date 2014-07-29
 *  @copyright MIT License (MIT)
 */

/**
 *  @brief Get log level name
 *  
 *  @param [in] $loglevel 
 *  @retval Loglevel name string
 */    
if ( ! function_exists('getloglevelname'))
{
	function getloglevelname($loglevel){
		$retval='';
		switch($loglevel)
		{
			case LOGGER_DISABLED:
				$retval="DISABLED";
				break;
			case LOGGER_ERROR:
				$retval="ERROR";
				break;
			case LOGGER_WARNING:
				$retval="WARNING";
				break;
			case LOGGER_INFO:
				$retval="INFO";
				break;
			case LOGGER_DEBUG:
				$retval="DEBUG";
				break;
			case LOGGER_SYSTEM:
				$retval="SYSTEM";
				break;
			default:
				$retval="UNKNOWN";
		}
		return $retval; 
	}
}
 
/**
 *  @brief Log message
 *  
 *  @param [in] $loglevel 
 *  @param [in] $message
 */    
if ( ! function_exists('log_message'))
{
	function log_message($loglevel, $message){
		global $g_logger_loglevel;	
		if(!isset($g_logger_loglevel))
		{
			$g_logger_loglevel=LOGGER_DISABLED;
		}
		if($loglevel<=$g_logger_loglevel && $loglevel!=LOGGER_DISABLED)
		{
			// check log folder
			if (!file_exists('logs')) {
				mkdir('logs', 0777, true);
			}		
			// log file name
			$filename='log-'.@date("Y-m-d").'.log';
			$fh=fopen('logs/'.$filename, 'a');
			if($fh!==FALSE)
			{
				$logline=@sprintf('%-7s', getloglevelname($loglevel)).' - '.@date("Y-m-d H:i:s").' --> '.$message."\r\n";
				fputs($fh, $logline);
				fclose($fh);
			}
		}
	}
}

require_once('helpers/utils.php'); 

if(!defined('logger_inited'))
{
	define('logger_inited', true);

	global $g_logger_loglevel;
	global $g_logger_inited;

	/**
	 *  @brief Get logger version
	 *  
	 *  @retval logger version
	 */    
	if ( ! function_exists('getloggerversion'))
	{
		function getloggerversion()
		{
			return '1.0.0.2';
		}
	}	

	if ( ! function_exists('setloglevel')){
		/**
		 *  @brief Setting log level
		 *  
		 *  @param [in] $level new log level
		 *  @return old log level
		 */    
		function setloglevel($level)
		{
			global $g_logger_loglevel;
			$old=$g_logger_loglevel;
			$g_logger_loglevel=$level;
			log_message(LOGGER_DEBUG, 'called function: '.__FUNCTION__.' with $level='.$level);
			return $old;
		}
	}

	$g_logger_inited=TRUE;
	setloglevel(LOGGER_DISABLED);
	log_message(LOGGER_SYSTEM, 'logger helper is inited. version: '.getloggerversion());
	adddependency('logger', getloggerversion(), COMPONENT_HELPER, 'utils', '1.0.0.2', COMPONENT_HELPER);
	
}

?>