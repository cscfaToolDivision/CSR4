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

use CSDT\CSR4\Mapper\Manager\MapperManagerInterface;
use CSDT\CSR4\Mapper\Manager\Resolver\MetadataResolverInterface;
use CSDT\CSR4\Mapper\Manager\Resolver\FactoryResolverInterface;
use CSDT\CSR4\Mapper\Manager\Resolver\MapperResolverInterface;
use CSDT\CSR4\Mapper\Manager\Traits\MapperManagerTrait;
use CSDT\CSR4\DataTransformer\Traits\TransformerResolverAwareTrait;

/**
 * AbstractMapperManager.php
 *
 * This abstract class is used as parent for the MapperManager
 *
 * @category Mapper
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
abstract class AbstractMapperManager implements MapperManagerInterface
{
    /**
     * Mapper
     *
     * This property store the managed mappers
     *
     * @var \SplObjectStorage
     */
    private $mappers;

    /**
     * Factories
     *
     * This property store the managed factories
     *
     * @var \SplObjectStorage
     */
    private $factories;

    /**
     * Metadatas
     *
     * This property store the managed metadatas
     *
     * @var \SplObjectStorage
     */
    private $metadatas;

    /**
     * Metadata resolver
     *
     * This property store the metadata resolver used to resolve the
     * metadata on mapping process
     *
     * @var MetadataResolverInterface
     */
    private $metadataResolver;

    /**
     * Factory resolver
     *
     * This property store the factory resolver used to resolve the
     * factory to be used if no mapped object is given
     *
     * @var FactoryResolverInterface
     */
    private $factoryResolver;

    /**
     * Mapper resolver
     *
     * This property store the mapper resolver used to resolve the
     * mapper on mapping process
     *
     * @var MapperResolverInterface
     */
    private $mapperResolver;

    use MapperManagerTrait;

    /**
     * Construct
     *
     * The default AbstractMapperManager constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->mappers = new \SplObjectStorage();
        $this->factories = new \SplObjectStorage();
        $this->metadatas = new \SplObjectStorage();
    }
}
