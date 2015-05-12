<?php
/**
 * db_config az adatbázis használati adatokat adja vissza
 *
 * @author ozep
 */
class db_config {
    private $settings;
    
    public function __construct() {
        $this->settings['type'] = 'pgsql';
        $this->settings['host'] = '192.168.100.211';
        $this->settings['username'] = 'ozep';
        $this->settings['password'] = '895f529c';
        $this->settings['database'] = 'uj_database';
        $this->settings['port'] = '5432'; //mysql 3306, pgsql 5432
    }
    
    public function getDbSettings(){
        return $this->settings;
    }
}

