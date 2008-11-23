<?php

$debug = false;

if (isset($argv[1])) {
    $debug = true;
}

require_once 'PEAR/PackageFileManager.php';

$pkg = new PEAR_PackageFileManager;

// directory that PEAR CVS is located in
$cvsdir     = '/cvs/pear/';
$packagedir = $cvsdir . 'Net_FTP2/';
$category   = 'Networking';

$version = '0.1';

$summary = 'Net_FTP2 provides multiple backends and advanced features for communication with FTP servers.';

$description = <<<EOT
[[[DESCRIBTION TO BE ADDED HERE]]]
EOT;

$notes = <<<EOT
EOT;

$options = array('baseinstalldir'      => '',
                  'summary'             => $summary,
                  'description'         => $description,
                  'version'             => $version,
                  'packagedirectory'    => $packagedir,
                  'pathtopackagefile'   => $packagedir,
                  'state'               => 'devel',
        //              'filelistgenerator'   => 'cvs',
                  'filelistgenerator'   => 'file',
                  'notes'               => $notes,
                  'package'             => 'Net_FTP2',
                  'dir_roles'           => array(
                          'example'       => 'doc',
                          'test'          => 'test'
                  ),
                  'ignore'              => array(
                        'package.xml',
                        'doc*',
                        'test*',
                        'generate_package_xml.php',
                        '*.tgz',
                        'FTP_PHP5.php',
                  ),
            );

$e = $pkg->setOptions($options);

if (PEAR::isError($e)) {
    echo $e->getMessage();
    exit;
}

$e = $pkg->addMaintainer('toby', 'lead', 'Tobias Schlitt', 'toby@php.net');


if (PEAR::isError($e)) {
    echo $e->getMessage();
    exit;
}

// Orphaned with socket backend
// $e = $pkg->addDependency('ftp', null, 'has', 'ext');

if (PEAR::isError($e)) {
    echo $e->getMessage();
    exit;
}

// hack until they get their shit in line with docroot role
$pkg->addRole('tpl', 'php');
$pkg->addRole('png', 'php');
$pkg->addRole('gif', 'php');
$pkg->addRole('jpg', 'php');
$pkg->addRole('css', 'php');
$pkg->addRole('js', 'php');
$pkg->addRole('ini', 'php');
$pkg->addRole('inc', 'php');
$pkg->addRole('afm', 'php');
$pkg->addRole('pkg', 'doc');
$pkg->addRole('cls', 'doc');
$pkg->addRole('proc', 'doc');
$pkg->addRole('sh', 'script');

if ($debug) {
    $e = $pkg->debugPackageFile();
} else {
    $e = $pkg->writePackageFile();
}

if (PEAR::isError($e)) {
    echo $e->getMessage();
}
?>
