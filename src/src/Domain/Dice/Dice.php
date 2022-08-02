<?php
declare(strict_types=1);

namespace App\Domain\Dice;

use JsonSerializable;

class Dice implements JsonSerializable
{
    const QUANTITY_DEFAULT = 1;
    const QUANTITY_LIMIT = 5;
    const FACE_DEFAULT = 6;
    const FACE_ALLOWED = [4,6,8,10,12,13,14,15,16,17,18,19,20];

    protected $data = [];

    public function __construct(
        public int $quantity = self::QUANTITY_DEFAULT,
        public int $face = self::FACE_DEFAULT,
    ) {}

    public function isValidQuantity(): bool
    {
        return $this->quantity > 0 && $this->quantity <= self::QUANTITY_LIMIT;
    }

    public function isValidFace(): bool
    {
        return in_array($this->face, self::FACE_ALLOWED);
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'dice' => $this->data,
        ];
    }
}
