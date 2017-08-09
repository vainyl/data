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

use Vainyl\Data\SinkInterface;

/**
 * Class AbstractSinkException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractSinkException extends AbstractHandlerException implements SinkExceptionInterface
{
    /**
     * AbstractSinkException constructor.
     *
     * @param SinkInterface   $sink
     * @param string          $message
     * @param int             $code
     * @param \Exception|null $previous
     */
    public function __construct(SinkInterface $sink, string $message, int $code = 500, \Exception $previous = null)
    {
        parent::__construct($sink, $message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function getSink(): SinkInterface
    {
        return $this->getHandler();
    }
}