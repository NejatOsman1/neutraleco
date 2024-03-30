<?php

namespace Symfony\Config\Sentry;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Monolog'.\DIRECTORY_SEPARATOR.'ErrorHandlerConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help in creating a config.
 */
class MonologConfig 
{
    private $errorHandler;
    private $_usedProperties = [];
    
    public function errorHandler(array $value = []): \Symfony\Config\Sentry\Monolog\ErrorHandlerConfig
    {
        if (null === $this->errorHandler) {
            $this->_usedProperties['errorHandler'] = true;
            $this->errorHandler = new \Symfony\Config\Sentry\Monolog\ErrorHandlerConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "errorHandler()" has already been initialized. You cannot pass values the second time you call errorHandler().');
        }
    
        return $this->errorHandler;
    }
    
    public function __construct(array $value = [])
    {
    
        if (array_key_exists('error_handler', $value)) {
            $this->_usedProperties['errorHandler'] = true;
            $this->errorHandler = new \Symfony\Config\Sentry\Monolog\ErrorHandlerConfig($value['error_handler']);
            unset($value['error_handler']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['errorHandler'])) {
            $output['error_handler'] = $this->errorHandler->toArray();
        }
    
        return $output;
    }

}
