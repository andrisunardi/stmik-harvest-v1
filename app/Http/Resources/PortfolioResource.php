<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'status_text' => $this->status->name,
            'portfolio_category' => new PortfolioCategoryResource($this->whenLoaded('portfolioCategory')),
        ];
    }
}
