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
use Vainyl\Data\Decorator\LoggerSourceDecorator;
use Vainyl\Data\Factory\SourceFactoryInterface;
use Vainyl\Data\SourceInterface;

/**
 * Class LoggerSourceFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LoggerSourceFactoryDecorator extends AbstractSourceFactoryDecorator
{
    private $logger;

    /**
     * LoggerSourceFactoryDecorator constructor.
     *
     * @param SourceFactoryInterface $sourceFactory
     * @param LoggerInterface        $logger
     */
    public function __construct(SourceFactoryInterface $sourceFactory, LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($sourceFactory);
    }

    /**
     * @inheritDoc
     */
    public function decorate(SourceInterface $source): SourceInterface
    {
        return new LoggerSourceDecorator(parent::decorate($source), $this->logger);
    }
}