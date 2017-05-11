<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category MapperResolver
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\Mapper\Manager\Resolver;

use CSDT\CSR4\Mapper\Manager\Resolver\MapperResolverInterface;
use CSDT\CSR4\Mapper\Manager\Resolver\Traits\MapperResolverTrait;

/**
 * AbstractMapperResolver.php
 *
 * This class is used as parent of the MapperResolver interfaces
 *
 * @category MapperResolver
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
abstract class AbstractMapperResolver implements MapperResolverInterface
{
    use MapperResolverTrait;
}
