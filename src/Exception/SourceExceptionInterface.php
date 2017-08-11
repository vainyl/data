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

namespace Vainyl\Data\Exception;

use Vainyl\Data\SourceInterface;

/**
 * Interface SourceExceptionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SourceExceptionInterface extends HandlerExceptionInterface
{
    /**
     * @return SourceInterface
     */
    public function getSource(): SourceInterface;
}