<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Net_FTP2.
 *
 * This is the main file of the Net_FTP2 package. This file has to be
 * included for usage of Net_FTP2.
 *
 * PHP versions 4 and 5
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Networking
 * @package    FTP2
 * @author     Tobias Schlitt <toby@php.net>
 * @copyright  1997-2005 The PHP Group
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    CVS: $Id$
 * @link       http://pear.php.net/package/Net_FTP2
 * @since      File available since Release 0.0.1
 */

require_once 'PEAR.php';

/**
 * Net_FTP2 base class. 
 * This class may not be instanciated directly. Use the factory method
 * Net_FTP2::connect() instead.
 *
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @category   Networking
 * @package    FTP
 * @author     Tobias Schlitt <toby@php.net>
 * @copyright  1997-2005 The PHP Group
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/Net_FTP
 * @since      0.0.1
 * @access     public
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
