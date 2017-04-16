<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category TestFixture
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\Tests\DataTransformer\Loader\ClassLoader\Util;

use CSDT\CSR4\DataTransformer\TransformerInterface;

/**
 * FixtureTransformer.php
 *
 * This transformer is used as a fixture for the ClassTransformerLoader test
 *
 * @category TestFixture
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class FixtureTransformer implements TransformerInterface
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
        return;
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
        return;
    }
}
