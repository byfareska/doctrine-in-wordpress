<?php declare(strict_types=1);

namespace Byfareska\WordpressDoctrineOrm;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;

class EntityManagerFactory
{
    public function create(Configuration $config): EntityManager
    {
        return EntityManager::create(new Connection([], new WpdbDriver(), $config), $config);
    }
}