<?php
/**
 * This file is part of CSR4-ObjectMappedMetadata.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category ObjectPropertyMetadata
 * @package  CSR4-ObjectMappedMetadata
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\Metadata\PropertyMetadata\Traits;

/**
 * ObjectPropertyMetadataTrait.php
 *
 * This trait is used to implement the ObjectPropertyMetadata base logic
 *
 * @category Metadata
 * @package  CSR4-ObjectMappedMetadata
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait ObjectPropertyMetadataTrait
{

    /**
     * Transformer container
     *
     * This property store the transformer container property name
     *
     * @var string
     */
    protected $transformerContainer = 'dataTransformer';

    /**
     * Group container
     *
     * This property store the group container property name
     *
     * @var string
     */
    protected $groupContainer = 'mappingGroup';

    /**
     * Target container
     *
     * This property store the target property container property name
     *
     * @var string
     */
    protected $targetContainer = 'targetProperty';

    /**
     * Get mapped transformer
     *
     * This method return the data transformer of the property to apply before
     * property mapping
     *
     * @return string
     */
    public function getMappedTransformer() : string
    {
        return $this->{$this->transformerContainer};
    }

    /**
     * Get mapping group
     *
     * This method return the mapping group of the property
     *
     * @return array
     */
    public function getMappingGroup() : array
    {
        return $this->{$this->groupContainer};
    }

    /**
     * Get target property
     *
     * This method return the targeted property of the property metadata
     *
     * @return string
     */
    public function getTargetProperty() : string
    {
        return $this->{$this->targetContainer};
    }
}
