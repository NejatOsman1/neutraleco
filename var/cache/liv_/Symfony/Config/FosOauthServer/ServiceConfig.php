<?php

namespace Symfony\Config\FosOauthServer;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help in creating a config.
 */
class ServiceConfig 
{
    private $storage;
    private $userProvider;
    private $clientManager;
    private $accessTokenManager;
    private $refreshTokenManager;
    private $authCodeManager;
    private $options;
    private $_usedProperties = [];
    
    /**
     * @default 'fos_oauth_server.storage.default'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function storage($value): self
    {
        $this->_usedProperties['storage'] = true;
        $this->storage = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function userProvider($value): self
    {
        $this->_usedProperties['userProvider'] = true;
        $this->userProvider = $value;
    
        return $this;
    }
    
    /**
     * @default 'fos_oauth_server.client_manager.default'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function clientManager($value): self
    {
        $this->_usedProperties['clientManager'] = true;
        $this->clientManager = $value;
    
        return $this;
    }
    
    /**
     * @default 'fos_oauth_server.access_token_manager.default'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function accessTokenManager($value): self
    {
        $this->_usedProperties['accessTokenManager'] = true;
        $this->accessTokenManager = $value;
    
        return $this;
    }
    
    /**
     * @default 'fos_oauth_server.refresh_token_manager.default'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function refreshTokenManager($value): self
    {
        $this->_usedProperties['refreshTokenManager'] = true;
        $this->refreshTokenManager = $value;
    
        return $this;
    }
    
    /**
     * @default 'fos_oauth_server.auth_code_manager.default'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function authCodeManager($value): self
    {
        $this->_usedProperties['authCodeManager'] = true;
        $this->authCodeManager = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function options(string $key, $value): self
    {
        $this->_usedProperties['options'] = true;
        $this->options[$key] = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (array_key_exists('storage', $value)) {
            $this->_usedProperties['storage'] = true;
            $this->storage = $value['storage'];
            unset($value['storage']);
        }
    
        if (array_key_exists('user_provider', $value)) {
            $this->_usedProperties['userProvider'] = true;
            $this->userProvider = $value['user_provider'];
            unset($value['user_provider']);
        }
    
        if (array_key_exists('client_manager', $value)) {
            $this->_usedProperties['clientManager'] = true;
            $this->clientManager = $value['client_manager'];
            unset($value['client_manager']);
        }
    
        if (array_key_exists('access_token_manager', $value)) {
            $this->_usedProperties['accessTokenManager'] = true;
            $this->accessTokenManager = $value['access_token_manager'];
            unset($value['access_token_manager']);
        }
    
        if (array_key_exists('refresh_token_manager', $value)) {
            $this->_usedProperties['refreshTokenManager'] = true;
            $this->refreshTokenManager = $value['refresh_token_manager'];
            unset($value['refresh_token_manager']);
        }
    
        if (array_key_exists('auth_code_manager', $value)) {
            $this->_usedProperties['authCodeManager'] = true;
            $this->authCodeManager = $value['auth_code_manager'];
            unset($value['auth_code_manager']);
        }
    
        if (array_key_exists('options', $value)) {
            $this->_usedProperties['options'] = true;
            $this->options = $value['options'];
            unset($value['options']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['storage'])) {
            $output['storage'] = $this->storage;
        }
        if (isset($this->_usedProperties['userProvider'])) {
            $output['user_provider'] = $this->userProvider;
        }
        if (isset($this->_usedProperties['clientManager'])) {
            $output['client_manager'] = $this->clientManager;
        }
        if (isset($this->_usedProperties['accessTokenManager'])) {
            $output['access_token_manager'] = $this->accessTokenManager;
        }
        if (isset($this->_usedProperties['refreshTokenManager'])) {
            $output['refresh_token_manager'] = $this->refreshTokenManager;
        }
        if (isset($this->_usedProperties['authCodeManager'])) {
            $output['auth_code_manager'] = $this->authCodeManager;
        }
        if (isset($this->_usedProperties['options'])) {
            $output['options'] = $this->options;
        }
    
        return $output;
    }

}
