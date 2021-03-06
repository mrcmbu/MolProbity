<?php
// DEFAULTS.PHP
//
// Default configuration info for MolProbity.
// This fills in values that are not specified in config.php

//****************************************************************************
//      DO NOT EDIT THIS FILE!  IT WILL BE OVERWRITEN WHEN YOU UPGRADE!
//****************************************************************************

// MP_EMAIL_WEBMASTER
//  An email address for the owner of this site.
//  If you run this code, set this to your address.
if(!defined("MP_EMAIL_WEBMASTER"))
    define("MP_EMAIL_WEBMASTER", "webmaster@$_SERVER[SERVER_NAME]");

// MP_BIN_PATH
//  Directory(s) where all MolProbity-specific binary
//  executables are stored. Remember, apache must
//  have execute permission for these.
//
//  Does not need to include the bin/, bin/macosx/,
//  and/or bin/linux directories -- these are
//  included automatically as appropriate.
//
//  These directories have highest precedence of all.
//
//  Default: ""
//  Example: "/usr/local/php/bin:/opt/j2/bin"
//  Full absolute paths only -- no relative ones!
if(!defined("MP_BIN_PATH"))
    define("MP_BIN_PATH", "/usr/local/php5/bin:/opt/j2/bin:/usr/java/jdk/bin");

// MP_REDUCE_HET_DICT
//  Path to Reduce's heterogen dictionary
//  Default: /usr/local/reduce_wwPDB_het_dict.txt
if(!defined("MP_REDUCE_HET_DICT"))
    define("MP_REDUCE_HET_DICT", MP_BASE_DIR."/lib/reduce_wwPDB_het_dict.txt");

// MP_REDUCE_OLD_HET_DICT
//  Path to Reduce's heterogen dictionary
//  Default: /usr/local/reduce_het_dict.txt
if(!defined("MP_REDUCE_OLD_HET_DICT"))
    define("MP_REDUCE_OLD_HET_DICT", MP_BASE_DIR."/lib/reduce_het_dict.txt");

// Limit for Reduce's -limit flag
// As of Reduce 3.03, this does nothing -- will be restored in future?
if(!defined("MP_REDUCE_LIMIT"))
    define("MP_REDUCE_LIMIT", 10000);

// MP_UMASK
//  This is a standard Unix file umask, which means it
//  specifies which bits WON'T be set in the file permissions.
//  This gets applied to all files created by MolProbity.
//
//  Default is 0000.
//  For highest security, use 0077.
if(!defined("MP_UMASK"))
    define("MP_UMASK", 0007);

// Default timezone. See lib/timezones.php for allowed keys.
// If left undefined (commented out), MolProbity can usually guess correctly.
//define("MP_DEFAULT_TIMEZONE", 'EST');

// How long a session can go unused, in seconds
if(!defined("MP_SESSION_LIFETIME"))
    define("MP_SESSION_LIFETIME", 60*60*12); // 12 hours

// How long a session can go unused if user requests extension, in seconds
if(!defined("MP_SESSION_LIFETIME_EXT"))
    define("MP_SESSION_LIFETIME_EXT", 60*60*24*14); // 14 days

// How large a session can grow, in bytes
if(!defined("MP_SESSION_MAX_SIZE"))
    define("MP_SESSION_MAX_SIZE", 200*1000*1000); // 200 Mb

// Kinemages above this size will be gzipped (in most cases).
// To disable, set to a very large value, like 100 Gb.
if(!defined("MP_KIN_GZIP_THRESHOLD"))
    define("MP_KIN_GZIP_THRESHOLD", 1*1000*1000); // 1 Mb

// Web hits tracking code; appears in pageFooter().
// Use for e.g. tracking with Google Analytics.
// Defaults to nothing to protect privacy of 3rd party users.
if(!defined("MP_TRACKING_CODE"))
    define("MP_TRACKING_CODE", '');

// Alternating colors for striped tables
if(!defined("MP_TABLE_ALT1"))
    define("MP_TABLE_ALT1", "#ffffff");
if(!defined("MP_TABLE_ALT2"))
    define("MP_TABLE_ALT2", "#f0f0f0");
// Highlight color for striped tables
if(!defined("MP_TABLE_HIGHLIGHT"))
    define("MP_TABLE_HIGHLIGHT", "#9999cc");

// Subdirectories for things to be stored in.
if(!defined("MP_DIR_SYSTEM"))
    define("MP_DIR_SYSTEM", "system");              // Session data, lab notebook, etc.
if(!defined("MP_DIR_WORK"))
    define("MP_DIR_WORK", "temporary");             // Temporary working files
if(!defined("MP_DIR_MODELS"))
    define("MP_DIR_MODELS", "coordinates");         // PDB files
if(!defined("MP_DIR_EDMAPS"))
    define("MP_DIR_EDMAPS", "electron_density");    // electron density
if(!defined("MP_DIR_XRAYDATA"))
    define("MP_DIR_XRAYDATA", "xray_data");         // xray data (mtzs, xxxx-sf.cif)
if(!defined("MP_DIR_ORIGS"))
    define("MP_DIR_ORIGS", "original_uploads");     // for original pdbs (with censored names)
if(!defined("MP_DIR_TOPPAR"))
    define("MP_DIR_TOPPAR", "dictionaries");        // het dicts, etc. (named for CNS TOPology and PARameter)
if(!defined("MP_DIR_KINS"))
    define("MP_DIR_KINS", "kinemages");             // kinemage visualizations
if(!defined("MP_DIR_RAWDATA"))
    define("MP_DIR_RAWDATA", "raw_data");           // raw (text) data like .tab files
if(!defined("MP_DIR_CHARTS"))
    define("MP_DIR_CHARTS", "charts");              // CSV files for HTML/Excel tables, PDFs, etc

//****************************************************************************
//      TRYING TO SET THESE FIELDS IN CONFIG.PHP WILL BREAK MOLPROBITY
//****************************************************************************

// MP_EMAIL_AUTHOR
//  The email address of the (current) author and maintainer
//  of the MolProbity source code. Please DO NOT modify this
//  entry; this is how we get feedback about bugs, etc.
//  Change MP_EMAIL_WEBMASTER instead.
    define("MP_EMAIL_AUTHOR", "arendall@duke.edu");

// Don't change this! It will break user bookmarks.
    define("MP_SESSION_NAME", "MolProbSID");

// MOVED TO lib/core.php to allow for svn tagging - JJH 130409
// Current "internal reference" version number. Please DO NOT change.
//    define("MP_VERSION", "4.01a");

?>
