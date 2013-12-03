#!/usr/bin/env php
<?php

/**
 * phUML PHAR stub.
 *
 * @octdoc      h:phar/stub
 * @copyright   copyright (c) 2013 by Harald Lapp
 * @author      Harald Lapp <harald@octris.org>
 */
/**/

if (!class_exists('PHAR')) {
    print 'unable to execute -- wrong PHP version\n';
    exit(1);
}

Phar::mapPhar();
include 'phar://phuml.phar/app/phuml.php';

__HALT_COMPILER();