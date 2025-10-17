<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder {
    public function run() {
        // إنشاء الأدوار
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $editor = Role::firstOrCreate(['name' => 'editor', 'guard_name' => 'web']);
        $viewer = Role::firstOrCreate(['name' => 'viewer', 'guard_name' => 'web']);

        // إنشاء أو العثور على المستخدم
        $user = User::firstOrNew(['email' => 'admin@example.com']);
        
        if (!$user->exists) {
            $user->fill([
                'name' => 'Admin',
                'password' => Hash::make('password')
            ])->save();
        }

        // إعطاء الدور للمستخدم (مع حذف الأدوار السابقة أولاً)
        $user->syncRoles([$admin]);

        // رسالة تأكيد
        $this->command->info('تم إنشاء الأدوار والمستخدم الافتراضي بنجاح!');
        $this->command->info('البريد: admin@example.com');
        $this->command->info('كلمة المرور: password');
    }
}