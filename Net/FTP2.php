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

require_once 'PEAR.php';

/**
 * Net_FTP2 base class. 
 * This class may not be instanciated directly. Use the factory method
 * Net_FTP2::connect() instead.
 *  
 * @since 0.1
 * @package Net_FTP2
 * @author    Tobias Schlitt <toby@php.net>
 * @see       http://www.schlitt.info
 * @license   http://www.php.net/license/3_0.txt  PHP License 3.0
 */
class Net_FTP2 {

    /**
     * Factory method to create a new Net_FTP2 connection. 
     * This factory method returns a Net_FTP2 driver which will be
     * used for all further actions.
     *  
     * @since 0.1
     * @access public
     * @param string $driver    Name of the driver to use for connection.
     * @param string $uri       A URI to describe the the FTP connection in the format
     *                          <protocol>://[<username>][:<password>][@]<host>[:<port>][/<directory]
     * @param array  $options   An array of further options for the FTP connection.
     * @static
     * @return object(Net_FTP_Driver_*) The Net_FTP2 driver.
     */
    function connect($driver, $uri, $options = array())
    {
        

    }
}

?>
