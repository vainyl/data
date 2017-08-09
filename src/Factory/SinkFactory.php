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

namespace Vainyl\Data\Factory;

use Vainyl\Core\AbstractIdentifiable;
use Vainyl\Data\SinkInterface;

/**
 * Class SinkFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SinkFactory extends AbstractIdentifiable implements SinkFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function decorate(SinkInterface $sink): SinkInterface
    {
        return $sink;
    }
}