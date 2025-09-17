<?php

use Hanafalah\ModulePatient\{
    Commands as ModulePatientCommands,
};

return [
    'practitioner' => 'Employee',
    'payment_detail' => 'PaymentDetail',
    'patient_types' => [
        'student' => [
            'schema' => 'PatientPeople',
        ]
    ]
];