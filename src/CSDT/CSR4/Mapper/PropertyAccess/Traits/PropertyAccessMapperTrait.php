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
namespace CSDT\CSR4\Mapper\PropertyAccess\Traits;

use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Mapper\MapperInterface;
use CSDT\CSR4\Mapper\MappingException;
use CSDT\CSR4\Mapper\UnsupportedMappedPropertyException;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR4\Metadata\PropertyMetadata\ObjectPropertyMetadataInterface;
use Symfony\Component\PropertyAccess\PropertyAccessor;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use CSDT\CSR4\DataTransformer\TransformerResolverAwareInterface;
use CSDT\CSR4\ConfidenceInterface;

/**
 * MapperTrait.php
 *
 * This trait is used to implement the default MapperInterface
 *
 * @category Mapper
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait PropertyAccessMapperTrait
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
     * @return mixed
     */
    public function mapToObject(
        ObjectMetadataInterface $metadata,
        CSR3DTOInterface $dto,
        &$mappedObject,
        array $group = []
    ) {
        if (!$this->support($metadata, $dto, $mappedObject)) {
            throw new MappingException('Unsupported metadata given');
        }

        $accessor = new PropertyAccessor();

        foreach ($metadata->getObjectProperties() as $property) {
            if (!$this->isGroupValid($group, $property)) {
                continue;
            }

            $targetProperty = $this->getTargetProperty(
                $mappedObject,
                $property->getTargetProperty()
            );

            $this->mapProperty(
                $dto,
                $mappedObject,
                sprintf('[%s]', $property->getProperty()),
                $targetProperty,
                $accessor,
                $this->getPropertyTransformerCallable(
                    $property->getMappedTransformer(),
                    'transformForObject'
                )
            );
        }

        return $mappedObject;
    }

    /**
     * Map to dto
     *
     * This method map the object properties to the DTO properties
     *
     * @param ObjectPropertyMetadataInterface $metadata     The metadata of the DTO
     * @param CSR3DTOInterface                $dto          The dto to map to
     * @param mixed                           $mappedObject The object to map from
     * @param array                           $group        The array of group to
     *                                                      map
     *
     * @return void
     */
    public function mapToDto(
        ObjectMetadataInterface $metadata,
        CSR3DTOInterface $dto,
        &$mappedObject,
        array $group = []
    ) {
        if (!$this->support($metadata, $dto, $mappedObject)) {
            throw new MappingException('Unsupported metadata given');
        }

        $accessor = new PropertyAccessor();

        foreach ($metadata->getObjectProperties() as $property) {
            if (!$this->isGroupValid($group, $property)) {
                continue;
            }

            $targetProperty = $this->getTargetProperty(
                $mappedObject,
                $property->getTargetProperty()
            );

            $this->mapProperty(
                $mappedObject,
                $dto,
                $targetProperty,
                sprintf('[%s]', $property->getProperty()),
                $accessor,
                $this->getPropertyTransformerCallable(
                    $property->getMappedTransformer(),
                    'transformForDTO'
                )
            );
        }
    }

    /**
     * Support
     *
     * This method return a confidence level that indicate which confidence the
     * mapper is able to grant on mapping performing
     *
     * @param ObjectMetadataInterface $metadata     The metadata of the DTO
     * @param CSR3DTOInterface        $dto          The mapped dto
     * @param mixed                   $mappedObject The mapped object
     *
     * @return int a confidence support level
     */
    public function support(
        ObjectMetadataInterface $metadata,
        CSR3DTOInterface $dto,
        $mappedObject
    ) : int {
        if (!$this->validateMetadataObjects($metadata, $dto, $mappedObject)) {
            return ConfidenceInterface::UNSUPPORTED_CONFIDENCE;
        }

        if ($metadata->getDtoMapper() === static::class) {
            return ConfidenceInterface::DEDICATED_CONFIDENCE;
        }

        return ConfidenceInterface::LOW_CONFIDENCE;
    }

    /**
     * Get target property
     *
     * This method return the target property accessor string name
     *
     * @param mixed  $mappedObject The mapped object
     * @param string $propertyName The initial property name
     *
     * @return string
     */
    private function getTargetProperty($mappedObject, string $propertyName)
    {
        if (is_array($mappedObject)) {
            return sprintf('[%s]', $propertyName);
        }

        return $propertyName;
    }

    /**
     * Is group valid
     *
     * This method validate the property availability to be processed according
     * with the given groups
     *
     * @param array                           $groups   The allowed groups
     * @param ObjectPropertyMetadataInterface $property The property metadata
     *
     * @return boolean
     */
    private function isGroupValid(
        array $groups,
        ObjectPropertyMetadataInterface $property
    ) {
        return (
            empty($groups) ||
            boolval(
                count(
                    array_intersect($property->getMappingGroup(), $groups)
                )
            )
        );
    }

    /**
     * Map property
     *
     * This method is in charge of the property mapping execution
     *
     * @param mixed                     $container         The object that contain
     *                                                     the value
     * @param mixed                     $receiver          The object receiver
     * @param string                    $containerProperty The property whence get
     *                                                     the value to be injected
     * @param string                    $receiverProperty  The property that be
     *                                                     injected with the value
     * @param PropertyAccessorInterface $accessor          The property accessor to
     *                                                     perform the mapping
     * @param mixed                     $transformer       The data transformer to
     *                                                     apply
     *
     * @throws UnsupportedMappedPropertyException
     * @return void
     */
    private function mapProperty(
        &$container,
        &$receiver,
        string $containerProperty,
        string $receiverProperty,
        PropertyAccessorInterface $accessor,
        callable $transformer = null
    ) {
        if (!$accessor->isReadable($container, $containerProperty)) {
            throw new UnsupportedMappedPropertyException(
                sprintf(
                    'Property %s::%s is not supported by the current mapper',
                    get_class($container),
                    $containerProperty
                )
            );
        }

        if (!$accessor->isWritable($receiver, $receiverProperty)) {
            throw new UnsupportedMappedPropertyException(
                sprintf(
                    'Property %s::%s is not supported by the current mapper',
                    gettype($receiver) == 'object' ?
                        get_class($receiver) :
                        gettype($receiver),
                    $containerProperty
                )
            );
        }

        $value = $accessor->getValue(
            $container,
            $containerProperty
        );

        if ($transformer !== null) {
            $value = $transformer($value);
        }

        $accessor->setValue(
            $receiver,
            $receiverProperty,
            $value
        );
    }

    /**
     * Get property transformer callable
     *
     * This method return a callable array to use the transformer or null if no
     * transformer can be resolved
     *
     * @param mixed  $transformer The transformer to resolve
     * @param string $method      The method to call on transformer
     *
     * @return []|NULL
     */
    private function getPropertyTransformerCallable($transformer, string $method)
    {
        if ($this instanceof TransformerResolverAwareInterface && !empty($transformer)) {
            return [
                    $this->getTransformerResolver()->resolve($transformer),
                    $method,
                   ];
        }

        if (!empty($transformer)) {
            throw new MappingException('Transformer cannot be resolved');
        }

        return null;
    }

    /**
     * Validate metadata objects
     *
     * This method validate the pertinence of the dot and the mapped object
     * depending of the metadata configuration
     *
     * @param ObjectMetadataInterface $metadata     The metadata of the DTO
     * @param CSR3DTOInterface        $dto          The mapped dto
     * @param mixed                   $mappedObject The mapped object
     *
     * @return boolean
     */
    private function validateMetadataObjects(
        ObjectMetadataInterface $metadata,
        CSR3DTOInterface $dto,
        $mappedObject
    ) {
        $dtoSupport = hash_equals($metadata->getDtoClass(), get_class($dto)) ||
            in_array($metadata->getDtoClass(), class_parents(get_class($dto))) ||
            in_array($metadata->getDtoClass(), class_implements(get_class($dto)));

        $classSupport = (gettype($mappedObject) == $metadata->getMappedClass()) ||
            hash_equals(
                $metadata->getMappedClass(),
                get_class($mappedObject)
            ) ||
            in_array(
                $metadata->getMappedClass(),
                class_parents(get_class($mappedObject))
            ) ||
            in_array(
                $metadata->getMappedClass(),
                class_implements(get_class($mappedObject))
            );

        if ($dtoSupport && $classSupport) {
            return true;
        }

        return false;
    }
}
