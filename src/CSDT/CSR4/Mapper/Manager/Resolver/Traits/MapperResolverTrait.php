<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category MapperResolver
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\Mapper\Manager\Resolver\Traits;

use CSDT\CSR4\Mapper\Manager\Resolver\MapperResolverInterface;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Mapper\MapperInterface;
use CSDT\CSR4\ConfidenceInterface;
use CSDT\CSR4\Mapper\Manager\Resolver\Exception\UnsupportedMapperException;

/**
 * MapperResolverTrait.php
 *
 * This trait is used to implement the default MapperResolverInterface
 *
 * @category MapperResolver
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait MapperResolverTrait
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
    ) : MapperInterface {

        $mapperQueue = new \SplPriorityQueue();

        foreach ($mappers as $mapper) {
            $supportLevel = $mapper->support($metadata, $dto, $mappedObject);

            if ($supportLevel > ConfidenceInterface::UNSUPPORTED_CONFIDENCE) {
                $mapperQueue->insert($mapper, $supportLevel);
            }
        }

        try {
            return $mapperQueue->extract();
        } catch (\RuntimeException $exception) {
            throw new UnsupportedMapperException(
                'No loader found for mapper',
                null,
                $exception
            );
        }
    }
}
