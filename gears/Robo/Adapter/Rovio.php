<?php
/**
 * Robo adapter for Rovio
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Robb
 * @version		$Id$
 */
class Robo_Adapter_Rovio extends Robo_Adapter_Abstract{
    /**
     * List of defined move command
     * 
     * @var array 
     */
    protected $move = array(
        'left' => '3',
        'right' => '4',
        'forward' => '1',
        'backward' => '2',
        'stop' => '0',
        'rotateLeft' => '5',
        'rotateRight' => '6',
        'action1' => '11',
        'action2' => '12',
        'action3' => '13',
    );
    /**
     * Control hanlder uri
     *
     * @var string
     */
    protected $control_uri = 'rev.cgi';
    
    /**
     * Send command to robot
     * 
     * @param type $command 
     * @return  mixed 
     */
    public function command($command,$speed = NULL){
        $speed OR $speed = config('robo.adapter.speed','1');
        if(isset($this->move[$command])){
            return $this->sendCommand(18,$this->move[$command]);
        }
        else {
            switch($command){
                case 'goHome':
                    return $this->sendCommand(12);
                    break;
                case 'goHomeAndDock':
                    return $this->sendCommand(13);
                    break;
            }
        }
    }
    /**
     * Send command to robot
     * 
     * @param int $action
     * @param int $drive
     * @param int $speed
     * @param string $cmd 
     */
    public function sendCommand($action,$drive=NULL,$speed = NULL,$cmd = 'nav'){
        $query['Cmd'] = $cmd;
        $query['action'] = $action;
        $drive && $query['drive'] = $drive;
        ($speed OR $speed = config('robo.adapter.speed','1')) && $query['speed'] = $speed;
        $url =  parse_url($this->ip);   
        $host = 'http://'.$url['host'].'/'.$this->control_uri;
        $options = array();
        isset($url['port']) && $options['port'] = $url['port'];
        $curl = new Curl($options);
        return $curl->post($host,$query);
    }
    /**
     * Get video stream from robot
     */
    public function getVideoStream(){
        return HTML::img('http://' .$this->ip.'/GetData.cgi','',array('width'=>480));
    }
    /**
     * Render robo interface
     */
    public function render(){
        $tpl = new Template('Robo.interface');
        $tpl->video = $this->getVideoStream();
        return $tpl->render();
    }
}