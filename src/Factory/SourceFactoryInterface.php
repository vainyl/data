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
use Vainyl\Data\SourceInterface;

/**
 * Interface SourceFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SourceFactoryInterface extends IdentifiableInterface
{
    /**
     * @param SourceInterface $source
     *
     * @return SourceInterface
     */
    public function decorate(SourceInterface $source): SourceInterface;
}