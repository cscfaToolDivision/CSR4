<?php
/**
 * This file is part of CSR4-ObjectMappedDTO.
 *
 * As each files provides by vallance, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.0
 *
 * @category Validator
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace CSDT\CSR4\Metadata\Loader\Parser\php\Validator;

/**
 * PropertyOptionValidator.php
 *
 * This class is used to validate the property options
 *
 * @category Validator
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class PropertyOptionValidator
{
    /**
     * Is valid
     *
     * This method validate the property option structure
     *
     * @param array $property The property to validate
     *
     * @return boolean
     */
    public function isValid(array $property)
    {
        if (( ! isset($property['property']))
            || ( ! isset($property['target']))
        ) {
            return false;
        }

        return !boolval(
            count(
                array_diff(
                    array_keys($property),
                    [
                     'target',
                     'property',
                     'transformer',
                     'group',
                    ]
                )
            )
        );
    }
}
