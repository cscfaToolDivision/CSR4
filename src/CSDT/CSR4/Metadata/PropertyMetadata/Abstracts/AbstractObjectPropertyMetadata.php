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
namespace CSDT\CSR4\Metadata\PropertyMetadata\Abstracts;

use CSDT\CSR4\Metadata\PropertyMetadata\ObjectPropertyMetadataInterface;
use CSDT\CSR4\Metadata\PropertyMetadata\Traits\ObjectPropertyMetadataTrait;

/**
 * AbstractObjectPropertyMetadata.php
 *
 * This class is used as parent for the ObjectPropertyMetadata objects
 *
 * @category Metadata
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
abstract class AbstractObjectPropertyMetadata implements ObjectPropertyMetadataInterface
{
    /**
     * Data transformer
     *
     * This property store the data transformer identifyer to be apply on mapping
     *
     * @var string
     */
    private $dataTransformer;

    /**
     * Mapping group
     *
     * This property store the mapping groups of the property
     *
     * @var array
     */
    private $mappingGroup = [];

    /**
     * Target property
     *
     * This property store the mapping target property name
     *
     * @var string
     */
    private $targetProperty;

    use ObjectPropertyMetadataTrait;

    /**
     * Construct
     *
     * The default AbstractObjectPropertyMetadata constructor
     *
     * @param string $targetProperty  The mapped target property name
     * @param array  $mappingGroup    The mapping groups of the property
     * @param string $dataTransformer The mapping data transformer identifyer
     *
     * @return void
     */
    public function __construct(
        string $targetProperty,
        array $mappingGroup = [],
        string $dataTransformer = null
    ) {
        $this->dataTransformer = $dataTransformer;
        $this->mappingGroup = $mappingGroup;
        $this->targetProperty = $targetProperty;
    }
}
