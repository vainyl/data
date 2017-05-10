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
use Vainyl\Data\SourceInterface;

/**
 * Class SourceFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SourceFactory extends AbstractIdentifiable implements SourceFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function decorate(SourceInterface $source): SourceInterface
    {
        return $source;
    }
}
