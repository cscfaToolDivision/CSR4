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
namespace CSDT\CSR4\Mapper\Manager;

use CSDT\CSR4\DataTransformer\TransformerResolverAwareInterface;
use CSDT\CSR4\Mapper\MapperInterface;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR3\Interfaces\CSR3DTOInterface;

/**
 * MapperManagerInterface.php
 *
 * This interface define the base methods of the MapperManager
 * implementation
 *
 * @category Mapper
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface MapperManagerInterface
{
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
    public function addMapper(MapperInterface $mapper);

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
    public function addFactory(ObjectMappingFactoryInterface $factory);

    /**
     * Set metadatas
     *
     * This method allow to set the stored of available metadatas
     *
     * @param array $metadatas An array of ObjectMetadataInterface
     *
     * @return void
     */
    public function setMetadatas(array $metadatas);

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
    public function addMetadata(ObjectMetadataInterface $metadata);

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
    public function mapToObject(CSR3DTOInterface $dto, $mappedObject = null, array $group = []);

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
    public function mapToDto(CSR3DTOInterface $dto, $mappedObject, array $group = []);
}
