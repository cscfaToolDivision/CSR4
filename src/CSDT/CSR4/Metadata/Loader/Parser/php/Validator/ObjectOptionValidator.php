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

use CSDT\CSR4\Metadata\Loader\Parser\php\Validator\PropertyOptionValidator;

/**
 * ObjectOptionValidator.php
 *
 * This class is used to validate the object options structure
 *
 * @category Validator
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ObjectOptionValidator
{
    /**
     * Property validator
     *
     * This property store the property validator
     *
     * @var PropertyOptionValidator
     */
    private $propertyValidator;

    /**
     * Construct
     *
     * The default ObjectOptionValidator
     *
     * @param PropertyOptionValidator $validator The property validator
     *
     * @return void
     */
    public function __construct(PropertyOptionValidator $validator)
    {
        $this->propertyValidator = $validator;
    }

    /**
     * Is valid
     *
     * This method validate the object option structure
     *
     * @param array $option The options to validate
     *
     * @return bool
     */
    public function isValid(array $option) : bool
    {

        if (!isset($option['class'])) {
            return false;
        }

        if (isset($option['properties']) && !$this->validateProperties($option)) {
            return false;
        }

        return !boolval(count(array_diff($option, ['class', 'mapper', 'factory', 'properties'])));

    }

    /**
     * Validate properties
     *
     * This method validate the option properties
     *
     * @param array $option The options whence validate the properties
     *
     * @return boolean
     */
    private function validateProperties(array $option) : bool
    {
        if (!is_array($option['properties'])) {
            return false;
        }

        foreach ($option['properties'] as $property) {
            if (!$this->propertyValidator->isValid($property)) {
                return false;
            }
        }

        return true;
    }
}
