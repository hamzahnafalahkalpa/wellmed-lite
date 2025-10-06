<?php

namespace Projects\WellmedLite\Transformers\Workspace;

use Hanafalah\ModuleWorkspace\Resources\Workspace\SettingWorkspace as WorkspaceSettingWorkspace;

class SettingWorkspace extends WorkspaceSettingWorkspace
{
    public function toArray(\Illuminate\Http\Request $request): array
    {
        $arr = [
            "registration"  => [
                "is_examination"=> $this['registration']['is_examination'],
                "examination"=> [
                    "subject" => $this['registration']['examination']['subject'],
                    "object" => $this['registration']['examination']['object'],
                    "assessment" => $this['registration']['examination']['assessment'],
                    "planning" => $this['registration']['examination']['planning']
                ],
                "direct_pos"=> $this['registration']['direct_pos']
            ]
        ];
        $arr = $this->mergeArray(parent::toArray($request), $arr);
        return $arr;
    }
}
