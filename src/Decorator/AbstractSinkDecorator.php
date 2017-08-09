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

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Data\DescriptorInterface;
use Vainyl\Data\SinkInterface;

/**
 * Class AbstractSourceDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractSinkDecorator extends AbstractIdentifiable implements SinkInterface
{
    private $sink;

    /**
     * AbstractSourceProxy constructor.
     *
     * @param SinkInterface $sink
     */
    public function __construct(SinkInterface $sink)
    {
        $this->sink = $sink;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->sink->getName();
    }

    /**
     * @inheritDoc
     */
    public function supports(DescriptorInterface $descriptor): bool
    {
        return $this->sink->supports($descriptor);
    }

    /**
     * @inheritDoc
     */
    public function writeData(DescriptorInterface $descriptor, $data): bool
    {
        return $this->sink->writeData($descriptor, $data);
    }
}