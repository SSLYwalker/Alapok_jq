<?php

/**
 * Description of mysql_connector
 *
 * @author ozep
 */
class mysql_connector {
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
        $this->conn = new mysqli($this->db_settings['host'], 
                                 $this->db_settings['username'], 
                                 $this->db_settings['password'], 
                                 $this->db_settings['database'], 
                                 $this->db_settings['port']);
        
        // Check connection
        if ($this->conn->connect_error) {
            $this->connected = 'mysql nem csatlakozott fv';
            log_message(LOGGER_DEBUG, $this->conn->connect_error);
            //die("Connection failed: " . $this->conn->connect_error);
        } else {
            $this->connected = 'mysql csatlakozott fv';
        }
    }
}
