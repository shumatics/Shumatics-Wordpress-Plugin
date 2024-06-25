<?php
class DB
{

    public $version = '1.0';
    public static $tableName = '';


    /**
     * 'type' => '',
'null' => '',
'default' => '',
'autoincrement' => false,
'index' => '',
     */

    // public $allowedFields = [
    // 'type',
    // 'null',
    // 'default',
    // 'autoincrement',
    // 'index',
    // ];

    public $tableSchema = [];

    public function __construct()
    {
        $this->setup();
    }

    public function setup()
    {
        $sql = $this->generateCreateTableSQL();

        $vKey = $this->getTableVersionKey();

        $key = get_option($vKey, '0');

        if ($key !== $this->version) {

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);

            update_option($vKey, $this->version);
        }
    }


    public function generateCreateTableArgs()
    {
        $createTableSQL = [];

        foreach ($this->tableSchema as $k => $t) {

            $s = [];

            $s[] = "`" . $k . "` ";
            if (isset($t['type']) && $t['type'] != '') {
                $s[] = $t['type'];
            }

            if (isset($t['null']) && $t['null'] != '') {
                $s[] = $t['null'];
            }

            if (isset($t['default']) && $t['default'] != '') {
                $s[] = "DEFAULT " . $t['default'];
            }

            if (isset($t['autoincrement']) && $t['autoincrement']) {
                $s[] = "AUTO_INCREMENT";
            }

            if (isset($t['index']) && $t['index'] != '') {
                $s[] = $t['index'];
            }

            $createTableSQL[] = implode(' ', $s);
        }

        return $createTableSQL;
    }
    public function generateCreateTableSQL()
    {
        global $wpdb;

        $wpdb_collate = $wpdb->collate;

        $createTableSQL = $this->generateCreateTableArgs();

        $tName = static::getTableName();

        $sql = 'CREATE TABLE `' . $tName . "` ( \n" . implode(",\n ", $createTableSQL) . "\n ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;";

        return $sql;
    }

    public function getTableVersionKey()
    {
        return static::$tableName . '_version';
    }

    public static function getTableName()
    {
        global $wpdb;
        return $wpdb->prefix . static::$tableName;
    }

    public static function sqlMap($sqlA)
    {
        $sql = '';

        $sql .= "SELECT " . implode(' , ', $sqlA['select']) . " FROM " . $sqlA['from'] . ' ';

        if (isset($sqlA['join']) && is_array($sqlA['join']) && !empty($sqlA['join'])) {
            $sql .= implode(" ", $sqlA['join']);
        }

        if (isset($sqlA['where']) && is_array($sqlA['where']) && !empty($sqlA['where'])) {
            $sql .= ' WHERE ' . implode(" AND ", $sqlA['where']);
        }

        if (isset($sqlA['orderby']) && is_array($sqlA['orderby']) && !empty($sqlA['orderby'])) {
            $sql .= ' ORDER BY ' . implode(" , ", $sqlA['orderby']);
        }

        if (isset($sqlA['limit']) && intval($sqlA['limit'])) {
            $sql .= ' LIMIT ' . intval($sqlA['limit']);
        }

        if (isset($sqlA['offset']) && intval($sqlA['offset'])) {
            $sql .= ' OFFSET ' . intval($sqlA['offset']);
        }

        return $sql;
    }
}
