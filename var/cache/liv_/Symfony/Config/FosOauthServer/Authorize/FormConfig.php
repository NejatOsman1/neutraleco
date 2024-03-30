<?php

namespace Symfony\Config\FosOauthServer\Authorize;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help in creating a config.
 */
class FormConfig 
{
    private $type;
    private $handler;
    private $name;
    private $validationGroups;
    private $_usedProperties = [];
    
    /**
     * @default 'fos_oauth_server_authorize'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function type($value): self
    {
        $this->_usedProperties['type'] = true;
        $this->type = $value;
    
        return $this;
    }
    
    /**
     * @default 'fos_oauth_server.authorize.form.handler.default'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function handler($value): self
    {
        $this->_usedProperties['handler'] = true;
        $this->handler = $value;
    
        return $this;
    }
    
    /**
     * @default 'fos_oauth_server_authorize_form'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function name($value): self
    {
        $this->_usedProperties['name'] = true;
        $this->name = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function validationGroups($value): self
    {
        $this->_usedProperties['validationGroups'] = true;
        $this->validationGroups = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (array_key_exists('type', $value)) {
            $this->_usedProperties['type'] = true;
            $this->type = $value['type'];
            unset($value['type']);
        }
    
        if (array_key_exists('handler', $value)) {
            $this->_usedProperties['handler'] = true;
            $this->handler = $value['handler'];
            unset($value['handler']);
        }
    
        if (array_key_exists('name', $value)) {
            $this->_usedProperties['name'] = true;
            $this->name = $value['name'];
            unset($value['name']);
        }
    
        if (array_key_exists('validation_groups', $value)) {
            $this->_usedProperties['validationGroups'] = true;
            $this->validationGroups = $value['validation_groups'];
            unset($value['validation_groups']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['type'])) {
            $output['type'] = $this->type;
        }
        if (isset($this->_usedProperties['handler'])) {
            $output['handler'] = $this->handler;
        }
        if (isset($this->_usedProperties['name'])) {
            $output['name'] = $this->name;
        }
        if (isset($this->_usedProperties['validationGroups'])) {
            $output['validation_groups'] = $this->validationGroups;
        }
    
        return $output;
    }

}
