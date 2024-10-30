<?php

namespace App\Http\DTO\User;

class UserDTO
{
    public function __construct(
        public ?int $id = 0,
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
        ];
    }

    public static function fromModel($model): self
    {
        return new self(
            id: $model->id,
        );
    }
}
