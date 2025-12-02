<?php

namespace Farzoqe\Feedback;

use Farzoqe\Feedback\View\Components\FeedbackPanel;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class FeedbackServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'feedback');
        $this->publishesMigrations([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ]);
        Blade::component('feedback-panel', FeedbackPanel::class);
        $this->publishes([
            __DIR__.'/../resources/public' => public_path('vendor/feedback'),
        ], 'public');
    }
}
