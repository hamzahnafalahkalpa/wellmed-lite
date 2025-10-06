<?php

namespace Projects\WellmedLite\Models\ModuleWorkspace;

use Hanafalah\ModuleWorkspace\Models\Workspace\Workspace as WorkspaceWorkspace;
use Projects\WellmedLite\Transformers\Workspace\SettingWorkspace;

class Workspace extends WorkspaceWorkspace
{
    public function getSettingResource(){
        return SettingWorkspace::class;
    }
}
