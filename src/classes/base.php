<?php

class plBase 
{
    private static $autoload = array();
    private static $autoloadDirectory = array();

    public static function autoload( $classname )
    {
        if ( isset( self::$autoload[$classname] ) ) 
        {
            include_once( self::$autoload[$classname] );
        }
    }

    public static function addAutoloadDirectory( $directory ) 
    {
        if ( !in_array( $directory, self::$autoloadDirectory ) && is_dir( $directory ) && is_readable( $directory ) )
        {
            self::$autoloadDirectory[] = $directory;
            
            $glob = new RegexIterator(new DirectoryIterator($directory), '/\.php$/');
            
            foreach($glob as $file)
            {
                if ( is_array( $autoload = include( $file->getPathname() ) ) ) 
                {
                    self::$autoload = array_merge( $autoload, self::$autoload );
                }
            }
        }
    }

    public static function getAutoloadClasses() 
    {
        return array_keys( self::$autoload );
    }
}

?>
