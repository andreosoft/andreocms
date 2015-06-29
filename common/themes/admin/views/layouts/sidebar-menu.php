<?php

/**
 * Sidebar menu layout.
 *
 * @var \yii\web\View $this View
 */
use common\themes\admin\widgets\Menu;

echo Menu::widget(
        [
            'options' => [
                'class' => 'sidebar-menu'
            ],
            'items' => [
                [
                    'label' => 'Панель',
                    'url' => Yii::$app->homeUrl,
                    'icon' => 'fa-dashboard',
                    'active' => Yii::$app->request->url === Yii::$app->homeUrl,
                    'visible' => true
                ],
                [
                    'label' => 'Контент',
                    'url' => ['/content/admin/index', 'class' => 'site'],
                    'icon' => 'fa-book',
                    'visible' => true,
                ],
                [
                    'label' => 'Блог',
                    'url' => ['/content/admin/index', 'class' => 'blog'],
                    'icon' => 'fa-book',
                    'visible' => true,
                ],                                
                [
                    'label' => 'Каталог',
                    'url' => ['/catalog/admin/index'],
                    'icon' => 'fa-book',
                    'visible' => true,
                ],                   
                [
                    'label' => 'Карусель',
                    'url' => ['/content/admin/index', 'class' => 'carusel'],
                    'icon' => 'fa-book',
                    'visible' => true,
                ],                                
                [
                    'label' => 'Callback',
                    'url' => ['/callback/admin/index'],
                    'icon' => 'fa-book',
                    'visible' => true,
                ],                
                [
                    'label' => 'Управление',
                    'url' => '',
                    'icon' => 'fa-book',
                    'visible' => true,
                    'items' => [
                        [
                            'label' => 'File Manager',
                            'url' => '',
                            'icon' => 'fa-book',
                            'visible' => true,
                            'items' => [
                                [
                                    'label' => 'Common',
                                    'url' => ['/filemanager/file/index', 'rootAlias' => '@common'],
                                    'icon' => 'fa-book',
                                    'visible' => true,
                                ],
                                [
                                    'label' => 'Frontend',
                                    'url' => ['/filemanager/file/index', 'rootAlias' => '@frontend'],
                                    'icon' => 'fa-book',
                                    'visible' => true,
                                ],
                                [
                                    'label' => 'Backend',
                                    'url' => ['/filemanager/file/index', 'rootAlias' => '@backend'],
                                    'icon' => 'fa-book',
                                    'visible' => true,
                                ],
                                [
                                    'label' => 'Vendor',
                                    'url' => ['/filemanager/file/index', 'rootAlias' => '@vendor'],
                                    'icon' => 'fa-book',
                                    'visible' => true,
                                ],
                            ],
                        ],
                    ]
                ],
                [
                ],
//            [
//                'label' => Комментарии,
//                'url' => ['/comments/admin/index'],
//                'icon' => 'fa-comments',
//                'visible' => true,
//            ],   
//            [
//                'label' => Галлерея,
//                'url' => ['/gallery/admin/index'],
//                'icon' => 'fa-book',
//                'visible' => true,
//            ],             
                [
                    'label' => Пользователи,
                    'url' => ['/users/backend/index'],
                    'icon' => 'fa-group',
                    'visible' => true,
                ],
            ]
        ]
);
