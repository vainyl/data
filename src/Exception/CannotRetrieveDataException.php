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
use Vainyl\Data\SourceInterface;

/**
 * Class CannotRetrieveDataException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CannotRetrieveDataException extends AbstractSourceException
{
    private $descriptor;

    /**
     * CannotRetrieveDataException constructor.
     *
     * @param SourceInterface     $source
     * @param DescriptorInterface $descriptor
     */
    public function __construct(SourceInterface $source, DescriptorInterface $descriptor)
    {
        $this->descriptor = $descriptor;
        parent::__construct(
            $source,
            sprintf(
                'Cannot retrieve data from source %s by descriptor %s',
                $source->getName(),
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