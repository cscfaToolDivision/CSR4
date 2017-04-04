<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category Mapper
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\Mapper;

use CSDT\CSR4\Mapper\ConfidenceInterface;
use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;

/**
 * MapperInterface.php
 *
 * This interface define the base methods of the Mapper objects
 *
 * @category Mapper
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface MapperInterface extends ConfidenceInterface
{
    /**
     * Map to object
     *
     * This method map the DTO properties to the object properties
     *
     * @param ObjectMetadataInterface $metadata     The metadata of the DTO
     * @param CSR3DTOInterface        $dto          The dto to map from
     * @param mixed                   $mappedObject The object to map to
     * @param array                   $group        The array of group to map
     *
     * @return void
     */
    public function mapToObject(
        ObjectMetadataInterface $metadata,
        CSR3DTOInterface $dto,
        $mappedObject,
        array $group = []
    );

    /**
     * Map to dto
     *
     * This method map the object properties to the DTO properties
     *
     * @param ObjectMetadataInterface $metadata     The metadata of the DTO
     * @param CSR3DTOInterface        $dto          The dto to map to
     * @param mixed                   $mappedObject The object to map from
     * @param array                   $group        The array of group to map
     *
     * @return void
     */
    public function mapToDTO(
        ObjectMetadataInterface $metadata,
        CSR3DTOInterface $dto,
        $mappedObject,
        $group
    );

    /**
     * @param CSR3DTOInterface $dto          The mapped dto
     * @param mixed            $mappedObject The mapped object
     *
     * @return bool
     */
    public function support(
        ObjectMetadataInterface $metadata,
        CSR3DTOInterface $dto,
        $mappedObject
    ) : int;
}
