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

namespace Vainyl\Data\Storage;

use Vainyl\Core\Storage\Decorator\AbstractStorageDecorator;
use Vainyl\Core\Storage\StorageInterface;
use Vainyl\Data\Factory\SinkFactoryInterface;
use Vainyl\Data\Factory\SourceFactoryInterface;
use Vainyl\Data\SinkInterface;
use Vainyl\Data\SourceInterface;

/**
 * Class HandlerStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class HandlerStorage extends AbstractStorageDecorator
{
    private $sourceFactory;

    private $sinkFactory;

    /**
     * HandlerStorage constructor.
     *
     * @param StorageInterface       $storage
     * @param SourceFactoryInterface $sourceFactory
     * @param SinkFactoryInterface   $sinkFactory
     */
    public function __construct(
        StorageInterface $storage,
        SourceFactoryInterface $sourceFactory,
        SinkFactoryInterface $sinkFactory
    ) {
        $this->sourceFactory = $sourceFactory;
        $this->sinkFactory = $sinkFactory;
        parent::__construct($storage);
    }

    /**
     * @param SinkInterface $sink
     *
     * @return HandlerStorage
     */
    public function addSink(SinkInterface $sink): HandlerStorage
    {
        return $this->offsetSet('sink.' . $sink->getName(), $sink);
    }

    /**
     * @param SourceInterface $source
     *
     * @return HandlerStorage
     */
    public function addSource(SourceInterface $source): HandlerStorage
    {
        return $this->offsetSet('source.' . $source->getName(), $source);
    }

    /**
     * @param string $name
     *
     * @return SinkInterface
     */
    public function getSink(string $name): SinkInterface
    {
        return $this->offsetGet('sink.' . $name);
    }

    /**
     * @param string $name
     *
     * @return SourceInterface
     */
    public function getSource(string $name): SourceInterface
    {
        return $this->offsetGet('source.' . $name);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->sourceFactory->decorate(parent::offsetGet($offset));
    }
}