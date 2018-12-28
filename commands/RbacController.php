<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        //add permission
        $createUser = $auth->createPermission('create-user');
        $createUser->description = 'create a user';
        $auth->add($createUser);

        $indexUser = $auth->createPermission('index-user');
        $indexUser->description = 'List user';
        $auth->add($indexUser);

        $updateUser = $auth->createPermission('update-user');
        $updateUser->description = 'Update a user';
        $auth->add($updateUser);

        $viewUser = $auth->createPermission('view-user');
        $viewUser->description = 'View a user';
        $auth->add($viewUser);

        $deleteUser = $auth->createPermission('delete-user');
        $deleteUser->description = 'Delete a user';
        $auth->add($deleteUser);

        //department
        $deleteDepartment = $auth->createPermission('delete-department');
        $deleteDepartment->description = 'Delete a department';
        $auth->add($deleteDepartment);

        $updateDepartment = $auth->createPermission('update-department');
        $updateDepartment->description = 'Update department';
        $auth->add($updateDepartment);

        $createDepartment = $auth->createPermission('create-department');
        $createDepartment->description = 'create a department';
        $auth->add($createDepartment);

        $indexDepartment = $auth->createPermission('index-department');
        $indexDepartment->description = 'List department';
        $auth->add($indexDepartment);

        //day-off
        $indexDateOff = $auth->createPermission('index-dateOff');
        $indexDateOff->description = ' List request';
        $auth->add($indexDateOff);

        $createDateOff = $auth->createPermission('create-dateOff');
        $createDateOff->description = 'Request off';
        $auth->add($createDateOff);

        $updateDateOff = $auth->createPermission('update-dateOff');
        $updateDateOff->description = 'Update request';
        $auth->add($updateDateOff);

        $deleteDateOff = $auth->createPermission('delete-dateOff');
        $deleteDateOff->description = 'Delete request';
        $auth->add($deleteDateOff);

        //add role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $manager = $auth->createRole('manager');
        $auth->add($manager);
        $employee = $auth->createRole('employee');
        $auth->add($employee);

        $auth->addChild($admin, $deleteUser);
        $auth->addChild($admin, $createUser);
        $auth->addChild($admin, $viewUser);
        $auth->addChild($admin, $indexUser);
        $auth->addChild($admin, $updateUser);

        $auth->addChild($admin, $deleteDepartment);
        $auth->addChild($admin, $createDepartment);
        $auth->addChild($admin, $indexDepartment);
        $auth->addChild($admin, $updateDepartment);

        $auth->addChild($admin, $deleteDateOff);
        $auth->addChild($admin, $createDateOff);
        $auth->addChild($admin, $indexDateOff);
        $auth->addChild($admin, $updateDateOff);

        $auth->addChild($manager, $deleteDateOff);
        $auth->addChild($manager, $createDateOff);
        $auth->addChild($manager, $indexDateOff);
        $auth->addChild($manager, $updateDateOff);

        $auth->addChild($manager, $viewUser);
        $auth->addChild($manager, $indexUser);
        $auth->addChild($manager, $updateUser);

        $auth->addChild($employee, $viewUser);
        $auth->addChild($employee, $updateUser);
        $auth->addChild($employee, $indexUser);

        $auth->addChild($employee, $createDateOff);
        $auth->addChild($employee, $indexDateOff);

        //authorization
        $auth->assign($admin, 2);
        $auth->assign($employee, 3);


    }
}