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

use Vainyl\Core\Exception\CoreExceptionInterface;
use Vainyl\Data\HandlerInterface;

/**
 * Interface HandlerExceptionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HandlerExceptionInterface extends CoreExceptionInterface
{
    /**
     * @return HandlerInterface
     */
    public function getHandler() : HandlerInterface;
}