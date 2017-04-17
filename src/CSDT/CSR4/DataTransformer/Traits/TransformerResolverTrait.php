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
namespace CSDT\CSR4\DataTransformer\Traits;

use CSDT\CSR4\DataTransformer\Loader\TransformerLoaderInterface;
use CSDT\CSR4\DataTransformer\TransformerInterface;
use CSDT\CSR4\ConfidenceInterface;
use CSDT\CSR4\DataTransformer\UnsupportedTransformerException;

/**
 * TransformerResolverTrait.php
 *
 * This trait is used to implement the default logic of the
 * TransformerResolverInterface
 *
 * @category DataTransformer
 * @package  CSR4-ObjectMappedDTO
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait TransformerResolverTrait
{
    /**
     * Loaders container
     *
     * This property store the loader container property name
     *
     * @var string
     */
    protected $loadersContainer = 'loaders';

    /**
     * Add transformer loader
     *
     * This method add a data transformer loader to the set of loaders to be used
     * for transformer resolver
     *
     * @param TransformerLoaderInterface $loader The data transformer loader
     *
     * @return void
     */
    public function addTransformerLoader(TransformerLoaderInterface $loader)
    {
        if (!$this->loaders->contains($loader)) {
            $this->loaders->attach($loader);
        }
    }

    /**
     * Resolve
     *
     * This method resolve the loader that is in charge of the transformer loading
     * and return the transformer from the resolved loader
     *
     * @param mixed $transformer The transformer to resolve
     *
     * @return TransformerInterface
     */
    public function resolve($transformer) : TransformerInterface
    {
        $loader = $this->getUpperConfidenceLoader($transformer);

        return $loader->load($transformer);
    }

    /**
     * Get upper confidence loader
     *
     * This method return the loader with the upper onfidence level
     *
     * @param mixed $transformer The transformer to resolve
     *
     * @return \CSDT\CSR4\DataTransformer\Loader\TransformerLoaderInterface|null
     */
    private function getUpperConfidenceLoader($transformer)
    {
        $confidences = new \SplPriorityQueue();

        foreach ($this->{$this->loadersContainer} as $loader) {
            if ($loader instanceof TransformerLoaderInterface) {
                $confidence = $loader->support($transformer);

                if ($confidence === ConfidenceInterface::DEDICATED_CONFIDENCE) {
                    return $loader;
                }

                if ($confidence > ConfidenceInterface::UNSUPPORTED_CONFIDENCE) {
                    $confidences->insert($loader, $confidence);
                }
            }
        }

        try {
            return $confidences->extract();
        } catch (\RuntimeException $exception) {
            throw new UnsupportedTransformerException(
                'No loader found for transformer',
                null,
                $exception
            );
        }
    }
}
