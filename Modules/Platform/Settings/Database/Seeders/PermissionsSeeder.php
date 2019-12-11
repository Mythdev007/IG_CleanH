<?php

namespace Modules\Platform\Settings\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Modules\Platform\Companies\Entities\Company;
use Modules\Platform\Core\Helper\CrudHelper;
use Modules\Platform\Core\Helper\SeederHelper;
use Modules\Platform\User\Entities\Role;
use Modules\Platform\User\Repositories\RoleRepository;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

/**
 * Class SettingsSeeder
 */
class PermissionsSeeder extends SeederHelper
{

    public function dictionary($companyId)
    {
        $roles = [
        ['display_name' => 'Strategica', 'name' => 'strategica', 'guard_name' => 'web','company_id' => $companyId],
        ['display_name' => 'Buyer Supervisor', 'name' => 'buyer_supervisor', 'guard_name' => 'web', 'company_id' => $companyId],
        ['display_name' => 'Buyer', 'name' => 'buyer', 'guard_name' => 'web', 'company_id' => $companyId],
        ['display_name' => 'User', 'name' => 'user', 'guard_name' => 'web', 'company_id' => $companyId]
        ];

        DB::table('roles')->insert(CrudHelper::setDatesInArray($roles));

        $this->addBackendPermissions($companyId);
        $this->addUserRolePermissions($companyId);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->clear();

        $this->addAdminPermissions();

        $this->dictionary($this->firstCompany());
        $this->dictionary($this->secondCompany());
    }

    private function clear()
    {
        \Schema::disableForeignKeyConstraints();

        DB::table('roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
    }

    /**
     * Admin permissions
     */
    private function addAdminPermissions()
    {

        $roles = [['id' => '1', 'display_name' => 'Admin', 'name' => 'admin', 'guard_name' => 'web']];

        //Default Permission & Role seeder
        $roleRepo = \App::make(RoleRepository::class);

        // Synchronize permissions
        $result = $roleRepo->synchModulePermissions(true);

        app(PermissionRegistrar::class)->forgetCachedPermissions();

        DB::table('roles')->insert(CrudHelper::setDatesInArray($roles));

        $admin = Role::findById(1);

        $permissions = \Spatie\Permission\Models\Permission::all();

        if (count($permissions) == 0) {
            $roleRepo->synchModulePermissions();

            $permissions = Permission::all();
        }

        foreach ($permissions as $permission) {
            $admin->permissions()->attach($permission->id);
        }
    }

    /**
     * Company Default Permissions
     * @param $companyId
     */
    private function addUserRolePermissions($companyId)
    {

        $roleRepo = \App::make(RoleRepository::class);

        $roleUser = Role::where('name', 'user')->where('company_id', $companyId)->first();


        $permissions = \Spatie\Permission\Models\Permission::all()
            ->where('name','=','polizzacar.browse');

        try {
            $company = Company::findOrFail($companyId);

            if ($company != null && $company->plan != null) {
                if($company->plan->permissions->count() > 0) {
                    $permissions = $company->plan->permissions;
                }
            }
        }catch (\Exception $exception){

        }

        $permissions = $permissions->where('name','=','polizzacar.browse');
            
        if (count($permissions) == 0) {
            $roleRepo->synchModulePermissions();

            $permissions = Permission::all();
        }

        foreach ($permissions as $permission) {
            $roleUser->permissions()->attach($permission->id);
        }

    }

    /**
     * Company Default Permissions
     * @param $companyId
     */
    private function addBackendPermissions($companyId)
    {

        $roleRepo = \App::make(RoleRepository::class);

        $Strategica = Role::where('name', 'strategica')->where('company_id', $companyId)->first();
        $BuyerSupervisor = Role::where('name', 'buyer_supervisor')->where('company_id', $companyId)->first();
        $Buyer = Role::where('name', 'buyer')->where('company_id', $companyId)->first();

        $permissions = \Spatie\Permission\Models\Permission::all()
            ->where('name','!=','company.settings')
            ->where('name','!=','settings.access')
              
            ->where('name','!=','advanced_view.manage_public')

            ->where('name','!=','accounts.browse')
            ->where('name','!=','accounts.create')
            ->where('name','!=','accounts.destroy')
            ->where('name','!=','accounts.settings')
            ->where('name','!=','accounts.update')

            ->where('name','!=','assets.browse')
            ->where('name','!=','assets.create')
            ->where('name','!=','assets.destroy')
            ->where('name','!=','assets.settings')
            ->where('name','!=','assets.update')

            ->where('name','!=','calendar')
            ->where('name','!=','calendar.browse')
            ->where('name','!=','calendar.create')
            ->where('name','!=','calendar.destroy')
            ->where('name','!=','calendar.settings')
            ->where('name','!=','calendar.update')
            
            ->where('name','!=','calls.browse')
            ->where('name','!=','calls.create')
            ->where('name','!=','calls.destroy')
            ->where('name','!=','calls.settings')
            ->where('name','!=','calls.update')
            
            ->where('name','!=','campaigns.browse')
            ->where('name','!=','campaigns.create')
            ->where('name','!=','campaigns.destroy')
            ->where('name','!=','campaigns.settings')
            ->where('name','!=','campaigns.update')

            ->where('name','!=','activity')

            ->where('name','!=','others')

            ->where('name','!=','others')

            ->where('name','!=','contactmailinglists.browse')
            ->where('name','!=','contactmailinglists.create')
            ->where('name','!=','contactmailinglists.destroy')
            ->where('name','!=','contactmailinglists.settings')
            ->where('name','!=','contactmailinglists.update')

            ->where('name','!=','contactrequests.browse')
            ->where('name','!=','contactrequests.create')
            ->where('name','!=','contactrequests.destroy')
            ->where('name','!=','contactrequests.settings')
            ->where('name','!=','contactrequests.update')

            ->where('name','!=','marketing')

            ->where('name','!=','deals.browse')
            ->where('name','!=','deals.create')
            ->where('name','!=','deals.destroy')
            ->where('name','!=','deals.settings')
            ->where('name','!=','deals.update')

            ->where('name','!=','event.browse')
            ->where('name','!=','event.create')
            ->where('name','!=','event.destroy')
            ->where('name','!=','event.settings')
            ->where('name','!=','event.update')

            ->where('name','!=','inventory')

            ->where('name','!=','invoices.create')
            ->where('name','!=','invoices.destroy')
            ->where('name','!=','invoices.settings')
            ->where('name','!=','invoices.update')
            ->where('name','!=','invoices.browse')

            ->where('name','!=','leads.create')
            ->where('name','!=','leads.destroy')
            ->where('name','!=','leads.settings')
            ->where('name','!=','leads.update')
            ->where('name','!=','leads.browse')
            
            ->where('name','!=','products.create')
            ->where('name','!=','products.destroy')
            ->where('name','!=','products.settings')
            ->where('name','!=','products.update')
            ->where('name','!=','products.browse')

            ->where('name','!=','quotes.create')
            ->where('name','!=','quotes.destroy')
            ->where('name','!=','quotes.settings')
            ->where('name','!=','quotes.update')
            ->where('name','!=','quotes.browse')

            ->where('name','!=','sales')

            ->where('name','!=','sentemails.create')
            ->where('name','!=','sentemails.destroy')
            ->where('name','!=','sentemails.settings')
            ->where('name','!=','sentemails.update')
            ->where('name','!=','sentemails.browse')

            ->where('name','!=','servicecontracts.create')
            ->where('name','!=','servicecontracts.destroy')
            ->where('name','!=','servicecontracts.settings')
            ->where('name','!=','servicecontracts.update')
            ->where('name','!=','servicecontracts.browse')

            ->where('name','!=','support')

            ->where('name','!=','testimonials.create')
            ->where('name','!=','testimonials.destroy')
            ->where('name','!=','testimonials.settings')
            ->where('name','!=','testimonials.update')
            ->where('name','!=','testimonials.browse')

            ->where('name','!=','tickets.create')
            ->where('name','!=','tickets.destroy')
            ->where('name','!=','tickets.settings')
            ->where('name','!=','tickets.update')
            ->where('name','!=','tickets.browse')

            ->where('name','!=','vendors.create')
            ->where('name','!=','vendors.destroy')
            ->where('name','!=','vendors.settings')
            ->where('name','!=','vendors.update')
            ->where('name','!=','vendors.browse')

            ;

        try {
            $company = Company::findOrFail($companyId);
            if ($company != null && $company->plan != null) {
                if($company->plan->permissions->count() > 0) {
                    $permissions = $company->plan->permissions;
                }
            }
        }catch (\Exception $exception){

        }

        foreach ($permissions as $permission) {
            $Strategica->permissions()->attach($permission->id);
            $BuyerSupervisor->permissions()->attach($permission->id);
            $Buyer->permissions()->attach($permission->id);
        }

    }
}
