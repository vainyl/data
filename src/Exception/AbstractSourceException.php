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
 * Class AbstractSourceException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractSourceException extends AbstractHandlerException implements SourceExceptionInterface
{
    /**
     * AbstractSourceException constructor.
     *
     * @param SourceInterface $handler
     * @param string          $message
     * @param int             $code
     * @param \Throwable|null $previous
     */
    public function __construct(SourceInterface $handler, string $message, int $code = 500, \Throwable $previous = null)
    {
        parent::__construct($handler, $message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function getSource(): SourceInterface
    {
        return $this->getHandler();
    }
}