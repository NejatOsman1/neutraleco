<?php

namespace Symfony\Config\Sentry\Monolog;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help in creating a config.
 */
class ErrorHandlerConfig 
{
    private $enabled;
    private $level;
    private $bubble;
    private $_usedProperties = [];
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): self
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;
    
        return $this;
    }
    
    /**
     * @default 'DEBUG'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function level($value): self
    {
        $this->_usedProperties['level'] = true;
        $this->level = $value;
    
        return $this;
    }
    
    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function bubble($value): self
    {
        $this->_usedProperties['bubble'] = true;
        $this->bubble = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }
    
        if (array_key_exists('level', $value)) {
            $this->_usedProperties['level'] = true;
            $this->level = $value['level'];
            unset($value['level']);
        }
    
        if (array_key_exists('bubble', $value)) {
            $this->_usedProperties['bubble'] = true;
            $this->bubble = $value['bubble'];
            unset($value['bubble']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['level'])) {
            $output['level'] = $this->level;
        }
        if (isset($this->_usedProperties['bubble'])) {
            $output['bubble'] = $this->bubble;
        }
    
        return $output;
    }

}
