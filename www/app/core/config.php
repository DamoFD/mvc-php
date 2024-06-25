<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    /** database config **/
    define('DB_NAME', 'my_db');
    define('DB_SERVER', 'db');
    define('DB_USER', 'root');
    define('DB_PASS', 'password');
    define('DB_DRIVER', '');

    define('ROOT', 'http://localhost/public');
} else {
    /** database config **/
    define('DB_NAME', 'my_db');
    define('DB_SERVER', 'db');
    define('DB_USER', 'root');
    define('DB_PASS', 'password');
    define('DB_DRIVER', '');

    define('ROOT', 'https://www.yourwebsite.com');
}
