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

// {{{ Error constants

/**
 * Error code for a not implemented, abstract method.
 */
define('NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE', -1);
define('NET_FTP2_ERROR_METHODENOTIMPLEMENTED_TEXT', 'This method is not implemented, yet.');

// }}}


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


    // }}}
    // {{{ $_connectionSettings

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


    // }}}
    // {{{ $_options

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

    // }}}
    // {{{ Net_FTP2_Driver()

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

    // }}}
    
    ////////////////////////////////////////////////////////////////
    // ABSTRACT METHODS, TO BE IMPLEMENTED BY THE DRIVER CLASSES! //
    ////////////////////////////////////////////////////////////////

    // {{{ checkDependencies()

    /**
     * Check if drivers dependencies are fulfilled.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     *  
     * @since 0.1
     * @access public
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @param  
     * @return bool True if dependencies are fulfilled, otherwise false.
     */
    function checkDependencies($optional = false)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}

    ////////////////////////////////////////////////////////////////
    // ABSTRACT METHODS DEFINED BY extFTP.                        //
    ////////////////////////////////////////////////////////////////

    // {{{ ftp_alloc()

    /**
     * Sends an ALLO command to the remote FTP server to allocate filesize  bytes of space. Returns TRUE on success, or FALSE on failure.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @access public
     * @param int $filesize
     * @param string $result
     * @return boolean True on success, otherwise false.
     */
    function ftp_alloc($filesize, $result = '')
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}
    // {{{ ftp_cdup()
    
    /**
     * Changes to the parent directory
     * This is one of the functions provided by extFTP, which must not be implemented by a driver since it's emulated through ftp_chdir('..').
     *  
     * @since 0.1
     * @access public
     * @param  
     * @return bool
     */
    function ftp_cdup()
    {
        return $this->ftp_chdir('..');
    }
    
    // }}}
    // {{{ ftp_chdir()
    
    /**
     * Changes directories on a FTP server
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @access public
     * @param string $directory
     * @return boolean True on success, otherwise false.
     */
    function ftp_chdir($directory)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}
    // {{{ ftp_chmod()

    /**
     * Set permissions on a file via FTP
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @access public
     * @param int $mode
     * @param string $filename
     * @return boolean True on success, otherwise false.
     */
    function ftp_chmod($mode, $filename)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }
    
    // }}}
    // {{{ ftp_close()
    
    /**
     * Closes an FTP connection
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @access public
     * @return boolean True on success, otherwise false.
     */
    function ftp_close()
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }
    
    // }}}
    // {{{ ftp_connect()
    
    /**
     * Opens an FTP connection
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @param string $host The host to connect to.
     * @param int $port The port to connect to.
     * @param int $timeout Timeout for the connection to be opened.
     * @access public
     * @return mixed The FTP resource on success, otherwise false.
     */
    function &ftp_connect($host, $port = 21, $timeout = 90)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }
   
    // }}}
    // {{{ ftp_delete()
   
    /**
     * Deletes a file on the FTP server
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @param string $path The path for the file to delete.
     * @access public
     * @return boolean True on success, otherwise false.
     */
    function ftp_delete($path)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }
    
    // }}}
    // {{{ ftp_exec()
    
    /**
     * Requests execution of a program on the FTP server
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @param string $command The command to execute.
     * @access public
     * @return boolean True on success, otherwise false.
     */
    function ftp_exec($command)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}
    // {{{ ftp_fget()

    /**
     * Downloads a file from the FTP server and saves to an open file.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @param resource $handle Local file handler to write to.
     * @param string $remote_file Path to the remote file to download.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the download (@since PHP 4.3.0).
     * @access public
     * @return boolean True on success, otherwise false.
     */
    function ftp_fget($handle, $remote_file, $mode, $resumepos = null)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }
    
    // }}}
    // {{{ ftp_fput()
    
    /**
     * Uploads from an open file to the FTP server.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @param string $remote_file Path to the remote file to upload to.
     * @param resource $handle Local file handler to upload.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the upload (@since PHP 4.3.0).
     * @access public
     * @return boolean True on success, otherwise false.
     */
    function ftp_fput($remote_file, $handle, $mode, $startpos = null)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }
    
    // }}}
    // {{{ ftp_get()
    
    /**
     * Downloads a file from the FTP server
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @param string $local Local file path to write to.
     * @param string $remote_file Path to the remote file to download.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the download (@since PHP 4.3.0).
     * @access public
     * @return boolean True on success, otherwise false.
     */
    function ftp_get($local_file, $remote_file, $mode, $resumepos = null)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }
    
    // }}}
    // {{{ ftp_fput()
    
    /**
     * Uploads a file to the FTP server
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @param string $remote_file Path to the remote file to upload to.
     * @param string $local_file Local file to upload.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the upload (@since PHP 4.3.0).
     * @access public
     * @return boolean True on success, otherwise false.
     */
    function ftp_put($remote_file, $handle, $mode, $startpos = null)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}
    // {{{ ftp_login()

    /**
     * Logs in to an FTP connection
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @param string $username The username.
     * @param string $password The password.
     * @access public
     * @return boolean True on success, otherwise false.
     */
    function ftp_login($username, $password)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}
    // {{{ ftp_mdtm()

    /**
     * Returns the last modified time of the given file
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @param string $remote_file Path to the remote file.
     * @access public
     * @return int Timestamp on success, otherwise -1.
     */
    function ftp_mdtm($remote_file)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }
    
    // }}}
    // {{{ ftp_mkdir()
    
    /**
     * Creates a directory
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @param string $directory Path for the directory to create.
     * @access public
     * @return mixed Name of the new directory on success, otherwise false.
     */
    function ftp_mkdir($directory)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}
    // {{{ ftp_nb_continue()

    /**
     * Continues retrieving/sending a file (non-blocking)
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @access public
     * @return int Returns FTP_FAILED or FTP_FINISHED  or FTP_MOREDATA.
     */
    function ftp_nb_continue()
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}
    // {{{ ftp_nb_fget()

    /**
     * Retrieves a file from the FTP server and writes it to an open file (non-blocking).
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @access public
     * @param resource $handle Local file handler to write to.
     * @param string $remote_file Path to the remote file to download.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the download (@since PHP 4.3.0).
     * @access public
     * @return boolean True on success, otherwise false.
     */
    function ftp_nb_fget($handle, $remote_file, $mode, $resumepos = null)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}
    // {{{ ftp_nb_put()

    /**
     * Retrieves a file from the FTP server and writes it to an open file (non-blocking)
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @param string $remote_file Path to the remote file to upload to.
     * @param string $local_file Local file to upload.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the upload (@since PHP 4.3.0).
     * @access public
     * @return boolean True on success, otherwise false.
     */
    function ftp_nb_fput($remote_file, $handle, $mode, $startpos = null)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}
    // {{{ ftp_nb_get()

    /**
     * 
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @param string $local_file Local file path to write to.
     * @param string $remote_file Path to the remote file to download.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the download (@since PHP 4.3.0).
     * @access public
     * @return boolean True on success, otherwise false.
     */
    function ftp_nb_get($local_file, $remote_file, $mode, $resumepos = null)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }
    
    // }}}
    // {{{ ftp_nb_put()
    
    /**
     * Stores a file on the FTP server (non-blocking).
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @param string $remote_file Path to the remote file to upload to.
     * @param resource $local_file Local file to upload.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the upload (@since PHP 4.3.0).
     * @access public
     * @return boolean True on success, otherwise false.
     */
    function ftp_nb_put($remote_file, $local_file, $mode, $startpos = null)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}
    // {{{ ftp_nlist()

    /**
     * Stores a file on the FTP server (non-blocking).
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @param string $directory The directory to list files from.
     * @access public
     * @return mixed Array of filenames on success, otherwise false.
     */
    function ftp_nlist ($directory)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}
    // {{{ ftp_pasv()

    /**
     * Turns passive mode on or off.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @param bool $pasv True to turn on pasv mode, false to turn off.
     * @access public
     * @return bool True on success, otherwise false.
     */
    function ftp_pasv ($pasv)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}
    // {{{ ftp_pwd()

    /**
     * Returns the current directory name.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @access public
     * @return mixed String the current directory or false on error.
     */
    function ftp_pwd()
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }
    
    // }}}
    // {{{ ftp_quit()
    
    /**
     * Closes an FTP connection (alias to ftp_close).
     * This is one of the functions provided by extFTP, which must not be implemented by a driver since it's an alias to ftp_close('..').
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @access public
     * @return bool True on success, otherwise false.
     */
    function ftp_quit()
    {
        return $this->ftp_close();
    }

    // }}}
    // {{{ ftp_rawlist()

    /**
     * Returns a detailed list of files in the given directory.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @access public
     * @param string $directory The directory to list files from.
     * @return mixed Array of file data on success, otherwise false.
     */
    function ftp_rawlist($directory)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }
   
    // }}}
    // {{{ ftp_rename()
   
    /**
     * Renames a file on the FTP server.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @access public
     * @param string $from The file to rename.
     * @param string $to The new name for the file.
     * @return bool True on success, otherwise false.
     */
    function ftp_rename($from, $to)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}
    // {{{ ftp_rmdir()

    /**
     * Removes a directory.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @access public
     * @param string $directory The directory to remove.
     * @return bool True on success, otherwise false.
     */
    function ftp_rmdir($directory)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }
    
    // }}}
    // {{{ ftp_site()
    
    /**
     * Sends a SITE command to the server.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @access public
     * @param string $cmd The command to send.
     * @return bool True on success, otherwise false.
     */
    function ftp_site($cmd)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }
    
    // }}}
    // {{{ ftp_size()
    
    /**
     * Returns the size of the given file.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @access public
     * @param string $remote_file File to determine the size of.
     * @return int Size of the file in byte, -1 on error.
     */
    function ftp_size($remote_file)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}
    // {{{ ftp_ssl_connect()

    /**
     * Opens an Secure SSL-FTP connection. 
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @access public
     * @param string $host The host to connect to.
     * @param int $port The port to connect to.
     * @param int $timeout Timeout for the connection to be opened.
     * @return mixed The FTP resource, false on error.
     */
    function &ftp_ssl_connect($host, $port = 21, $timeout = 90)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }
    
    // }}}
    // {{{ ftp_systype()
    
    /**
     * Returns the system type identifier of the remote FTP server.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @abstract
	 * @throws PEAR_Error(NET_FTP2_ERROR_METHODNOTIMPLEMENTED_CODE) 
     * @since 0.1
     * @access public
     * @return mixed String, the remote system type, or false on error.
     */
    function ftp_systype($host, $port = 21, $timeout = 90)
    {
        return PEAR::raiseError(NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE, NET_FTP2_ERROR_METHODENOTIMPLEMENTED_CODE);
    }

    // }}}
}



?>
