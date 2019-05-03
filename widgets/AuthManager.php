<?php
namespace app\widgets;

use Yii;
use yii\rbac\PhpManager;
use yii\rbac\Assignment;
use app\models\User;

class AuthManager extends PhpManager{

    /**
     * @inheritdoc
     */
    public function getAssignments($userId)
    {
    	if($userId && $user = $this->getUser($userId)){
    		$assignment = new Assignment();
    		$assignment->userId = $userId;
    		$assignment->roleName = $user->role;

    		return [$assignment->roleName => $assignment];
    	}
    	return [];
    }

    /**
     * @inheritdoc
     */
    public function getAssignment($roleName, $userId)
    {
    	if($userId && $user = $this->getUser($userId)){

    		if($user->role == $roleName){
	    		$assignment = new Assignment();
	    		$assignment->userId = $userId;
	    		$assignment->roleName = $user->role;

	    		return $assignment;
    		}

    	}

    	return null;
    }

    private function getUser($uid){
    	if(!Yii::$app->user->isGuest && Yii::$app->user->id == $uid){
    		return Yii::$app->user->identity;
    	}else{
    		return User::findOne(['id' => $uid]);
    	}
    }

}