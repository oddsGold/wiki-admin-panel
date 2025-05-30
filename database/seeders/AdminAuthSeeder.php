<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminAuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ///// RESOURCES
        $newsResource = \App\Models\Resource::factory()->create(['name' => \App\Models\News::class, 'label' => 'Блог']);
        $videoResource = \App\Models\Resource::factory()->create(['name' => \App\Models\Video::class, 'label' => 'Видео']);
        $faqResource = \App\Models\Resource::factory()->create(['name' => \App\Models\Faq::class, 'label' => 'Faq']);
        $userMemoResource = \App\Models\Resource::factory()->create(['name' => \App\Models\UserMemo\UserMemo::class, 'label' => 'Памятка пользователя']);
        $imageResource = \App\Models\Resource::factory()->create(['name' => \App\Models\Image::class, 'label' => 'Загрузка изображений']);
        $fileResource = \App\Models\Resource::factory()->create(['name' => \App\Models\File::class, 'label' => 'Загрузка файлов']);
        $userResource = \App\Models\Resource::factory()->create(['name' => \App\Models\User::class, 'label' => 'Пользователи']);
        $roleResource = \App\Models\Resource::factory()->create(['name' => \App\Models\Role::class, 'label' => 'Роли пользователей']);

        //$formResource = \App\Models\Resource::factory()->create(['name' => \App\Models\Form\Form::class, 'label' => 'Формы обратной связи']);


        ///// PERMISSIONS
        $viewPermission = \App\Models\Permission::factory()->create(['name' => 'view', 'label' => 'Просмотр']);
        $createPermission = \App\Models\Permission::factory()->create(['name' => 'create', 'label' => 'Создение']);
        $updatePermission = \App\Models\Permission::factory()->create(['name' => 'update', 'label' => 'Изминение']);
        $deletePermission = \App\Models\Permission::factory()->create(['name' => 'delete', 'label' => 'Удаление']);
        $uploadPermission = \App\Models\Permission::factory()->create(['name' => 'upload', 'label' => 'Загрузка файлов']);



        ///// USER ROLES
        \App\Models\Role::factory()
            ->has(\App\Models\User::factory()->state(['login' => 'user_chadyk', 'tfa' => 0])->count(1), 'users')
            ->has(\App\Models\User::factory()->state(['login' => 'user_sulym', 'tfa' => 0])->count(1), 'users')
            ->hasAttached($newsResource,['permission_id' => $viewPermission->id])
            ->hasAttached($newsResource,['permission_id' => $createPermission->id])
            ->hasAttached($newsResource,['permission_id' => $updatePermission->id])
            ->hasAttached($newsResource,['permission_id' => $deletePermission->id])
            ->hasAttached($newsResource,['permission_id' => $uploadPermission->id])

            ->hasAttached($videoResource,['permission_id' => $viewPermission->id])
            ->hasAttached($videoResource,['permission_id' => $createPermission->id])
            ->hasAttached($videoResource,['permission_id' => $updatePermission->id])
            ->hasAttached($videoResource,['permission_id' => $deletePermission->id])
            ->hasAttached($videoResource,['permission_id' => $uploadPermission->id])

            ->hasAttached($userMemoResource,['permission_id' => $viewPermission->id])
            ->hasAttached($userMemoResource,['permission_id' => $createPermission->id])
            ->hasAttached($userMemoResource,['permission_id' => $updatePermission->id])
            ->hasAttached($userMemoResource,['permission_id' => $deletePermission->id])
            ->hasAttached($userMemoResource,['permission_id' => $uploadPermission->id])

            ->hasAttached($faqResource,['permission_id' => $viewPermission->id])
            ->hasAttached($faqResource,['permission_id' => $createPermission->id])
            ->hasAttached($faqResource,['permission_id' => $updatePermission->id])
            ->hasAttached($faqResource,['permission_id' => $deletePermission->id])

            ->hasAttached($userResource,['permission_id' => $viewPermission->id])
            ->hasAttached($userResource,['permission_id' => $createPermission->id])
            ->hasAttached($userResource,['permission_id' => $updatePermission->id])
            ->hasAttached($userResource,['permission_id' => $deletePermission->id])
            ->hasAttached($userResource,['permission_id' => $uploadPermission->id])

            ->hasAttached($roleResource,['permission_id' => $viewPermission->id])
            ->hasAttached($roleResource,['permission_id' => $createPermission->id])
            ->hasAttached($roleResource,['permission_id' => $updatePermission->id])
            ->hasAttached($roleResource,['permission_id' => $deletePermission->id])

            ->hasAttached($imageResource,['permission_id' => $viewPermission->id])
            ->hasAttached($imageResource,['permission_id' => $createPermission->id])
            ->hasAttached($imageResource,['permission_id' => $deletePermission->id])
            ->hasAttached($imageResource,['permission_id' => $uploadPermission->id])

            ->hasAttached($fileResource,['permission_id' => $viewPermission->id])
            ->hasAttached($fileResource,['permission_id' => $createPermission->id])
            ->hasAttached($fileResource,['permission_id' => $deletePermission->id])
            ->hasAttached($fileResource,['permission_id' => $uploadPermission->id])

            ->create(['name' => \App\Models\Role::SUPER_ADMIN_NAME, 'label' => 'Супер администратор']);



        \App\Models\Role::factory()
            ->has(\App\Models\User::factory()->state(['login' => 'user_sham', 'tfa' => 1])->count(1), 'users')
            ->has(\App\Models\User::factory()->state(['login' => 'user_sav', 'tfa' => 1])->count(1), 'users')
            ->hasAttached($newsResource,['permission_id' => $viewPermission->id])
            ->hasAttached($newsResource,['permission_id' => $createPermission->id])
            ->hasAttached($newsResource,['permission_id' => $updatePermission->id])
            ->hasAttached($newsResource,['permission_id' => $deletePermission->id])
            ->hasAttached($newsResource,['permission_id' => $uploadPermission->id])

            ->hasAttached($userMemoResource,['permission_id' => $viewPermission->id])
            ->hasAttached($userMemoResource,['permission_id' => $createPermission->id])
            ->hasAttached($userMemoResource,['permission_id' => $updatePermission->id])
            ->hasAttached($userMemoResource,['permission_id' => $deletePermission->id])
            ->hasAttached($userMemoResource,['permission_id' => $uploadPermission->id])

            ->hasAttached($faqResource,['permission_id' => $viewPermission->id])
            ->hasAttached($faqResource,['permission_id' => $createPermission->id])
            ->hasAttached($faqResource,['permission_id' => $updatePermission->id])
            ->hasAttached($faqResource,['permission_id' => $deletePermission->id])

            ->hasAttached($videoResource,['permission_id' => $viewPermission->id])
            ->hasAttached($videoResource,['permission_id' => $createPermission->id])
            ->hasAttached($videoResource,['permission_id' => $updatePermission->id])
            ->hasAttached($videoResource,['permission_id' => $deletePermission->id])
            ->hasAttached($videoResource,['permission_id' => $uploadPermission->id])


            ->hasAttached($userResource,['permission_id' => $viewPermission->id])
            ->hasAttached($userResource,['permission_id' => $createPermission->id])
            ->hasAttached($userResource,['permission_id' => $updatePermission->id])
            ->hasAttached($userResource,['permission_id' => $deletePermission->id])
            ->hasAttached($userResource,['permission_id' => $uploadPermission->id])

            ->hasAttached($roleResource,['permission_id' => $viewPermission->id])
            ->hasAttached($roleResource,['permission_id' => $createPermission->id])
            ->hasAttached($roleResource,['permission_id' => $updatePermission->id])
            ->hasAttached($roleResource,['permission_id' => $deletePermission->id])

            ->hasAttached($imageResource,['permission_id' => $viewPermission->id])
            ->hasAttached($imageResource,['permission_id' => $createPermission->id])
            ->hasAttached($imageResource,['permission_id' => $deletePermission->id])
            ->hasAttached($imageResource,['permission_id' => $uploadPermission->id])

            ->hasAttached($fileResource,['permission_id' => $viewPermission->id])
            ->hasAttached($fileResource,['permission_id' => $createPermission->id])
            ->hasAttached($fileResource,['permission_id' => $deletePermission->id])
            ->hasAttached($fileResource,['permission_id' => $uploadPermission->id])

            ->create(['name' => \App\Models\Role::ADMIN_NAME, 'label' => 'Администратор']);




        \App\Models\Role::factory()
            ->hasAttached($newsResource,['permission_id' => $viewPermission->id])
            ->hasAttached($newsResource,['permission_id' => $createPermission->id])
            ->hasAttached($newsResource,['permission_id' => $updatePermission->id])
            ->hasAttached($newsResource,['permission_id' => $deletePermission->id])

            ->hasAttached($userMemoResource,['permission_id' => $viewPermission->id])
            ->hasAttached($userMemoResource,['permission_id' => $createPermission->id])
            ->hasAttached($userMemoResource,['permission_id' => $updatePermission->id])
            ->hasAttached($userMemoResource,['permission_id' => $deletePermission->id])
            ->hasAttached($userMemoResource,['permission_id' => $uploadPermission->id])

            ->hasAttached($faqResource,['permission_id' => $viewPermission->id])
            ->hasAttached($faqResource,['permission_id' => $createPermission->id])
            ->hasAttached($faqResource,['permission_id' => $updatePermission->id])
            ->hasAttached($faqResource,['permission_id' => $deletePermission->id])

            ->hasAttached($videoResource,['permission_id' => $viewPermission->id])
            ->hasAttached($videoResource,['permission_id' => $createPermission->id])
            ->hasAttached($videoResource,['permission_id' => $updatePermission->id])
            ->hasAttached($videoResource,['permission_id' => $deletePermission->id])
            ->hasAttached($videoResource,['permission_id' => $uploadPermission->id])

            ->create(['name' => 'Manager', 'label' => 'Контент менеджер']);



        \App\Models\Role::factory()
            ->has(\App\Models\User::factory()->state([
                'login' => 'HttpExceptionRobot',
                'password' => null,
            ]), 'users')
            ->create(['name' => \App\Models\Role::HTTP_EXCEPTION_NAME, 'label' => 'Отправщик уведомлений exceptions']);

        \App\Models\Role::factory()
            ->has(\App\Models\User::factory()->state([
                'login' => 'ErrorExceptionRobot',
                'password' => null,
            ]), 'users')
            ->create(['name' => \App\Models\Role::ERROR_EXCEPTION_NAME, 'label' => 'Отправщик уведомлений error']);




        ///// ADMIN MENU

        \App\Models\Admin\Menu::factory()
            ->for($newsResource, 'resource')
            ->create([
                'name' => 'Блог',
                'urn' => '/admin/news'
            ]);

        \App\Models\Admin\Menu::factory()
            ->for($faqResource, 'resource')
            ->create([
                'name' => 'Faq',
                'urn' => '/admin/faqs'
            ]);

        $userMemoParent = \App\Models\Admin\Menu::factory()->create(['name' => 'Памятка пользователя']);
        \App\Models\Admin\Menu::factory()
            ->for($userMemoParent, 'parents')
            ->for($userMemoResource, 'resource')
            ->create([
                'name' => 'Памятки',
                'urn' => '/admin/users/memos'
            ]);
        \App\Models\Admin\Menu::factory()
            ->for($userMemoParent, 'parents')
            ->for($userMemoResource, 'resource')
            ->create([
                'name' => 'Типы памятки',
                'urn' => '/admin/users/memos/types'
            ]);

        \App\Models\Admin\Menu::factory()
            ->for($videoResource, 'resource')
            ->create([
                'name' => 'Видео',
                'urn' => '/admin/videos'
            ]);


        $fileParent = \App\Models\Admin\Menu::factory()->create(['name' => 'Загрузка файлов']);
        \App\Models\Admin\Menu::factory()
            ->for($fileParent, 'parents')
            ->for($imageResource, 'resource')
            ->create([
                'name' => 'Файлы',
                'urn' => '/admin/files'
            ]);
        \App\Models\Admin\Menu::factory()
            ->for($fileParent, 'parents')
            ->for($fileResource, 'resource')
            ->create([
                'name' => 'Изображения',
                'urn' => '/admin/images'
            ]);

        ///  //$formParent = \App\Models\Admin\Menu::factory()->create(['name' => 'Формы обратной связи']);
        //\App\Models\Admin\Menu::factory()
        //    ->for($formParent, 'parents')
        //    ->for($formResource, 'resource')
        //    ->create([
        //        'name' => 'Форма',
        //        'urn' => '/admin/news'
        //    ]);


        $usersParent = \App\Models\Admin\Menu::factory()->create(['name' => 'Пользователи']);
        \App\Models\Admin\Menu::factory()
            ->for($usersParent, 'parents')
            ->for($userResource, 'resource')
            ->create([
            'name' => 'Пользователи',
            'urn' => '/admin/users'
        ]);
        \App\Models\Admin\Menu::factory()
            ->for($usersParent, 'parents')
            ->for($roleResource, 'resource')
            ->create([
            'name' => 'Роли',
            'urn' => '/admin/roles'
        ]);


    }
}
