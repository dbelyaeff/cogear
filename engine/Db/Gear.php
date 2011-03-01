<?php
/**
 * Database
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage
 * @version		$Id$
 */
class Db_Gear extends Gear {
    protected $name = 'Database';
    protected $description = 'Database operations management';
    protected $order = -100;
    protected $driver;
    public static $error_codes = array(
        100 => 'Driver not found',
        101 => 'Couldn\'t connect to the database',
    );
    /**
     * Init
     */
    public function init(){
        $cogear = getInstance();
        parent::init();
        if($dsn = $cogear->get('database.dsn')){
            $config = parse_url($dsn);
            if(isset($config['query'])){
                parse_str($config['query'],$query);
                $config += $query;
            }
            if(!isset($config['host'])) $config['host']= 'localhost';
            if(!isset($config['user'])) $config['user'] = 'root';
            if(!isset($config['password'])) $config['password'] = '';
            if(!isset($config['prefox'])) $config['prefox'] = $cogear->get('database.default_prefix','cogear_');
            $config['database'] = trim($config['path'],'/');
            $driver = 'Db_Driver_'.  ucfirst($config['scheme']);
            if(!class_exists($driver)){
                return Message::error(t('Database driver <b>%s</b> not found.','Database errors',ucfirst($config['scheme'])));
            }
            $this->driver = new $driver($config);
            $cogear->hook('done',array($this,'showErrors'));
            $cogear->hook('done',array($this,'trace'));
        }
    }

    /**
     * Show errors
     */
    public function showErrors(){
        $errors = $this->driver->getErrors();
        if(DEVELOPMENT && $errors){
            error(implode('<br/>',$errors),t('Database error','Database'));
        }
    }
    /**
     * Output all queries
     */
    public function trace(){
        $tpl = new Template('Db.debug');
        $tpl->queries = $this->driver->getBenchmark();
        append('footer',$tpl->render());
    }
    /**
     * Magic __call method — calls back to database driver
     *
     * @param string $name
     * @param array $args
     * @return  mixed
     */
    public function __call($name,$args){
        return method_exists($this->driver,$name) ? call_user_func_array(array($this->driver,$name),$args) : FALSE;
    }
}
