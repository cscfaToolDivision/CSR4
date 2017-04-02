<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.1
 *
 * @category Metadata
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\Metadata\ObjectMetadata\Filter;

use CSDT\CSR4\Metadata\PropertyMetadata\ObjectPropertyMetadataInterface;

/**
 * MappedPropertyFilter.php
 *
 * This class is tool used to filter the ObjectPropertyMetadata by their mapped
 * property
 *
 * @category Metadata
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
final class MappedPropertyFilter
{
    /**
     * Filter method
     *
     * This constant define the filtering method of the MappedPropertyFilter
     *
     * @var string
     */
    const FILTER_METHOD = 'isAvailable';

    /**
     * Needed property
     *
     * This property store the property name to filter
     *
     * @var string
     */
    private $neededProperty;

    /**
     * Constructor
     *
     * The default MappedPropertyFilter constructor
     *
     * @param string $propertyName The property name to filter
     */
    public function __construct(string $propertyName)
    {
        $this->neededProperty = $propertyName;
    }

    /**
     * Is available
     *
     * This method validate that the given property metadata target is equal with
     * the needed property
     *
     * @param ObjectPropertyMetadataInterface $propertyMetadata The property
     *                                                          metadata
     *
     * @return boolean
     */
    public function isAvailable(ObjectPropertyMetadataInterface $propertyMetadata)
    {
        return hash_equals(
            $this->neededProperty,
            $propertyMetadata->getTargetProperty()
        );
    }
}
