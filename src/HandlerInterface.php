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

namespace Vainyl\Data;

use Vainyl\Core\NameableInterface;

/**
 * Interface HandlerInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HandlerInterface extends NameableInterface
{
    /**
     * @param DescriptorInterface $descriptor
     *
     * @return bool
     */
    public function supports(DescriptorInterface $descriptor): bool;
}