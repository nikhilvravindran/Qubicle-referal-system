<?php

namespace App\Service;
use App\Models\User;
use App\Models\LevelPoints;

class UserService 
{
     public function getLevelPoints($level) {
        $level = 'level' . $level;
        $levelpoints = LevelPoints::where('level',$level)->get()->toArray();
        $points = $levelpoints[0]['points'];
        return $points;
     }

    public function getReferalPoints($lastInsertId, $parentReferralCode,$level = 1){

        $users = User::where(['referal_code'=>$parentReferralCode,'is_admin'=>NULL])->get()->toArray();
        if (!empty($users)) {
            $parentUser = $users[0];
            $points = $parentUser['points'] + $this->getLevelPoints($level > 10 ? 'n' : $level);
            $parentUserUpdate=User::find($parentUser['id']);
            $parentUserUpdate->points=$points;
            $parentUserUpdate->save();
            if ($level == 1) {
                $user=User::find($lastInsertId);
                $user->parent_referal_code=$parentReferralCode;
                $user->save();
             }
             $parentReferralCode = $parentUser['parent_referal_code'];
             $this->getReferalPoints($lastInsertId, $parentReferralCode, $level = $level + 1);
        }
 
        
    }
}
