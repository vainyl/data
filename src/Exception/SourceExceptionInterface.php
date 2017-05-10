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
use Vainyl\Data\SourceInterface;

/**
 * Interface SourceExceptionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SourceExceptionInterface extends CoreExceptionInterface
{
    /**
     * @return SourceInterface
     */
    public function getSource(): SourceInterface;
}