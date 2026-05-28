<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HistoricalEvent;
use App\Models\Region;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /*時代別検索*/
    public function getEventsByPeriod($period)
    {
        $regions = Region::orderBy('display_order', 'asc')->get();
        $query = HistoricalEvent::query();
        if (str_starts_with($period, 'BC')) {
            $startYear = -(int)substr($period, 2);
            if ($startYear == -5000) {
                $endYear = -3001;
            } elseif ($startYear == -3000) {
                $endYear = -1001;
            } elseif ($startYear == -1000) {
                $endYear = -1;
            } else {
                $endYear = $startYear + 99;
            }

            $query->whereBetween('year', [$startYear, $endYear]);
        } else {
            $query->where('century', (int)$period);
        }
        $events = $query->orderBy('year', 'asc')->get()->groupBy('region_id');
        $result = $regions->map(function ($region) use ($events) {
            return [
                'region_id' => $region->id,
                'region_name' => $region->name,
                'events' => $events->get($region->id, [])
            ];
        });
        return response()->json($result);
    }

    /*地域別検索*/
    public function getEventsByRegion($region_id)
    {
        $region = Region::with(['historicalEvents'])->findOrFail($region_id);

        return response()->json($region);
    }

    /*地域一覧を取得*/
    public function getRegions()
    {
        return response()->json(Region::orderBy('display_order', 'asc')->get());
    }
}
