<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function users($id = null,$sort = "asc"){
        $jsonPath =  storage_path() . "/data/users.json";
        $userJson = file_get_contents($jsonPath);
        $users = json_decode($userJson, true);
        $data = array_filter($users);
        $users = collect($data)
            ->when(!empty($id),function($collection) use($id){
                return $collection->where("id","LIKE",$id);
            })
            ->take(12)
            ->when(!empty(\request()->sort),function($collection) use($id){
                return $collection->sortBy('name',SORT_REGULAR,filter_var(   \request()->sort, FILTER_VALIDATE_BOOLEAN));
            })
            //
            ->values()
            ->toArray();

//        usort($users, function($a, $b) {
//            if ($a['name'] == $b['name']) {
//                return 0;
//            }
//            return ($a['name'] <=> $b['name']) ? -1 : 1;
////            return $a['name'] <=> $b['name'];
//        });
        return json_encode($users);
    }

    public function logs($id = null){
        $jsonPath =  storage_path() . "/data/logs.json";
        $logsData = file_get_contents($jsonPath);
        $logs = json_decode($logsData, true);
        $data = array_filter($logs);
        $logs = collect($data)
            ->when(!empty($id),function($collection) use($id){
                return $collection->where("user_id","LIKE",$id);
            })->toJson();
        return $logs;
//        dd($data);
    }

    public function metas($id = null){
        $jsonPath =  storage_path() . "/data/logs.json";
        $logsData = file_get_contents($jsonPath);
        $logs = json_decode($logsData, true);
        $data = array_filter($logs);
        $logs = collect($data)->where('user_id',$id);
        $result = $logs->pipe(function ($collection) {
            return collect([
                'total_record' => $collection->count('user_id'),
                'total_impression' => $collection->where('type','impression')->count('user_id'),
                'total_conversion' => $collection->where('type','conversion')->count('user_id'),
                'total_revenue' => $collection->where('type','conversion')->sum('revenue'),
                //'per_day_revenue' => $collection->where('type','conversion')->groupBy(DB::Raw('DATE(time)'))
            ]);
        })->toJson();
        return $result;
    }

    public function conversationChart($userid = null){
        $jsonPath =  storage_path() . "/data/logs.json";
        $logsData = file_get_contents($jsonPath);
        $logs = json_decode($logsData, true);
        $data = array_filter($logs);
        $data = collect($data)->where('user_id',$userid)
            ->where('type','conversion')
            ->groupBy(DB::Raw('DATE(time)'))
            ->toArray();
        $data = array_values($data['']);

        // grouping array
        $groups = array();
        foreach ($data as $item) {
            $date = \Carbon\Carbon::parse($item['time']);
            $key = $date->format('m/d');
            if (!array_key_exists($key, $groups)) {
                $groups[$key] = array(
                    'date' => $key,
                    'revenue' => $item["revenue"],
                );
            } else {
                $groups[$key]['revenue'] = $groups[$key]['revenue'] + $item['revenue'];
            }
        }
        usort($groups, function($a, $b) {
            return $a['date'] <=> $b['date'];
        });
        $label = array_column($groups, 'date');
        $revenue = array_column($groups, 'revenue');
        $data = ['label'=>$label,'revenue'=>$revenue];
        return json_encode($data);
    }

}
