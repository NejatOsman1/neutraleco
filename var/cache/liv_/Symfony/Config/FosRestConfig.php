<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'FosRest'.\DIRECTORY_SEPARATOR.'ParamFetcherListenerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosRest'.\DIRECTORY_SEPARATOR.'AllowedMethodsListenerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosRest'.\DIRECTORY_SEPARATOR.'BodyConverterConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosRest'.\DIRECTORY_SEPARATOR.'ServiceConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosRest'.\DIRECTORY_SEPARATOR.'SerializerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosRest'.\DIRECTORY_SEPARATOR.'ZoneConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosRest'.\DIRECTORY_SEPARATOR.'ViewConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosRest'.\DIRECTORY_SEPARATOR.'ExceptionConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosRest'.\DIRECTORY_SEPARATOR.'BodyListenerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosRest'.\DIRECTORY_SEPARATOR.'FormatListenerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosRest'.\DIRECTORY_SEPARATOR.'VersioningConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help in creating a config.
 */
class FosRestConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $disableCsrfRole;
    private $unauthorizedChallenge;
    private $paramFetcherListener;
    private $cacheDir;
    private $allowedMethodsListener;
    private $routingLoader;
    private $bodyConverter;
    private $service;
    private $serializer;
    private $zone;
    private $view;
    private $exception;
    private $bodyListener;
    private $formatListener;
    private $versioning;
    private $_usedProperties = [];
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function disableCsrfRole($value): self
    {
        $this->_usedProperties['disableCsrfRole'] = true;
        $this->disableCsrfRole = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function unauthorizedChallenge($value): self
    {
        $this->_usedProperties['unauthorizedChallenge'] = true;
        $this->unauthorizedChallenge = $value;
    
        return $this;
    }
    
    public function paramFetcherListener(array $value = []): \Symfony\Config\FosRest\ParamFetcherListenerConfig
    {
        if (null === $this->paramFetcherListener) {
            $this->_usedProperties['paramFetcherListener'] = true;
            $this->paramFetcherListener = new \Symfony\Config\FosRest\ParamFetcherListenerConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "paramFetcherListener()" has already been initialized. You cannot pass values the second time you call paramFetcherListener().');
        }
    
        return $this->paramFetcherListener;
    }
    
    /**
     * @default '%kernel.cache_dir%/fos_rest'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cacheDir($value): self
    {
        $this->_usedProperties['cacheDir'] = true;
        $this->cacheDir = $value;
    
        return $this;
    }
    
    public function allowedMethodsListener(array $value = []): \Symfony\Config\FosRest\AllowedMethodsListenerConfig
    {
        if (null === $this->allowedMethodsListener) {
            $this->_usedProperties['allowedMethodsListener'] = true;
            $this->allowedMethodsListener = new \Symfony\Config\FosRest\AllowedMethodsListenerConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "allowedMethodsListener()" has already been initialized. You cannot pass values the second time you call allowedMethodsListener().');
        }
    
        return $this->allowedMethodsListener;
    }
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function routingLoader($value): self
    {
        $this->_usedProperties['routingLoader'] = true;
        $this->routingLoader = $value;
    
        return $this;
    }
    
    public function bodyConverter(array $value = []): \Symfony\Config\FosRest\BodyConverterConfig
    {
        if (null === $this->bodyConverter) {
            $this->_usedProperties['bodyConverter'] = true;
            $this->bodyConverter = new \Symfony\Config\FosRest\BodyConverterConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "bodyConverter()" has already been initialized. You cannot pass values the second time you call bodyConverter().');
        }
    
        return $this->bodyConverter;
    }
    
    public function service(array $value = []): \Symfony\Config\FosRest\ServiceConfig
    {
        if (null === $this->service) {
            $this->_usedProperties['service'] = true;
            $this->service = new \Symfony\Config\FosRest\ServiceConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "service()" has already been initialized. You cannot pass values the second time you call service().');
        }
    
        return $this->service;
    }
    
    public function serializer(array $value = []): \Symfony\Config\FosRest\SerializerConfig
    {
        if (null === $this->serializer) {
            $this->_usedProperties['serializer'] = true;
            $this->serializer = new \Symfony\Config\FosRest\SerializerConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "serializer()" has already been initialized. You cannot pass values the second time you call serializer().');
        }
    
        return $this->serializer;
    }
    
    public function zone(array $value = []): \Symfony\Config\FosRest\ZoneConfig
    {
        $this->_usedProperties['zone'] = true;
    
        return $this->zone[] = new \Symfony\Config\FosRest\ZoneConfig($value);
    }
    
    public function view(array $value = []): \Symfony\Config\FosRest\ViewConfig
    {
        if (null === $this->view) {
            $this->_usedProperties['view'] = true;
            $this->view = new \Symfony\Config\FosRest\ViewConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "view()" has already been initialized. You cannot pass values the second time you call view().');
        }
    
        return $this->view;
    }
    
    public function exception(array $value = []): \Symfony\Config\FosRest\ExceptionConfig
    {
        if (null === $this->exception) {
            $this->_usedProperties['exception'] = true;
            $this->exception = new \Symfony\Config\FosRest\ExceptionConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "exception()" has already been initialized. You cannot pass values the second time you call exception().');
        }
    
        return $this->exception;
    }
    
    public function bodyListener(array $value = []): \Symfony\Config\FosRest\BodyListenerConfig
    {
        if (null === $this->bodyListener) {
            $this->_usedProperties['bodyListener'] = true;
            $this->bodyListener = new \Symfony\Config\FosRest\BodyListenerConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "bodyListener()" has already been initialized. You cannot pass values the second time you call bodyListener().');
        }
    
        return $this->bodyListener;
    }
    
    public function formatListener(array $value = []): \Symfony\Config\FosRest\FormatListenerConfig
    {
        if (null === $this->formatListener) {
            $this->_usedProperties['formatListener'] = true;
            $this->formatListener = new \Symfony\Config\FosRest\FormatListenerConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "formatListener()" has already been initialized. You cannot pass values the second time you call formatListener().');
        }
    
        return $this->formatListener;
    }
    
    public function versioning(array $value = []): \Symfony\Config\FosRest\VersioningConfig
    {
        if (null === $this->versioning) {
            $this->_usedProperties['versioning'] = true;
            $this->versioning = new \Symfony\Config\FosRest\VersioningConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "versioning()" has already been initialized. You cannot pass values the second time you call versioning().');
        }
    
        return $this->versioning;
    }
    
    public function getExtensionAlias(): string
    {
        return 'fos_rest';
    }
    
    public function __construct(array $value = [])
    {
    
        if (array_key_exists('disable_csrf_role', $value)) {
            $this->_usedProperties['disableCsrfRole'] = true;
            $this->disableCsrfRole = $value['disable_csrf_role'];
            unset($value['disable_csrf_role']);
        }
    
        if (array_key_exists('unauthorized_challenge', $value)) {
            $this->_usedProperties['unauthorizedChallenge'] = true;
            $this->unauthorizedChallenge = $value['unauthorized_challenge'];
            unset($value['unauthorized_challenge']);
        }
    
        if (array_key_exists('param_fetcher_listener', $value)) {
            $this->_usedProperties['paramFetcherListener'] = true;
            $this->paramFetcherListener = new \Symfony\Config\FosRest\ParamFetcherListenerConfig($value['param_fetcher_listener']);
            unset($value['param_fetcher_listener']);
        }
    
        if (array_key_exists('cache_dir', $value)) {
            $this->_usedProperties['cacheDir'] = true;
            $this->cacheDir = $value['cache_dir'];
            unset($value['cache_dir']);
        }
    
        if (array_key_exists('allowed_methods_listener', $value)) {
            $this->_usedProperties['allowedMethodsListener'] = true;
            $this->allowedMethodsListener = new \Symfony\Config\FosRest\AllowedMethodsListenerConfig($value['allowed_methods_listener']);
            unset($value['allowed_methods_listener']);
        }
    
        if (array_key_exists('routing_loader', $value)) {
            $this->_usedProperties['routingLoader'] = true;
            $this->routingLoader = $value['routing_loader'];
            unset($value['routing_loader']);
        }
    
        if (array_key_exists('body_converter', $value)) {
            $this->_usedProperties['bodyConverter'] = true;
            $this->bodyConverter = new \Symfony\Config\FosRest\BodyConverterConfig($value['body_converter']);
            unset($value['body_converter']);
        }
    
        if (array_key_exists('service', $value)) {
            $this->_usedProperties['service'] = true;
            $this->service = new \Symfony\Config\FosRest\ServiceConfig($value['service']);
            unset($value['service']);
        }
    
        if (array_key_exists('serializer', $value)) {
            $this->_usedProperties['serializer'] = true;
            $this->serializer = new \Symfony\Config\FosRest\SerializerConfig($value['serializer']);
            unset($value['serializer']);
        }
    
        if (array_key_exists('zone', $value)) {
            $this->_usedProperties['zone'] = true;
            $this->zone = array_map(function ($v) { return new \Symfony\Config\FosRest\ZoneConfig($v); }, $value['zone']);
            unset($value['zone']);
        }
    
        if (array_key_exists('view', $value)) {
            $this->_usedProperties['view'] = true;
            $this->view = new \Symfony\Config\FosRest\ViewConfig($value['view']);
            unset($value['view']);
        }
    
        if (array_key_exists('exception', $value)) {
            $this->_usedProperties['exception'] = true;
            $this->exception = new \Symfony\Config\FosRest\ExceptionConfig($value['exception']);
            unset($value['exception']);
        }
    
        if (array_key_exists('body_listener', $value)) {
            $this->_usedProperties['bodyListener'] = true;
            $this->bodyListener = new \Symfony\Config\FosRest\BodyListenerConfig($value['body_listener']);
            unset($value['body_listener']);
        }
    
        if (array_key_exists('format_listener', $value)) {
            $this->_usedProperties['formatListener'] = true;
            $this->formatListener = new \Symfony\Config\FosRest\FormatListenerConfig($value['format_listener']);
            unset($value['format_listener']);
        }
    
        if (array_key_exists('versioning', $value)) {
            $this->_usedProperties['versioning'] = true;
            $this->versioning = new \Symfony\Config\FosRest\VersioningConfig($value['versioning']);
            unset($value['versioning']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['disableCsrfRole'])) {
            $output['disable_csrf_role'] = $this->disableCsrfRole;
        }
        if (isset($this->_usedProperties['unauthorizedChallenge'])) {
            $output['unauthorized_challenge'] = $this->unauthorizedChallenge;
        }
        if (isset($this->_usedProperties['paramFetcherListener'])) {
            $output['param_fetcher_listener'] = $this->paramFetcherListener->toArray();
        }
        if (isset($this->_usedProperties['cacheDir'])) {
            $output['cache_dir'] = $this->cacheDir;
        }
        if (isset($this->_usedProperties['allowedMethodsListener'])) {
            $output['allowed_methods_listener'] = $this->allowedMethodsListener->toArray();
        }
        if (isset($this->_usedProperties['routingLoader'])) {
            $output['routing_loader'] = $this->routingLoader;
        }
        if (isset($this->_usedProperties['bodyConverter'])) {
            $output['body_converter'] = $this->bodyConverter->toArray();
        }
        if (isset($this->_usedProperties['service'])) {
            $output['service'] = $this->service->toArray();
        }
        if (isset($this->_usedProperties['serializer'])) {
            $output['serializer'] = $this->serializer->toArray();
        }
        if (isset($this->_usedProperties['zone'])) {
            $output['zone'] = array_map(function ($v) { return $v->toArray(); }, $this->zone);
        }
        if (isset($this->_usedProperties['view'])) {
            $output['view'] = $this->view->toArray();
        }
        if (isset($this->_usedProperties['exception'])) {
            $output['exception'] = $this->exception->toArray();
        }
        if (isset($this->_usedProperties['bodyListener'])) {
            $output['body_listener'] = $this->bodyListener->toArray();
        }
        if (isset($this->_usedProperties['formatListener'])) {
            $output['format_listener'] = $this->formatListener->toArray();
        }
        if (isset($this->_usedProperties['versioning'])) {
            $output['versioning'] = $this->versioning->toArray();
        }
    
        return $output;
    }

}
