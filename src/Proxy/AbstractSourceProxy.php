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

namespace Vainyl\Data\Proxy;

use Vainyl\Data\DescriptorInterface;
use Vainyl\Data\SourceInterface;

/**
 * Class AbstractSourceProxy
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractSourceProxy implements SourceInterface
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
    public function getData(DescriptorInterface $descriptor)
    {
        return $this->source->getData($descriptor);
    }
}