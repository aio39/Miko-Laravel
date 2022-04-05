<?php

namespace App\Helper;

use Carbon\Carbon;
use Illuminate\Support\Str;

if (!function_exists('applyDefaultFindById')) {
    function applyDefaultFindById($request, $query)
    {
        $query->when(request()->filled('with'), function ($query) {
            $withs = explode(',', request('with'));
            if ($withs) {
                $query->with($withs);
            }
            return $query;
        });

        return $query;
    }

}


if (!function_exists('applyDefaultFSW')) {
    function applyDefaultFSW($request, $query)
    {
        ////        ?filter=category:food,id:2
        $query->when(request()->filled('filter'), function ($query) {
            $filters = explode(',', request('filter'));
            foreach ($filters as $filter) {
                [$criteria, $value] = explode(':', $filter);
                if ($value !== "-1") {
                    $query->where($criteria, $value);
                }
            }
            return $query;
        });


//        ?sort=-id,price
        if ($request->sort) {
            $sorts = explode(',', $request->input('sort', ''));
            foreach ($sorts as $sortColumn) {
                $sortDirection = Str::startsWith($sortColumn, '-') ? 'desc' : 'asc';
                $sortColumn = ltrim($sortColumn, '-');
                $query->orderBy($sortColumn, $sortDirection);
            }
        } else {
            $query->orderBy('id','desc');
        }


        // ?with=shop,menu
        $query->when(request()->filled('with'), function ($query) {
            $withs = explode(',', request('with'));
            if ($withs) {
                $query->with($withs);
            }
            return $query;
        });

        $query->when(request()->filled('start') && request()->filled('end'), function ($query) {
            $query->whereBetween('created_at', [request('start'), request('end')]);
            return $query;

//            $start = Carbon::createFromTimestamp(request('start'))->toDateTimeString();
//            $end = Carbon::createFromTimestamp(request('end'))->toDateTimeString();
////            dd($start,$end);
//            $query->whereBetween('created_at',[$start,$end]);
        });

        $query->when(request()->filled('up-start') && request()->filled('up-end'), function ($query) {
            $query->whereBetween('created_at', [request('up-start'), request('up-end')]);
            return $query;
        });


        return $query;
    }


}



//if (! function_exists('camelToSnake')) {
//    function camelToSanke($input ,$capitalizeFirstCharacter = false ){
//        $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
//
//        if (!$capitalizeFirstCharacter) {
//            $str[0] = strtolower($str[0]);
//        }
//
//        return $str;
//    }
//
//}
//
//if (! function_exists('snakeToCamel')) {
//    function snakeToCamel($input ){
//        $pattern = '!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!';
//        preg_match_all($pattern, $input, $matches);
//        $ret = $matches[0];
//        foreach ($ret as &$match) {
//            $match = $match == strtoupper($match) ?
//                strtolower($match) :
//                lcfirst($match);
//        }
//        return implode('_', $ret);
//    }
//
//}
