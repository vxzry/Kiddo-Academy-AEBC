
 <?php
// Connection variables 
$DB_SERVER = "127.0.0.1"; // MySQL host name eg. localhost
$DB_USERNAME = "root"; // MySQL user. eg. root ( if your on localserver)
$DB_PASSWORD = ""; // MySQL user password  (if password is not set for your root user then keep it empty )
$DB_DATABASE = "dbkadc"; // MySQL Database name
 
// Connect to MySQL Database
$db = new mysqli($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
 
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
 
?>