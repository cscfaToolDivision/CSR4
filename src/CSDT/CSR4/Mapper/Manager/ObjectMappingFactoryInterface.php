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

use CSDT\CSR3\Interfaces\CSR3DTOInterface;
use CSDT\CSR4\Metadata\ObjectMetadata\ObjectMetadataInterface;
use CSDT\CSR4\ConfidenceInterface;

/**
 * ObjectMappingFactory.php
 *
 * This interface define the base method of the mapped object factories
 *
 * @category Mapper
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface ObjectMappingFactoryInterface extends ConfidenceInterface
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
    public function newInstance(CSR3DTOInterface $dto, ObjectMetadataInterface $metadata);


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
    public function support(ObjectMetadataInterface $metadata, CSR3DTOInterface $dto) : int;
}
