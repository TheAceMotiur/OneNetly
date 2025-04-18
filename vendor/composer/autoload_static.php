<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit40ea17c5d0b277138e831ea113c873bf
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'OneMigrator\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'OneMigrator\\' => 
        array (
            0 => __DIR__ . '/..' . '/onemigrator/onemigrator/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit40ea17c5d0b277138e831ea113c873bf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit40ea17c5d0b277138e831ea113c873bf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit40ea17c5d0b277138e831ea113c873bf::$classMap;

        }, null, ClassLoader::class);
    }
}
