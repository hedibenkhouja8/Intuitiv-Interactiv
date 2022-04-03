<?php

namespace ContainerPyH6RYp;
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'persistence'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Persistence'.\DIRECTORY_SEPARATOR.'ObjectManager.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolderd346e = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer778d1 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesdd697 = [
        
    ];

    public function getConnection()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'getConnection', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'getMetadataFactory', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'getExpressionBuilder', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'beginTransaction', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'getCache', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->getCache();
    }

    public function transactional($func)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'transactional', array('func' => $func), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'wrapInTransaction', array('func' => $func), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'commit', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->commit();
    }

    public function rollback()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'rollback', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'getClassMetadata', array('className' => $className), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'createQuery', array('dql' => $dql), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'createNamedQuery', array('name' => $name), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'createQueryBuilder', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'flush', array('entity' => $entity), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'clear', array('entityName' => $entityName), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->clear($entityName);
    }

    public function close()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'close', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->close();
    }

    public function persist($entity)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'persist', array('entity' => $entity), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'remove', array('entity' => $entity), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'refresh', array('entity' => $entity), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'detach', array('entity' => $entity), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'merge', array('entity' => $entity), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'getRepository', array('entityName' => $entityName), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'contains', array('entity' => $entity), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'getEventManager', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'getConfiguration', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'isOpen', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'getUnitOfWork', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'getProxyFactory', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'initializeObject', array('obj' => $obj), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'getFilters', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'isFiltersStateClean', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'hasFilters', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return $this->valueHolderd346e->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer778d1 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolderd346e) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderd346e = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolderd346e->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, '__get', ['name' => $name], $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        if (isset(self::$publicPropertiesdd697[$name])) {
            return $this->valueHolderd346e->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderd346e;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderd346e;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderd346e;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderd346e;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, '__isset', array('name' => $name), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderd346e;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolderd346e;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, '__unset', array('name' => $name), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderd346e;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolderd346e;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, '__clone', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        $this->valueHolderd346e = clone $this->valueHolderd346e;
    }

    public function __sleep()
    {
        $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, '__sleep', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;

        return array('valueHolderd346e');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer778d1 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer778d1;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer778d1 && ($this->initializer778d1->__invoke($valueHolderd346e, $this, 'initializeProxy', array(), $this->initializer778d1) || 1) && $this->valueHolderd346e = $valueHolderd346e;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderd346e;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderd346e;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
