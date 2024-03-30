<?php

namespace Container3bFgSHx;

include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Model/PersisterInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Model/Persister/DoctrinePersister.php';

class DoctrinePersister_a694024 extends \Scheb\TwoFactorBundle\Model\Persister\DoctrinePersister implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Scheb\TwoFactorBundle\Model\Persister\DoctrinePersister|null wrapped object, if the proxy is initialized
     */
    private $valueHolder22c74 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerfafd3 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties1a98c = [
        
    ];

    public function persist($user) : void
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'persist', array('user' => $user), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $this->valueHolder22c74->persist($user);
return;
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

        \Closure::bind(function (\Scheb\TwoFactorBundle\Model\Persister\DoctrinePersister $instance) {
            unset($instance->om);
        }, $instance, 'Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister')->__invoke($instance);

        $instance->initializerfafd3 = $initializer;

        return $instance;
    }

    public function __construct($om)
    {
        static $reflection;

        if (! $this->valueHolder22c74) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister');
            $this->valueHolder22c74 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Model\Persister\DoctrinePersister $instance) {
            unset($instance->om);
        }, $this, 'Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister')->__invoke($this);

        }

        $this->valueHolder22c74->__construct($om);
    }

    public function & __get($name)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__get', ['name' => $name], $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        if (isset(self::$publicProperties1a98c[$name])) {
            return $this->valueHolder22c74->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

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

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__isset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__unset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__clone', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $this->valueHolder22c74 = clone $this->valueHolder22c74;
    }

    public function __sleep()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__sleep', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return array('valueHolder22c74');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Model\Persister\DoctrinePersister $instance) {
            unset($instance->om);
        }, $this, 'Scheb\\TwoFactorBundle\\Model\\Persister\\DoctrinePersister')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerfafd3 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerfafd3;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'initializeProxy', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder22c74;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder22c74;
    }
}

if (!\class_exists('DoctrinePersister_a694024', false)) {
    \class_alias(__NAMESPACE__.'\\DoctrinePersister_a694024', 'DoctrinePersister_a694024', false);
}
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Provider/TwoFactorFormRendererInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Provider/DefaultTwoFactorFormRenderer.php';

class DefaultTwoFactorFormRenderer_892ae3f extends \Scheb\TwoFactorBundle\Security\TwoFactor\Provider\DefaultTwoFactorFormRenderer implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Scheb\TwoFactorBundle\Security\TwoFactor\Provider\DefaultTwoFactorFormRenderer|null wrapped object, if the proxy is initialized
     */
    private $valueHolder22c74 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerfafd3 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties1a98c = [
        
    ];

    public function renderForm(\Symfony\Component\HttpFoundation\Request $request, array $templateVars) : \Symfony\Component\HttpFoundation\Response
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'renderForm', array('request' => $request, 'templateVars' => $templateVars), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->renderForm($request, $templateVars);
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

        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Provider\DefaultTwoFactorFormRenderer $instance) {
            unset($instance->twigEnvironment, $instance->template, $instance->templateVars);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer')->__invoke($instance);

        $instance->initializerfafd3 = $initializer;

        return $instance;
    }

    public function __construct(\Twig\Environment $twigRenderer, string $template, array $templateVars = [])
    {
        static $reflection;

        if (! $this->valueHolder22c74) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer');
            $this->valueHolder22c74 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Provider\DefaultTwoFactorFormRenderer $instance) {
            unset($instance->twigEnvironment, $instance->template, $instance->templateVars);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer')->__invoke($this);

        }

        $this->valueHolder22c74->__construct($twigRenderer, $template, $templateVars);
    }

    public function & __get($name)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__get', ['name' => $name], $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        if (isset(self::$publicProperties1a98c[$name])) {
            return $this->valueHolder22c74->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

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

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__isset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__unset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__clone', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $this->valueHolder22c74 = clone $this->valueHolder22c74;
    }

    public function __sleep()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__sleep', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return array('valueHolder22c74');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Provider\DefaultTwoFactorFormRenderer $instance) {
            unset($instance->twigEnvironment, $instance->template, $instance->templateVars);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Provider\\DefaultTwoFactorFormRenderer')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerfafd3 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerfafd3;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'initializeProxy', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder22c74;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder22c74;
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
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder22c74 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerfafd3 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties1a98c = [
        
    ];

    public function getConnection()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'getConnection', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'getMetadataFactory', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'getExpressionBuilder', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'beginTransaction', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->beginTransaction();
    }

    public function getCache()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'getCache', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->getCache();
    }

    public function transactional($func)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'transactional', array('func' => $func), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'wrapInTransaction', array('func' => $func), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'commit', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->commit();
    }

    public function rollback()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'rollback', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'getClassMetadata', array('className' => $className), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'createQuery', array('dql' => $dql), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'createNamedQuery', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'createQueryBuilder', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'flush', array('entity' => $entity), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'clear', array('entityName' => $entityName), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->clear($entityName);
    }

    public function close()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'close', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->close();
    }

    public function persist($entity)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'persist', array('entity' => $entity), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'remove', array('entity' => $entity), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'refresh', array('entity' => $entity), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'detach', array('entity' => $entity), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'merge', array('entity' => $entity), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'getRepository', array('entityName' => $entityName), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'contains', array('entity' => $entity), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'getEventManager', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'getConfiguration', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'isOpen', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'getUnitOfWork', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'getProxyFactory', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'initializeObject', array('obj' => $obj), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'getFilters', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'isFiltersStateClean', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'hasFilters', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->hasFilters();
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

        $instance->initializerfafd3 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder22c74) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder22c74 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder22c74->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__get', ['name' => $name], $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        if (isset(self::$publicProperties1a98c[$name])) {
            return $this->valueHolder22c74->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

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

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__isset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__unset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__clone', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $this->valueHolder22c74 = clone $this->valueHolder22c74;
    }

    public function __sleep()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__sleep', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return array('valueHolder22c74');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerfafd3 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerfafd3;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'initializeProxy', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder22c74;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder22c74;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Handler/AuthenticationHandlerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Handler/AuthenticatedTokenHandler.php';

class AuthenticatedTokenHandler_e3677d3 extends \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticatedTokenHandler implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticatedTokenHandler|null wrapped object, if the proxy is initialized
     */
    private $valueHolder22c74 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerfafd3 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties1a98c = [
        
    ];

    public function beginTwoFactorAuthentication(\Scheb\TwoFactorBundle\Security\TwoFactor\AuthenticationContextInterface $context) : \Symfony\Component\Security\Core\Authentication\Token\TokenInterface
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'beginTwoFactorAuthentication', array('context' => $context), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->beginTwoFactorAuthentication($context);
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

        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticatedTokenHandler $instance) {
            unset($instance->authenticationHandler, $instance->supportedTokens);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler')->__invoke($instance);

        $instance->initializerfafd3 = $initializer;

        return $instance;
    }

    public function __construct(\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticationHandlerInterface $authenticationHandler, array $supportedTokens)
    {
        static $reflection;

        if (! $this->valueHolder22c74) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler');
            $this->valueHolder22c74 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticatedTokenHandler $instance) {
            unset($instance->authenticationHandler, $instance->supportedTokens);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler')->__invoke($this);

        }

        $this->valueHolder22c74->__construct($authenticationHandler, $supportedTokens);
    }

    public function & __get($name)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__get', ['name' => $name], $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        if (isset(self::$publicProperties1a98c[$name])) {
            return $this->valueHolder22c74->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

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

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__isset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__unset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__clone', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $this->valueHolder22c74 = clone $this->valueHolder22c74;
    }

    public function __sleep()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__sleep', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return array('valueHolder22c74');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticatedTokenHandler $instance) {
            unset($instance->authenticationHandler, $instance->supportedTokens);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\AuthenticatedTokenHandler')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerfafd3 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerfafd3;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'initializeProxy', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder22c74;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder22c74;
    }
}

if (!\class_exists('AuthenticatedTokenHandler_e3677d3', false)) {
    \class_alias(__NAMESPACE__.'\\AuthenticatedTokenHandler_e3677d3', 'AuthenticatedTokenHandler_e3677d3', false);
}
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Handler/ConditionAuthenticationHandler.php';

class ConditionAuthenticationHandler_a1ee12f extends \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\ConditionAuthenticationHandler implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\ConditionAuthenticationHandler|null wrapped object, if the proxy is initialized
     */
    private $valueHolder22c74 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerfafd3 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties1a98c = [
        
    ];

    public function beginTwoFactorAuthentication(\Scheb\TwoFactorBundle\Security\TwoFactor\AuthenticationContextInterface $context) : \Symfony\Component\Security\Core\Authentication\Token\TokenInterface
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'beginTwoFactorAuthentication', array('context' => $context), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->beginTwoFactorAuthentication($context);
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

        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\ConditionAuthenticationHandler $instance) {
            unset($instance->authenticationHandler, $instance->condition);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler')->__invoke($instance);

        $instance->initializerfafd3 = $initializer;

        return $instance;
    }

    public function __construct(\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticationHandlerInterface $authenticationHandler, \Scheb\TwoFactorBundle\Security\TwoFactor\Condition\TwoFactorConditionInterface $condition)
    {
        static $reflection;

        if (! $this->valueHolder22c74) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler');
            $this->valueHolder22c74 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\ConditionAuthenticationHandler $instance) {
            unset($instance->authenticationHandler, $instance->condition);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler')->__invoke($this);

        }

        $this->valueHolder22c74->__construct($authenticationHandler, $condition);
    }

    public function & __get($name)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__get', ['name' => $name], $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        if (isset(self::$publicProperties1a98c[$name])) {
            return $this->valueHolder22c74->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

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

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__isset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__unset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__clone', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $this->valueHolder22c74 = clone $this->valueHolder22c74;
    }

    public function __sleep()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__sleep', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return array('valueHolder22c74');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\ConditionAuthenticationHandler $instance) {
            unset($instance->authenticationHandler, $instance->condition);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\ConditionAuthenticationHandler')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerfafd3 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerfafd3;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'initializeProxy', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder22c74;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder22c74;
    }
}

if (!\class_exists('ConditionAuthenticationHandler_a1ee12f', false)) {
    \class_alias(__NAMESPACE__.'\\ConditionAuthenticationHandler_a1ee12f', 'ConditionAuthenticationHandler_a1ee12f', false);
}
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Handler/IpWhitelistHandler.php';

class IpWhitelistHandler_06fe2b0 extends \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\IpWhitelistHandler implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\IpWhitelistHandler|null wrapped object, if the proxy is initialized
     */
    private $valueHolder22c74 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerfafd3 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties1a98c = [
        
    ];

    public function beginTwoFactorAuthentication(\Scheb\TwoFactorBundle\Security\TwoFactor\AuthenticationContextInterface $context) : \Symfony\Component\Security\Core\Authentication\Token\TokenInterface
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'beginTwoFactorAuthentication', array('context' => $context), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->beginTwoFactorAuthentication($context);
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

        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\IpWhitelistHandler $instance) {
            unset($instance->authenticationHandler, $instance->ipWhitelistProvider);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler')->__invoke($instance);

        $instance->initializerfafd3 = $initializer;

        return $instance;
    }

    public function __construct(\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticationHandlerInterface $authenticationHandler, \Scheb\TwoFactorBundle\Security\TwoFactor\IpWhitelist\IpWhitelistProviderInterface $ipWhitelistProvider)
    {
        static $reflection;

        if (! $this->valueHolder22c74) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler');
            $this->valueHolder22c74 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\IpWhitelistHandler $instance) {
            unset($instance->authenticationHandler, $instance->ipWhitelistProvider);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler')->__invoke($this);

        }

        $this->valueHolder22c74->__construct($authenticationHandler, $ipWhitelistProvider);
    }

    public function & __get($name)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__get', ['name' => $name], $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        if (isset(self::$publicProperties1a98c[$name])) {
            return $this->valueHolder22c74->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

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

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__isset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__unset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__clone', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $this->valueHolder22c74 = clone $this->valueHolder22c74;
    }

    public function __sleep()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__sleep', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return array('valueHolder22c74');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\IpWhitelistHandler $instance) {
            unset($instance->authenticationHandler, $instance->ipWhitelistProvider);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\IpWhitelistHandler')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerfafd3 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerfafd3;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'initializeProxy', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder22c74;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder22c74;
    }
}

if (!\class_exists('IpWhitelistHandler_06fe2b0', false)) {
    \class_alias(__NAMESPACE__.'\\IpWhitelistHandler_06fe2b0', 'IpWhitelistHandler_06fe2b0', false);
}
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Handler/TwoFactorProviderHandler.php';

class TwoFactorProviderHandler_3ecff6c extends \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TwoFactorProviderHandler implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TwoFactorProviderHandler|null wrapped object, if the proxy is initialized
     */
    private $valueHolder22c74 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerfafd3 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties1a98c = [
        
    ];

    public function beginTwoFactorAuthentication(\Scheb\TwoFactorBundle\Security\TwoFactor\AuthenticationContextInterface $context) : \Symfony\Component\Security\Core\Authentication\Token\TokenInterface
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'beginTwoFactorAuthentication', array('context' => $context), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->beginTwoFactorAuthentication($context);
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

        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TwoFactorProviderHandler $instance) {
            unset($instance->providerRegistry, $instance->twoFactorTokenFactory);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler')->__invoke($instance);

        $instance->initializerfafd3 = $initializer;

        return $instance;
    }

    public function __construct(\Scheb\TwoFactorBundle\Security\TwoFactor\Provider\TwoFactorProviderRegistry $providerRegistry, \Scheb\TwoFactorBundle\Security\Authentication\Token\TwoFactorTokenFactoryInterface $twoFactorTokenFactory)
    {
        static $reflection;

        if (! $this->valueHolder22c74) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler');
            $this->valueHolder22c74 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TwoFactorProviderHandler $instance) {
            unset($instance->providerRegistry, $instance->twoFactorTokenFactory);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler')->__invoke($this);

        }

        $this->valueHolder22c74->__construct($providerRegistry, $twoFactorTokenFactory);
    }

    public function & __get($name)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__get', ['name' => $name], $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        if (isset(self::$publicProperties1a98c[$name])) {
            return $this->valueHolder22c74->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

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

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__isset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__unset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__clone', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $this->valueHolder22c74 = clone $this->valueHolder22c74;
    }

    public function __sleep()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__sleep', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return array('valueHolder22c74');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TwoFactorProviderHandler $instance) {
            unset($instance->providerRegistry, $instance->twoFactorTokenFactory);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TwoFactorProviderHandler')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerfafd3 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerfafd3;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'initializeProxy', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder22c74;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder22c74;
    }
}

if (!\class_exists('TwoFactorProviderHandler_3ecff6c', false)) {
    \class_alias(__NAMESPACE__.'\\TwoFactorProviderHandler_3ecff6c', 'TwoFactorProviderHandler_3ecff6c', false);
}
include_once \dirname(__DIR__, 4).'/vendor/symfony/event-dispatcher/EventSubscriberInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-trusted-device/Security/TwoFactor/Trusted/TrustedCookieResponseListener.php';

class TrustedCookieResponseListener_c7f9b85 extends \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedCookieResponseListener implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedCookieResponseListener|null wrapped object, if the proxy is initialized
     */
    private $valueHolder22c74 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerfafd3 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties1a98c = [
        
    ];

    public function onKernelResponse(\Symfony\Component\HttpKernel\Event\ResponseEvent $event) : void
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'onKernelResponse', array('event' => $event), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $this->valueHolder22c74->onKernelResponse($event);
return;
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

        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedCookieResponseListener $instance) {
            unset($instance->trustedTokenStorage, $instance->trustedTokenLifetime, $instance->cookieName, $instance->cookieSecure, $instance->cookieSameSite, $instance->cookiePath, $instance->cookieDomain);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener')->__invoke($instance);

        $instance->initializerfafd3 = $initializer;

        return $instance;
    }

    public function __construct(\Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage $trustedTokenStorage, int $trustedTokenLifetime, string $cookieName, ?bool $cookieSecure, ?string $cookieSameSite, ?string $cookiePath, ?string $cookieDomain)
    {
        static $reflection;

        if (! $this->valueHolder22c74) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener');
            $this->valueHolder22c74 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedCookieResponseListener $instance) {
            unset($instance->trustedTokenStorage, $instance->trustedTokenLifetime, $instance->cookieName, $instance->cookieSecure, $instance->cookieSameSite, $instance->cookiePath, $instance->cookieDomain);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener')->__invoke($this);

        }

        $this->valueHolder22c74->__construct($trustedTokenStorage, $trustedTokenLifetime, $cookieName, $cookieSecure, $cookieSameSite, $cookiePath, $cookieDomain);
    }

    public function & __get($name)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__get', ['name' => $name], $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        if (isset(self::$publicProperties1a98c[$name])) {
            return $this->valueHolder22c74->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

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

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__isset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__unset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__clone', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $this->valueHolder22c74 = clone $this->valueHolder22c74;
    }

    public function __sleep()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__sleep', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return array('valueHolder22c74');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedCookieResponseListener $instance) {
            unset($instance->trustedTokenStorage, $instance->trustedTokenLifetime, $instance->cookieName, $instance->cookieSecure, $instance->cookieSameSite, $instance->cookiePath, $instance->cookieDomain);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedCookieResponseListener')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerfafd3 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerfafd3;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'initializeProxy', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder22c74;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder22c74;
    }
}

if (!\class_exists('TrustedCookieResponseListener_c7f9b85', false)) {
    \class_alias(__NAMESPACE__.'\\TrustedCookieResponseListener_c7f9b85', 'TrustedCookieResponseListener_c7f9b85', false);
}
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-trusted-device/Security/TwoFactor/Handler/TrustedDeviceHandler.php';

class TrustedDeviceHandler_d0544bf extends \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TrustedDeviceHandler implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TrustedDeviceHandler|null wrapped object, if the proxy is initialized
     */
    private $valueHolder22c74 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerfafd3 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties1a98c = [
        
    ];

    public function beginTwoFactorAuthentication(\Scheb\TwoFactorBundle\Security\TwoFactor\AuthenticationContextInterface $context) : \Symfony\Component\Security\Core\Authentication\Token\TokenInterface
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'beginTwoFactorAuthentication', array('context' => $context), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->beginTwoFactorAuthentication($context);
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

        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TrustedDeviceHandler $instance) {
            unset($instance->authenticationHandler, $instance->trustedDeviceManager, $instance->extendTrustedToken);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler')->__invoke($instance);

        $instance->initializerfafd3 = $initializer;

        return $instance;
    }

    public function __construct(\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\AuthenticationHandlerInterface $authenticationHandler, \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceManagerInterface $trustedDeviceManager, bool $extendTrustedToken)
    {
        static $reflection;

        if (! $this->valueHolder22c74) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler');
            $this->valueHolder22c74 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TrustedDeviceHandler $instance) {
            unset($instance->authenticationHandler, $instance->trustedDeviceManager, $instance->extendTrustedToken);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler')->__invoke($this);

        }

        $this->valueHolder22c74->__construct($authenticationHandler, $trustedDeviceManager, $extendTrustedToken);
    }

    public function & __get($name)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__get', ['name' => $name], $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        if (isset(self::$publicProperties1a98c[$name])) {
            return $this->valueHolder22c74->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

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

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__isset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__unset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__clone', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $this->valueHolder22c74 = clone $this->valueHolder22c74;
    }

    public function __sleep()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__sleep', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return array('valueHolder22c74');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Handler\TrustedDeviceHandler $instance) {
            unset($instance->authenticationHandler, $instance->trustedDeviceManager, $instance->extendTrustedToken);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Handler\\TrustedDeviceHandler')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerfafd3 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerfafd3;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'initializeProxy', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder22c74;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder22c74;
    }
}

if (!\class_exists('TrustedDeviceHandler_d0544bf', false)) {
    \class_alias(__NAMESPACE__.'\\TrustedDeviceHandler_d0544bf', 'TrustedDeviceHandler_d0544bf', false);
}
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-trusted-device/Security/TwoFactor/Trusted/TrustedDeviceTokenStorage.php';

class TrustedDeviceTokenStorage_fc7b3c4 extends \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage|null wrapped object, if the proxy is initialized
     */
    private $valueHolder22c74 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerfafd3 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties1a98c = [
        
    ];

    public function hasUpdatedCookie() : bool
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'hasUpdatedCookie', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->hasUpdatedCookie();
    }

    public function getCookieValue() : ?string
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'getCookieValue', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->getCookieValue();
    }

    public function hasTrustedToken(string $username, string $firewall, int $version) : bool
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'hasTrustedToken', array('username' => $username, 'firewall' => $firewall, 'version' => $version), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return $this->valueHolder22c74->hasTrustedToken($username, $firewall, $version);
    }

    public function addTrustedToken(string $username, string $firewall, int $version) : void
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'addTrustedToken', array('username' => $username, 'firewall' => $firewall, 'version' => $version), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $this->valueHolder22c74->addTrustedToken($username, $firewall, $version);
return;
    }

    public function clearTrustedToken(string $username, string $firewall) : void
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'clearTrustedToken', array('username' => $username, 'firewall' => $firewall), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $this->valueHolder22c74->clearTrustedToken($username, $firewall);
return;
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

        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage $instance) {
            unset($instance->requestStack, $instance->tokenGenerator, $instance->cookieName, $instance->trustedTokenList, $instance->updateCookie);
        }, $instance, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage')->__invoke($instance);

        $instance->initializerfafd3 = $initializer;

        return $instance;
    }

    public function __construct(\Symfony\Component\HttpFoundation\RequestStack $requestStack, \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenEncoder $tokenGenerator, string $cookieName)
    {
        static $reflection;

        if (! $this->valueHolder22c74) {
            $reflection = $reflection ?? new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage');
            $this->valueHolder22c74 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage $instance) {
            unset($instance->requestStack, $instance->tokenGenerator, $instance->cookieName, $instance->trustedTokenList, $instance->updateCookie);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage')->__invoke($this);

        }

        $this->valueHolder22c74->__construct($requestStack, $tokenGenerator, $cookieName);
    }

    public function & __get($name)
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__get', ['name' => $name], $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        if (isset(self::$publicProperties1a98c[$name])) {
            return $this->valueHolder22c74->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

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

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__isset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__unset', array('name' => $name), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $realInstanceReflection = new \ReflectionClass('Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder22c74;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder22c74;
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
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__clone', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        $this->valueHolder22c74 = clone $this->valueHolder22c74;
    }

    public function __sleep()
    {
        $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, '__sleep', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;

        return array('valueHolder22c74');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage $instance) {
            unset($instance->requestStack, $instance->tokenGenerator, $instance->cookieName, $instance->trustedTokenList, $instance->updateCookie);
        }, $this, 'Scheb\\TwoFactorBundle\\Security\\TwoFactor\\Trusted\\TrustedDeviceTokenStorage')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerfafd3 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerfafd3;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerfafd3 && ($this->initializerfafd3->__invoke($valueHolder22c74, $this, 'initializeProxy', array(), $this->initializerfafd3) || 1) && $this->valueHolder22c74 = $valueHolder22c74;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder22c74;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder22c74;
    }
}

if (!\class_exists('TrustedDeviceTokenStorage_fc7b3c4', false)) {
    \class_alias(__NAMESPACE__.'\\TrustedDeviceTokenStorage_fc7b3c4', 'TrustedDeviceTokenStorage_fc7b3c4', false);
}
