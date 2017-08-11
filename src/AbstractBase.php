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
use Vainyl\Data\Exception\CannotRetrieveDataException;
use Vainyl\Data\Exception\CannotWriteDataException;
use Vainyl\Data\Exception\UnsupportedDescriptorException;

/**
 * Class AbstractBase
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractBase extends AbstractIdentifiable implements SourceInterface, SinkInterface
{
    /**
     * @param DescriptorInterface $descriptor
     * @param mixed               $data
     *
     * @return bool
     */
    abstract public function doWriteData(DescriptorInterface $descriptor, $data): bool;

    /**
     * @param DescriptorInterface $descriptor
     *
     * @return mixed
     */
    abstract public function doGetData(DescriptorInterface $descriptor);

    /**
     * @inheritDoc
     */
    public function writeData(DescriptorInterface $descriptor, $data): bool
    {
        if (false === $this->supports($descriptor)) {
            throw new UnsupportedDescriptorException($this, $descriptor);
        }

        if (false === $descriptor->isWritable()) {
            throw new CannotWriteDataException($this, $descriptor);
        }

        return $this->doWriteData($descriptor, $data);
    }

    /**
     * @inheritDoc
     */
    public function getData(DescriptorInterface $descriptor)
    {
        if (false === $this->supports($descriptor)) {
            throw new UnsupportedDescriptorException($this, $descriptor);
        }

        if (false === $descriptor->isReadable()) {
            throw new CannotRetrieveDataException($this, $descriptor);
        }

        return $this->doGetData($descriptor);
    }
}