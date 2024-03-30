<?php

namespace Symfony\Config\Sentry;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help in creating a config.
 */
class MessengerConfig 
{
    private $enabled;
    private $captureSoftFails;
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
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function captureSoftFails($value): self
    {
        $this->_usedProperties['captureSoftFails'] = true;
        $this->captureSoftFails = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }
    
        if (array_key_exists('capture_soft_fails', $value)) {
            $this->_usedProperties['captureSoftFails'] = true;
            $this->captureSoftFails = $value['capture_soft_fails'];
            unset($value['capture_soft_fails']);
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
        if (isset($this->_usedProperties['captureSoftFails'])) {
            $output['capture_soft_fails'] = $this->captureSoftFails;
        }
    
        return $output;
    }

}
