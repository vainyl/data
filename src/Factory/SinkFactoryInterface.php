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

use Vainyl\Core\IdentifiableInterface;
use Vainyl\Data\SinkInterface;

/**
 * Interface SinkFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SinkFactoryInterface extends IdentifiableInterface
{
    /**
     * @param SinkInterface $sink
     *
     * @return SinkInterface
     */
    public function decorate(SinkInterface $sink): SinkInterface;
}