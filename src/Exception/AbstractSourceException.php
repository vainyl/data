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
use Vainyl\Data\SourceInterface;

/**
 * Class AbstractSourceException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractSourceException extends AbstractCoreException implements SourceExceptionInterface
{
    private $source;

    /**
     * AbstractSourceException constructor.
     *
     * @param SourceInterface $source
     * @param string          $message
     * @param int             $code
     * @param \Exception|null $previous
     */
    public function __construct(SourceInterface $source, string $message, int $code = 500, \Exception $previous = null)
    {
        $this->source = $source;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @inheritDoc
     */
    public function getSource(): SourceInterface
    {
        return $this->source;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return array_merge(['source' => $this->source], parent::toArray());
    }
}