<?php
/**
 * Vainyl
 *
 * PHP Version 7
 *
 * @package   Data
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types=1);

namespace Vainyl\Data;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Data\Exception\UnsupportedDescriptorException;

/**
 * Class AbstractSource
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractSource extends AbstractIdentifiable implements SourceInterface
{
    /**
     * @param DescriptorInterface $descriptor
     *
     * @return bool
     */
    abstract public function supports(DescriptorInterface $descriptor): bool;

    /**
     * @param DescriptorInterface $descriptor
     *
     * @return mixed
     */
    abstract public function doGetData(DescriptorInterface $descriptor);

    /**
     * @inheritDoc
     */
    public function getData(DescriptorInterface $descriptor)
    {
        if (false === $this->supports($descriptor)) {
            throw new UnsupportedDescriptorException($this, $descriptor);
        }

        return $this->doGetData($descriptor);
    }
}
