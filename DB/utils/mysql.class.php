<?php 
/**
 * Database wrapper for a MySQL with PHP tutorial
 * 
 * @copyright Eran Galperin
 * @license MIT License
 * @see http://www.binpress.com/tutorial/using-php-with-mysql-the-right-way/17
 */
class mysql {
    // The database connection
    protected static $connection;

    public static function connect() {
       $conn = new mysqli(config::DB_SERVER, config::DB_USERNAME, config::DB_PASSWORD, config::DB_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
       }
       return $conn;
    }
	
    public static function query($query) {
        $connection = mysql::connect();
        $result = $connection->query($query);	
        return $result;
    }
	
    /**
     * Fetch rows from the database (SELECT query)
     *
     * @param $query The query string
     * @return bool False on failure / array Database rows on success
     */
    public static function select($query) {
        $rows = array();
        $result = mysql::query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * Fetch the last error from the database
     * 
     * @return string Database error message
     */
    public static function error() {
        $connection = mysq::connect();
        return $connection->error;
    }

    /**
     * Quote and escape value for use in a database query
     *
     * @param string $value The value to be quoted and escaped
     * @return string The quoted and escaped string
     */
    public static function quote($value) {
        $connection = mysql::connect();
        return "'" . $connection->real_escape_string($value) . "'";
    }
	
	/**
	 * Return id of last inserted row
	 * @return type
	 */
	public static function getLastInsertedId() {
		$connection = mysql::connect();
		return $connection->insert_id;
	}
	
	/**
	 * Escape variable for security
	 * @param type $field
	 * @return type
	 */
	public static function escape($field) {
		$connection =  mysql::connect();
		return mysqli_real_escape_string($connection, $field);
	}
	
}