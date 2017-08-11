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

use Vainyl\Core\AbstractIdentifiable;

/**
 * Class FileDescriptor
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class FileDescriptor extends AbstractIdentifiable implements DescriptorInterface
{
    private $path;

    /**
     * FileDescriptor constructor.
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @inheritDoc
     */
    public function isReadable(): bool
    {
        return is_readable($this->path);
    }

    /**
     * @inheritDoc
     */
    public function isWritable(): bool
    {
        return is_writable($this->path);
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->path;
    }
}