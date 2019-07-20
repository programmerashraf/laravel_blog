<?php
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Intervention\Image\Facades\Image;

define('DS', DIRECTORY_SEPARATOR);

function loadConfig($name){
    return base_path("config".DS.$name.".php");
}

if (!function_exists('isAdmin')) {
	function isAdmin(){
		if (auth()->check() and auth()->user()->admin) {
			return true;
		}
		return false;
	}
}

if (! function_exists("upload")){
    function upload($file,$destination,$name){
        $name = $name . uniqid() . "." . strtolower($file->getClientOriginalExtension());
        $file->move($destination,$name);
        return $destination . "/" . $name;

    }
}
if (! function_exists("menuItems")) {
    function menuItems($events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            if (isAdmin()) {
                $event->menu->add('MAIN NAVIGATION');
                $event->menu->add([
                    'text' => 'Users',
                    'icon' => 'users',
                    'submenu' => [
                        [
                            'text' => 'All users',
                            'url' => 'admin/users',
                            'icon' => 'user',
                        ],
                        [
                            'text' => 'New user',
                            'url' => 'admin/users/create',
                            'icon' => 'user',
                        ],
                    ]
                ]);
            }
        });
    }
}
if (! function_exists("bladeDirectives")) {
    function bladeDirectives()
    {
        Blade::if('admin', function () {
            return isAdmin();
        });
    }
}

if (!function_exists("authPasswordCheck")){
    function authPasswordCheck($password){
        if (\Hash::check($password, auth()->user()->getAuthPassword())){
            return true;
        }
        return false;
    }
}
if (!function_exists("image")) {
    function image($file,$filename){
        Image::make($file)
            ->fit(200, 200)
            ->save($filename, 80);
    }
}

