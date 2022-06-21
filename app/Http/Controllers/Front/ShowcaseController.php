<?php

namespace App\Http\Controllers\Front;

use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use App\Models\Showcase;
use App\Traits\AjaxResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


/**
 *
 */
class ShowcaseController extends Controller
{
    use AjaxResponse;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addShowcase(Request $request): JsonResponse
    {
        try {

            $showcaseId = $request->get('hdnShowcaseId', 0);
            $showcase = Showcase::find($showcaseId);
            if(! $showcase instanceof Showcase) {
                $showcase = Showcase::create([
                    'user_id' => auth()->user()->id,
                    'title' => $request->get('nameShowcase'),
                    'description' => $request->get('descriptionShowcase'),
                    'is_active' => true
                ]);
            }

            if($request->hasFile('thumbnailShowcase')) {
                $uploadedFile = $request->file('thumbnailShowcase');
                $storage = StorageHelper::getStorage();
                $storageFileName = 'showcase/'.$showcase->id.'/'.Str::uuid()->toString().'.';
                $storageFileName .= $uploadedFile->getClientOriginalExtension();
                $storage->put($storageFileName, $uploadedFile->getContent(), 'public');
                $fileLocation = $storage->url($storageFileName);
                $showcase->update(['photo' => $fileLocation]);
            }

            return $this->returnSuccess($showcase->toArray(), 'Showcase added successfully');
        } catch (\Exception $ex) {
            return $this->returnFail($ex->getMessage());
        }
     }
}
