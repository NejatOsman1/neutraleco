<?php

namespace Symfony\Config\Sentry;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help in creating a config.
 */
class ListenerPrioritiesConfig 
{
    private $request;
    private $subRequest;
    private $console;
    private $requestError;
    private $consoleError;
    private $workerError;
    private $_usedProperties = [];
    
    /**
     * @default 1
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function request($value): self
    {
        $this->_usedProperties['request'] = true;
        $this->request = $value;
    
        return $this;
    }
    
    /**
     * @default 1
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function subRequest($value): self
    {
        $this->_usedProperties['subRequest'] = true;
        $this->subRequest = $value;
    
        return $this;
    }
    
    /**
     * @default 1
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function console($value): self
    {
        $this->_usedProperties['console'] = true;
        $this->console = $value;
    
        return $this;
    }
    
    /**
     * @default 128
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function requestError($value): self
    {
        $this->_usedProperties['requestError'] = true;
        $this->requestError = $value;
    
        return $this;
    }
    
    /**
     * @default 128
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function consoleError($value): self
    {
        $this->_usedProperties['consoleError'] = true;
        $this->consoleError = $value;
    
        return $this;
    }
    
    /**
     * @default 99
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function workerError($value): self
    {
        $this->_usedProperties['workerError'] = true;
        $this->workerError = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (array_key_exists('request', $value)) {
            $this->_usedProperties['request'] = true;
            $this->request = $value['request'];
            unset($value['request']);
        }
    
        if (array_key_exists('sub_request', $value)) {
            $this->_usedProperties['subRequest'] = true;
            $this->subRequest = $value['sub_request'];
            unset($value['sub_request']);
        }
    
        if (array_key_exists('console', $value)) {
            $this->_usedProperties['console'] = true;
            $this->console = $value['console'];
            unset($value['console']);
        }
    
        if (array_key_exists('request_error', $value)) {
            $this->_usedProperties['requestError'] = true;
            $this->requestError = $value['request_error'];
            unset($value['request_error']);
        }
    
        if (array_key_exists('console_error', $value)) {
            $this->_usedProperties['consoleError'] = true;
            $this->consoleError = $value['console_error'];
            unset($value['console_error']);
        }
    
        if (array_key_exists('worker_error', $value)) {
            $this->_usedProperties['workerError'] = true;
            $this->workerError = $value['worker_error'];
            unset($value['worker_error']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['request'])) {
            $output['request'] = $this->request;
        }
        if (isset($this->_usedProperties['subRequest'])) {
            $output['sub_request'] = $this->subRequest;
        }
        if (isset($this->_usedProperties['console'])) {
            $output['console'] = $this->console;
        }
        if (isset($this->_usedProperties['requestError'])) {
            $output['request_error'] = $this->requestError;
        }
        if (isset($this->_usedProperties['consoleError'])) {
            $output['console_error'] = $this->consoleError;
        }
        if (isset($this->_usedProperties['workerError'])) {
            $output['worker_error'] = $this->workerError;
        }
    
        return $output;
    }

}
