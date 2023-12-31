<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf52da3190dbd50a40ef76afc7e4ba406
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf52da3190dbd50a40ef76afc7e4ba406::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf52da3190dbd50a40ef76afc7e4ba406::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf52da3190dbd50a40ef76afc7e4ba406::$classMap;

        }, null, ClassLoader::class);
    }
}
