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

use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Mapper\Manager\ObjectMappingFactoryInterface;
use CSDT\CSR4\ConfidenceInterface;
use CSDT\CSR4\Mapper\Manager\Resolver\Exception\UnresolvableFactoryException;

/**
 * FactoryResolverTrait.php
 *
 * This class is used to resolve the factory to be used when an object need to be created
 *
 * @category MapperResolver
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait FactoryResolverTrait
{
    /**
     * Resolve factory
     *
     * This method return a factory accordingly with the given dto and object
     * metadata
     *
     * @param \SplObjectStorage       $factories The set of factories to resolve from
     * @param ObjectMetadataInterface $metadata  The metadata resolved for the dto
     * @param CSR3DTOInterface        $dto       The dto
     *
     * @return ObjectMappingFactoryInterface
     */
    public function resolveFactory(
        \SplObjectStorage $factories,
        ObjectMetadataInterface $metadata,
        CSR3DTOInterface $dto
    ) : ObjectMappingFactoryInterface {

        $factoryQueue = new \SplPriorityQueue();

        foreach ($factories as $factory) {
            $supportLevel = $factory->support($metadata, $dto);

            if ($supportLevel > ConfidenceInterface::UNSUPPORTED_CONFIDENCE) {
                $factoryQueue->insert($factory, $supportLevel);
            }
        }

        try {
            return $factoryQueue->extract();
        } catch (\RuntimeException $exception) {
            throw new UnresolvableFactoryException(
                'No factory found for metadata',
                null,
                $exception
            );
        }
    }
}
