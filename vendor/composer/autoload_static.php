<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit651d843d1feb71a94b323eb4b0cb5d29
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit651d843d1feb71a94b323eb4b0cb5d29::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit651d843d1feb71a94b323eb4b0cb5d29::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
