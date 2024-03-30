<?php

namespace Symfony\Config\FosOauthServer;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Authorize'.\DIRECTORY_SEPARATOR.'FormConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help in creating a config.
 */
class AuthorizeConfig 
{
    private $form;
    private $_usedProperties = [];
    
    public function form(array $value = []): \Symfony\Config\FosOauthServer\Authorize\FormConfig
    {
        if (null === $this->form) {
            $this->_usedProperties['form'] = true;
            $this->form = new \Symfony\Config\FosOauthServer\Authorize\FormConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "form()" has already been initialized. You cannot pass values the second time you call form().');
        }
    
        return $this->form;
    }
    
    public function __construct(array $value = [])
    {
    
        if (array_key_exists('form', $value)) {
            $this->_usedProperties['form'] = true;
            $this->form = new \Symfony\Config\FosOauthServer\Authorize\FormConfig($value['form']);
            unset($value['form']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['form'])) {
            $output['form'] = $this->form->toArray();
        }
    
        return $output;
    }

}
