<?php

namespace App\Providers;

use App\Interfaces\Admin\AuthInterface;
use App\Interfaces\Admin\RoleInterface;
use App\Interfaces\Admin\UserInterface;
use Illuminate\Support\ServiceProvider;
use App\Repository\Admin\AuthRepository;
use App\Repository\Admin\RoleRepository;
use App\Repository\Admin\UserRepository;
use App\Interfaces\Web\CustomerInterface;
use App\Interfaces\Web\UserInterface as WebUserInterface;
use App\Repository\Web\UserRepository as WebUserRepository;
use App\Interfaces\Web\UserAuthInterface;
use App\Repository\Web\CustomerRepository;
use App\Repository\Web\UserAuthRepository;
use App\Interfaces\Admin\PermissionInterface;
use App\Interfaces\Web\CustomerAuthInterface;
use App\Repository\Admin\PermissionRepository;
use App\Repository\Web\CustomerAuthRepository;
use App\Interfaces\Admin\RolePermissionInterface;
use App\Repository\Admin\RolePermissionRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class, AuthRepository::class);
        $this->app->bind(RoleInterface::class, RoleRepository::class);
        $this->app->bind(RolePermissionInterface::class, RolePermissionRepository::class);
        $this->app->bind(PermissionInterface::class, PermissionRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(WebUserInterface::class, WebUserRepository::class);
        $this->app->bind(UserAuthInterface::class, UserAuthRepository::class);
        $this->app->bind(CustomerAuthInterface::class, CustomerAuthRepository::class);
        $this->app->bind(CustomerInterface::class, CustomerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
