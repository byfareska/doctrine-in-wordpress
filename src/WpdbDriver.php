<?php declare(strict_types=1);

namespace Byfareska\WordpressDoctrineOrm;

use Doctrine\DBAL\Driver\AbstractMySQLDriver;
use Doctrine\DBAL\Driver\Mysqli\Connection;
use ReflectionClass;
use wpdb;

class WpdbDriver extends AbstractMySQLDriver
{
    public function connect(array $params)
    {
        global $wpdb;

        $reflectionClass = new ReflectionClass(wpdb::class);
        $property = $reflectionClass->getProperty('dbh');
        $property->setAccessible(true);
        $mysqli = $property->getValue($wpdb);

        return new Connection($mysqli);
    }
}