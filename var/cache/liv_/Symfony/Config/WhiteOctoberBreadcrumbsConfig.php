<?php

namespace Symfony\Config;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help in creating a config.
 */
class WhiteOctoberBreadcrumbsConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $separator;
    private $separatorClass;
    private $listId;
    private $listClass;
    private $itemClass;
    private $linkRel;
    private $locale;
    private $translationDomain;
    private $viewTemplate;
    private $_usedProperties = [];
    
    /**
     * @default '/'
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
     * @default 'separator'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function separatorClass($value): self
    {
        $this->_usedProperties['separatorClass'] = true;
        $this->separatorClass = $value;
    
        return $this;
    }
    
    /**
     * @default 'wo-breadcrumbs'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function listId($value): self
    {
        $this->_usedProperties['listId'] = true;
        $this->listId = $value;
    
        return $this;
    }
    
    /**
     * @default 'breadcrumb'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function listClass($value): self
    {
        $this->_usedProperties['listClass'] = true;
        $this->listClass = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function itemClass($value): self
    {
        $this->_usedProperties['itemClass'] = true;
        $this->itemClass = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function linkRel($value): self
    {
        $this->_usedProperties['linkRel'] = true;
        $this->linkRel = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function locale($value): self
    {
        $this->_usedProperties['locale'] = true;
        $this->locale = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function translationDomain($value): self
    {
        $this->_usedProperties['translationDomain'] = true;
        $this->translationDomain = $value;
    
        return $this;
    }
    
    /**
     * @default '@WhiteOctoberBreadcrumbs/microdata.html.twig'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function viewTemplate($value): self
    {
        $this->_usedProperties['viewTemplate'] = true;
        $this->viewTemplate = $value;
    
        return $this;
    }
    
    public function getExtensionAlias(): string
    {
        return 'white_october_breadcrumbs';
    }
    
    public function __construct(array $value = [])
    {
    
        if (array_key_exists('separator', $value)) {
            $this->_usedProperties['separator'] = true;
            $this->separator = $value['separator'];
            unset($value['separator']);
        }
    
        if (array_key_exists('separatorClass', $value)) {
            $this->_usedProperties['separatorClass'] = true;
            $this->separatorClass = $value['separatorClass'];
            unset($value['separatorClass']);
        }
    
        if (array_key_exists('listId', $value)) {
            $this->_usedProperties['listId'] = true;
            $this->listId = $value['listId'];
            unset($value['listId']);
        }
    
        if (array_key_exists('listClass', $value)) {
            $this->_usedProperties['listClass'] = true;
            $this->listClass = $value['listClass'];
            unset($value['listClass']);
        }
    
        if (array_key_exists('itemClass', $value)) {
            $this->_usedProperties['itemClass'] = true;
            $this->itemClass = $value['itemClass'];
            unset($value['itemClass']);
        }
    
        if (array_key_exists('linkRel', $value)) {
            $this->_usedProperties['linkRel'] = true;
            $this->linkRel = $value['linkRel'];
            unset($value['linkRel']);
        }
    
        if (array_key_exists('locale', $value)) {
            $this->_usedProperties['locale'] = true;
            $this->locale = $value['locale'];
            unset($value['locale']);
        }
    
        if (array_key_exists('translation_domain', $value)) {
            $this->_usedProperties['translationDomain'] = true;
            $this->translationDomain = $value['translation_domain'];
            unset($value['translation_domain']);
        }
    
        if (array_key_exists('viewTemplate', $value)) {
            $this->_usedProperties['viewTemplate'] = true;
            $this->viewTemplate = $value['viewTemplate'];
            unset($value['viewTemplate']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['separator'])) {
            $output['separator'] = $this->separator;
        }
        if (isset($this->_usedProperties['separatorClass'])) {
            $output['separatorClass'] = $this->separatorClass;
        }
        if (isset($this->_usedProperties['listId'])) {
            $output['listId'] = $this->listId;
        }
        if (isset($this->_usedProperties['listClass'])) {
            $output['listClass'] = $this->listClass;
        }
        if (isset($this->_usedProperties['itemClass'])) {
            $output['itemClass'] = $this->itemClass;
        }
        if (isset($this->_usedProperties['linkRel'])) {
            $output['linkRel'] = $this->linkRel;
        }
        if (isset($this->_usedProperties['locale'])) {
            $output['locale'] = $this->locale;
        }
        if (isset($this->_usedProperties['translationDomain'])) {
            $output['translation_domain'] = $this->translationDomain;
        }
        if (isset($this->_usedProperties['viewTemplate'])) {
            $output['viewTemplate'] = $this->viewTemplate;
        }
    
        return $output;
    }

}
