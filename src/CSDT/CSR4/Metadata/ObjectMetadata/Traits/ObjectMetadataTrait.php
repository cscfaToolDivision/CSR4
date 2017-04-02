<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category Metadata
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\Metadata\ObjectMetadata\Traits;

use CSDT\CSR4\Metadata\PropertyMetadata\ObjectPropertyMetadataInterface;
use CSDT\CSR4\Metadata\ObjectMetadata\Utils\MappedPropertyFilter;

/**
 * ObjectMetadataTrait.php
 *
 * This trait is used to implement the ObjectMetadata base logic
 *
 * @category Metadata
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait ObjectMetadataTrait
{
    /**
     * Property container
     *
     * This property store the metadata properties container property name
     *
     * @var string
     */
    protected $propertyContainer = 'metadataProperties';

    /**
     * Position container
     *
     * This property store the position container property name
     *
     * @var string
     */
    protected $positionContainer = 'traversingPosition';

    /**
     * Mapped class container
     *
     * This property store the property name where the DTO mapped class defined by
     * the metadata is stored
     *
     * @var string
     */
    protected $mappedClassContainer = 'mappedClass';

    /**
     * Object factory container
     *
     * This property store the object factory that is in charge of create a new
     * object instance
     *
     * @var string
     */
    protected $objectFactoryContainer = 'objectFactory';

    /**
     * Get mapped class
     *
     * This method return the DTO mapped class defined by the metadata
     *
     * @return string
     */
    public function getMappedClass() : string
    {
        return $this->{$this->mappedClassContainer};
    }

    /**
     * Get by mapped property
     *
     * This method return a property metadata by a mapped property
     *
     * @param string $mappedProperty The mapped property name
     *
     * @return ObjectPropertyMetadataInterface
     */
    public function getByMappedProperty(string $mappedProperty)
    {
        return $this->filterPropertiesByTarget($mappedProperty)[0] ?? null;
    }

    /**
     * Get object properties
     *
     * This method return the properties metadata as array
     *
     * @return array
     */
    public function getObjectProperties() : array
    {
        return $this->{$this->propertyContainer};
    }

    /**
     * Get object factory
     *
     * This method return the mapped object factory
     *
     * @return string
     */
    public function getObjectFactory() : string
    {
        return $this->{$this->objectFactoryContainer};
    }

    /**
     * Current
     *
     * This method return the current iterated value
     *
     * @return ObjectPropertyMetadataInterface
     */
    public function current()
    {
        return $this->{$this->propertyContainer}[$this->key()];
    }

    /**
     * Next
     *
     * This method advance the internal pointer by one step
     *
     * @return void
     */
    public function next()
    {
        $this->{$this->positionContainer} ++;
    }

    /**
     * Key
     *
     * This method return the current iterated key
     *
     * @return string
     */
    public function key()
    {
        return array_keys(
            $this->{$this->propertyContainer}
        )[$this->{$this->positionContainer}];
    }

    /**
     * Valid
     *
     * This method validate the current internal position existence
     *
     * @return bool
     */
    public function valid()
    {
        return isset(
            array_keys(
                $this->{$this->propertyContainer}
            )[$this->{$this->positionContainer}]
        );
    }

    /**
     * Rewind
     *
     * This method reinitialize the internal position
     *
     * @return void
     */
    public function rewind()
    {
        $this->{$this->positionContainer} = 0;
    }

    /**
     * Filter properties by target
     *
     * This method return the properties that have a target property named as the
     * given target name
     *
     * @param string $targetName The target property name of the property to return
     *
     * @return array
     */
    private function filterPropertiesByTarget(string $targetName)
    {

        $filter = new MappedPropertyFilter($targetName);

        $iterator = new \CallbackFilterIterator(
            $this,
            array($filter, MappedPropertyFilter::FILTER_METHOD)
        );

        return iterator_to_array($iterator);
    }
}
