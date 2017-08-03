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
use Vainyl\Data\Factory\SourceFactoryInterface;
use Vainyl\Data\SourceInterface;

/**
 * Class SourceStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SourceStorage extends AbstractStorageDecorator
{
    private $sourceFactory;

    /**
     * SourceStorage constructor.
     *
     * @param StorageInterface       $storage
     * @param SourceFactoryInterface $sourceFactory
     */
    public function __construct(StorageInterface $storage, SourceFactoryInterface $sourceFactory)
    {
        $this->sourceFactory = $sourceFactory;
        parent::__construct($storage);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->sourceFactory->decorate(parent::offsetGet($offset));
    }

    /**
     * @param string $name
     *
     * @return SourceInterface
     */
    public function getSource(string $name): SourceInterface
    {
        return $this->offsetGet($name);
    }
}