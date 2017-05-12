<?php 

namespace PMMigration\Core;

class DB extends \PDO {

    public $tables = [];
    public $exTables = [];
    
    /**
     * Constructor
    */
    public function __construct($config)
    {
        $connect = $config['driver'] . ':host=' . $config['host']
            . ';dbname=' . $config['dbname'];
       
        try {
            parent::__construct($connect, $config['user'], $config['password']);
        } catch (PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }
        
        $this->getExTables();
    }
    
    public function add(Table $table, $nowCreate = true)
    {
        if (in_array($table->name, array_keys($this->tables))
                || in_array($table->name, $this->exTables)) {
            return false;
        } elseif ($nowCreate) {
            $this->create($table);
            return true;
        } else {
            $this->tables[$table->name] = $table;
        }
    }
    
    public function getExTables()
    {
        $tables = $this->query('show tables');
        
        while ($row = $tables->fetch()) {
            $this->exTables[] = $row[0];
        }  
    }
    
    /**
     * 
     * @param type $table
     */
    public function create($table)
    {
        $this->query($table->getQuery());
    }
    
    public function seenFields($table = false)
    {
        $output = [];
        foreach ($this->tables as $name => $table) {
            $output[$name] = $table->getFields();
        }
        
        return $output;
    }
}