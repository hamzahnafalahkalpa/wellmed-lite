<?php

namespace Projects\WellmedLite\Commands;

use Hanafalah\MicroTenant\Commands\AddTenantCommand as CommandsAddTenantCommand;

class AddTenantCommand extends CommandsAddTenantCommand
{
    protected $signature = 'wellmed-lite:add-tenant 
                            {--project_name= : Nama project}
                            {--group_name= : Nama group}
                            {--tenant_name= : Nama tenant}';
}