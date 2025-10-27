<?php

namespace Projects\WellmedLite\Controllers\API\ItemManagement\Item;

use Hanafalah\ModuleItem\Contracts\Schemas\Item;
use Projects\WellmedLite\Controllers\API\ApiController;
use Projects\WellmedLite\Requests\API\ItemManagement\Item\{
    DeleteRequest, StoreRequest, ViewRequest, ShowRequest
};

class ItemController extends ApiController{
    public function __construct(
        protected Item $__schema    
    ){
        parent::__construct();
    }

    public function index(ViewRequest $request) {
        $flag = request()->flag ?? [
            $this->MedicineModelMorph(),
            $this->MedicToolModelMorph()
        ];
        request()->merge([
            'flag' => $flag
        ]);
        return $this->__schema->viewItemPaginate();
    }

    public function store(StoreRequest $request){
        $data = request()->all();
        $reference = $data['medicine'] ?? $data['medic_tool'] ?? $data['reagent'];
        $data['reference'] = $reference;
        request()->replade($data);
        return $this->__schema->storeItem();
    }

    public function show(ShowRequest $request){
        return $this->__schema->showItem();
    }

    public function destroy(DeleteRequest $request){
        return $this->__schema->deleteItem();
    }
}
