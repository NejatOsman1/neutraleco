<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SchebTwoFactor'.\DIRECTORY_SEPARATOR.'TrustedDeviceConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SchebTwoFactor'.\DIRECTORY_SEPARATOR.'BackupCodesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SchebTwoFactor'.\DIRECTORY_SEPARATOR.'GoogleConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SchebTwoFactor'.\DIRECTORY_SEPARATOR.'TotpConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help in creating a config.
 */
class SchebTwoFactorConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $persister;
    private $modelManagerName;
    private $securityTokens;
    private $ipWhitelist;
    private $ipWhitelistProvider;
    private $twoFactorTokenFactory;
    private $twoFactorCondition;
    private $trustedDevice;
    private $backupCodes;
    private $google;
    private $totp;
    private $_usedProperties = [];
    
    /**
     * @default 'scheb_two_factor.persister.doctrine'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function persister($value): self
    {
        $this->_usedProperties['persister'] = true;
        $this->persister = $value;
    
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
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function securityTokens($value): self
    {
        $this->_usedProperties['securityTokens'] = true;
        $this->securityTokens = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function ipWhitelist($value): self
    {
        $this->_usedProperties['ipWhitelist'] = true;
        $this->ipWhitelist = $value;
    
        return $this;
    }
    
    /**
     * @default 'scheb_two_factor.default_ip_whitelist_provider'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function ipWhitelistProvider($value): self
    {
        $this->_usedProperties['ipWhitelistProvider'] = true;
        $this->ipWhitelistProvider = $value;
    
        return $this;
    }
    
    /**
     * @default 'scheb_two_factor.default_token_factory'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function twoFactorTokenFactory($value): self
    {
        $this->_usedProperties['twoFactorTokenFactory'] = true;
        $this->twoFactorTokenFactory = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function twoFactorCondition($value): self
    {
        $this->_usedProperties['twoFactorCondition'] = true;
        $this->twoFactorCondition = $value;
    
        return $this;
    }
    
    public function trustedDevice(array $value = []): \Symfony\Config\SchebTwoFactor\TrustedDeviceConfig
    {
        if (null === $this->trustedDevice) {
            $this->_usedProperties['trustedDevice'] = true;
            $this->trustedDevice = new \Symfony\Config\SchebTwoFactor\TrustedDeviceConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "trustedDevice()" has already been initialized. You cannot pass values the second time you call trustedDevice().');
        }
    
        return $this->trustedDevice;
    }
    
    public function backupCodes(array $value = []): \Symfony\Config\SchebTwoFactor\BackupCodesConfig
    {
        if (null === $this->backupCodes) {
            $this->_usedProperties['backupCodes'] = true;
            $this->backupCodes = new \Symfony\Config\SchebTwoFactor\BackupCodesConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "backupCodes()" has already been initialized. You cannot pass values the second time you call backupCodes().');
        }
    
        return $this->backupCodes;
    }
    
    public function google(array $value = []): \Symfony\Config\SchebTwoFactor\GoogleConfig
    {
        if (null === $this->google) {
            $this->_usedProperties['google'] = true;
            $this->google = new \Symfony\Config\SchebTwoFactor\GoogleConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "google()" has already been initialized. You cannot pass values the second time you call google().');
        }
    
        return $this->google;
    }
    
    public function totp(array $value = []): \Symfony\Config\SchebTwoFactor\TotpConfig
    {
        if (null === $this->totp) {
            $this->_usedProperties['totp'] = true;
            $this->totp = new \Symfony\Config\SchebTwoFactor\TotpConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "totp()" has already been initialized. You cannot pass values the second time you call totp().');
        }
    
        return $this->totp;
    }
    
    public function getExtensionAlias(): string
    {
        return 'scheb_two_factor';
    }
    
    public function __construct(array $value = [])
    {
    
        if (array_key_exists('persister', $value)) {
            $this->_usedProperties['persister'] = true;
            $this->persister = $value['persister'];
            unset($value['persister']);
        }
    
        if (array_key_exists('model_manager_name', $value)) {
            $this->_usedProperties['modelManagerName'] = true;
            $this->modelManagerName = $value['model_manager_name'];
            unset($value['model_manager_name']);
        }
    
        if (array_key_exists('security_tokens', $value)) {
            $this->_usedProperties['securityTokens'] = true;
            $this->securityTokens = $value['security_tokens'];
            unset($value['security_tokens']);
        }
    
        if (array_key_exists('ip_whitelist', $value)) {
            $this->_usedProperties['ipWhitelist'] = true;
            $this->ipWhitelist = $value['ip_whitelist'];
            unset($value['ip_whitelist']);
        }
    
        if (array_key_exists('ip_whitelist_provider', $value)) {
            $this->_usedProperties['ipWhitelistProvider'] = true;
            $this->ipWhitelistProvider = $value['ip_whitelist_provider'];
            unset($value['ip_whitelist_provider']);
        }
    
        if (array_key_exists('two_factor_token_factory', $value)) {
            $this->_usedProperties['twoFactorTokenFactory'] = true;
            $this->twoFactorTokenFactory = $value['two_factor_token_factory'];
            unset($value['two_factor_token_factory']);
        }
    
        if (array_key_exists('two_factor_condition', $value)) {
            $this->_usedProperties['twoFactorCondition'] = true;
            $this->twoFactorCondition = $value['two_factor_condition'];
            unset($value['two_factor_condition']);
        }
    
        if (array_key_exists('trusted_device', $value)) {
            $this->_usedProperties['trustedDevice'] = true;
            $this->trustedDevice = new \Symfony\Config\SchebTwoFactor\TrustedDeviceConfig($value['trusted_device']);
            unset($value['trusted_device']);
        }
    
        if (array_key_exists('backup_codes', $value)) {
            $this->_usedProperties['backupCodes'] = true;
            $this->backupCodes = new \Symfony\Config\SchebTwoFactor\BackupCodesConfig($value['backup_codes']);
            unset($value['backup_codes']);
        }
    
        if (array_key_exists('google', $value)) {
            $this->_usedProperties['google'] = true;
            $this->google = new \Symfony\Config\SchebTwoFactor\GoogleConfig($value['google']);
            unset($value['google']);
        }
    
        if (array_key_exists('totp', $value)) {
            $this->_usedProperties['totp'] = true;
            $this->totp = new \Symfony\Config\SchebTwoFactor\TotpConfig($value['totp']);
            unset($value['totp']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['persister'])) {
            $output['persister'] = $this->persister;
        }
        if (isset($this->_usedProperties['modelManagerName'])) {
            $output['model_manager_name'] = $this->modelManagerName;
        }
        if (isset($this->_usedProperties['securityTokens'])) {
            $output['security_tokens'] = $this->securityTokens;
        }
        if (isset($this->_usedProperties['ipWhitelist'])) {
            $output['ip_whitelist'] = $this->ipWhitelist;
        }
        if (isset($this->_usedProperties['ipWhitelistProvider'])) {
            $output['ip_whitelist_provider'] = $this->ipWhitelistProvider;
        }
        if (isset($this->_usedProperties['twoFactorTokenFactory'])) {
            $output['two_factor_token_factory'] = $this->twoFactorTokenFactory;
        }
        if (isset($this->_usedProperties['twoFactorCondition'])) {
            $output['two_factor_condition'] = $this->twoFactorCondition;
        }
        if (isset($this->_usedProperties['trustedDevice'])) {
            $output['trusted_device'] = $this->trustedDevice->toArray();
        }
        if (isset($this->_usedProperties['backupCodes'])) {
            $output['backup_codes'] = $this->backupCodes->toArray();
        }
        if (isset($this->_usedProperties['google'])) {
            $output['google'] = $this->google->toArray();
        }
        if (isset($this->_usedProperties['totp'])) {
            $output['totp'] = $this->totp->toArray();
        }
    
        return $output;
    }

}
