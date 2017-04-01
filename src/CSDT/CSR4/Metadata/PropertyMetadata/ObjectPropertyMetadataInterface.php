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
namespace CSDT\CSR4\Metadata\PropertyMetadata;

/**
 * ObjectPropertyMetadataInterface.php
 *
 * This interface is used to define the base method of the ObjectPropertyMetadata
 *
 * @category Metadata
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface ObjectPropertyMetadataInterface
{
    /**
     * Get mapped transformer
     *
     * This method return the data transformer of the property to apply before
     * property mapping
     *
     * @return string
     */
    public function getMappedTransformer() : string ;

    /**
     * Get mapping group
     *
     * This method return the mapping group of the property
     *
     * @return array
     */
    public function getMappingGroup() : array ;

    /**
     * Get target property
     *
     * This method return the targeted property of the property metadata
     *
     * @return string
     */
    public function getTargetProperty() : string ;
}
