<?php

namespace App\Console\Commands;

use App\Models\Access;
use App\Models\AccessMenu;
use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class DatabaseImportCommand extends Command
{
    protected $signature = 'database:import {--file=database} {--batchsize=100} {--method=all}';

    protected $description = 'Import database from php array';

    public $batchSize;

    public $method;

    public function __construct()
    {
        parent::__construct();

        ini_set('memory_limit', -1);
    }

    public function handle()
    {
        $this->batchSize = $this->option('batchsize');
        $this->method = $this->option('method');
        Schema::disableForeignKeyConstraints();
        $status = $this->processData();
        Schema::enableForeignKeyConstraints();

        return $status;
    }

    private function processData()
    {
        $fileName = $this->option('file') ?? 'database';
        $file = storage_path("app/{$fileName}.php");

        $this->info('Loading file.');
        $this->info("File : {$file}");

        if (! Storage::exists("{$fileName}.php")) {
            $this->error('File not found');
            $this->error("{$file} not found.");

            return false;
        }

        require_once $file;

        $tables = get_defined_vars();
        $this->info('File Loaded. Total Tables: '.count(array_keys($tables)));
        $this->newLine();

        $dataMigrations = [
            'access' => [$access],
            'access_menu' => [$access_menu],
            'country' => [$country],
        ];

        if ($this->method == 'all') {
            foreach ($dataMigrations as $method => $param) {
                $this->{$method}(...$param);
            }
        } else {
            $param = $dataMigrations[$this->method];
            $this->{$this->method}(...$param);
        }

        $this->newLine();
        $this->info('Data Processed.');

        return true;
    }

    private function access($access)
    {
        $this->newLine();
        $this->info('importing access table. Total Data: '.count($access));
        $bar = $this->output->createProgressBar(count($access));
        $bar->start();

        foreach ($access as $row) {
            Access::updateOrCreate([
                'id' => $row['id'],
                'name' => $row['name'],
                'active' => $row['active'],
                'created_by' => $row['created_by'],
                'updated_by' => $row['updated_by'],
                'deleted_by' => $row['deleted_by'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
                'deleted_at' => $row['deleted_at'],
            ], [
                'id' => $row['id'],
                'name' => $row['name'],
                'active' => $row['active'],
                'created_by' => $row['created_by'],
                'updated_by' => $row['updated_by'],
                'deleted_by' => $row['deleted_by'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
                'deleted_at' => $row['deleted_at'],
            ]);

            $bar->advance();
        }

        $bar->finish();
    }

    private function access_menu($access_menu)
    {
        $this->newLine();
        $this->info('importing access_menu table. Total Data: '.count($access_menu));
        $bar = $this->output->createProgressBar(count($access_menu));
        $bar->start();

        foreach ($access_menu as $row) {
            AccessMenu::updateOrCreate([
                'id' => $row['id'],
                'access_id' => $row['access_id'],
                'menu_id' => $row['menu_id'],
                'view' => $row['view'],
                'add' => $row['add'],
                'edit' => $row['edit'],
                'delete' => $row['delete'],
                'active' => $row['active'],
                'created_by' => $row['created_by'],
                'updated_by' => $row['updated_by'],
                'deleted_by' => $row['deleted_by'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
                'deleted_at' => $row['deleted_at'],
            ], [
                'id' => $row['id'],
                'access_id' => $row['access_id'],
                'menu_id' => $row['menu_id'],
                'view' => $row['view'],
                'add' => $row['add'],
                'edit' => $row['edit'],
                'delete' => $row['delete'],
                'active' => $row['active'],
                'created_by' => $row['created_by'],
                'updated_by' => $row['updated_by'],
                'deleted_by' => $row['deleted_by'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
                'deleted_at' => $row['deleted_at'],
            ]);

            $bar->advance();
        }

        $bar->finish();
    }

    private function country($country)
    {
        $this->newLine();
        $this->info('importing country table. Total Data: '.count($country));
        $bar = $this->output->createProgressBar(count($country));
        $bar->start();

        foreach ($country as $row) {
            Country::updateOrCreate([
                'id' => $row['id'],
            ], [
                'id' => $row['id'],
                'name' => $row['name'],
                'active' => $row['active'],
                'created_by' => $row['created_by'],
                'updated_by' => $row['updated_by'],
                'deleted_by' => $row['deleted_by'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at'],
                'deleted_at' => $row['deleted_at'],
            ]);

            $bar->advance();
        }

        $bar->finish();
    }
}
