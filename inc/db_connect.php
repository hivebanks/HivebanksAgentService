<?php
// 数据库连接类

// USE数据库
class DB_COM extends Mysql {

    public $schema = 'hb_agent_service';
    protected $server = '18.219.136.69';
    protected $user = 'windwin';
    protected $password = '0505Windwin';
    protected $database = 'hb_agent_service';
    protected $character = 'utf8mb4';

}
class DB_OW extends Mysql {

    public $schema = 'official_website';
    protected $server = '18.219.136.69';
    protected $user = 'windwin';
    protected $password = '0505Windwin';
    protected $database = 'official_website';
    protected $character = 'utf8mb4';

}