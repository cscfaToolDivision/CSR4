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
namespace CSDT\CSR4\Tests\Fonctionnal\Utils\Transformer;

use CSDT\CSR4\DataTransformer\TransformerInterface;

/**
 * MiscMd5Transformer.php
 *
 * This class is used by the tests for transform a mapping data
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class MiscMd5Transformer implements TransformerInterface
{
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
    public function transformForDto($data)
    {
        return $data;
    }

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
    public function transformForObject($data)
    {
        return md5($data);
    }
}
