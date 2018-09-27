<?php
// 数据库连接类

// USE数据库
class DB_COM extends Mysql {

    public $schema = 'hb_agent_service';
    protected $server = '120.78.76.82';
    protected $user = 'root';
    protected $password = 'vjEj31NP8x';
    protected $database = 'hb_agent_service';
    protected $character = 'utf8';

}
class DB_OW extends Mysql {

    public $schema = 'official_website';
    protected $server = '120.78.76.82';
    protected $user = 'root';
    protected $password = 'vjEj31NP8x';
    protected $database = 'official_website';
    protected $character = 'utf8mb4';

}