<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'NelmioApiDoc'.\DIRECTORY_SEPARATOR.'AreasConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'NelmioApiDoc'.\DIRECTORY_SEPARATOR.'ModelsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help in creating a config.
 */
class NelmioApiDocConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $documentation;
    private $mediaTypes;
    private $areas;
    private $models;
    private $_usedProperties = [];
    
    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function documentation(string $key, $value): self
    {
        $this->_usedProperties['documentation'] = true;
        $this->documentation[$key] = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<mixed|ParamConfigurator> $value
     * @return $this
     */
    public function mediaTypes($value): self
    {
        $this->_usedProperties['mediaTypes'] = true;
        $this->mediaTypes = $value;
    
        return $this;
    }
    
    public function areas(string $name, array $value = []): \Symfony\Config\NelmioApiDoc\AreasConfig
    {
        if (!isset($this->areas[$name])) {
            $this->_usedProperties['areas'] = true;
    
            return $this->areas[$name] = new \Symfony\Config\NelmioApiDoc\AreasConfig($value);
        }
        if ([] === $value) {
            return $this->areas[$name];
        }
    
        throw new InvalidConfigurationException('The node created by "areas()" has already been initialized. You cannot pass values the second time you call areas().');
    }
    
    public function models(array $value = []): \Symfony\Config\NelmioApiDoc\ModelsConfig
    {
        if (null === $this->models) {
            $this->_usedProperties['models'] = true;
            $this->models = new \Symfony\Config\NelmioApiDoc\ModelsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "models()" has already been initialized. You cannot pass values the second time you call models().');
        }
    
        return $this->models;
    }
    
    public function getExtensionAlias(): string
    {
        return 'nelmio_api_doc';
    }
    
    public function __construct(array $value = [])
    {
    
        if (array_key_exists('documentation', $value)) {
            $this->_usedProperties['documentation'] = true;
            $this->documentation = $value['documentation'];
            unset($value['documentation']);
        }
    
        if (array_key_exists('media_types', $value)) {
            $this->_usedProperties['mediaTypes'] = true;
            $this->mediaTypes = $value['media_types'];
            unset($value['media_types']);
        }
    
        if (array_key_exists('areas', $value)) {
            $this->_usedProperties['areas'] = true;
            $this->areas = array_map(function ($v) { return new \Symfony\Config\NelmioApiDoc\AreasConfig($v); }, $value['areas']);
            unset($value['areas']);
        }
    
        if (array_key_exists('models', $value)) {
            $this->_usedProperties['models'] = true;
            $this->models = new \Symfony\Config\NelmioApiDoc\ModelsConfig($value['models']);
            unset($value['models']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['documentation'])) {
            $output['documentation'] = $this->documentation;
        }
        if (isset($this->_usedProperties['mediaTypes'])) {
            $output['media_types'] = $this->mediaTypes;
        }
        if (isset($this->_usedProperties['areas'])) {
            $output['areas'] = array_map(function ($v) { return $v->toArray(); }, $this->areas);
        }
        if (isset($this->_usedProperties['models'])) {
            $output['models'] = $this->models->toArray();
        }
    
        return $output;
    }

}
