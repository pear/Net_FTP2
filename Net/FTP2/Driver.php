<?php
// +----------------------------------------------------------------------+
// | Net_FTP2 Version 1.0                                                 |
// +----------------------------------------------------------------------+
// | Copyright (c) 2001-2005 Tobias Schlitt                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 3.0 of the PHP license,       |
// | that is available at through the world-wide-web at                   |
// | http://www.php.net/license/3_0.txt.                                  |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Authors:       Tobias Schlitt <toby@php.net>                         |
// +----------------------------------------------------------------------+
//
// $Id$

/**
 * Base class for Net_FTP2_Driver_* classes. 
 * This class implements common features for Net_FTP2_Driver_* classes,
 * as well as abstract methods, which have to be implemented by the
 * specific driver.
 *  
 * @since 0.1
 * @package Net_FTP2
 * @author    Tobias Schlitt <toby@php.net>
 * @see       http://www.schlitt.info
 * @license   http://www.php.net/license/3_0.txt  PHP License 3.0
 */
class Net_FTP2_Driver  {

    /**
     * Connection settings 
     * This settings are determined through the URI delivered to
     * the constructor.
     *
     * @var array
     * @since 0.1
     */
    var $_connectionSettings = array(
        'protocol'  => 'ftp',
        'username'  => '',
        'password'  => '',
        'host'      => '',
        'port'      => 21,
        'dir'       => '/',
    );

    /**
     * Options 
     * An array of options for the FTP connection.
     *
     * @var array
     * @since 0.1
     */
    var $_options = array(
        'timeout'   => 30,
        'mode'      => 'active',
    );

    /**
     * Constructor 
     * This is the base constructor for Net_FTP2_Driver_* classes.
     * It provides base functionalities for creating a new driver
     * object, like parsing the URI. Forethat, this constructor 
     * should be called even if overwritten.
     *  
     * @since 0.1
     * @access public
     * @param string $uri       A URI to describe the the FTP connection in the format
     *                          <protocol>://[<username>][:<password>][@]<host>[:<port>][/<directory]
     * @param array  $options   An array of further options for the FTP connection.
     * @return void
     */
    function Net_FTP2_Driver($uri, $options)
    {
       

    }
    
    /**
     * Parse an FTP URI into it's parts' 
     *  
     * @since
     * @access priotected
     * @param string $uri The URI to parse
     * @return array The parsed URI
     */
    private function _parseURI($uri)
    {


    }

    /**
     *  
     *  
     *  
     * @since  
     * @access private
     * @param  
     * @return void
     */
    private function _ ()
    {


    }
}



?>
