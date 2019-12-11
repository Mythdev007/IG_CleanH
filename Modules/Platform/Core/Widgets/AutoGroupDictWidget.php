<?php

namespace Modules\Platform\Core\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Modules\Leads\Entities\Lead;
use Modules\Platform\Core\Datatable\Scope\OwnableEntityScope;

/**
 * Class AutoGroupDictWidget
 * @package Modules\Platform\Core\Widgets
 */
class AutoGroupDictWidget extends AbstractWidget
{
    protected $config = [
        'color' => 'bg-light-green',
        'bg_color' => 'bg-pink',
        'icon' => 'playlist_add_check',
        'title' => 'New',
        'coll_class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-12',
        'icon_color' => '',
        'counter' => 0,
        'icon_type' => 'material',
        'href' => '',
        'max' => 10,
        'dataTableToFilter' => '',
    ];

    public function run()
    {

        $user = \Auth::user();

        $dictEntity = App::make($this->config['dict']);
        $moduleTable = $this->config['moduleTable'];
        $groupBy = $this->config['groupBy'];
        $moduleEntity = $this->config['moduleEntity'];

        $records = DB::table($moduleTable)
            ->whereNull('deleted_at')
            ->selectRaw('count(1) as total, '.$groupBy)
            ->groupBy($groupBy);
     
        // added Said 9/12/2019
        // original was :
        // if (!$user->access_to_all_entity) {
        //   $leadsScope = new OwnableEntityScope($user, $moduleTable, App::make($moduleEntity));
        //   $records = $leadsScope->apply($records);
        if (!$user->access_to_all_entity) {            
            $records = $records->where("owned_by_id", '=', $user->id)
            ->whereNull('deleted_at')
            ->selectRaw('count(1) as total, '.$groupBy)
            ->groupBy($groupBy)->get();
            
        }else{
            $records = $records->get();
        }

        $dictStatus = $dictEntity::all();

        $grouped = [];
        $result = [];

        try {
            foreach ($records as $record) {
                $grouped[$record->$groupBy] = $record->total;
            }
        }catch (\Exception $exception){

        }

        foreach ($dictStatus as $status){
            try {
                $result[$status->id] = [
                    'icon' => $status->icon,
                    'color' => $status->color,
                    'title' => $status->name,
                    'count' => isset($grouped[$status->id]) ? $grouped[$status->id] : 0,
                    'id' => $status->id
                ];
            }catch (\Exception $e){
                $result[$status->id] = 0;
            }
        }

        return view('core::widgets.auto_group_dict_widget', [
            'config' => $this->config,
            'records' => $result
        ]);
    }
}
