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
 * Class UnsupportedDescriptorException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedDescriptorException extends AbstractSourceException
{
    private $descriptor;

    /**
     * UnsupportedDescriptorException constructor.
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
                'Source %s does not support descriptor %s',
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