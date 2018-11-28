<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 27.11.2018
 * Time: 22:27
 */
use yii\bootstrap\Nav;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-default">
                    <span class="glyphicon glyphicon-search">
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= Nav::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Menu Tasks', 'options' => ['class' => 'header']],
                    ['label' => 'Show done tasks', 'icon' => 'tasks', 'url' => ['/gii']],
                    ['label' => 'Show not done tasks', 'icon' => 'tasks', 'url' => ['/debug']],
                    ['label' => 'Projects', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            ['label' => 'Tasks', 'icon' => 'tasks', 'url' => ['/tasks'],],
                            ['label' => 'Users', 'icon' => 'users', 'url' => ['/user'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>