<?php

namespace App\Http\DTO\Vehicle;

class VehicleDTO
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