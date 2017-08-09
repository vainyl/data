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

namespace Vainyl\Data\Decorator;

use Psr\Log\LoggerInterface;
use Vainyl\Data\DescriptorInterface;
use Vainyl\Data\SinkInterface;

/**
 * Class LoggerSinkDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LoggerSinkDecorator extends AbstractSinkDecorator
{
    private $logger;

    /**
     * LoggerSourceDecorator constructor.
     *
     * @param SinkInterface   $sink
     * @param LoggerInterface $logger
     */
    public function __construct(SinkInterface $sink, LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($sink);
    }

    /**
     * @inheritDoc
     */
    public function writeData(DescriptorInterface $descriptor, $data): bool
    {
        $this->logger->debug(
            sprintf('Writing data with sink %s by descriptor %s', $this->getName(), $descriptor->__toString())
        );
        if (parent::writeData($descriptor, $data)) {
            $this->logger->debug(
                sprintf(
                    'Successfully wrote data with sink %s by descriptor %s',
                    $this->getName(),
                    $descriptor->__toString()
                )
            );
        } else {
            $this->logger->warning(
                sprintf(
                    'Failed to write data with sink %s by descriptor %s',
                    json_encode($data),
                    $this->getName(),
                    $descriptor->__toString()
                )
            );
        }

        return $data;
    }
}