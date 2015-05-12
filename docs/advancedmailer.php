<?php
define('easyframework_inited', true);

require_once '/helpers/logger.php';
require_once '/docs/db/db_config.php';
setloglevel(LOGGER_DEBUG);
/**
 * Description of advancedmailer
 *
 * @author ozep
 */
class advancedmailer {
    private $db_config_obj;
    private $db_connector;

    public function __construct()
    {
        $this->db_config_obj = new db_config();
        $settings = $this->db_config_obj->getDbSettings();
        switch ($settings['type']) {
            case 'mysql':
                require_once '/docs/db/mysql_connector.php';
                $this->db_connector = new mysql_connector($settings);
                $this->db_connector->connect();
                log_message(4, $this->db_connector->getConnectionStatus());
            break;

            case 'pgsql':
                require_once '/db/pgsql_connector.php';
                $this->db_connector = new pgsql_connector($settings);
                $this->db_connector->connect();
                log_message(4, $this->db_connector->getConnectionStatus());                
            break;
        }

    }
}
