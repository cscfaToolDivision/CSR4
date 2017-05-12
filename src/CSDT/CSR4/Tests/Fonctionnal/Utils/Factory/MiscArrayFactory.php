<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\Tests\Fonctionnal\Utils\Factory;

use CSDT\CSR4\Mapper\Manager\ObjectMappingFactoryInterface;
use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;

/**
 * ArrayFactory.php
 *
 * This class is used by the tests to provide array
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class MiscArrayFactory implements ObjectMappingFactoryInterface
{
    /**
     * New instance
     *
     * This method create a new object instance and return it
     *
     * @param CSR3DTOInterface        $dto      The current dto element
     * @param ObjectMetadataInterface $metadata The current metadata
     *
     * @return mixed
     */
    public function newInstance(CSR3DTOInterface $dto, ObjectMetadataInterface $metadata)
    {
        if (!$this->support($metadata, $dto)) {
            throw new \Exception();
        }
        return [];
    }

    /**
     * Support
     *
     * This method return a confidence level to define the capability of the factory
     * to create a new instance accordingly with the expected metadata object target
     *
     * @param ObjectMetadataInterface $metadata The current metadata
     * @param CSR3DTOInterface        $dto      The current dto
     *
     * @return int
     */
    public function support(ObjectMetadataInterface $metadata, CSR3DTOInterface $dto) : int
    {
        return $metadata->getMappedClass() == 'array' && $metadata->getDtoClass() == get_class($dto);
    }
}
