<?php

namespace MadWeb\NovaTelescopeLink;

use Laravel\Nova\Tool;
use Laravel\Telescope\Telescope;

class TelescopeLink extends Tool
{
    protected $label;

    const VIEW_NAME = 'nova-telescope-link::navigation';

    public function __construct(?string $label = 'Telescope Debug')
    {
        parent::__construct();

        $this->label = $label;
    }

    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(self::VIEW_NAME, function ($view) {
            $view->with('label', $this->label);
        });
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view(self::VIEW_NAME);
    }
}