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

use Vainyl\Core\Exception\AbstractCoreException;
use Vainyl\Data\HandlerInterface;

/**
 * Class AbstractHandlerException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractHandlerException extends AbstractCoreException implements HandlerExceptionInterface
{
    private $handler;

    /**
     * AbstractSourceException constructor.
     *
     * @param HandlerInterface $handler
     * @param string           $message
     * @param int              $code
     * @param \Throwable|null  $previous
     */
    public function __construct(
        HandlerInterface $handler,
        string $message,
        int $code = 500,
        \Throwable $previous = null
    ) {
        $this->handler = $handler;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function getHandler(): HandlerInterface
    {
        return $this->handler;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['handler' => $this->handler->getName()], parent::toArray());
    }
}