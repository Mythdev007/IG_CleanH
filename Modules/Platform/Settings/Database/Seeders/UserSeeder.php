<?php

namespace Modules\Platform\Settings\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Platform\Core\Helper\CrudHelper;
use Modules\Platform\User\Entities\User;

/**
 * Class SettingsSeeder
 */
class UserSeeder extends Seeder
{

    private static $_GROUPS = [
        ['id' => 1, 'name' => 'Napoli Group', 'company_id' => 1],
        ['id' => 2, 'name' => 'Torino Group', 'company_id' => 1],
        ['id' => 3, 'name' => 'Milano Group', 'company_id' => 1]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->clear();

        $this->addAdmin();
        $this->addCompanyUsers();
    }

    private function clear()
    {
        DB::table('model_has_roles')->truncate();

        DB::table('users')->truncate();

        DB::table('group_user')->truncate();
        DB::table('groups')->truncate();
    }

    private static $firstCompanyUsers = [
        [
            'id' => 2,
            'email' => 'i.rossini@strategicagroup.com',
            'is_active' => 1,
            'first_name' => 'Igor Rossini',
            'last_name' => '(Strategica)',
            'name' => 'Igor Rossini (Strategica)',
            'access_to_all_entity' => 1,
            'language_id' => 2,
            'theme' => 'theme-italgas'
        ],
        [
            'id' => 3,
            'email' => 'i.rossini@vaance.com',
            'is_active' => 1,
            'first_name' => 'Igor Rossini',
            'last_name' => '(Vaance)',
            'name' => 'Igor Rossini (Vaance)',
            'access_to_all_entity' => 1,
            'language_id' => 2,
            'theme' => 'theme-italgas'
        ]
    ];

    private static $secondCompanyUsers = [
        
        
    ];

    private function addAdmin()
    {
        $admin = [
            'id' => 1,
            'email' => 'a.vacca@vaance.com',
            'is_active' => 1,
            'first_name' => 'Platform',
            'last_name' => 'Administrator',
            'name' => 'Platform Administrator',
            'access_to_all_entity' => 1,
            'language_id' => 2,
            'theme' => 'theme-italgas'
        ];

        $admin['password'] = \Illuminate\Support\Facades\Hash::make('admin');;
        $admin['created_at'] = Carbon::now();
        $admin['updated_at'] = Carbon::now();

        DB::table('users')->insert($admin);

        User::find(1)->syncRoles(1);
    }

    private function addCompanyUsers()
    {
        foreach (self::$firstCompanyUsers as $user) {
            $user['password'] = \Illuminate\Support\Facades\Hash::make('admin');
            $user['created_at'] = \Carbon\Carbon::now();
            $user['updated_at'] = \Carbon\Carbon::now();
            $user['company_id'] = 1;
            DB::table('users')->insert($user);
        }

        User::find(2)->syncRoles(2);
        User::find(3)->syncRoles(3);

        DB::table('groups')->insert(CrudHelper::setDatesInArray(self::$_GROUPS));
    }
}
