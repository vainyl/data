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

namespace Vainyl\Data\Exception;

use Vainyl\Data\DescriptorInterface;
use Vainyl\Data\SinkInterface;

/**
 * Class CannotRetrieveDataException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CannotWriteDataException extends AbstractSinkException
{
    private $descriptor;

    /**
     * CannotRetrieveDataException constructor.
     *
     * @param SinkInterface       $sink
     * @param DescriptorInterface $descriptor
     */
    public function __construct(SinkInterface $sink, DescriptorInterface $descriptor)
    {
        $this->descriptor = $descriptor;
        parent::__construct(
            $sink,
            sprintf(
                'Cannot write data to sink %s by descriptor %s',
                $sink->getName(),
                $descriptor->__toString()
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['descriptor' => $this->descriptor->__toString()], parent::toArray());
    }
}