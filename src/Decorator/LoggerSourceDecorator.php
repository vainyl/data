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
use Vainyl\Data\SourceInterface;

/**
 * Class LoggerSourceDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LoggerSourceDecorator extends AbstractSourceDecorator
{
    private $logger;

    /**
     * LoggerSourceDecorator constructor.
     *
     * @param SourceInterface $source
     * @param LoggerInterface $logger
     */
    public function __construct(SourceInterface $source, LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($source);
    }

    /**
     * @inheritDoc
     */
    public function getData(DescriptorInterface $descriptor)
    {
        $this->logger->debug(
            sprintf('Retrieving data with source %s by descriptor %s', $this->getName(), $descriptor->__toString())
        );
        $data = parent::getData($descriptor);
        $this->logger->debug(
            sprintf(
                'Obtained data %s with source %s by descriptor %s',
                json_encode($data),
                $this->getName(),
                $descriptor->__toString()
            )
        );

        return $data;
    }
}