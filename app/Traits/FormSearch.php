<?php
namespace app\Traits;

use Illuminate\Database\Eloquent\Builder;

trait FormSearch {
    function scopeFormSearch(Builder $query,$data=[]) {
        $queryWhere = empty($data) ? $_GET : $data;
        foreach ($queryWhere as $field_where=>$value){
            if(empty($value) || strpos($field_where,'__')<=0) continue;

            list($field,$where)=explode($field_where,'__');
            if(empty($field) || empty($where)) continue;

            switch ($where){
                case 'dgt':
                    $value = $value.' 00:00:00';
                    $query = $query->where($field,'>=',$value);
                    break;
                case 'gt':
                    $query = $query->where($field,'>=',$value);
                    break;
                case 'dlt':
                    $value = $value.' 23:59:59';
                    $query = $query->where($field,'<=',$value);
                    break;
                case 'lt':
                    $query = $query->where($field,'<=',$value);
                    break;
                case 'eq':
                    $query = $query->where($field,$value);
                    break;
                case 'like':
                    $query = $query->where($field,'like',"%$value%");
                    break;
                case 'in':
                    $query = $query->whereIn($field,$value);
                    break;
            }
        }
        return $query;
    }
}