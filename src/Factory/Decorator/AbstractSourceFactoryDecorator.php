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

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Data\Factory\SourceFactoryInterface;
use Vainyl\Data\SourceInterface;

/**
 * Class AbstractSourceFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractSourceFactoryDecorator extends AbstractIdentifiable implements SourceFactoryInterface
{
    private $sourceFactory;

    /**
     * AbstractSourceFactoryDecorator constructor.
     *
     * @param SourceFactoryInterface $sourceFactory
     */
    public function __construct(SourceFactoryInterface $sourceFactory)
    {
        $this->sourceFactory = $sourceFactory;
    }

    /**
     * @inheritDoc
     */
    public function decorate(SourceInterface $source): SourceInterface
    {
        return $this->sourceFactory->decorate($source);
    }
}