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
use Vainyl\Data\Factory\SinkFactoryInterface;
use Vainyl\Data\SinkInterface;

/**
 * Class AbstractSinkFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractSinkFactoryDecorator extends AbstractIdentifiable implements SinkFactoryInterface
{
    private $sinkFactory;

    /**
     * AbstractSinkFactoryDecorator constructor.
     *
     * @param SinkFactoryInterface $sinkFactory
     */
    public function __construct(SinkFactoryInterface $sinkFactory)
    {
        $this->sinkFactory = $sinkFactory;
    }

    /**
     * @inheritDoc
     */
    public function decorate(SinkInterface $sink): SinkInterface
    {
        return $this->sinkFactory->decorate($sink);
    }
}