<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'FosOauthServer'.\DIRECTORY_SEPARATOR.'AuthorizeConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'FosOauthServer'.\DIRECTORY_SEPARATOR.'ServiceConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help in creating a config.
 */
class FosOauthServerConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $dbDriver;
    private $clientClass;
    private $accessTokenClass;
    private $refreshTokenClass;
    private $authCodeClass;
    private $modelManagerName;
    private $authorize;
    private $service;
    private $_usedProperties = [];
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function dbDriver($value): self
    {
        $this->_usedProperties['dbDriver'] = true;
        $this->dbDriver = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function clientClass($value): self
    {
        $this->_usedProperties['clientClass'] = true;
        $this->clientClass = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function accessTokenClass($value): self
    {
        $this->_usedProperties['accessTokenClass'] = true;
        $this->accessTokenClass = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function refreshTokenClass($value): self
    {
        $this->_usedProperties['refreshTokenClass'] = true;
        $this->refreshTokenClass = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function authCodeClass($value): self
    {
        $this->_usedProperties['authCodeClass'] = true;
        $this->authCodeClass = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function modelManagerName($value): self
    {
        $this->_usedProperties['modelManagerName'] = true;
        $this->modelManagerName = $value;
    
        return $this;
    }
    
    public function authorize(array $value = []): \Symfony\Config\FosOauthServer\AuthorizeConfig
    {
        if (null === $this->authorize) {
            $this->_usedProperties['authorize'] = true;
            $this->authorize = new \Symfony\Config\FosOauthServer\AuthorizeConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "authorize()" has already been initialized. You cannot pass values the second time you call authorize().');
        }
    
        return $this->authorize;
    }
    
    public function service(array $value = []): \Symfony\Config\FosOauthServer\ServiceConfig
    {
        if (null === $this->service) {
            $this->_usedProperties['service'] = true;
            $this->service = new \Symfony\Config\FosOauthServer\ServiceConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "service()" has already been initialized. You cannot pass values the second time you call service().');
        }
    
        return $this->service;
    }
    
    public function getExtensionAlias(): string
    {
        return 'fos_oauth_server';
    }
    
    public function __construct(array $value = [])
    {
    
        if (array_key_exists('db_driver', $value)) {
            $this->_usedProperties['dbDriver'] = true;
            $this->dbDriver = $value['db_driver'];
            unset($value['db_driver']);
        }
    
        if (array_key_exists('client_class', $value)) {
            $this->_usedProperties['clientClass'] = true;
            $this->clientClass = $value['client_class'];
            unset($value['client_class']);
        }
    
        if (array_key_exists('access_token_class', $value)) {
            $this->_usedProperties['accessTokenClass'] = true;
            $this->accessTokenClass = $value['access_token_class'];
            unset($value['access_token_class']);
        }
    
        if (array_key_exists('refresh_token_class', $value)) {
            $this->_usedProperties['refreshTokenClass'] = true;
            $this->refreshTokenClass = $value['refresh_token_class'];
            unset($value['refresh_token_class']);
        }
    
        if (array_key_exists('auth_code_class', $value)) {
            $this->_usedProperties['authCodeClass'] = true;
            $this->authCodeClass = $value['auth_code_class'];
            unset($value['auth_code_class']);
        }
    
        if (array_key_exists('model_manager_name', $value)) {
            $this->_usedProperties['modelManagerName'] = true;
            $this->modelManagerName = $value['model_manager_name'];
            unset($value['model_manager_name']);
        }
    
        if (array_key_exists('authorize', $value)) {
            $this->_usedProperties['authorize'] = true;
            $this->authorize = new \Symfony\Config\FosOauthServer\AuthorizeConfig($value['authorize']);
            unset($value['authorize']);
        }
    
        if (array_key_exists('service', $value)) {
            $this->_usedProperties['service'] = true;
            $this->service = new \Symfony\Config\FosOauthServer\ServiceConfig($value['service']);
            unset($value['service']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['dbDriver'])) {
            $output['db_driver'] = $this->dbDriver;
        }
        if (isset($this->_usedProperties['clientClass'])) {
            $output['client_class'] = $this->clientClass;
        }
        if (isset($this->_usedProperties['accessTokenClass'])) {
            $output['access_token_class'] = $this->accessTokenClass;
        }
        if (isset($this->_usedProperties['refreshTokenClass'])) {
            $output['refresh_token_class'] = $this->refreshTokenClass;
        }
        if (isset($this->_usedProperties['authCodeClass'])) {
            $output['auth_code_class'] = $this->authCodeClass;
        }
        if (isset($this->_usedProperties['modelManagerName'])) {
            $output['model_manager_name'] = $this->modelManagerName;
        }
        if (isset($this->_usedProperties['authorize'])) {
            $output['authorize'] = $this->authorize->toArray();
        }
        if (isset($this->_usedProperties['service'])) {
            $output['service'] = $this->service->toArray();
        }
    
        return $output;
    }

}
