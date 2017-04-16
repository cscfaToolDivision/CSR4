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
namespace CSDT\CSR4\Tests\Mapper\PropertyAccess\Misc;

use CSDT\CSR4\Mapper\MapperInterface;
use CSDT\CSR4\Mapper\PropertyAccess\Traits\PropertyAccessMapperTrait;

/**
 * NoTransformerMapper.php
 *
 * This class is used to validate the property accessor mapper withour transformer
 *
 * @category Test
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class NoTransformerMapper implements MapperInterface
{
    use PropertyAccessMapperTrait;
}
