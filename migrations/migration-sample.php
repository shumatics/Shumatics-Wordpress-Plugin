<?php

class SampleMigration extends DB
{

    public static $tableName = 'sample';
    public $version = '1.0';

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * CREATE TABLE `Notifications` (
        `id` bigint(20) NOT NULL,
        `notification` text NOT NULL,
        `time` timestamp NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
     */
    public $tableSchema = [
        'id' => [
            'type' => 'bigint(20)',
            'null' => 'NOT NULL',
            'default' => '',
            'autoincrement' => true,
            'index' => 'PRIMARY KEY',
        ],
        'notification' => [
            'type' => 'text',
            'null' => 'NOT NULL',
            'default' => '',
            'autoincrement' => false,
            'index' => '',
        ],
        'time' => [
            'type' => 'timestamp',
            'null' => 'NOT NULL',
            'default' => '',
            'autoincrement' => false,
            'index' => '',
        ],
    ];
}

new SampleMigration;
