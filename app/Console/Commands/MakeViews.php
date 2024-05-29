<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:views {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a set of views for a resource';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $viewPath = resource_path('views/' . $name);

        if (!File::exists($viewPath)) {
            File::makeDirectory($viewPath, 0755, true);
        }

        $views = ['index', 'show', 'create', 'edit'];
        foreach ($views as $view) {
            $filePath = $viewPath . '/' . $view . '.blade.php';
            if (!File::exists($filePath)) {
                File::put($filePath, "<!-- View: {$name}.{$view} -->");
                $this->info("View created: {$filePath}");
            } else {
                $this->warn("View already exists: {$filePath}");
            }
        }

        return Command::SUCCESS;
    }
}
