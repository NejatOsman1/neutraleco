<?php

namespace Symfony\Config;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help in creating a config.
 */
class CocurSlugifyConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $lowercase;
    private $lowercaseAfterRegexp;
    private $trim;
    private $stripTags;
    private $separator;
    private $regexp;
    private $rulesets;
    private $_usedProperties = [];
    
    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function lowercase($value): self
    {
        $this->_usedProperties['lowercase'] = true;
        $this->lowercase = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function lowercaseAfterRegexp($value): self
    {
        $this->_usedProperties['lowercaseAfterRegexp'] = true;
        $this->lowercaseAfterRegexp = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function trim($value): self
    {
        $this->_usedProperties['trim'] = true;
        $this->trim = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function stripTags($value): self
    {
        $this->_usedProperties['stripTags'] = true;
        $this->stripTags = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function separator($value): self
    {
        $this->_usedProperties['separator'] = true;
        $this->separator = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function regexp($value): self
    {
        $this->_usedProperties['regexp'] = true;
        $this->regexp = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function rulesets($value): self
    {
        $this->_usedProperties['rulesets'] = true;
        $this->rulesets = $value;
    
        return $this;
    }
    
    public function getExtensionAlias(): string
    {
        return 'cocur_slugify';
    }
    
    public function __construct(array $value = [])
    {
    
        if (array_key_exists('lowercase', $value)) {
            $this->_usedProperties['lowercase'] = true;
            $this->lowercase = $value['lowercase'];
            unset($value['lowercase']);
        }
    
        if (array_key_exists('lowercase_after_regexp', $value)) {
            $this->_usedProperties['lowercaseAfterRegexp'] = true;
            $this->lowercaseAfterRegexp = $value['lowercase_after_regexp'];
            unset($value['lowercase_after_regexp']);
        }
    
        if (array_key_exists('trim', $value)) {
            $this->_usedProperties['trim'] = true;
            $this->trim = $value['trim'];
            unset($value['trim']);
        }
    
        if (array_key_exists('strip_tags', $value)) {
            $this->_usedProperties['stripTags'] = true;
            $this->stripTags = $value['strip_tags'];
            unset($value['strip_tags']);
        }
    
        if (array_key_exists('separator', $value)) {
            $this->_usedProperties['separator'] = true;
            $this->separator = $value['separator'];
            unset($value['separator']);
        }
    
        if (array_key_exists('regexp', $value)) {
            $this->_usedProperties['regexp'] = true;
            $this->regexp = $value['regexp'];
            unset($value['regexp']);
        }
    
        if (array_key_exists('rulesets', $value)) {
            $this->_usedProperties['rulesets'] = true;
            $this->rulesets = $value['rulesets'];
            unset($value['rulesets']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['lowercase'])) {
            $output['lowercase'] = $this->lowercase;
        }
        if (isset($this->_usedProperties['lowercaseAfterRegexp'])) {
            $output['lowercase_after_regexp'] = $this->lowercaseAfterRegexp;
        }
        if (isset($this->_usedProperties['trim'])) {
            $output['trim'] = $this->trim;
        }
        if (isset($this->_usedProperties['stripTags'])) {
            $output['strip_tags'] = $this->stripTags;
        }
        if (isset($this->_usedProperties['separator'])) {
            $output['separator'] = $this->separator;
        }
        if (isset($this->_usedProperties['regexp'])) {
            $output['regexp'] = $this->regexp;
        }
        if (isset($this->_usedProperties['rulesets'])) {
            $output['rulesets'] = $this->rulesets;
        }
    
        return $output;
    }

}
