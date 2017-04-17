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
namespace CSDT\CSR4\Metadata\ObjectMetadata;

use CSDT\CSR4\Metadata\PropertyMetadata\ObjectPropertyMetadataInterface;

/**
 * ObjectMetadataInterface.php
 *
 * This interface is used to define the base methods of the ObjectMetadata
 *
 * @category Metadata
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface ObjectMetadataInterface extends \Iterator
{
    /**
     * Get dto class
     *
     * This method return the DTO class defined by the metadata
     *
     * @return string
     */
    public function getDtoClass() : string ;

    /**
     * Get mapped class
     *
     * This method return the DTO mapped class defined by the metadata
     *
     * @return string
     */
    public function getMappedClass() : string ;

    /**
     * Get object properties
     *
     * This method return the properties metadata as array
     *
     * @return array
     */
    public function getObjectProperties() : array ;

    /**
     * Get object factory
     *
     * This method return the mapped object factory
     *
     * @return string|null
     */
    public function getObjectFactory();

    /**
     * Get by mapped property
     *
     * This method return a property metadata by a mapped property
     *
     * @param string $mappedProperty The mapped property name
     *
     * @return ObjectPropertyMetadataInterface|null
     */
    public function getByMappedProperty(string $mappedProperty);

    /**
     * Get dto mapper
     *
     * This method return the dto mapper to be user on mapping
     *
     * @return string|null
     */
    public function getDtoMapper();
}
