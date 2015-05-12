<?php

if (!defined('easyframework_inited')) 
	exit('No direct script access allowed');

/**
 *  @file utils.php
 *  @brief Utils helper 
 *  @author Vajay Attila
 *  @email vajay.attila@gmail.com
 *  @date 2014-07-29
 *  @copyright MIT License (MIT)
 */

/**
 *  @brief Conditional define
 *  
 *  @param [in] $name name of define 
 *  @param [in] $value value of define
 */    
if ( ! function_exists('conddefine')){
	function conddefine($name, $value)
	{
		if(defined($name)===FALSE)
		{
			define($name, $value);
		}
	}
}

/**
 *  @brief Get component type name
 *  
 *  @param [in] $componenttype 
 *  @retval Component type's name string
 */    
if ( ! function_exists('getcomponenttypename')){
	function getcomponenttypename($componenttype){
		$retval='';
		switch($componenttype)
		{
			case COMPONENT_HELPER:
				$retval="HELPER";
				break;
			case COMPONENT_LIBRARY:
				$retval="LIBRARY";
				break;
			default:
				$retval="UNKNOWN";
		}
		return $retval; 
	}
}


 
/**
 *  @brief Add new module dependency
 *  
 *  @param [in] $dependentmodule name of dependent module
 *  @param [in] $dependentversion version of dependent module
 *  @param [in] $dependenttype type of dependent module
 *  @param [in] $dependencemodule name of dependence module
 *  @param [in] $dependenceversion version of dependence module
 *  @param [in] $dependencetype type of dependence module
 */    
if ( ! function_exists('adddependency')){
	function adddependency(
		$dependentmodule, $dependentversion, $dependenttype,
		$dependencemodule, $dependenceversion, $dependencetype){		
		global $g_dependency_list;
		$newdependency=array(
			'dependent'=>array(
				'name' => $dependentmodule,
				'version' => $dependentversion,
				'type' => $dependenttype,
			),
			'dependence'=>array(
				'name' => $dependencemodule,
				'version' => $dependenceversion,
				'type' => $dependencetype,
			)	
		);
		$g_dependency_list[]=$newdependency;
		log_message(LOGGER_SYSTEM, 
			'new dependency. the '.$dependentmodule.'('.$dependentversion.') '.getcomponenttypename($dependenttype).
			' depend from '.$dependencemodule.'('.$dependenceversion.') '.getcomponenttypename($dependencetype)
		);				
	} 
}

require_once('helpers/constants.php');
require_once('helpers/logger.php');
 
if(!defined('utils_inited'))
 {
	global $g_dependency_list;
	define('utils_inited', true);

	/**
	 *  @brief Get logger version
	 *  
	 *  @retval logger version
	 */    
	if ( ! function_exists('getutilsversion'))
	{
		function getutilsversion()
		{
			return '1.0.0.2';
		}
	}	
	log_message(LOGGER_SYSTEM, 'utils helper is inited. version:'.getutilsversion());	
	adddependency('utils', getutilsversion(), COMPONENT_HELPER, 'logger', '1.0.0.2', COMPONENT_HELPER);
}

?>