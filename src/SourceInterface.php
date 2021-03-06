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

/**
 * Interface SourceInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SourceInterface extends HandlerInterface
{
    /**
     * @param DescriptorInterface $descriptor
     *
     * @return mixed
     */
    public function getData(DescriptorInterface $descriptor);
}