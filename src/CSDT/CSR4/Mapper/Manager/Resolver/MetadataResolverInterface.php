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

/**
 * MetadataResolverInterface.php
 *
 * This interface define the base MetadataResolver methods
 *
 * @category Mapper
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface MetadataResolverInterface
{
    /**
     * Resolve metadata
     *
     * This method return a metadata accordingly with the given dto and mapped object
     *
     * @param \SplObjectStorage $metadatas    The current metadata
     * @param CSR3DTOInterface  $dto          The dto
     * @param unknown           $mappedObject The mapped object
     *
     * @return ObjectMetadataInterface
     */
    public function resolveMetadata(
        \SplObjectStorage $metadatas,
        CSR3DTOInterface $dto,
        $mappedObject = null
    ) : ObjectMetadataInterface ;
}
