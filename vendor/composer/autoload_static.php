<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitab6320419eadc5c733c3e5c3baa6dc82
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LINE\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LINE\\' => 
        array (
            0 => __DIR__ . '/..' . '/linecorp/line-bot-sdk/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitab6320419eadc5c733c3e5c3baa6dc82::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitab6320419eadc5c733c3e5c3baa6dc82::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
