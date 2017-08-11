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
 * Class SinkInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SinkInterface extends HandlerInterface
{


    /**
     * @param DescriptorInterface $descriptor
     * @param mixed               $data
     *
     * @return mixed
     */
    public function writeData(DescriptorInterface $descriptor, $data): bool;
}