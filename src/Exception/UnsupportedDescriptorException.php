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
use Vainyl\Data\HandlerInterface;

/**
 * Class UnsupportedDescriptorException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedDescriptorException extends AbstractHandlerException
{
    private $descriptor;

    /**
     * UnsupportedDescriptorException constructor.
     *
     * @param HandlerInterface    $handler
     * @param DescriptorInterface $descriptor
     */
    public function __construct(HandlerInterface $handler, DescriptorInterface $descriptor)
    {
        $this->descriptor = $descriptor;
        parent::__construct(
            $handler,
            sprintf(
                'Handler %s does not support descriptor %s',
                $handler->getName(),
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