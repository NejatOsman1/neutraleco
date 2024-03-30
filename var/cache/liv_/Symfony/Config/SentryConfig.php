<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Sentry'.\DIRECTORY_SEPARATOR.'OptionsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Sentry'.\DIRECTORY_SEPARATOR.'ListenerPrioritiesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Sentry'.\DIRECTORY_SEPARATOR.'MonologConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Sentry'.\DIRECTORY_SEPARATOR.'MessengerConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help in creating a config.
 */
class SentryConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $dsn;
    private $registerErrorListener;
    private $options;
    private $listenerPriorities;
    private $monolog;
    private $messenger;
    private $_usedProperties = [];
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function dsn($value): self
    {
        $this->_usedProperties['dsn'] = true;
        $this->dsn = $value;
    
        return $this;
    }
    
    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function registerErrorListener($value): self
    {
        $this->_usedProperties['registerErrorListener'] = true;
        $this->registerErrorListener = $value;
    
        return $this;
    }
    
    public function options(array $value = []): \Symfony\Config\Sentry\OptionsConfig
    {
        if (null === $this->options) {
            $this->_usedProperties['options'] = true;
            $this->options = new \Symfony\Config\Sentry\OptionsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "options()" has already been initialized. You cannot pass values the second time you call options().');
        }
    
        return $this->options;
    }
    
    public function listenerPriorities(array $value = []): \Symfony\Config\Sentry\ListenerPrioritiesConfig
    {
        if (null === $this->listenerPriorities) {
            $this->_usedProperties['listenerPriorities'] = true;
            $this->listenerPriorities = new \Symfony\Config\Sentry\ListenerPrioritiesConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "listenerPriorities()" has already been initialized. You cannot pass values the second time you call listenerPriorities().');
        }
    
        return $this->listenerPriorities;
    }
    
    public function monolog(array $value = []): \Symfony\Config\Sentry\MonologConfig
    {
        if (null === $this->monolog) {
            $this->_usedProperties['monolog'] = true;
            $this->monolog = new \Symfony\Config\Sentry\MonologConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "monolog()" has already been initialized. You cannot pass values the second time you call monolog().');
        }
    
        return $this->monolog;
    }
    
    public function messenger(array $value = []): \Symfony\Config\Sentry\MessengerConfig
    {
        if (null === $this->messenger) {
            $this->_usedProperties['messenger'] = true;
            $this->messenger = new \Symfony\Config\Sentry\MessengerConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "messenger()" has already been initialized. You cannot pass values the second time you call messenger().');
        }
    
        return $this->messenger;
    }
    
    public function getExtensionAlias(): string
    {
        return 'sentry';
    }
    
    public function __construct(array $value = [])
    {
    
        if (array_key_exists('dsn', $value)) {
            $this->_usedProperties['dsn'] = true;
            $this->dsn = $value['dsn'];
            unset($value['dsn']);
        }
    
        if (array_key_exists('register_error_listener', $value)) {
            $this->_usedProperties['registerErrorListener'] = true;
            $this->registerErrorListener = $value['register_error_listener'];
            unset($value['register_error_listener']);
        }
    
        if (array_key_exists('options', $value)) {
            $this->_usedProperties['options'] = true;
            $this->options = new \Symfony\Config\Sentry\OptionsConfig($value['options']);
            unset($value['options']);
        }
    
        if (array_key_exists('listener_priorities', $value)) {
            $this->_usedProperties['listenerPriorities'] = true;
            $this->listenerPriorities = new \Symfony\Config\Sentry\ListenerPrioritiesConfig($value['listener_priorities']);
            unset($value['listener_priorities']);
        }
    
        if (array_key_exists('monolog', $value)) {
            $this->_usedProperties['monolog'] = true;
            $this->monolog = new \Symfony\Config\Sentry\MonologConfig($value['monolog']);
            unset($value['monolog']);
        }
    
        if (array_key_exists('messenger', $value)) {
            $this->_usedProperties['messenger'] = true;
            $this->messenger = new \Symfony\Config\Sentry\MessengerConfig($value['messenger']);
            unset($value['messenger']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['dsn'])) {
            $output['dsn'] = $this->dsn;
        }
        if (isset($this->_usedProperties['registerErrorListener'])) {
            $output['register_error_listener'] = $this->registerErrorListener;
        }
        if (isset($this->_usedProperties['options'])) {
            $output['options'] = $this->options->toArray();
        }
        if (isset($this->_usedProperties['listenerPriorities'])) {
            $output['listener_priorities'] = $this->listenerPriorities->toArray();
        }
        if (isset($this->_usedProperties['monolog'])) {
            $output['monolog'] = $this->monolog->toArray();
        }
        if (isset($this->_usedProperties['messenger'])) {
            $output['messenger'] = $this->messenger->toArray();
        }
    
        return $output;
    }

}
