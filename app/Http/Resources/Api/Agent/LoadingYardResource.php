<?php

namespace App\Http\Resources\Api\Agent;

use Illuminate\Http\Resources\Json\JsonResource;

class LoadingYardResource extends JsonResource
{

    public function toArray($request)
    {
        $agent = auth()->guard('agent')->user();
        $agent_booking_containers = $agent->agent_booking_containers()->wherePivot("created_at", ">=", now()->startOfDay())
            ->wherePivot("created_at", "<=", now()->endOfDay())->wherePivot("booking_container_status", 1)->orWherePivot('superagent_loading_approved', 0)->get();

            $bookingContainers = $this->bookingContainers()->where(function($query) {
                $query->whereStatus(1)->orWhere('superagent_loading_approved', 0);
            })->whereIn("booking_containers.id",$agent_booking_containers->pluck("id")->toArray())->get();

        return [
            "id" => $this->id,
            "title" => $this->title ?? "",
            "booking_containers" =>  BookingContainerResource::collection($bookingContainers)

        ];
    }
}

