<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => array_key_exists('DB_CONNECTION', $_SERVER) ? $_SERVER['DB_CONNECTION'] : env('DB_CONNECTION', "mysql"),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'nginx' => [
            'driver' => 'nginx',
            'url' => array_key_exists('DATABASE_URL', $_SERVER) ? $_SERVER['DATABASE_URL'] : env('DATABASE_URL'),
            'host' => array_key_exists('DB_HOST', $_SERVER) ? $_SERVER['DB_HOST'] : env('DB_HOST', "127.0.0.1"),
            'port' => array_key_exists('DB_PORT', $_SERVER) ? $_SERVER['DB_PORT'] : env('DB_PORT', "3306"),
            'database' => array_key_exists('DB_DATABASE', $_SERVER) ? $_SERVER['DB_DATABASE'] : env('DB_DATABASE', "forge"),
            'username' => array_key_exists('DB_USERNAME', $_SERVER) ? $_SERVER['DB_USERNAME'] : env('DB_USERNAME', "admin"),
            'password' => array_key_exists('DB_PASSWORD', $_SERVER) ? $_SERVER['DB_PASSWORD'] : env('DB_PASSWORD', "password"),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => false,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

//        'default' => [
//            'url' =>array_key_exists('REDIS_URL', $_SERVER) ? $_SERVER['REDIS_URL'] :env('REDIS_URL'),
//            'host' =>array_key_exists('REDIS_HOST', $_SERVER) ? $_SERVER['REDIS_HOST'] :env('REDIS_HOST','127.0.0.1'),
//            'password' =>array_key_exists('REDIS_PASSWORD', $_SERVER) ? $_SERVER['REDIS_PASSWORD'] :env('REDIS_PASSWORD'),
//            'port' =>array_key_exists('REDIS_PORT', $_SERVER) ? $_SERVER['REDIS_PORT'] :env('REDIS_PORT'),
//            'database' =>array_key_exists('REDIS_DB', $_SERVER) ? $_SERVER['REDIS_DB'] :env('REDIS_DB'),
//        ],
//
//        'cache' => [
//            'url' =>array_key_exists('REDIS_URL', $_SERVER) ? $_SERVER['REDIS_URL'] :env('REDIS_URL'),
//            'host' =>array_key_exists('REDIS_HOST', $_SERVER) ? $_SERVER['REDIS_HOST'] :env('REDIS_HOST','127.0.0.1'),
//            'password' =>array_key_exists('REDIS_PASSWORD', $_SERVER) ? $_SERVER['REDIS_PASSWORD'] :env('REDIS_PASSWORD'),
//            'port' =>array_key_exists('REDIS_PORT', $_SERVER) ? $_SERVER['REDIS_PORT'] :env('REDIS_PORT'),
//            'database' =>array_key_exists('REDIS_DB', $_SERVER) ? $_SERVER['REDIS_DB'] :env('REDIS_DB'),
//        ],

    ],

];
