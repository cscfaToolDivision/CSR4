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

use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR4\ConfidenceInterface;
use CSDT\CSR4\Mapper\Manager\Resolver\Exception\UnresolvableMetadataException;

/**
 * MetadataResolverTrait.php
 *
 * This trait is used to implement the MetadataResolverInterface logic
 *
 * @category MapperResolver
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait MetadataResolverTrait
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
    ) : ObjectMetadataInterface {

        $queue = new \SplPriorityQueue();

        foreach ($metadatas as $metadata) {
            $dtoClass = $metadata->getDtoClass();
            $objectClass = $metadata->getMappedClass();

            $supportConfidence = $this->getClassConfidence($dtoClass, $dto);
            $supportConfidence += $this->getDtoConfidence(
                $objectClass,
                $mappedObject
            );

            if ($supportConfidence > ConfidenceInterface::UNSUPPORTED_CONFIDENCE) {
                $queue->insert($metadata, $supportConfidence);
            }
        }

        try {
            return $queue->extract();
        } catch (\RuntimeException $exception) {
            throw new UnresolvableMetadataException(
                'No metadata found',
                null,
                $exception
            );
        }
    }

    /**
     * Get class confidence
     *
     * This method is used to define the metadata confidence accordingly with the
     * dto or objects class
     *
     * @param string $className The excepted class name
     * @param mixed  $instance  The tested instance
     *
     * @return number
     */
    private function getClassConfidence(string $className, $instance = null)
    {
        if ($instance === null) {
            return ConfidenceInterface::UNSUPPORTED_CONFIDENCE;
        }

        if (hash_equals($className, get_class($instance))) {
            return ConfidenceInterface::DEDICATED_CONFIDENCE;
        }

        if (in_array($className, class_parents(get_class($instance)))) {
            return ConfidenceInterface::HIGH_CONFIDENCE;
        }

        if (in_array($className, class_implements(get_class($instance)))) {
            return ConfidenceInterface::MEDIUM_CONFIDENCE;
        }

        return ConfidenceInterface::UNSUPPORTED_CONFIDENCE;
    }
}
