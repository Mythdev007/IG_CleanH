<?php

namespace Modules\Platform\Settings\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Modules\Platform\Core\Helper\SeederHelper;

/**
 * Class SettingsMenuManagerSeeder
 */
class MenuManagerSeeder extends SeederHelper
{
    private static $_CRM_MENU = [
        
        ['id' => 20, 'order_by' => 3, 'url' => "#", 'label' => "marketing", 'icon' => "trending_up", 'permission' => "marketing", 'parent_id' => 34, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 22, 'order_by' => 3, 'url' => "/contacts", 'label' => "contacts", 'icon' => "contacts", 'permission' => "contacts.browse", 'parent_id' => 20, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 24, 'order_by' => 1, 'url' => "/campaigns", 'label' => "campaigns", 'icon' => "show_chart", 'permission' => "campaigns.browse", 'parent_id' => 20, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 21, 'order_by' => 4, 'url' => "/accounts", 'label' => "accounts", 'icon' => "business", 'permission' => "accounts.browse", 'parent_id' => 20, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],

        ['id' => 25, 'order_by' => 4, 'url' => "#", 'label' => "sales", 'icon' => "my_location", 'permission' => "sales", 'parent_id' => 34, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 26, 'order_by' => 1, 'url' => "/deals", 'label' => "deals", 'icon' => "monetization_on", 'permission' => "deals.browse", 'parent_id' => 25, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 28, 'order_by' => 2, 'url' => "/quotes", 'label' => "quotes", 'icon' => "chat", 'permission' => "quotes.browse", 'parent_id' => 25, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        
        
        
        ['id' => 23, 'order_by' => 2, 'url' => "/leads", 'label' => "leads", 'icon' => "search", 'permission' => "leads.browse", 'parent_id' => 20, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        
        
        
        ['id' => 41, 'order_by' => 2, 'url' => "/calendar", 'label' => "calendar", 'icon' => "event", 'permission' => "calendar", 'parent_id' => null, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        
        ['id' => 27, 'order_by' => 3, 'url' => "/invoices", 'label' => "invoices", 'icon' => "shopping_cart", 'permission' => "invoices.browse", 'parent_id' => 25, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 38, 'order_by' => 3, 'url' => "/vendors", 'label' => "vendors", 'icon' => "pageview", 'permission' => "vendors.browse", 'parent_id' => 33, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        
        ['id' => 29, 'order_by' => 4, 'url' => "/orders", 'label' => "orders", 'icon' => "pageview", 'permission' => "orders.browse", 'parent_id' => 25, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 45, 'order_by' => 5, 'url' => "/testimonials", 'label' => "testimonials", 'icon' => "thumb_up", 'permission' => "testimonials.browse", 'parent_id' => 25, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 30, 'order_by' => 5, 'url' => "#", 'label' => "support", 'icon' => "live_help", 'permission' => "support", 'parent_id' => 34, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 31, 'order_by' => 1, 'url' => "/tickets", 'label' => "tickets", 'icon' => "report_problem", 'permission' => "tickets.browse", 'parent_id' => 30, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 32, 'order_by' => 2, 'url' => "/servicecontracts", 'label' => "service_contracts", 'icon' => "contact_mail", 'permission' => "servicecontracts.browse", 'parent_id' => 30, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        
        ['id' => 33, 'order_by' => 6, 'url' => "#", 'label' => "inventory", 'icon' => "laptop", 'permission' => "inventory", 'parent_id' => 34, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 36, 'order_by' => 1, 'url' => "/assets", 'label' => "assets", 'icon' => "laptop_chromebook", 'permission' => "assets.browse", 'parent_id' => 33, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 35, 'order_by' => 2, 'url' => "/products", 'label' => "products_services", 'icon' => "pageview", 'permission' => "products.browse", 'parent_id' => 33, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        
        ['id' => 43, 'order_by' => 5, 'url' => "#", 'label' => "activity", 'icon' => "work", 'permission' => "activity", 'parent_id' => 34, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 42, 'order_by' => 1, 'url' => "/calls/calls", 'label' => "call_log", 'icon' => "phone", 'permission' => "calls.browse", 'parent_id' => 43, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 44, 'order_by' => 2, 'url' => "/contactrequests/contactrequests", 'label' => "contact_requests", 'icon' => "call_missed", 'permission' => "contactrequests.browse", 'parent_id' => 43, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        
        ['id' => 17, 'order_by' => 1, 'url' => "/dashboard", 'label' => "home", 'icon' => "apps", 'permission' => "", 'parent_id' => null, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        
        ['id' => 40, 'order_by' => 10, 'url' => "/documents", 'label' => "documents", 'icon' => "storage", 'permission' => "documents.browse", 'parent_id' => null, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 39, 'order_by' => 20, 'url' => "/payments", 'label' => "payments", 'icon' => "payment", 'permission' => "payments.browse", 'parent_id' => null, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        
        ['id' => 34, 'order_by' => 90, 'url' => "#", 'label' => "others", 'icon' => "more", 'permission' => "others", 'parent_id' => null, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        ['id' => 18, 'order_by' => 100, 'url' => "/settings", 'label' => "settings", 'icon' => "settings", 'permission' => "company.settings", 'parent_id' => null, 'section' => 1, 'visibility' => 1, 'dont_translate' => 0],
        [
            'id' => 3,
            'order_by' => 3,
            'url' => "/polizzacar",
            'label' => "polizzacar",
            'icon' => "beenhere",
            'permission' => "polizzacar.browse",
            'parent_id' => null,
            'section' => 1,
            'visibility' => 1,
            'dont_translate' => 0
        ],
        [
            'id' => 4,
            'order_by' => 4,
            'url' => "/polizzacar/procurement",
            'label' => "procurement",
            'icon' => "assignment",
            'permission' => "procurement.browse",
            'parent_id' => null,
            'section' => 1,
            'visibility' => 1,
            'dont_translate' => 0
        ]

    ];

    private static $_PLATFORM_MENU = [
        [
            'id' => 1,
            'order_by' => 1,
            'url' => "/dashboard",
            'label' => "home",
            'icon' => "apps",
            'permission' => "",
            'parent_id' => null,
            'section' => 1,
            'visibility' => 1,
            'dont_translate' => 0
        ],
        [
            'id' => 2,
            'order_by' => 2,
            'url' => "/settings",
            'label' => "settings",
            'icon' => "settings",
            'permission' => "company.settings",
            'parent_id' => null,
            'section' => 1,
            'visibility' => 1,
            'dont_translate' => 0
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vaance_menu')->truncate();

        if (config('vaance.clean_platform')) {
            $this->saveOrUpdate('vaance_menu', self::$_PLATFORM_MENU);
        } else {
            $this->saveOrUpdate('vaance_menu', self::$_CRM_MENU);
        }

    }
}
