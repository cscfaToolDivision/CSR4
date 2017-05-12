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
namespace CSDT\CSR4\Mapper\Manager\Resolver;

use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Mapper\MapperInterface;

/**
 * MapperResolverInterface.php
 *
 * This interface define the base MapperResolver methods
 *
 * @category Mapper
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface MapperResolverInterface
{
    /**
     * Resolve mapper
     *
     * This method return a mapper accordingly with the given informations
     *
     * @param \SplObjectStorage       $mappers      The mapper storage object
     * @param ObjectMetadataInterface $metadata     The current metadata
     * @param CSR3DTOInterface        $dto          The current dto
     * @param mixed                   $mappedObject The mapped object
     *
     * @return MapperInterface
     */
    public function resolveMapper(
        \SplObjectStorage $mappers,
        ObjectMetadataInterface $metadata,
        CSR3DTOInterface $dto,
        $mappedObject
    ) : MapperInterface ;
}
