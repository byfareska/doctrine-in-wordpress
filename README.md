# One minute setup example

1. `composer req byfareska/doctrine-in-wordpress`
   
2. 
```php
    $config = new Configuration();
    $config->setProxyDir(__DIR__ . '/var/cache');
    $config->setProxyNamespace('EntityProxy');
    $config->setAutoGenerateProxyClasses(true);
    $config->setMetadataDriverImpl(new \Doctrine\ORM\Mapping\Driver\AttributeDriver([
        __DIR__ . '/src/Entity'
    ]));

    $metaDataFactory = new \Doctrine\ORM\Mapping\ClassMetadataFactory();
    $em = (new \Byfareska\WordpressDoctrineOrm\EntityManagerFactory())->create();
    $metaDataFactory->setEntityManager($em);

    $meta = $metaDataFactory->getMetadataFor(ExampleEntity::class);
    $repository = new ExampleRepository($em, $meta);

    var_dump($repository->findAll());
```