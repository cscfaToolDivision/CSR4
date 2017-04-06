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
namespace CSDT\CSR4\DataTransformer\Loader\ClassLoader;

use CSDT\CSR4\DataTransformer\Loader\TransformerLoaderInterface;
use CSDT\CSR4\DataTransformer\TransformerInterface;
use CSDT\CSR4\DataTransformer\UnsupportedTransformerException;

/**
 * ClassTransformerLoader.php
 *
 * This loader is used to load transformer class from their namespace
 *
 * @category DataTransformer
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class ClassTransformerLoader implements TransformerLoaderInterface
{
    /**
     * Load
     *
     * This method load and return a data transformer
     *
     * @param mixed $transformer The transformer
     *
     * @return TransformerInterface
     * @throws UnsupportedTransformerException
     */
    public function load($transformer) : TransformerInterface
    {
        if (boolval($this->support($transformer))) {
            return $this->loadTransformer($transformer);
        }

        throw new UnsupportedTransformerException(
            'The given transformer is not supported'
        );
    }

    /**
     * Load transformer
     *
     * This method create a new instance of the given transformer without arguments
     *
     * @param mixed $transformer The transformer
     *
     * @return object
     */
    private function loadTransformer($transformer)
    {
        return $this->getClassReflection($transformer)->newInstance();
    }

    /**
     * Support
     *
     * This method return a confidence level that indicate which confidence the
     * loader is able to grant on loading transformer
     *
     * @param mixed $transformer The transformer
     *
     * @return int
     */
    public function support($transformer) : int
    {
        if (is_string($transformer) && $this->isTransformer($transformer)) {
            return $this->getArgumentsConfidence($transformer);
        }

        return self::UNSUPPORTED_CONFIDENCE;
    }

    /**
     * Get arguments confidence
     *
     * This method return a confidence level that represent the transformer
     * constructor arguments support
     *
     * @param mixed $transformer The transformer
     *
     * @return int
     */
    protected function getArgumentsConfidence($transformer)
    {
        if ($this->hasRequiredArguments($transformer)) {
            return self::UNSUPPORTED_CONFIDENCE;
        }

        if ($this->hasArguments($transformer)) {
            return self::LOW_CONFIDENCE;
        }

        return self::MEDIUM_CONFIDENCE;
    }

    /**
     * Has arguments
     *
     * This method return the arguments number of the transformer constructor
     *
     * @param mixed $transformer The transformer
     *
     * @return boolean
     */
    private function hasArguments($transformer)
    {
        $constructor = $this->getClassReflection($transformer)
            ->getConstructor();

        if ($constructor === null) {
            return false;
        }

        return boolval($constructor->getNumberOfParameters());
    }

    /**
     * Has required arguments
     *
     * This method return the required arguments number of the transformer
     * constructor
     *
     * @param mixed $transformer The transformer
     *
     * @return boolean
     */
    private function hasRequiredArguments($transformer)
    {
        $constructor = $this->getClassReflection($transformer)
            ->getConstructor();

        if ($constructor === null) {
            return false;
        }

        return boolval($constructor->getNumberOfRequiredParameters());
    }

    /**
     * Is transformer
     *
     * This method validate the TransformerInterface implementation
     *
     * @param mixed $transformer The transformer
     *
     * @return boolean
     */
    private function isTransformer($transformer)
    {
        return $this->isClass($transformer) && in_array(
            TransformerInterface::class,
            class_implements($transformer)
        );
    }

    /**
     * Is class
     *
     * This method validate that the given transformer is an existing class
     *
     * @param mixed $transformer The transformer
     *
     * @return boolean
     */
    private function isClass($transformer)
    {
        return class_exists($transformer);
    }

    /**
     * Get class reflection
     *
     * This method return a class reflection of the given transformer
     *
     * @param mixed $transformer The transformer
     *
     * @return \ReflectionClass
     */
    private function getClassReflection($transformer)
    {
        return new \ReflectionClass($transformer);
        ;
    }
}
