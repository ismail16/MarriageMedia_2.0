<?php

namespace App\Providers;

use App\Http\Resources\Admin\District;
use App\Interfaces\Admin\AuthInterface;
use App\Interfaces\Admin\RoleInterface;
use Illuminate\Support\ServiceProvider;
use App\Http\Resources\Admin\Profession;
use App\Repository\Admin\AuthRepository;
use App\Repository\Admin\RoleRepository;
use App\Interfaces\Web\CustomerInterface;
use App\Interfaces\Web\UserAuthInterface;
use App\Repository\Web\CustomerRepository;
use App\Repository\Web\UserAuthRepository;
use App\Interfaces\Admin\DistrictInterface;
use App\Interfaces\Admin\AdminUserInterface;
use App\Repository\Admin\DistrictRepository;
use App\Interfaces\Admin\GroomBrideInterface;
use App\Interfaces\Admin\PermissionInterface;
use App\Interfaces\Admin\ProfessionInterface;
use App\Interfaces\Web\CustomerAuthInterface;
use App\Repository\Admin\AdminUserRepository;
use App\Repository\Admin\GroomBrideRepository;
use App\Repository\Admin\PermissionRepository;
use App\Repository\Admin\ProfessionRepository;
use App\Repository\Web\CustomerAuthRepository;
use App\Interfaces\Admin\RolePermissionInterface;
use App\Repository\Admin\RolePermissionRepository;
use App\Interfaces\Web\UserInterface as WebUserInterface;
use App\Repository\Web\UserRepository as WebUserRepository;

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
        $this->app->bind(AdminUserInterface::class, AdminUserRepository::class);
        $this->app->bind(ProfessionInterface::class, ProfessionRepository::class);

        $this->app->bind(GroomBrideInterface::class, GroomBrideRepository::class);

        $this->app->bind(DistrictInterface::class, DistrictRepository::class);
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
