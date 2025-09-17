<?php

namespace Projects\WellmedLite\Commands;

use Hanafalah\LaravelPackageGenerator\Commands\GeneratePackageCommand;

class GenerateCommand extends GeneratePackageCommand
{
    protected $signature = 'wellmed-lite:add-package {namespace}
        {--package-author= : Nama author}
        {--package-email= : Email author}
        {--pattern= : Pattern yang digunakan}';

    public function handle(): void
    {
        parent::handle();
    }
}