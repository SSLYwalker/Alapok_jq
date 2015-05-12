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

conddefine('COMPONENT_HELPER', 0);	
conddefine('COMPONENT_LIBRARY', 1);

conddefine('LOGGER_SYSTEM', -1);	
conddefine('LOGGER_DISABLED', 0);
conddefine('LOGGER_ERROR', 1);
conddefine('LOGGER_WARNING', 2);
conddefine('LOGGER_INFO', 3);
conddefine('LOGGER_DEBUG', 4);
 
 ?>