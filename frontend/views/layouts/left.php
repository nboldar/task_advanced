<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 27.11.2018
 * Time: 22:27
 */

use yii\bootstrap\Nav;
use yii\helpers\Html;

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

        <?= \yii\widgets\Menu::widget(
            [
                'encodeLabels' => false,
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    [
                        'label' => '<span class="glyphicon glyphicon-th-list"></span> '
                            . Html::encode('Projects'),
                        'options' => ['class' => 'header','aria-expanded'=>'true',],
                        'items' => [
                            [
                                'label' => '<span class="glyphicon glyphicon-repeat"></span> '
                                    . Html::encode('All projects'),
                                'icon' => 'file-code-o',
                                'url' => ['#'],
                            ],
                            [
                                'label' => '<span class="glyphicon glyphicon-ok"></span> '
                                    . Html::encode('Projects done'),
                                'url' => ['#'],
                            ],
                            [
                                'label' => '<span class="glyphicon glyphicon-alert"></span> '
                                    . Html::encode('Projects in process'),
                                'icon' => 'tasks',
                                'url' => ['/tasks'],
                            ],
                        ],
                    ],
                    [
                        'label' => '<span class="glyphicon glyphicon-th-list"></span> '
                            . Html::encode('My Tasks'),
                        'options' => ['class' => 'header'],
                        'items' => [
                            [
                                'label' => '<span class="glyphicon glyphicon-repeat"></span> '
                                    . Html::encode('All Tasks'),
                                'icon' => 'file-code-o',
                                'url' => ['tasks/my'],
                            ],
                            [
                                'label' => '<span class="glyphicon glyphicon-ok"></span> '
                                    . Html::encode('Tasks done'),
                                'url' => ['#'],
                            ],
                            [
                                'label' => '<span class="glyphicon glyphicon-alert"></span> '
                                    . Html::encode('Outdated tasks'),
                                'icon' => 'tasks',
                                'url' => ['#'],
                            ],
                        ],
                    ],
                    ['label' => 'Projects', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
