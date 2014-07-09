<?php

/**
 * 
 * @package TeraWurfl
 * @see TeraWurflWebservice
 *
 */
class TeraWurflConfig
{
    /**
     * Database Hostname
     * To specify the MySQL 5 TCP port or use a named pipe / socket, put it at the end of your hostname,
     * seperated by a colon (ex: "localhost:3310" or "localhost:/var/run/mysqld/mysqld.sock").
     * For MS SQL Server, use the format HOSTNAME\Instance, like "MYHOSTNAME\SQLEXPRESS".
     * For MongoDB, enter a hostname or a MongoDB Connection String, like "mongodb:///tmp/mongodb-27017.sock,localhost:27017"
     * @var String
     */
    public static $DB_HOST = "localhost";
    /**
     * Database User
     * For MongoDB, this may be blank if authentication is not used
     * @var String
     */
    public static $DB_USER = "root";
    /**
     * Database Password
     * For MongoDB, this may be blank if authentication is not used
     * @var String
     */
    public static $DB_PASS = '';
    /**
     * Database Name / Schema Name
     * @var String
     */
    public static $DB_SCHEMA = "tera_wurfl";
    /**
     * Database Connector (MySQL4, MySQL5, MSSQL2005, MongoDB)
     * @var String
     */
    public static $DB_CONNECTOR = "MySQL5";
    /**
     * Prefix used for all database tables
     * @var String
     */
    public static $TABLE_PREFIX = "TeraWurfl";
    /**
     * URL of WURFL File.  If you have multiple installations of Tera-WURFL, you can set this to a location on your network.
     * @var String
     */
    public static $WURFL_DL_URL = "http://downloads.sourceforge.net/project/wurfl/WURFL/latest/wurfl-latest.zip";
    /**
     * URL of CVS WURFL File
     * @var String
     */
    public static $WURFL_CVS_URL = "http://wurfl.cvs.sourceforge.net/%2Acheckout%2A/wurfl/xml/wurfl.xml";
    /**
     * Data Directory
     * @var String
     */
    public static $DATADIR = 'data/';
    /**
     * Enable Caching System
     * @var Bool
     */
    public static $CACHE_ENABLE = false;
    /**
     * Enable Patches (must reload WURFL after changing)
     * @var Bool
     */
    public static $PATCH_ENABLE = false;
    /**
     * Filename of patch file.  If you want to use more than one, seperate them with semicolons.  They are loaded in order.
     * ex: $PATCH_FILE = 'web_browsers_patch.xml;custom_patch_ver2.3.xml';
     * @var String
     */
    public static $PATCH_FILE = 'custom_web_patch.xml';
    /**
     * Filename of main WURFL file (found in DATADIR; default: wurfl.xml)
     * @var String
     */
    public static $WURFL_FILE = 'wurfl.xml';
    /**
     * Filename of Log File (found in DATADIR; default: wurfl.log)
     * @var String
     */
    public static $LOG_FILE = 'wurfl.log';
    /**
     * Log Level as defined by PHP Constants LOG_ERR, LOG_WARNING and LOG_NOTICE.
     * Should be changed to LOG_WARNING or LOG_ERR for production sites
     * @var Int
     */
    public static $LOG_LEVEL = LOG_WARNING;
    /**
     * Enable to override PHP's memory limit if you are having problems loading the WURFL data like this:
     * Fatal error: Allowed memory size of 67108864 bytes exhausted (tried to allocate 24 bytes) in TeraWurflLoader.php on line 287
     * @var Bool
     */
    public static $OVERRIDE_MEMORY_LIMIT = false;
    /**
     * PHP Memory Limit.  See OVERRIDE_MEMORY_LIMIT for more info
     * @var String
     */
    public static $MEMORY_LIMIT = "128M";
    /**
     * Enable the SimpleDesktop Matching Engine.  This feature bypasses the advanced detection methods that are normally used while detecting
     * desktop web browsers; instead, most desktop browsers are detected using simple keywords and expressions.  When enabled, this setting
     *  will increase performance dramatically (200% in our tests) but could result in some false positives.  This will also reduce the size
     *  of the cache table dramatically because all the devices detected by the SimpleDesktop Engine will be cached in one cache entry.
     * @var Bool
     */
    public static $SIMPLE_DESKTOP_ENGINE_ENABLE = false;
    /**
     * Allows you to store only the specified capabilities from the WURFL file.  By default, every capability in the WURFL is stored in the
     * database and made available to your scripts.  If you only want to know if the device is wireless or not, you can store only the
     * is_wireless_device capability.  To disable the filter, set it to false, to enable it, you must set it to an array.  This array can
     * contain the group names (if you want to include the entire group, i.e. "product_info") and/or capability names (if you want just a
     * specific capability, i.e. "is_wireless_device").
     *
     * Usage Example:
     * <code>
     *	public static $CAPABILITY_FILTER = array(
     *		// Complete Capability Groups
     *		"product_info",
     *
     *		// Individual Capabilities
     *		"max_image_width",
     *		"max_image_height",
     *		"chtml_make_phone_call_string",
     *	);
     * </code>
     * @var Mixed
     */
    public static $CAPABILITY_FILTER = false;

    public function __construct(array $config)
    {
        if ( isset($config['dbHost']) )
        {
            self::$DB_HOST = $config['dbHost'];
        }
        if ( isset($config['dbUser']) )
        {
            self::$DB_USER = $config['dbUser'];
        }
        if ( isset($config['dbPwd']) )
        {
            self::$DB_PASS = $config['dbPwd'];
        }
        if ( isset($config['dbSchema']) )
        {
            self::$DB_SCHEMA = $config['dbSchema'];
        }
        if ( isset($config['dbConnector']) )
        {
            self::$DB_CONNECTOR = $config['dbConnector'];
        }
        if ( isset($config['tablePrefix']) )
        {
            self::$TABLE_PREFIX = $config['tablePrefix'];
        }
        if ( isset($config['wurflDlURL']) )
        {
            self::$WURFL_DL_URL = $config['wurflDlURL'];
        }
        if ( isset($config['wurflCVSURL']) )
        {
            self::$WURFL_CVS_URL = $config['wurflCVSURL'];
        }
        if ( isset($config['dataDir']) )
        {
            self::$DATADIR = $config['dataDir'];
        }
        if ( isset($config['cacheEnable']) )
        {
            self::$CACHE_ENABLE = $config['cacheEnable'];
        }
        if ( isset($config['patchEnable']) )
        {
            self::$PATCH_ENABLE = $config['patchEnable'];
        }
        if ( isset($config['patchFile']) )
        {
            self::$PATCH_FILE = $config['patchFile'];
        }
        if ( isset($config['wurflFile']) )
        {
            self::$WURFL_FILE = $config['wurflFile'];
        }
        if ( isset($config['logFile']) )
        {
            self::$LOG_FILE = $config['logFile'];
        }
        if ( isset($config['logLevel']) )
        {
            self::$LOG_LEVEL = $config['logLevel'];
        }
        if ( isset($config['overrideMemoryLimit']) )
        {
            self::$OVERRIDE_MEMORY_LIMIT = $config['overrideMemoryLimit'];
        }
        if ( isset($config['memoryLimit']) )
        {
            self::$MEMORY_LIMIT = $config['memoryLimit'];
        }
        if ( isset($config['simpleDesktopEngineEnable']) )
        {
            self::$SIMPLE_DESKTOP_ENGINE_ENABLE = $config['simpleDesktopEngineEnable'];
        }
    }
}
