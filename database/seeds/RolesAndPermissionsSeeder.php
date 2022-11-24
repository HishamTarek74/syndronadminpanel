<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\AppTables;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class ]->forgetCachedPermissions();

        // create permissions
        $data = [
            // Managers
            ['name' => 'Managers create', 'type' => 'Managers', 'guard_name' => 'web'],
            ['name' => 'Managers update', 'type' => 'Managers', 'guard_name' => 'web'],
            ['name' => 'Managers list', 'type' => 'Managers', 'guard_name' => 'web'],
            ['name' => 'Managers show', 'type' => 'Managers', 'guard_name' => 'web'],
            ['name' => 'Managers delete', 'type' => 'Managers',  'guard_name' => 'web'],

            // roles
            ['name' => 'Roles create', 'type' => 'Roles', 'guard_name' => 'web'],
            ['name' => 'Roles update', 'type' => 'Roles', 'guard_name' => 'web'],
            ['name' => 'Roles list', 'type' => 'Roles', 'guard_name' => 'web'],
            ['name' => 'Roles show', 'type' => 'Roles', 'guard_name' => 'web'],
            ['name' => 'Roles delete', 'type' => 'Roles', 'guard_name' => 'web'],

            // Admin
            ['name' => 'Admins create', 'type' => 'Admins', 'guard_name' => 'web'],
            ['name' => 'Admins update', 'type' => 'Admins', 'guard_name' => 'web'],
            ['name' => 'Admins list', 'type' => 'Admins', 'guard_name' => 'web'],
            ['name' => 'Admins show', 'type' => 'Admins', 'guard_name' => 'web'],
            ['name' => 'Admins delete', 'type' => 'Admins', 'guard_name' => 'web'],

            // Customers
            ['name' => 'Customers create', 'type' => 'Customers', 'guard_name' => 'web'],
            ['name' => 'Customers update', 'type' => 'Customers', 'guard_name' => 'web'],
            ['name' => 'Customers list', 'type' => 'Customers', 'guard_name' => 'web'],
            ['name' => 'Customers show', 'type' => 'Customers', 'guard_name' => 'web'],
            ['name' => 'Customers delete', 'type' => 'Customers', 'guard_name' => 'web'],

            // AccountPromotions
            ['name' => 'AccountPromotions create', 'type' => 'AccountPromotions', 'guard_name' => 'web'],
            ['name' => 'AccountPromotions update', 'type' => 'AccountPromotions', 'guard_name' => 'web'],
            ['name' => 'AccountPromotions list', 'type' => 'AccountPromotions', 'guard_name' => 'web'],
            ['name' => 'AccountPromotions show', 'type' => 'AccountPromotions', 'guard_name' => 'web'],
            ['name' => 'AccountPromotions delete', 'type' => 'AccountPromotions', 'guard_name' => 'web'],

            // Supervisors
            ['name' => 'Supervisors create', 'type' => 'Supervisors', 'guard_name' => 'web'],
            ['name' => 'Supervisors update', 'type' => 'Supervisors', 'guard_name' => 'web'],
            ['name' => 'Supervisors list', 'type' => 'Supervisors', 'guard_name' => 'web'],
            ['name' => 'Supervisors show', 'type' => 'Supervisors', 'guard_name' => 'web'],
            ['name' => 'Supervisors delete', 'type' => 'Supervisors', 'guard_name' => 'web'],

            // Feedbacks
            ['name' => 'Feedbacks list', 'type' => 'Feedbacks', 'guard_name' => 'web'],
            ['name' => 'Feedbacks show', 'type' => 'Feedbacks', 'guard_name' => 'web'],
            ['name' => 'Feedbacks delete', 'type' => 'Feedbacks', 'guard_name' => 'web'],

            // Pages
            ['name' => 'Pages create', 'type' => 'Pages', 'guard_name' => 'web'],
            ['name' => 'Pages update', 'type' => 'Pages', 'guard_name' => 'web'],
            ['name' => 'Pages list', 'type' => 'Pages', 'guard_name' => 'web'],
            ['name' => 'Pages show', 'type' => 'Pages', 'guard_name' => 'web'],
            ['name' => 'Pages delete', 'type' => 'Pages', 'guard_name' => 'web'],

            // Categories
            ['name' => 'Categories create', 'type' => 'Categories', 'guard_name' => 'web'],
            ['name' => 'Categories update', 'type' => 'Categories', 'guard_name' => 'web'],
            ['name' => 'Categories list', 'type' => 'Categories', 'guard_name' => 'web'],
            ['name' => 'Categories show', 'type' => 'Categories', 'guard_name' => 'web'],
            ['name' => 'Categories delete', 'type' => 'Categories', 'guard_name' => 'web'],

            // Sliders
            ['name' => 'Sliders create', 'type' => 'Sliders', 'guard_name' => 'web'],
            ['name' => 'Sliders update', 'type' => 'Sliders', 'guard_name' => 'web'],
            ['name' => 'Sliders list', 'type' => 'Sliders', 'guard_name' => 'web'],
            ['name' => 'Sliders show', 'type' => 'Sliders', 'guard_name' => 'web'],
            ['name' => 'Sliders delete', 'type' => 'Sliders', 'guard_name' => 'web'],

            // Ads
            ['name' => 'Ads create', 'type' => 'Ads', 'guard_name' => 'web'],
            ['name' => 'Ads update', 'type' => 'Ads', 'guard_name' => 'web'],
            ['name' => 'Ads list', 'type' => 'Ads', 'guard_name' => 'web'],
            ['name' => 'Ads show', 'type' => 'Ads', 'guard_name' => 'web'],
            ['name' => 'Ads delete', 'type' => 'Ads', 'guard_name' => 'web'],

            // Sellers
            ['name' => 'Sellers create', 'type' => 'Sellers', 'guard_name' => 'web'],
            ['name' => 'Sellers update', 'type' => 'Sellers', 'guard_name' => 'web'],
            ['name' => 'Sellers list', 'type' => 'Sellers', 'guard_name' => 'web'],
            ['name' => 'Sellers show', 'type' => 'Sellers', 'guard_name' => 'web'],
            ['name' => 'Sellers delete', 'type' => 'Sellers', 'guard_name' => 'web'],

            // Stores
            ['name' => 'Stores create', 'type' => 'Stores', 'guard_name' => 'web'],
            ['name' => 'Stores update', 'type' => 'Stores', 'guard_name' => 'web'],
            ['name' => 'Stores list', 'type' => 'Stores', 'guard_name' => 'web'],
            ['name' => 'Stores show', 'type' => 'Stores', 'guard_name' => 'web'],
            ['name' => 'Stores delete', 'type' => 'Stores', 'guard_name' => 'web'],

            // Certificated Stores
            ['name' => 'CertifiedStore create', 'type' => 'CertifiedStore', 'guard_name' => 'web'],
            ['name' => 'CertifiedStore update', 'type' => 'CertifiedStore', 'guard_name' => 'web'],
            ['name' => 'CertifiedStore list', 'type' => 'CertifiedStore', 'guard_name' => 'web'],
            ['name' => 'CertifiedStore show', 'type' => 'CertifiedStore', 'guard_name' => 'web'],
            ['name' => 'CertifiedStore delete', 'type' => 'CertifiedStore', 'guard_name' => 'web'],

            // Openning screens
            ['name' => 'Openning screens create', 'type' => 'Openning screens', 'guard_name' => 'web'],
            ['name' => 'Openning screens update', 'type' => 'Openning screens', 'guard_name' => 'web'],
            ['name' => 'Openning screens list', 'type' => 'Openning screens', 'guard_name' => 'web'],
            ['name' => 'Openning screens show', 'type' => 'Openning screens', 'guard_name' => 'web'],
            ['name' => 'Openning screens delete', 'type' => 'Openning screens', 'guard_name' => 'web'],


            // Features
            ['name' => 'Features create', 'type' => 'Features', 'guard_name' => 'web'],
            ['name' => 'Features update', 'type' => 'Features', 'guard_name' => 'web'],
            ['name' => 'Features list', 'type' => 'Features', 'guard_name' => 'web'],
            ['name' => 'Features show', 'type' => 'Features', 'guard_name' => 'web'],
            ['name' => 'Features delete', 'type' => 'Features', 'guard_name' => 'web'],

            // Options
            ['name' => 'Options create', 'type' => 'Options', 'guard_name' => 'web'],
            ['name' => 'Options update', 'type' => 'Options', 'guard_name' => 'web'],
            ['name' => 'Options list', 'type' => 'Options', 'guard_name' => 'web'],
            ['name' => 'Options show', 'type' => 'Options', 'guard_name' => 'web'],
            ['name' => 'Options delete', 'type' => 'Options', 'guard_name' => 'web'],

            // Filtered ad
            ['name' => 'Filteredad list', 'type' => 'Filteredad', 'guard_name' => 'web'],
            ['name' => 'Filteredad view', 'type' => 'Filteredad', 'guard_name' => 'web'],
            ['name' => 'Filteredad delete', 'type' => 'Filteredad', 'guard_name' => 'web'],
//            ['name' => 'Filteredad show', 'type' => 'Filteredad', 'guard_name' => 'web'],
//            ['name' => 'Filteredad update', 'type' => 'Filteredad', 'guard_name' => 'web'],

            // Servcies
            ['name' => 'Servcies create', 'type' => 'Servcies', 'guard_name' => 'web'],
            ['name' => 'Servcies update', 'type' => 'Servcies', 'guard_name' => 'web'],
            ['name' => 'Servcies list', 'type' => 'Servcies', 'guard_name' => 'web'],
            ['name' => 'Servcies show', 'type' => 'Servcies', 'guard_name' => 'web'],
            ['name' => 'Servcies delete', 'type' => 'Servcies', 'guard_name' => 'web'],

            // ServciePrice
            ['name' => 'ServicePrice create', 'type' => 'ServicePrice', 'guard_name' => 'web'],
            ['name' => 'ServicePrice update', 'type' => 'ServicePrice', 'guard_name' => 'web'],
            ['name' => 'ServicePrice list', 'type' => 'ServicePrice', 'guard_name' => 'web'],
            ['name' => 'ServicePrice show', 'type' => 'ServicePrice', 'guard_name' => 'web'],
            ['name' => 'ServicePrice delete', 'type' => 'ServicePrice', 'guard_name' => 'web'],

            // ScreenIcon
            ['name' => 'ScreenIcon create', 'type' => 'ScreenIcon', 'guard_name' => 'web'],
            ['name' => 'ScreenIcon update', 'type' => 'ScreenIcon', 'guard_name' => 'web'],
            ['name' => 'ScreenIcon list', 'type' => 'ScreenIcon', 'guard_name' => 'web'],
            ['name' => 'ScreenIcon show', 'type' => 'ScreenIcon', 'guard_name' => 'web'],
            ['name' => 'ScreenIcon delete', 'type' => 'ScreenIcon', 'guard_name' => 'web'],

            // Coupons
            ['name' => 'Coupons create', 'type' => 'Coupons', 'guard_name' => 'web'],
            ['name' => 'Coupons update', 'type' => 'Coupons', 'guard_name' => 'web'],
            ['name' => 'Coupons list', 'type' => 'Coupons', 'guard_name' => 'web'],
            ['name' => 'Coupons show', 'type' => 'Coupons', 'guard_name' => 'web'],
            ['name' => 'Coupons delete', 'type' => 'Coupons', 'guard_name' => 'web'],

            // Points
            ['name' => 'Points create', 'type' => 'Points', 'guard_name' => 'web'],
            ['name' => 'Points update', 'type' => 'Points', 'guard_name' => 'web'],
            ['name' => 'Points list', 'type' => 'Points', 'guard_name' => 'web'],
            ['name' => 'Points show', 'type' => 'Points', 'guard_name' => 'web'],
            ['name' => 'Points delete', 'type' => 'Points', 'guard_name' => 'web'],

            // FilteredWords
            ['name' => 'FilteredWords create', 'type' => 'FilteredWords', 'guard_name' => 'web'],
            ['name' => 'FilteredWords update', 'type' => 'FilteredWords', 'guard_name' => 'web'],
            ['name' => 'FilteredWords list', 'type' => 'FilteredWords', 'guard_name' => 'web'],
            ['name' => 'FilteredWords show', 'type' => 'FilteredWords', 'guard_name' => 'web'],
            ['name' => 'FilteredWords delete', 'type' => 'FilteredWords', 'guard_name' => 'web'],

            // Team
            ['name' => 'Team create', 'type' => 'Team', 'guard_name' => 'web'],
            ['name' => 'Team update', 'type' => 'Team', 'guard_name' => 'web'],
            ['name' => 'Team list', 'type' => 'Team', 'guard_name' => 'web'],
            ['name' => 'Team show', 'type' => 'Team', 'guard_name' => 'web'],
            ['name' => 'Team delete', 'type' => 'Team', 'guard_name' => 'web'],

            // Ticket
            ['name' => 'Ticket list', 'type' => 'Ticket', 'guard_name' => 'web'],
            ['name' => 'Ticket show', 'type' => 'Ticket', 'guard_name' => 'web'],
            ['name' => 'Ticket delete', 'type' => 'Ticket', 'guard_name' => 'web'],

            // Ban Advertiser
            ['name' => 'Ban Advertiser', 'type' => 'banAdvertiser', 'guard_name' => 'web'],

            // AdPromotions
            ['name' => 'AdPromotions create', 'type' => 'AdPromotions', 'guard_name' => 'web'],
            ['name' => 'AdPromotions update', 'type' => 'AdPromotions', 'guard_name' => 'web'],
            ['name' => 'AdPromotions list', 'type' => 'AdPromotions', 'guard_name' => 'web'],
            ['name' => 'AdPromotions show', 'type' => 'AdPromotions', 'guard_name' => 'web'],
            ['name' => 'AdPromotions delete', 'type' => 'AdPromotions', 'guard_name' => 'web'],

            // ProductCategory
            ['name' => 'ProductCategory create', 'type' => 'ProductCategory', 'guard_name' => 'web'],
            ['name' => 'ProductCategory update', 'type' => 'ProductCategory', 'guard_name' => 'web'],
            ['name' => 'ProductCategory list', 'type' => 'ProductCategory', 'guard_name' => 'web'],
            ['name' => 'ProductCategory show', 'type' => 'ProductCategory', 'guard_name' => 'web'],
            ['name' => 'ProductCategory delete', 'type' => 'ProductCategory', 'guard_name' => 'web'],
            // Product
            ['name' => 'Product create', 'type' => 'Product', 'guard_name' => 'web'],
            ['name' => 'Product update', 'type' => 'Product', 'guard_name' => 'web'],
            ['name' => 'Product list', 'type' => 'Product', 'guard_name' => 'web'],
            ['name' => 'Product show', 'type' => 'Product', 'guard_name' => 'web'],
            ['name' => 'Product delete', 'type' => 'Product', 'guard_name' => 'web'],

            // PaymentMethod
            ['name' => 'PaymentMethod create', 'type' => 'PaymentMethod', 'guard_name' => 'web'],
            ['name' => 'PaymentMethod update', 'type' => 'PaymentMethod', 'guard_name' => 'web'],
            ['name' => 'PaymentMethod list', 'type' => 'PaymentMethod', 'guard_name' => 'web'],
            ['name' => 'PaymentMethod show', 'type' => 'PaymentMethod', 'guard_name' => 'web'],
            ['name' => 'PaymentMethod delete', 'type' => 'PaymentMethod', 'guard_name' => 'web'],

            // Promotion
            ['name' => 'Promotion create', 'type' => 'Promotion', 'guard_name' => 'web'],
            ['name' => 'Promotion update', 'type' => 'Promotion', 'guard_name' => 'web'],
            ['name' => 'Promotion list', 'type' => 'Promotion', 'guard_name' => 'web'],
            ['name' => 'Promotion show', 'type' => 'Promotion', 'guard_name' => 'web'],
            ['name' => 'Promotion delete', 'type' => 'Promotion', 'guard_name' => 'web'],

            // Package
            ['name' => 'Package create', 'type' => 'Package', 'guard_name' => 'web'],
            ['name' => 'Package update', 'type' => 'Package', 'guard_name' => 'web'],
            ['name' => 'Package list', 'type' => 'Package', 'guard_name' => 'web'],
            ['name' => 'Package show', 'type' => 'Package', 'guard_name' => 'web'],
            ['name' => 'Package delete', 'type' => 'Package', 'guard_name' => 'web'],

            // PackageFeature
            ['name' => 'PackageFeature create', 'type' => 'PackageFeature', 'guard_name' => 'web'],
            ['name' => 'PackageFeature update', 'type' => 'PackageFeature', 'guard_name' => 'web'],
            ['name' => 'PackageFeature list', 'type' => 'PackageFeature', 'guard_name' => 'web'],
            ['name' => 'PackageFeature show', 'type' => 'PackageFeature', 'guard_name' => 'web'],
            ['name' => 'PackageFeature delete', 'type' => 'PackageFeature', 'guard_name' => 'web'],



        ];
        foreach ($data as $datum) {
            Permission::firstOrCreate($datum);
        }

        $this->createAppTables();
    }

    protected function createAppTables()
    {
        AppTables::firstOrCreate(['title' => 'Admins','title_ar'=>'المسئولين', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Customers', 'title_ar'=>'الاعضاء','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Sellers', 'title_ar'=>'البائعين','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Stores', 'title_ar'=>'المتاجر','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Certificated Stores','title_ar'=>'المتاجر المعتمدة', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Managers', 'title_ar'=>'المديرين','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Supervisors','title_ar'=>'المشرفين', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Roles', 'title_ar'=>'الادوار','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Assistants','title_ar'=>'المساعدين', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Feedbacks','title_ar'=>'التقيمات', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Pages','title_ar'=>'الصفحات', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Categories','title_ar'=>'الاقسام', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Sliders','title_ar'=>'السليدرز', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Ads', 'title_ar'=>'الاعلانات','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Stores','title_ar'=>'المتاجر', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'CertifiedStore', 'title_ar'=>'المتاجر المعتمدة','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Sellers','title_ar'=>'البائعين', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Openning screens', 'title_ar'=>'الشاشات الافتتاحية','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Features', 'title_ar'=>'الخصائص','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Options','title_ar'=>'الاختيارات', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Filteredad','title_ar'=>'فلترة الاعلانات', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'banAdvertiser', 'title_ar'=>'حظر المعلن','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'ScreenIcon', 'title_ar'=>'ايقونات الشاشة','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Team', 'title_ar'=>'الفريق','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'AccountPromotions', 'title_ar'=>'ترفية الحسابات','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'FilteredWords', 'title_ar'=>'فلترة الكلمات','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Points', 'title_ar'=>'النقاط','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Coupons','title_ar'=>'الكوبونات', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Ticket','title_ar'=>'التذاكر', 'is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'AdPromotions', 'title_ar'=>'ترقية الاعلانات','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'ProductCategory', 'title_ar'=>' اقسام المنتجات','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Product', 'title_ar'=>'منتجات المتاجر','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Product', 'title_ar'=>'طرق الدفع','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Promotion', 'title_ar'=>'انواع الترقيات','is_active' => 1]);
        AppTables::firstOrCreate(['title' => 'Package', 'title_ar'=>'الباقات','is_active' => 1]);







    }
}
