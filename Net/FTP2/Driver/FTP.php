<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Net_FTP2_Driver_FTP.
 *
 * This file holds the driver implementation for Net_FTP2, using the
 * ext/FTP functions of PHP.
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

require_once 'Net/FTP2/Driver.php'

/**
 * Net_FTP2 driver class for use of extFTP.
 * This class wraps the extFTP functions into a class for use with Net_FTP2.
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
class Net_FTP2_Driver_FTP extends Net_FTP2_Driver  {

    // {{{ $_resource 

    /**
     * The FTP resource.
     *  
     * @var resource
     * @access private
     * @since 0.1
     */
    var $_resource;

    // }}}
    // {{{ Net_FTP2_Driver_FTP()

    /**
     * Constructor 
     * This is the constructor for Net_FTP2_Driver_FTP.
     *  
     * @since 0.1
     * @access public
     * @param string $uri       A URI to describe the the FTP connection in the format
     *                          <protocol>://[<username>][:<password>][@]<host>[:<port>][/<directory]
     * @param array  $options   An array of further options for the FTP connection.
     * @return @void
     */
    function Net_FTP2_Driver_FTP($uri, $options)
    {
       $this->Net_FTP_Driver($uri, $options);
    }

    // }}}
    // {{{ checkDependencies()

    /**
     * Check if drivers dependencies are fulfilled.
     *  
     * @since 0.1
     * @access public
     * @param  
     * @return bool True if dependencies are fulfilled, otherwise false.
     */
    function checkDependencies($optional = false)
    {
        return (extension_loaded('ftp') || dl('ftp'));
    }

    // }}}
    // {{{ ftp_alloc()

    /**
     * Sends an ALLO command to the remote FTP server to allocate filesize  bytes of space. Returns TRUE on success, or FALSE on failure.
     * 
     * @since 0.1
     * @access public
     * @param int $filesize
     * @param string $result
     * @return @boolean True on success, otherwise false.
     */
    function ftp_alloc($filesize, $result = '')
    {
        return @ftp_alloc($this->_resource, $filesize, $result);
    }

    // }}}
    // {{{ ftp_cdup()
    
    /**
     * Changes to the parent directory
     *  
     * @since 0.1
     * @access public
     * @param  
     * @return @bool
     */
    function ftp_cdup()
    {
        return @$this->ftp_chdir('..');
    }
    
    // }}}
    // {{{ ftp_chdir()
    
    /**
     * Changes directories on a FTP server
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @since 0.1
     * @access public
     * @param string $directory
     * @return @boolean True on success, otherwise false.
     */
    function ftp_chdir($directory)
    {
        return @ftp_chdir($this->_resource, $directory);
    }

    // }}}
    // {{{ ftp_chmod()

    /**
     * Set permissions on a file via FTP
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @since 0.1
     * @access public
     * @param int $mode
     * @param string $filename
     * @return @boolean True on success, otherwise false.
     */
    function ftp_chmod($mode, $filename)
    {
        return @ftp_chmod($this->_resource, $mode, $filename);
    }
    
    // }}}
    // {{{ ftp_close()
    
    /**
     * Closes an FTP connection
     * 
     * @since 0.1
     * @access public
     * @return @boolean True on success, otherwise false.
     */
    function ftp_close()
    {
        return @ftp_close($this->_resource);
    }
    
    // }}}
    // {{{ ftp_connect()
    
    /**
     * Opens an FTP connection
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     * @since 0.1
     * @param string $host The host to connect to.
     * @param int $port The port to connect to.
     * @param int $timeout Timeout for the connection to be opened.
     * @access public
     * @return @boolean True on success, otherwise false.
     */
    function &ftp_connect($host, $port = 21, $timeout = 90)
    {
        $this->_resource = ftp_connect($this->_resource, $host, $port, $timeout);
        return @$this->_resource;
    }
   
    // }}}
    // {{{ ftp_delete()
   
    /**
     * Deletes a file on the FTP server
     * 
     * @since 0.1
     * @param string $path The path for the file to delete.
     * @access public
     * @return @boolean True on success, otherwise false.
     */
    function ftp_delete($path)
    {
        return @ftp_delete($this->_resource, $path);
    }
    
    // }}}
    // {{{ ftp_exec()
    
    /**
     * Requests execution of a program on the FTP server
     * 
     * @since 0.1
     * @param string $command The command to execute.
     * @access public
     * @return @boolean True on success, otherwise false.
     */
    function ftp_exec($command)
    {
        return @ftp_exec($this->_resource, $command);
    }

    // }}}
    // {{{ ftp_fget()

    /**
     * Downloads a file from the FTP server and saves to an open file.
     * 
     * @since 0.1
     * @param resource $handle Local file handler to write to.
     * @param string $remote_file Path to the remote file to download.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the download (@since PHP 4.3.0).
     * @access public
     * @return @boolean True on success, otherwise false.
     */
    function ftp_fget($handle, $remote_file, $mode, $resumepos = null)
    {
        return @ftp_fget($this->_resource, $handle, $remote_file, $mode, @$resumepos);
    }
    
    // }}}
    // {{{ ftp_fput()
    
    /**
     * Uploads from an open file to the FTP server.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @param string $remote_file Path to the remote file to upload to.
     * @param resource $handle Local file handler to upload.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the upload (@since PHP 4.3.0).
     * @access public
     * @return @boolean True on success, otherwise false.
     */
    function ftp_fput($remote_file, $handle, $mode, $startpos = null)
    {
        return @ftp_fput($this->_resource, $remote_file, $handle, $mode, @$startpos);
    }
    
    // }}}
    // {{{ ftp_get()
    
    /**
     * Downloads a file from the FTP server
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @param string $local Local file path to write to.
     * @param string $remote_file Path to the remote file to download.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the download (@since PHP 4.3.0).
     * @access public
     * @return @boolean True on success, otherwise false.
     */
    function ftp_get($local_file, $remote_file, $mode, $resumepos = null)
    {
        return @ftp_get($this->_resource, $local_file, $remote_file, $mode, @$resumepos);
    }
    
    // }}}
    // {{{ ftp_fput()
    
    /**
     * Uploads a file to the FTP server
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @param string $remote_file Path to the remote file to upload to.
     * @param string $local_file Local file to upload.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the upload (@since PHP 4.3.0).
     * @access public
     * @return @boolean True on success, otherwise false.
     */
    function ftp_put($remote_file, $handle, $mode, $startpos = null)
    {
        return @ftp_put($this->_resource, $remote_file, $handle, $mode, @$startpos);
    }

    // }}}
    // {{{ ftp_login()

    /**
     * Logs in to an FTP connection
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @param string $username The username.
     * @param string $password The password.
     * @access public
     * @return @boolean True on success, otherwise false.
     */
    function ftp_login($username, $password)
    {
        return @ftp_login($this->_resource, $username, $password);
    }

    // }}}
    // {{{ ftp_mdtm()

    /**
     * Returns the last modified time of the given file
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @param string $remote_file Path to the remote file.
     * @access public
     * @return @int Timestamp on success, otherwise -1.
     */
    function ftp_mdtm($remote_file)
    {
        return @ftp_mdtm($this->_resource, $remote_file);
    }
    
    // }}}
    // {{{ ftp_mkdir()
    
    /**
     * Creates a directory
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @param string $directory Path for the directory to create.
     * @access public
     * @return @mixed Name of the new directory on success, otherwise false.
     */
    function ftp_mkdir($directory)
    {
        return @ ftp_mkdir($this->_resource, $directory);
    }

    // }}}
    // {{{ ftp_nb_continue()

    /**
     * Continues retrieving/sending a file (non-blocking)
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @access public
     * @return @int Returns FTP_FAILED or FTP_FINISHED  or FTP_MOREDATA.
     */
    function ftp_nb_continue()
    {
        return @ftp_nb_continue($this->_resource);
    }

    // }}}
    // {{{ ftp_nb_fget()

    /**
     * Retrieves a file from the FTP server and writes it to an open file (non-blocking).
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @access public
     * @param resource $handle Local file handler to write to.
     * @param string $remote_file Path to the remote file to download.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the download (@since PHP 4.3.0).
     * @access public
     * @return @boolean True on success, otherwise false.
     */
    function ftp_nb_fget($handle, $remote_file, $mode, $resumepos = null)
    {
        return @ftp_nb_fget($this->_resource, $handle, $remote_file, $mode, @$resumepos);
    }

    // }}}
    // {{{ ftp_nb_put()

    /**
     * Retrieves a file from the FTP server and writes it to an open file (non-blocking)
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @param string $remote_file Path to the remote file to upload to.
     * @param string $local_file Local file to upload.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the upload (@since PHP 4.3.0).
     * @access public
     * @return @boolean True on success, otherwise false.
     */
    function ftp_nb_fput($remote_file, $handle, $mode, $startpos = null)
    {
        return @ftp_nb_fput($this->_resource, $remote_file, $handle, $mode, @$startpos);
    }

    // }}}
    // {{{ ftp_nb_get()

    /**
     * 
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @param string $local_file Local file path to write to.
     * @param string $remote_file Path to the remote file to download.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the download (@since PHP 4.3.0).
     * @access public
     * @return @boolean True on success, otherwise false.
     */
    function ftp_nb_get($local_file, $remote_file, $mode, $resumepos = null)
    {
        return @ftp_nb_get($this->_resource, $local_file, $remote_file, $mode, @$resumepos);
    }
    
    // }}}
    // {{{ ftp_nb_put()
    
    /**
     * Stores a file on the FTP server (non-blocking).
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @param string $remote_file Path to the remote file to upload to.
     * @param resource $local_file Local file to upload.
     * @param int $mode Mode to download the file (FTP_ASCII or FTP_BINARY).
     * @param int $resumepos Position to resume the upload (@since PHP 4.3.0).
     * @access public
     * @return @boolean True on success, otherwise false.
     */
    function ftp_nb_put($remote_file, $local_file, $mode, $startpos = null)
    {
        return @ftp_nb_put($this->_resource, $remote_file, $local_file, $mode, @$startpos);
    }

    // }}}
    // {{{ ftp_nlist()

    /**
     * Stores a file on the FTP server (non-blocking).
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @param string $directory The directory to list files from.
     * @access public
     * @return @mixed Array of filenames on success, otherwise false.
     */
    function ftp_nlist ($directory)
    {
        return @ftp_nlist ($this->_resource, $directory);
    }

    // }}}
    // {{{ ftp_pasv()

    /**
     * Turns passive mode on or off.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @param bool $pasv True to turn on pasv mode, false to turn off.
     * @access public
     * @return @bool True on success, otherwise false.
     */
    function ftp_pasv($pasv)
    {
        return @ftp_pasv($this->_resource, $pasv);
    }

    // }}}
    // {{{ ftp_pwd()

    /**
     * Returns the current directory name.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @access public
     * @return @mixed String the current directory or false on error.
     */
    function ftp_pwd()
    {
        return @ftp_pwd($this->_resource);
    }
    
    // }}}
    // {{{ ftp_quit()
    
    /**
     * Closes an FTP connection (alias to ftp_close).
     * This is one of the functions provided by extFTP, which must not be implemented by a driver since it's an alias to ftp_close('..').
     * 
     *
	 *
     * @since 0.1
     * @access public
     * @return @bool True on success, otherwise false.
     */
    function ftp_quit()
    {
        return @$this->ftp_close();
    }

    // }}}
    // {{{ ftp_rawlist()

    /**
     * Returns a detailed list of files in the given directory.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @access public
     * @param string $directory The directory to list files from.
     * @return @mixed Array of file data on success, otherwise false.
     */
    function ftp_rawlist($directory)
    {
        return @ftp_rawlist($this->_resource, $directory);
    }
   
    // }}}
    // {{{ ftp_rename()
   
    /**
     * Renames a file on the FTP server.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @access public
     * @param string $from The file to rename.
     * @param string $to The new name for the file.
     * @return @bool True on success, otherwise false.
     */
    function ftp_rename($from, $to)
    {
        return @ftp_rename($this->_resource, $from, $to);
    }

    // }}}
    // {{{ ftp_rmdir()

    /**
     * Removes a directory.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @access public
     * @param string $directory The directory to remove.
     * @return @bool True on success, otherwise false.
     */
    function ftp_rmdir($directory)
    {
        return @ftp_rmdir($this->_resource, $directory);
    }
    
    // }}}
    // {{{ ftp_site()
    
    /**
     * Sends a SITE command to the server.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @access public
     * @param string $cmd The command to send.
     * @return @bool True on success, otherwise false.
     */
    function ftp_site($cmd)
    {
        return @ftp_site($this->_resource, $cmd);
    }
    
    // }}}
    // {{{ ftp_size()
    
    /**
     * Returns the size of the given file.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @access public
     * @param string $remote_file File to determine the size of.
     * @return @int Size of the file in byte, -1 on error.
     */
    function ftp_size($remote_file)
    {
        return @ftp_size($this->_resource, $remote_file);
    }

    // }}}
    // {{{ ftp_ssl_connect()

    /**
     * Opens an Secure SSL-FTP connection. 
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @access public
     * @param string $host The host to connect to.
     * @param int $port The port to connect to.
     * @param int $timeout Timeout for the connection to be opened.
     * @return @resource The FTP resource used inside the driver object.
     */
    function &ftp_ssl_connect($host, $port = 21, $timeout = 90)
    {
        $this->_resource = @ftp_ssl_connect($host, $port = 21, $timeout = 90);
        return @$this->_resource;
    }
    
    // }}}
    // {{{ ftp_systype()
    
    /**
     * Returns the system type identifier of the remote FTP server.
     * This is one of the functions provided by extFTP, which should be implemented by a driver. 
     * 
     *
	 *
     * @since 0.1
     * @access public
     * @return @mixed String, the remote system type, or false on error.
     */
    function ftp_systype()
    {
        return @ftp_systype($this->_resource);
    }
}



?>
