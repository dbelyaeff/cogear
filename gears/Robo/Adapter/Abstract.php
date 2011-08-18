<?php

/**
 * Robo adapter abstract class
 *
 * @author		Dmitriy Belyaev <admin@cogear.ru>
 * @copyright		Copyright (c) 2011, Dmitriy Belyaev
 * @license		http://cogear.ru/license.html
 * @link		http://cogear.ru
 * @package		Core
 * @subpackage          Robb
 * @version		$Id$
 */
abstract class Robo_Adapter_Abstract {

    /**
     * Robo IP adress
     * 
     * @var string 
     */
    protected $ip;
    /**
     * List of defined move command
     * 
     * @var array 
     */
    protected $move = array(
        'left' => '',
        'right' => '',
        'forward' => '',
        'backward' => '',
        'stop' => '',
        'rotateLeft' => '',
        'rotateRight' => '',
        'action1' => '',
        'action2' => '',
        'action3' => '',
    );
    /**
     * Control hanlder uri
     *
     * @var string
     */
    protected $control_uri = '';

    /**
     * Send command to robot
     * 
     * @param type $command 
     */
    abstract public function command($command);

    /**
     * Get video stream from robot
     */
    abstract public function getVideoStream();

    /**
     * Set toobt IP-adress
     * 
     * @param string $ip 
     */
    public function setIP($ip) {
        $this->ip = $ip;
    }

    /**
     * Render robo interface
     */
    public function render() {
        $tpl = new Template('Robo.interface');
        /**
         * Some action is about to happen there
         */
        return $tpl->render();
    }

}