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
namespace CSDT\CSR4\Metadata\ObjectMetadata\Abstracts;

use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR4\Metadata\ObjectMetadata\Traits\ObjectMetadataTrait;

/**
 * AbstractObjectMetadata.php
 *
 * This class is used as parent for the ObjectMetadata objects
 *
 * @category Metadata
 * @package  CSR4-ObjectMappedMetadata
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
abstract class AbstractObjectMetadata implements ObjectMetadataInterface
{
    /**
     * Metadata properties
     *
     * This property store the metadata properties of the object
     *
     * @var array
     */
    private $metadataProperties = [];

    /**
     * Traversing position
     *
     * This property store the internal iteration position
     *
     * @var integer
     */
    private $traversingPosition = 0;

    /**
     * Mapped class
     *
     * This property store the object mapped class metadata
     *
     * @var string
     */
    private $mappedClass;

    /**
     * Object factory
     *
     * This property store the objecct factory in charge of the instanciation of a
     * new mapped object
     *
     * @var string
     */
    private $objectFactory;

    /**
     * Dto mapper
     *
     * This property store the dto mapper to be used for mapping
     *
     * @var string
     */
    private $dtoMapper;

    use ObjectMetadataTrait;

    /**
     * Construct
     *
     * The default AbstractObjectMetadata constructor
     *
     * @param string $mappedClass        The mapped class name
     * @param array  $metadataProperties The metadata properties of the DTO
     * @param string $objectFactory      The mapped object factory
     * @param string $dtoMapper          The mapper to be used for mapping
     *
     * @return void
     */
    public function __construct(
        string $mappedClass,
        array $metadataProperties = [],
        string $objectFactory = null,
        string $dtoMapper = null
    ) {
        $this->metadataProperties = $metadataProperties;
        $this->mappedClass = $mappedClass;
        $this->objectFactory = $objectFactory;
        $this->dtoMapper = $dtoMapper;
    }
}
