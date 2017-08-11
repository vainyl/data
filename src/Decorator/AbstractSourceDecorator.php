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
use Vainyl\Data\SourceInterface;

/**
 * Class AbstractSourceDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractSourceDecorator extends AbstractIdentifiable implements SourceInterface
{
    private $source;

    /**
     * AbstractSourceProxy constructor.
     *
     * @param SourceInterface $source
     */
    public function __construct(SourceInterface $source)
    {
        $this->source = $source;
    }

    /**
     * @inheritDoc
     */
    public function getData(DescriptorInterface $descriptor)
    {
        return $this->source->getData($descriptor);
    }

    /**
     * @inheritDoc
     */
    public function getId(): string
    {
        return $this->source->getId();
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->source->getName();
    }

    /**
     * @inheritDoc
     */
    public function supports(DescriptorInterface $descriptor): bool
    {
        return $this->source->supports($descriptor);
    }
}