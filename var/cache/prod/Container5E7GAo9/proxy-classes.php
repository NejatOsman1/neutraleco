<?php

namespace Container5E7GAo9;


include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Model/PersisterInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Model/Persister/DoctrinePersister.php';
class DoctrinePersister_a694024 extends \Scheb\TwoFactorBundle\Model\Persister\DoctrinePersister implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder70f2b = null;
    private $initializerd1d03 = null;
    private static $publicPropertiesc9877 = [
        
    ];
    public function persist($user) : void
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'persist', array('user' => $user), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $this->valueHolder70f2b->persist($user);
return;
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Model\Persister\DoctrinePersister $instance) {
            unset($instance->om);
        }, $instance, 'Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister')->__invoke($instance);
        $instance->initializerd1d03 = $initializer;
        return $instance;
    }
    public function __construct($om)
    {
        static $reflection;
        if (! $this->valueHolder70f2b) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister');
            $this->valueHolder70f2b = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Model\Persister\DoctrinePersister $instance) {
            unset($instance->om);
        }, $this, 'Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister')->__invoke($this);
        }
        $this->valueHolder70f2b->__construct($om);
    }
    public function & __get($name)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__get', ['name' => $name], $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        if (isset(self::$publicPropertiesc9877[$name])) {
            return $this->valueHolder70f2b->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
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
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__isset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__unset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__clone', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $this->valueHolder70f2b = clone $this->valueHolder70f2b;
    }
    public function __sleep()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__sleep', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return array('valueHolder70f2b');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Model\Persister\DoctrinePersister $instance) {
            unset($instance->om);
        }, $this, 'Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerd1d03 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerd1d03;
    }
    public function initializeProxy() : bool
    {
        return $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'initializeProxy', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder70f2b;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder70f2b;
    }
}

if (!\class_exists('DoctrinePersister_a694024', false)) {
    \class_alias(__NAMESPACE__.'\\DoctrinePersister_a694024', 'DoctrinePersister_a694024', false);
}

include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Provider/TwoFactorFormRendererInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Provider/DefaultTwoFactorFormRenderer.php';
class DefaultTwoFactorFormRenderer_892ae3f extends \Scheb\TwoFactorBundle\Security\TwoFactor\Provider\DefaultTwoFactorFormRenderer implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder70f2b = null;
    private $initializerd1d03 = null;
    private static $publicPropertiesc9877 = [
        
    ];
    public function renderForm(\Symfony\Component\HttpFoundation\Request $request, array $templateVars) : \Symfony\Component\HttpFoundation\Response
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'renderForm', array('request' => $request, 'templateVars' => $templateVars), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->renderForm($request, $templateVars);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Provider\DefaultTwoFactorFormRenderer $instance) {
            unset($instance->twigEnvironment, $instance->template, $instance->templateVars);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer')->__invoke($instance);
        $instance->initializerd1d03 = $initializer;
        return $instance;
    }
    public function __construct(\Twig\Environment $twigRenderer, string $template, array $templateVars = [])
    {
        static $reflection;
        if (! $this->valueHolder70f2b) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer');
            $this->valueHolder70f2b = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Provider\DefaultTwoFactorFormRenderer $instance) {
            unset($instance->twigEnvironment, $instance->template, $instance->templateVars);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer')->__invoke($this);
        }
        $this->valueHolder70f2b->__construct($twigRenderer, $template, $templateVars);
    }
    public function & __get($name)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__get', ['name' => $name], $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        if (isset(self::$publicPropertiesc9877[$name])) {
            return $this->valueHolder70f2b->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
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
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__isset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__unset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__clone', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $this->valueHolder70f2b = clone $this->valueHolder70f2b;
    }
    public function __sleep()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__sleep', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return array('valueHolder70f2b');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Provider\DefaultTwoFactorFormRenderer $instance) {
            unset($instance->twigEnvironment, $instance->template, $instance->templateVars);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerd1d03 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerd1d03;
    }
    public function initializeProxy() : bool
    {
        return $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'initializeProxy', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder70f2b;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder70f2b;
    }
}

if (!\class_exists('DefaultTwoFactorFormRenderer_892ae3f', false)) {
    \class_alias(__NAMESPACE__.'\\DefaultTwoFactorFormRenderer_892ae3f', 'DefaultTwoFactorFormRenderer_892ae3f', false);
}

include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/src/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';
class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder70f2b = null;
    private $initializerd1d03 = null;
    private static $publicPropertiesc9877 = [
        
    ];
    public function getConnection()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'getConnection', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->getConnection();
    }
    public function getMetadataFactory()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'getMetadataFactory', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->getMetadataFactory();
    }
    public function getExpressionBuilder()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'getExpressionBuilder', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->getExpressionBuilder();
    }
    public function beginTransaction()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'beginTransaction', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->beginTransaction();
    }
    public function getCache()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'getCache', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->getCache();
    }
    public function transactional($func)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'transactional', array('func' => $func), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->transactional($func);
    }
    public function wrapInTransaction(callable $func)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'wrapInTransaction', array('func' => $func), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->wrapInTransaction($func);
    }
    public function commit()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'commit', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->commit();
    }
    public function rollback()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'rollback', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->rollback();
    }
    public function getClassMetadata($className)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'getClassMetadata', array('className' => $className), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->getClassMetadata($className);
    }
    public function createQuery($dql = '')
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'createQuery', array('dql' => $dql), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->createQuery($dql);
    }
    public function createNamedQuery($name)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'createNamedQuery', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->createNamedQuery($name);
    }
    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->createNativeQuery($sql, $rsm);
    }
    public function createNamedNativeQuery($name)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->createNamedNativeQuery($name);
    }
    public function createQueryBuilder()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'createQueryBuilder', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->createQueryBuilder();
    }
    public function flush($entity = null)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'flush', array('entity' => $entity), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->flush($entity);
    }
    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->find($className, $id, $lockMode, $lockVersion);
    }
    public function getReference($entityName, $id)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->getReference($entityName, $id);
    }
    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->getPartialReference($entityName, $identifier);
    }
    public function clear($entityName = null)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'clear', array('entityName' => $entityName), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->clear($entityName);
    }
    public function close()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'close', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->close();
    }
    public function persist($entity)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'persist', array('entity' => $entity), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->persist($entity);
    }
    public function remove($entity)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'remove', array('entity' => $entity), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->remove($entity);
    }
    public function refresh($entity)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'refresh', array('entity' => $entity), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->refresh($entity);
    }
    public function detach($entity)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'detach', array('entity' => $entity), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->detach($entity);
    }
    public function merge($entity)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'merge', array('entity' => $entity), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->merge($entity);
    }
    public function copy($entity, $deep = false)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->copy($entity, $deep);
    }
    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->lock($entity, $lockMode, $lockVersion);
    }
    public function getRepository($entityName)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'getRepository', array('entityName' => $entityName), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->getRepository($entityName);
    }
    public function contains($entity)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'contains', array('entity' => $entity), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->contains($entity);
    }
    public function getEventManager()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'getEventManager', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->getEventManager();
    }
    public function getConfiguration()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'getConfiguration', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->getConfiguration();
    }
    public function isOpen()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'isOpen', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->isOpen();
    }
    public function getUnitOfWork()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'getUnitOfWork', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->getUnitOfWork();
    }
    public function getHydrator($hydrationMode)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->getHydrator($hydrationMode);
    }
    public function newHydrator($hydrationMode)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->newHydrator($hydrationMode);
    }
    public function getProxyFactory()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'getProxyFactory', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->getProxyFactory();
    }
    public function initializeObject($obj)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'initializeObject', array('obj' => $obj), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->initializeObject($obj);
    }
    public function getFilters()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'getFilters', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->getFilters();
    }
    public function isFiltersStateClean()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'isFiltersStateClean', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->isFiltersStateClean();
    }
    public function hasFilters()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'hasFilters', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->hasFilters();
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);
        $instance->initializerd1d03 = $initializer;
        return $instance;
    }
    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;
        if (! $this->valueHolder70f2b) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder70f2b = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
        }
        $this->valueHolder70f2b->__construct($conn, $config, $eventManager);
    }
    public function & __get($name)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__get', ['name' => $name], $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        if (isset(self::$publicPropertiesc9877[$name])) {
            return $this->valueHolder70f2b->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
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
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__isset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__unset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__clone', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $this->valueHolder70f2b = clone $this->valueHolder70f2b;
    }
    public function __sleep()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__sleep', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return array('valueHolder70f2b');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerd1d03 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerd1d03;
    }
    public function initializeProxy() : bool
    {
        return $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'initializeProxy', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder70f2b;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder70f2b;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}

include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Handler/AuthenticationHandlerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Handler/AuthenticatedTokenHandler.php';
class AuthenticatedTokenHandler_e3677d3 extends \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticatedTokenHandler implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder70f2b = null;
    private $initializerd1d03 = null;
    private static $publicPropertiesc9877 = [
        
    ];
    public function beginTwoFactorAuthentication(\Scheb\TwoFactorBundle\Security\TwoFactor\AuthenticationContextInterface $context) : \Symfony\Component\Security\Core\Authentication\Token\TokenInterface
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'beginTwoFactorAuthentication', array('context' => $context), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->beginTwoFactorAuthentication($context);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticatedTokenHandler $instance) {
            unset($instance->authenticationHandler, $instance->supportedTokens);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler')->__invoke($instance);
        $instance->initializerd1d03 = $initializer;
        return $instance;
    }
    public function __construct(\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticationHandlerInterface $authenticationHandler, array $supportedTokens)
    {
        static $reflection;
        if (! $this->valueHolder70f2b) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler');
            $this->valueHolder70f2b = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticatedTokenHandler $instance) {
            unset($instance->authenticationHandler, $instance->supportedTokens);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler')->__invoke($this);
        }
        $this->valueHolder70f2b->__construct($authenticationHandler, $supportedTokens);
    }
    public function & __get($name)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__get', ['name' => $name], $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        if (isset(self::$publicPropertiesc9877[$name])) {
            return $this->valueHolder70f2b->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
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
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__isset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__unset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__clone', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $this->valueHolder70f2b = clone $this->valueHolder70f2b;
    }
    public function __sleep()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__sleep', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return array('valueHolder70f2b');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticatedTokenHandler $instance) {
            unset($instance->authenticationHandler, $instance->supportedTokens);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerd1d03 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerd1d03;
    }
    public function initializeProxy() : bool
    {
        return $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'initializeProxy', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder70f2b;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder70f2b;
    }
}

if (!\class_exists('AuthenticatedTokenHandler_e3677d3', false)) {
    \class_alias(__NAMESPACE__.'\\AuthenticatedTokenHandler_e3677d3', 'AuthenticatedTokenHandler_e3677d3', false);
}

include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Handler/ConditionAuthenticationHandler.php';
class ConditionAuthenticationHandler_a1ee12f extends \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\ConditionAuthenticationHandler implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder70f2b = null;
    private $initializerd1d03 = null;
    private static $publicPropertiesc9877 = [
        
    ];
    public function beginTwoFactorAuthentication(\Scheb\TwoFactorBundle\Security\TwoFactor\AuthenticationContextInterface $context) : \Symfony\Component\Security\Core\Authentication\Token\TokenInterface
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'beginTwoFactorAuthentication', array('context' => $context), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->beginTwoFactorAuthentication($context);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\ConditionAuthenticationHandler $instance) {
            unset($instance->authenticationHandler, $instance->condition);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler')->__invoke($instance);
        $instance->initializerd1d03 = $initializer;
        return $instance;
    }
    public function __construct(\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticationHandlerInterface $authenticationHandler, \Scheb\TwoFactorBundle\Security\TwoFactor\Condition\TwoFactorConditionInterface $condition)
    {
        static $reflection;
        if (! $this->valueHolder70f2b) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler');
            $this->valueHolder70f2b = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\ConditionAuthenticationHandler $instance) {
            unset($instance->authenticationHandler, $instance->condition);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler')->__invoke($this);
        }
        $this->valueHolder70f2b->__construct($authenticationHandler, $condition);
    }
    public function & __get($name)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__get', ['name' => $name], $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        if (isset(self::$publicPropertiesc9877[$name])) {
            return $this->valueHolder70f2b->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
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
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__isset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__unset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__clone', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $this->valueHolder70f2b = clone $this->valueHolder70f2b;
    }
    public function __sleep()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__sleep', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return array('valueHolder70f2b');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\ConditionAuthenticationHandler $instance) {
            unset($instance->authenticationHandler, $instance->condition);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerd1d03 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerd1d03;
    }
    public function initializeProxy() : bool
    {
        return $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'initializeProxy', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder70f2b;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder70f2b;
    }
}

if (!\class_exists('ConditionAuthenticationHandler_a1ee12f', false)) {
    \class_alias(__NAMESPACE__.'\\ConditionAuthenticationHandler_a1ee12f', 'ConditionAuthenticationHandler_a1ee12f', false);
}

include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Handler/IpWhitelistHandler.php';
class IpWhitelistHandler_06fe2b0 extends \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\IpWhitelistHandler implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder70f2b = null;
    private $initializerd1d03 = null;
    private static $publicPropertiesc9877 = [
        
    ];
    public function beginTwoFactorAuthentication(\Scheb\TwoFactorBundle\Security\TwoFactor\AuthenticationContextInterface $context) : \Symfony\Component\Security\Core\Authentication\Token\TokenInterface
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'beginTwoFactorAuthentication', array('context' => $context), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->beginTwoFactorAuthentication($context);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\IpWhitelistHandler $instance) {
            unset($instance->authenticationHandler, $instance->ipWhitelistProvider);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler')->__invoke($instance);
        $instance->initializerd1d03 = $initializer;
        return $instance;
    }
    public function __construct(\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticationHandlerInterface $authenticationHandler, \Scheb\TwoFactorBundle\Security\TwoFactor\IpWhitelist\IpWhitelistProviderInterface $ipWhitelistProvider)
    {
        static $reflection;
        if (! $this->valueHolder70f2b) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler');
            $this->valueHolder70f2b = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\IpWhitelistHandler $instance) {
            unset($instance->authenticationHandler, $instance->ipWhitelistProvider);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler')->__invoke($this);
        }
        $this->valueHolder70f2b->__construct($authenticationHandler, $ipWhitelistProvider);
    }
    public function & __get($name)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__get', ['name' => $name], $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        if (isset(self::$publicPropertiesc9877[$name])) {
            return $this->valueHolder70f2b->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
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
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__isset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__unset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__clone', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $this->valueHolder70f2b = clone $this->valueHolder70f2b;
    }
    public function __sleep()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__sleep', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return array('valueHolder70f2b');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\IpWhitelistHandler $instance) {
            unset($instance->authenticationHandler, $instance->ipWhitelistProvider);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerd1d03 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerd1d03;
    }
    public function initializeProxy() : bool
    {
        return $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'initializeProxy', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder70f2b;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder70f2b;
    }
}

if (!\class_exists('IpWhitelistHandler_06fe2b0', false)) {
    \class_alias(__NAMESPACE__.'\\IpWhitelistHandler_06fe2b0', 'IpWhitelistHandler_06fe2b0', false);
}

include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Handler/TwoFactorProviderHandler.php';
class TwoFactorProviderHandler_3ecff6c extends \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TwoFactorProviderHandler implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder70f2b = null;
    private $initializerd1d03 = null;
    private static $publicPropertiesc9877 = [
        
    ];
    public function beginTwoFactorAuthentication(\Scheb\TwoFactorBundle\Security\TwoFactor\AuthenticationContextInterface $context) : \Symfony\Component\Security\Core\Authentication\Token\TokenInterface
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'beginTwoFactorAuthentication', array('context' => $context), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->beginTwoFactorAuthentication($context);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TwoFactorProviderHandler $instance) {
            unset($instance->providerRegistry, $instance->twoFactorTokenFactory);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler')->__invoke($instance);
        $instance->initializerd1d03 = $initializer;
        return $instance;
    }
    public function __construct(\Scheb\TwoFactorBundle\Security\TwoFactor\Provider\TwoFactorProviderRegistry $providerRegistry, \Scheb\TwoFactorBundle\Security\Authentication\Token\TwoFactorTokenFactoryInterface $twoFactorTokenFactory)
    {
        static $reflection;
        if (! $this->valueHolder70f2b) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler');
            $this->valueHolder70f2b = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TwoFactorProviderHandler $instance) {
            unset($instance->providerRegistry, $instance->twoFactorTokenFactory);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler')->__invoke($this);
        }
        $this->valueHolder70f2b->__construct($providerRegistry, $twoFactorTokenFactory);
    }
    public function & __get($name)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__get', ['name' => $name], $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        if (isset(self::$publicPropertiesc9877[$name])) {
            return $this->valueHolder70f2b->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
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
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__isset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__unset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__clone', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $this->valueHolder70f2b = clone $this->valueHolder70f2b;
    }
    public function __sleep()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__sleep', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return array('valueHolder70f2b');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TwoFactorProviderHandler $instance) {
            unset($instance->providerRegistry, $instance->twoFactorTokenFactory);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerd1d03 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerd1d03;
    }
    public function initializeProxy() : bool
    {
        return $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'initializeProxy', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder70f2b;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder70f2b;
    }
}

if (!\class_exists('TwoFactorProviderHandler_3ecff6c', false)) {
    \class_alias(__NAMESPACE__.'\\TwoFactorProviderHandler_3ecff6c', 'TwoFactorProviderHandler_3ecff6c', false);
}

include_once \dirname(__DIR__, 4).'/vendor/symfony/event-dispatcher/EventSubscriberInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-trusted-device/Security/TwoFactor/Trusted/TrustedCookieResponseListener.php';
class TrustedCookieResponseListener_c7f9b85 extends \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedCookieResponseListener implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder70f2b = null;
    private $initializerd1d03 = null;
    private static $publicPropertiesc9877 = [
        
    ];
    public function onKernelResponse(\Symfony\Component\HttpKernel\Event\ResponseEvent $event) : void
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'onKernelResponse', array('event' => $event), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $this->valueHolder70f2b->onKernelResponse($event);
return;
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedCookieResponseListener $instance) {
            unset($instance->trustedTokenStorage, $instance->trustedTokenLifetime, $instance->cookieName, $instance->cookieSecure, $instance->cookieSameSite, $instance->cookiePath, $instance->cookieDomain);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener')->__invoke($instance);
        $instance->initializerd1d03 = $initializer;
        return $instance;
    }
    public function __construct(\Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage $trustedTokenStorage, int $trustedTokenLifetime, string $cookieName, ?bool $cookieSecure, ?string $cookieSameSite, ?string $cookiePath, ?string $cookieDomain)
    {
        static $reflection;
        if (! $this->valueHolder70f2b) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener');
            $this->valueHolder70f2b = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedCookieResponseListener $instance) {
            unset($instance->trustedTokenStorage, $instance->trustedTokenLifetime, $instance->cookieName, $instance->cookieSecure, $instance->cookieSameSite, $instance->cookiePath, $instance->cookieDomain);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener')->__invoke($this);
        }
        $this->valueHolder70f2b->__construct($trustedTokenStorage, $trustedTokenLifetime, $cookieName, $cookieSecure, $cookieSameSite, $cookiePath, $cookieDomain);
    }
    public function & __get($name)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__get', ['name' => $name], $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        if (isset(self::$publicPropertiesc9877[$name])) {
            return $this->valueHolder70f2b->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
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
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__isset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__unset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__clone', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $this->valueHolder70f2b = clone $this->valueHolder70f2b;
    }
    public function __sleep()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__sleep', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return array('valueHolder70f2b');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedCookieResponseListener $instance) {
            unset($instance->trustedTokenStorage, $instance->trustedTokenLifetime, $instance->cookieName, $instance->cookieSecure, $instance->cookieSameSite, $instance->cookiePath, $instance->cookieDomain);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerd1d03 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerd1d03;
    }
    public function initializeProxy() : bool
    {
        return $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'initializeProxy', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder70f2b;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder70f2b;
    }
}

if (!\class_exists('TrustedCookieResponseListener_c7f9b85', false)) {
    \class_alias(__NAMESPACE__.'\\TrustedCookieResponseListener_c7f9b85', 'TrustedCookieResponseListener_c7f9b85', false);
}

include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-trusted-device/Security/TwoFactor/Handler/TrustedDeviceHandler.php';
class TrustedDeviceHandler_d0544bf extends \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TrustedDeviceHandler implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder70f2b = null;
    private $initializerd1d03 = null;
    private static $publicPropertiesc9877 = [
        
    ];
    public function beginTwoFactorAuthentication(\Scheb\TwoFactorBundle\Security\TwoFactor\AuthenticationContextInterface $context) : \Symfony\Component\Security\Core\Authentication\Token\TokenInterface
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'beginTwoFactorAuthentication', array('context' => $context), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->beginTwoFactorAuthentication($context);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TrustedDeviceHandler $instance) {
            unset($instance->authenticationHandler, $instance->trustedDeviceManager, $instance->extendTrustedToken);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler')->__invoke($instance);
        $instance->initializerd1d03 = $initializer;
        return $instance;
    }
    public function __construct(\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticationHandlerInterface $authenticationHandler, \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceManagerInterface $trustedDeviceManager, bool $extendTrustedToken)
    {
        static $reflection;
        if (! $this->valueHolder70f2b) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler');
            $this->valueHolder70f2b = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TrustedDeviceHandler $instance) {
            unset($instance->authenticationHandler, $instance->trustedDeviceManager, $instance->extendTrustedToken);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler')->__invoke($this);
        }
        $this->valueHolder70f2b->__construct($authenticationHandler, $trustedDeviceManager, $extendTrustedToken);
    }
    public function & __get($name)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__get', ['name' => $name], $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        if (isset(self::$publicPropertiesc9877[$name])) {
            return $this->valueHolder70f2b->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
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
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__isset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__unset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__clone', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $this->valueHolder70f2b = clone $this->valueHolder70f2b;
    }
    public function __sleep()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__sleep', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return array('valueHolder70f2b');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TrustedDeviceHandler $instance) {
            unset($instance->authenticationHandler, $instance->trustedDeviceManager, $instance->extendTrustedToken);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerd1d03 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerd1d03;
    }
    public function initializeProxy() : bool
    {
        return $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'initializeProxy', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder70f2b;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder70f2b;
    }
}

if (!\class_exists('TrustedDeviceHandler_d0544bf', false)) {
    \class_alias(__NAMESPACE__.'\\TrustedDeviceHandler_d0544bf', 'TrustedDeviceHandler_d0544bf', false);
}

include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-trusted-device/Security/TwoFactor/Trusted/TrustedDeviceTokenStorage.php';
class TrustedDeviceTokenStorage_fc7b3c4 extends \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder70f2b = null;
    private $initializerd1d03 = null;
    private static $publicPropertiesc9877 = [
        
    ];
    public function hasUpdatedCookie() : bool
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'hasUpdatedCookie', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->hasUpdatedCookie();
    }
    public function getCookieValue() : ?string
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'getCookieValue', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->getCookieValue();
    }
    public function hasTrustedToken(string $username, string $firewall, int $version) : bool
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'hasTrustedToken', array('username' => $username, 'firewall' => $firewall, 'version' => $version), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return $this->valueHolder70f2b->hasTrustedToken($username, $firewall, $version);
    }
    public function addTrustedToken(string $username, string $firewall, int $version) : void
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'addTrustedToken', array('username' => $username, 'firewall' => $firewall, 'version' => $version), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $this->valueHolder70f2b->addTrustedToken($username, $firewall, $version);
return;
    }
    public function clearTrustedToken(string $username, string $firewall) : void
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'clearTrustedToken', array('username' => $username, 'firewall' => $firewall), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $this->valueHolder70f2b->clearTrustedToken($username, $firewall);
return;
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage $instance) {
            unset($instance->requestStack, $instance->tokenGenerator, $instance->cookieName, $instance->trustedTokenList, $instance->updateCookie);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage')->__invoke($instance);
        $instance->initializerd1d03 = $initializer;
        return $instance;
    }
    public function __construct(\Symfony\Component\HttpFoundation\RequestStack $requestStack, \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenEncoder $tokenGenerator, string $cookieName)
    {
        static $reflection;
        if (! $this->valueHolder70f2b) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage');
            $this->valueHolder70f2b = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage $instance) {
            unset($instance->requestStack, $instance->tokenGenerator, $instance->cookieName, $instance->trustedTokenList, $instance->updateCookie);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage')->__invoke($this);
        }
        $this->valueHolder70f2b->__construct($requestStack, $tokenGenerator, $cookieName);
    }
    public function & __get($name)
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__get', ['name' => $name], $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        if (isset(self::$publicPropertiesc9877[$name])) {
            return $this->valueHolder70f2b->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
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
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__isset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__unset', array('name' => $name), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder70f2b;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder70f2b;
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
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__clone', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        $this->valueHolder70f2b = clone $this->valueHolder70f2b;
    }
    public function __sleep()
    {
        $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, '__sleep', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
        return array('valueHolder70f2b');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage $instance) {
            unset($instance->requestStack, $instance->tokenGenerator, $instance->cookieName, $instance->trustedTokenList, $instance->updateCookie);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerd1d03 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerd1d03;
    }
    public function initializeProxy() : bool
    {
        return $this->initializerd1d03 && ($this->initializerd1d03->__invoke($valueHolder70f2b, $this, 'initializeProxy', array(), $this->initializerd1d03) || 1) && $this->valueHolder70f2b = $valueHolder70f2b;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder70f2b;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder70f2b;
    }
}

if (!\class_exists('TrustedDeviceTokenStorage_fc7b3c4', false)) {
    \class_alias(__NAMESPACE__.'\\TrustedDeviceTokenStorage_fc7b3c4', 'TrustedDeviceTokenStorage_fc7b3c4', false);
}
