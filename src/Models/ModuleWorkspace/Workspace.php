<?php

namespace Projects\WellmedLite\Models\ModuleWorkspace;

use Hanafalah\ModuleRegional\Data\AddressData;
use Hanafalah\ModuleWorkspace\Models\Workspace\Workspace as WorkspaceWorkspace;
use Projects\WellmedLite\Transformers\Workspace\SettingWorkspace;

class Workspace extends WorkspaceWorkspace
{
    public function getSettingResource(){
        return SettingWorkspace::class;
    }

    public function organizationSatuSehat(){return $this->morphOneModel('OrganizationSatuSehat','reference');}
    public function setAddress($flag, array|object $address){
        if (isset($flag)) {
            if (is_object($address) && !$address instanceof AddressData) {
            throw new \Exception('address must be an instance of AddressData');
            }elseif (is_array($address)){
            unset($address['village_model']);
            unset($address['subdistrict_model']);
            $address = AddressData::from($this->mergeArray($address,[
                'flag'       => $flag, 
                'model_id'   => $this->getKey(),
                'model_type' => $this->getMorphClass()
            ]));
            }

            $address = app(config('app.contracts.WellmedAddress'))
                    ->prepareStoreAddress(
                        app(config('app.contracts.AddressData'))::from($address)                        
                    );
            return $address;
        } else {
            return null;
        }
    }

    public function address(){return $this->morphOneModel('WellmedAddress','model');}
    public function addresses(){return $this->morphManyModel('WellmedAddress','model');}
}
