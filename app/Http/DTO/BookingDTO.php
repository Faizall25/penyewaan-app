<?php

namespace App\Http\DTO;

use Illuminate\Support\Facades\Date;

class BookingDTO
{
    public function __construct(
        public ?int $id = 0,
        public ?int $user_id = 0,
        public ?int $vehicle_id = 0,
        public ?int $approver_id = 0,
        public ?Date $start_date = null,
        public ?date $end_date = null,
        public ?string $status = null
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'vehicle_id' => $this->vehicle_id,
            'approver_id' => $this->approver_id,
            'start_date' => $this->start_date ? $this->start_date->hasFormat('Y-m-d') : null,
            'end_date' => $this->end_date ? $this->end_date->hasFormat('Y-m-d') : null,
            'status' => $this->status,
        ];
    }

    public static function fromModel($model): self
    {
        return new self(
            id: $model->id,
            user_id: $model->user_id,
            vehicle_id: $model->vehicle_id,
            approver_id: $model->approver_id,
            start_date: $model->start_date,
            end_date: $model->end_date,
            status: $model->status,
        );
    }
}
