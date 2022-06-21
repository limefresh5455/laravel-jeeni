<?php


namespace App\Helpers;

use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Menu;

/**
 * CmsDataHelper
 */
class CmsDataHelper {

    /**
     * @return array
     */
    public static function getFooterMenu(): array
    {
        $menu = Menu::where('name', 'front-footer')->first();
        $parentItems = $menu->parent_items->sortBy('order');

        $permissionTree = [];
        foreach ($parentItems as $parent) {
            $parentInfo = [
                'id' => $parent->id,
                'title' => $parent->title
            ];

            $childItems = $parent->children()->orderBy('order')->get();
            $childList = [];
            foreach ($childItems as $child) {
                array_push($childList, [
                    'id' => $child->id,
                    'title' => $child->title,
                    'url' => $child->url,
                    'target' => $child->target
                ]);
            }
            $parentInfo['children'] = $childList;
            array_push($permissionTree, $parentInfo);
        }
        return $permissionTree;
    }
}
