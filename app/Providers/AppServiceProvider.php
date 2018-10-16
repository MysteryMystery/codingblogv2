<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*View::share("icon_cog",  $this->iconSpan("&#106;"));
        View::share("icon_hamburger", $this->iconSpan("&#116;"));
        View::share("icon_arrow_right", $this->iconSpan("&#87;"));
        View::share("icon_arrow_left", $this->iconSpan("&#119;"));
        View::share("icon_link", $this->iconSpan("&#57;"));

        View::share("icon_cogs", $this->fontAwesome("fa-cogs"));
        View::share("icon_cog", $this->fontAwesome("fa-cog"));
        View::share("icon_user_cog", $this->fontAwesome("fa-user-cog"));
        View::share("icon_bin", $this->fontAwesome("fa-trash-alt"));
        view::share("icon_link", $this->fontAwesome("fa-link"));
        view::share("icon_arrow_left", $this->fontAwesome("fa-angle-double-left"));
        view::share("icon_arrow_right", $this->fontAwesome("fa-angle-double-right"));
        view::share("icon_hamburger", $this->fontAwesome("fa-bars"));
        view::share("icon_dove", $this->fontAwesome("fa-dove"));
        view::share("icon_feather", $this->fontAwesome("fa-feather-alt"));
        view::share("icon_code", $this->fontAwesome("fa-code"));
        view::share("icon_users", $this->fontAwesome("fa-users"));
        view::share("icon_desktop", $this->fontAwesome("fa-desktop"));
        view::share("icon_envelope", $this->fontAwesome("fa-envelope"));
        view::share("icon_signin", $this->fontAwesome("fa-sign-in-alt"));*/

        view::share("icons", new Icons());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function iconSpan($code): string {
        return "<span class=\"icon\">" . $code . "</span>";
    }

    protected function fontAwesome($code): string {
        return '<i class="fas ' . $code . '"></i>';
    }
}

class Icons {
    private $icons = array(
        'sticky_note' => "fa-sticky-note",
        //Cogs 
        "cog" => "fa-cog",
        "cogs" => "fa-cogs",
        "user_cog" => "fa-user-cog",

        "users" => "fa-users",
        //code
        "code" => "fa-code",
        "bin" => "fa-trash-alt",
        "link" => "fa-link",
        "feather" => "fa-feather-alt",
        "envelope" => "fa-envelope",
        "search" => "fa-search",
        "bin" => "fa-trash-alt",
        "desktop" => "fa-desktop",
        "signin" => "fa-sign-in-alt",
        "hamburger" => "fa-bars",
        "arrow_left" => "fa-angle-double-left",
        "arrow_right" => "fa-angle-double-right",
        "cross" => "fa-times",
    );

    private $devIcons = array(
        "ruby" => "devicon-ruby-plain colored",
        "java" => "devicon-java-plain colored",
        "javascript" => "devicon-javascript-plain colored",
        "php" => "devicon-php-plain colored",
    );

    public function __construct() {
        foreach ($this->icons as $key => $value) {
            $this->{$key} = $this->fontAwesome($value);
        }

        foreach ($this->devIcons as $key => $value) {
            $this->{$key} = $this->devIcon($value);
        }
    }

    /**
    * @deprecated
    */
    public function icon($name): string {
        if (array_key_exists($name, $this->$icons))
            return $this->fontAwesome($icons[$name]);
        return $this->icon("sticky_note");
    }

    protected function fontAwesome($code): string {
        return '<i class="fas ' . $code . '"></i>';
    }

    protected function devIcon($code): string {
        return '<i class="' . $code . '"></i>';
    }
}
