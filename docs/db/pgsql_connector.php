<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pgsql_connector
 *
 * @author ozep
 */
class pgsql_connector {
    private $connected;
    private $db_settings;
    private $conn;
    
    public function __construct($db_settings_param) {
        $this->db_settings = $db_settings_param;
    }
    
    public function getConnectionStatus(){
        return $this->connected;
    }
    
    public function connect(){
        $conn_str = 'host=' . $this->db_settings['host'] . ' ' . 
                    'port=' . $this->db_settings['port'] . ' ' . 
                    'dbname=' . $this->db_settings['database'] . ' ' . 
                    'user=' . $this->db_settings['username'] . ' ' .
                    'password=' . $this->db_settings['password']. ' ' .
                    'options=\'--client_encoding=UTF8\'';
            log_message(4, $conn_str);
        $this->conn = pg_connect($conn_str);
        
        // Check connection
        if ($this->conn === false) {
            $this->connected = 'pgsql nem csatlakozott fv';
            //log_message(LOGGER_DEBUG, $this->conn->connect_error);
            //die("Connection failed: " . $this->conn->connect_error);
        } else {
            $this->connected = 'pgsql csatlakozott fv';
        }
    }
}
