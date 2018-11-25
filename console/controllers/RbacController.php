<?php
/**
 * Created by PhpStorm.
 * User: nik
 * Date: 25.11.2018
 * Time: 15:12
 */

namespace console\controllers;


use yii\console\Controller;

class RbacController extends Controller
{
    public function actionIndex ()
    {
        $authManager = \Yii::$app->authManager;
        $admin = $authManager->createRole('admin');
        $user=$authManager->createRole('user');
        $authManager->add($admin);
        $authManager->add($user);
        $permissionCreate = $authManager->createPermission('createTask');
        $permissionDelete = $authManager->createPermission('deleteTask');
        $permissionEdit = $authManager->createPermission('editTask');
        $authManager->add($permissionCreate);
        $authManager->add($permissionDelete);
        $authManager->add($permissionEdit);
        $authManager->addChild($admin, $permissionCreate);
        $authManager->addChild($admin, $permissionDelete);
        $authManager->addChild($admin, $permissionEdit);
        $authManager->addChild($user, $permissionEdit);
        $authManager->assign($admin, 2);
        $authManager->assign($user, 3);

    }
}