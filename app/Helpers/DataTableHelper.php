<?php


namespace App\Helpers;

use TCG\Voyager\Actions\EditAction;
use TCG\Voyager\Actions\RestoreAction;
use TCG\Voyager\Facades\Voyager;

/**
 * DataTableHelper
 */
class DataTableHelper {
    /**
     * @param $dataType
     * @return string
     */
    public static function getBrowseColumns($dataType): string
    {
        $browseColumns = [];
        array_push($browseColumns, ['data' => 'id', 'name' => 'id', 'searchable' => false]);
        foreach($dataType->browseRows as $row) {
            if($row->type == 'relationship'){
                array_push($browseColumns, [
                    'data' => $row->details->column,
                    'name' => $row->details->column,
                    'searchable' => true
                ]);
            } else {
                array_push($browseColumns, [
                    'data' => $row->field,
                    'name' => $row->field,
                    'searchable' => true
                ]);
            }
        }
        array_push($browseColumns, ['data' => 'action', 'name' => 'action', 'searchable' => false]);
        return json_encode($browseColumns);
    }

    /**
     * @param $dataType
     * @param $data
     * @param string $slug
     * @return string
     */
    public static function getGeneralActions($dataType, $data, string $slug = ''): string
    {
        $strActions = '';
        foreach (Voyager::actions() as $action) {
            $action = new $action($dataType, $data);
            $slug = str_replace('-', '_', $slug);
            $permissionName = strtolower(str_replace('View', 'Read', $action->getTitle())) . '_' . $slug;

            if ($action instanceof RestoreAction)
                continue;

            if($dataType->slug == 'emails'
                && $action instanceof EditAction
                && $data->Is_final)
                continue;

            if($action->shouldActionDisplayOnDataType()
                && auth()->user()->hasPermission($permissionName)) {
                $strActions .= '<a href="'.$action->getRoute($dataType->name).'"
                        title="'.$action->getTitle().'" '.$action->convertAttributesToHtml().'>
                        <i class="'.$action->getIcon().'"></i><span class="hidden">'.$action->getTitle().'</span></a>';
            }
        }
        return $strActions;
    }

    /**
     * @param $text
     * @param $flag
     * @return string
     */
    public static function getStatusLabel($text, $flag): string
    {
        $class = ($flag == true) ? 'label-success' : 'label-danger';
        return '<label class="label '.$class.'">'.$text.'</label>';
    }
}
