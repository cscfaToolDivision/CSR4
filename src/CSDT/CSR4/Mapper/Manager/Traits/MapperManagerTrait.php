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
namespace CSDT\CSR4\Mapper\Manager\Traits;

use CSDT\CSR4\DataTransformer\Traits\TransformerResolverAwareTrait;
use CSDT\CSR4\Mapper\MapperInterface;
use CSDT\CSR4\Mapper\Manager\ObjectMappingFactoryInterface;
use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR4\Mapper\Manager\Resolver\MetadataResolverInterface;
use CSDT\CSR4\Mapper\Manager\MetadataResolverException;
use CSDT\CSR4\Mapper\Manager\Resolver\FactoryResolverInterface;
use CSDT\CSR4\Mapper\Manager\Resolver\MapperResolverInterface;
use CSDT\CSR4\Mapper\Manager\FactoryResolverException;
use CSDT\CSR4\Mapper\Manager\MapperResolverException;

/**
 * MapperManagerTrait.php
 *
 * This trait define the base logic of the MapperManager
 *
 * @category Mapper
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait MapperManagerTrait
{
    /**
     * Mapper container
     *
     * This property indicate the  property name where the mappers managed by the
     * MapperManager are stored. The property must be a \SplObjectStorage
     *
     * @var string
     */
    protected $mapperContainer = 'mappers';

    /**
     * Factories container
     *
     * This property indicate the  property name where the factories usables by the
     * MapperManager to instanciate new instances of objects are stored. The property
     * must be a \SplObjectStorage
     *
     * @var string
     */
    protected $factoriesContainer = 'factories';

    /**
     * Metadatas container
     *
     * This property indicate the  property name where the metadata resolvables by the
     * MapperManager are stored. The property must be a \SplObjectStorage
     *
     * @var string
     */
    protected $metadatasContainer = 'metadatas';

    /**
     * Metadata resolver container
     *
     * This property indicate the property name where the metadata resolver is
     * stored. The property must be a MetadataResolverInterface
     *
     * @var string
     */
    protected $metadataResolverContainer = 'metadataResolver';

    /**
     * Factory resolver container
     *
     * This property indicate the property name where the factory resolver is
     * stored. The property must be a FactoryResolverInterface
     *
     * @var string
     */
    protected $factoryResolverContainer = 'factoryResolver';

    /**
     * Mapper resolver container
     *
     * This property indicate the property name where the mapper resolver is
     * stored. The property must be a MapperResolverInterface
     *
     * @var string
     */
    protected $mapperResolverContainer = 'mapperResolver';

    use TransformerResolverAwareTrait;

    /**
     * Set metadata resolver
     *
     * This method allow to set the metadata resolver used to resolve the more efficient
     * metadata for the mapping process
     *
     * @param MetadataResolverInterface $resolver The resolver to store
     *
     * @return $this
     */
    public function setMetadataResolver(MetadataResolverInterface $resolver)
    {
        $this->{$this->metadataResolverContainer} = $resolver;

        return $this;
    }

    /**
     * Set factory resolver
     *
     * This method allow to set the factory resolver used to resolve the more efficient
     * metadata for the mapping process
     *
     * @param FactoryResolverInterface $resolver The resolver to store
     *
     * @return $this
     */
    public function setFactoryResolver(FactoryResolverInterface $resolver)
    {
        $this->{$this->factoryResolverContainer} = $resolver;

        return $this;
    }

    /**
     * Set mapper resolver
     *
     * This method allow to set the mapper resolver used to resolve the more efficient
     * mapper for the mapping process
     *
     * @param MapperResolverInterface $resolver The resolver to store
     *
     * @return $this
     */
    public function setMapperResolver(MapperResolverInterface $resolver)
    {
        $this->{$this->mapperResolverContainer} = $resolver;

        return $this;
    }

    /**
     * Add mapper
     *
     * This method allow to store a new MapperInterface into the manager internal
     * storage to be used on mapping process
     *
     * @param MapperInterface $mapper The mapper to inject
     *
     * @return $this
     */
    public function addMapper(MapperInterface $mapper)
    {
        if (!$this->{$this->mapperContainer}->contains($mapper)) {
            $this->{$this->mapperContainer}->attach($mapper);
        }

        return $this;
    }

    /**
     * Add factory
     *
     * This method allow to store a new ObjectMappingFactoryInterface to be used as
     * object factory if no mapping object is specified on mapToObject process
     *
     * @param ObjectMappingFactoryInterface $factory The factory to inject
     *
     * @return $this
     */
    public function addFactory(ObjectMappingFactoryInterface $factory)
    {
        if (!$this->{$this->factoriesContainer}->contains($factory)) {
            $this->{$this->factoriesContainer}->attach($factory);
        }

        return $this;
    }

    /**
     * Set metadatas
     *
     * This method allow to set the stored of available metadatas
     *
     * @param array $metadatas An array of ObjectMetadataInterface
     *
     * @return void
     */
    public function setMetadatas(array $metadatas)
    {
        foreach ($metadatas as $metadata) {
            $this->addMetadata($metadata);
        }

        return;
    }

    /**
     * Add metadata
     *
     * This method allow to injectt a new ObjectMetadataInterface to define a new
     * mapping capability
     *
     * @param ObjectMetadataInterface $metadata The metadata to add
     *
     * @return void
     */
    public function addMetadata(ObjectMetadataInterface $metadata)
    {
        if ($this->{$this->metadatasContainer}->contains($metadata)) {
            $this->{$this->metadatasContainer}->attach($metadata);
        }

        return;
    }

    /**
     * Map to object
     *
     * This method map a dto to an object or array. It return the resulting object
     * or array
     *
     * @param CSR3DTOInterface $dto          The dto to map from
     * @param mixed            $mappedObject [optional] The object to map to. Can be
     *                                       instanciated from a stored factory if any
     * @param array            $group        [optional] The property group limitation as
     *                                       array
     *
     * @return mixed
     */
    public function mapToObject(CSR3DTOInterface $dto, $mappedObject = null, array $group = [])
    {
        $metadata = $this->getMetadata($dto, $mappedObject);
        $mappedObject = $this->getMappedObject($dto, $metadata, $mappedObject);
        $mapper = $this->getMapper($dto, $metadata, $mappedObject);

        return $mapper->mapToObject($metadata, $dto, $mappedObject, $group);
    }

    /**
     * Map to dto
     *
     * This method map an object or array to a dto. It return the resulting dto
     *
     * @param CSR3DTOInterface $dto          The dto to map to
     * @param mixed            $mappedObject The object or array to map from
     * @param array            $group        [optional] The property group limitation as
     *                                       array
     *
     * @return mixed
     */
    public function mapToDto(CSR3DTOInterface $dto, $mappedObject, array $group = [])
    {
        $metadata = $this->getMetadata($dto, $mappedObject);
        $mapper = $this->getMapper($dto, $metadata, $mappedObject);

        return $mapper->mapToDto($metadata, $dto, $mappedObject, $group);
    }

    /**
     * Resolve metadata
     *
     * This method return a metadata accordingly with the given dto and mapped object
     *
     * @param CSR3DTOInterface $dto          The dto
     * @param unknown          $mappedObject The mapped object
     *
     * @return ObjectMetadataInterface
     */
    private function getMetadata(
        CSR3DTOInterface $dto,
        $mappedObject = null
    ) : ObjectMetadataInterface {
        if ($this->{$this->metadataResolverContainer} === null) {
            throw new MetadataResolverException('No metadata resolver given');
        }

        return $this->{$this->metadataResolverContainer}->resolveMetadata(
            $this->{$this->metadatasContainer},
            $dto,
            $mappedObject
        );
    }

    /**
     * Get mapped object
     *
     * This method return a mapped object to be used in mapping process
     *
     * @param CSR3DTOInterface        $dto          The current dto
     * @param ObjectMetadataInterface $metadata     The current metadata
     * @param mixed                   $mappedObject The mapped object if exist
     *
     * @return mixed
     */
    private function getMappedObject(
        CSR3DTOInterface $dto,
        ObjectMetadataInterface $metadata,
        $mappedObject
    ) {
        if ($this->{$this->factoryResolverContainer} === null) {
            throw new FactoryResolverException('No factory resolver given');
        }

        if ($mappedObject === null) {
            $factory = $this->{$this->factoryResolverContainer}
                ->resolveFactory($metadata, $dto);

            $mappedObject = $factory->newInstance($dto, $metadata);
        }

        return $mappedObject;
    }

    /**
     * Get mapper
     *
     * This method return a mapper to be used in mapping process
     *
     * @param CSR3DTOInterface        $dto          The current dto
     * @param ObjectMetadataInterface $metadata     The current metadata
     * @param mixed                   $mappedObject The mapped object if exist
     *
     * @return MapperInterface
     */
    private function getMapper(
        CSR3DTOInterface $dto,
        ObjectMetadataInterface $metadata,
        $mappedObject
    ) : MapperInterface {
        if ($this->{$this->mapperResolverContainer} === null) {
            throw new MapperResolverException('No mapper resolver given');
        }

        return $this->{$this->mapperResolverContainer}
            ->resolveMapper(
                $this->{$this->mapperContainer},
                $metadata,
                $dto,
                $mappedObject
            );
    }
}
