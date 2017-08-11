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

namespace Vainyl\Data\Factory\Decorator;

use Psr\Log\LoggerInterface;
use Vainyl\Data\Decorator\LoggerSinkDecorator;
use Vainyl\Data\Factory\SinkFactoryInterface;
use Vainyl\Data\SinkInterface;

/**
 * Class LoggerSinkFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LoggerSinkFactoryDecorator extends AbstractSinkFactoryDecorator
{
    private $logger;

    /**
     * LoggerSourceFactoryDecorator constructor.
     *
     * @param SinkFactoryInterface $sinkFactory
     * @param LoggerInterface      $logger
     */
    public function __construct(SinkFactoryInterface $sinkFactory, LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($sinkFactory);
    }

    /**
     * @inheritDoc
     */
    public function decorate(SinkInterface $sink): SinkInterface
    {
        return new LoggerSinkDecorator(parent::decorate($sink), $this->logger);
    }
}