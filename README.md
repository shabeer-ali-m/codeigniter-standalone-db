# Codeigniter Standlone Database

Use Codeigniter database in your project. 

# Codeigniter Documentation

[Documentation](https://www.codeigniter.com/userguide3/database/index.html)

### Installation

```sh
{
    "require": {
        "codeigniter-db/codeigniter-standalone-db": "0.*"
    }
}
```

### Basic Usage

```php
// Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/autoload.php';

use CodeigniterDatabase\CodeigniterDatabase as CodeigniterDatabase;

//Database configuration
$db_data = array(
	'dsn'	=> '',
	'hostname' => '127.0.0.1',
	'username' => 'root',
	'password' => '',
	'database' => 'test',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => TRUE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

$obj = new CodeigniterDatabase($db_data);

//Regular Queries
$res = $obj->db->query('select * from products')->result_array();

print_r($res);
```

License
----

MIT