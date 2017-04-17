<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category DataTransformer
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\DataTransformer;

/**
 * TransformerInterface.php
 *
 * This interface define the default methods of the transformers
 *
 * @category DataTransformer
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface TransformerInterface
{
    /**
     * Transform for object
     *
     * This method is in charge of the transformation of the data before it
     * injection into a mapped object
     *
     * @param mixed $data The data to transform
     *
     * @return mixed
     */
    public function transformForObject($data);

    /**
     * Transform for DTO
     *
     * This method is in charge of the transformation of the data before it
     * injection into a DTO
     *
     * @param mixed $data The data to transform
     *
     * @return mixed
     */
    public function transformForDto($data);
}
