<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class SettingIndex extends Component
{
    public function runSitemapGenerator()
    {
        Artisan::call('sitemap:generate');
        session()->flash('success', 'Sitemap created.');
    }

    public function runBackup()
    {
        Artisan::call('backup:run');
        session()->flash('success', 'backup created.');
    }

    public function runClear()
    {
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        Artisan::call('view:cache');
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        session()->flash('success', 'cache cleared.');
    }
    public function runBackupDb()
    {
        Artisan::call('backup:run --only-db');
        session()->flash('success', 'backup db created.');
    }

    public function render()
    {
        return view('livewire.setting-index')->layout('layouts.app');
    }
}
