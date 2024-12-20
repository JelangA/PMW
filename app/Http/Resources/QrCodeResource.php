<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QrCodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
	public function toArray($request): array
	{
		return [
			'qr_code_id' => $this->qr_code_id,
			'qr_code_type' => $this->qr_code_type,
			'workshop_id' => $this->workshop_id,
			'qr_code' => $this->qr_code,
			'created_at' => $this->created_at,
		];
	}
}
