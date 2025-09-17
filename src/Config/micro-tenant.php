<?php

return [
    'database' => [
        'app_tenant'   => [
            'prefix' => 'lite_',
            'suffix' => ''
        ],
        'model_connections' => [
            "central"        => [
                "ApiAccess",
                "Cache",
                "CacheLock",
                "Country",
                "District",
                "Domain",
                "FailedJob",
                "JobBatch",
                "Job",
                "PasswordResetToken",
                "PayloadMonitoring",
                "PersonalAccessToken",
                "Province",
                "Subdistrict",
                "Tenant",
                "UserReference",
                "User",
                "Village",
                "Workspace"
            ],
            "central_app"    => [
                "Encoding",
                "MasterFeature",
                "ModelHasFeature",
                'CentralActivityStatus',
                'CentralActivity'
            ],
            "central_tenant" => [
                "PosTransaction",
                "Transaction",
                "Submission",
                "TransactionHasConsument"
            ]
        ]
    ],
];