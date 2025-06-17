<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $values = parent::toArray($request);
        $values['image'] = url('storage/' .$values['image']);
        $values['created'] = date_format(date_create($values['created_at']), 'd-m-y');

        unset($values['created_at'], $values['bio']);
        return $values;
    }
}
