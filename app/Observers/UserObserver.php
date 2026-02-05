<?php
namespace App\Observers;

use App\Models\UserModel;
use Illuminate\Support\Facades\Cache;

class UserObserver
{
    public function saved(UserModel $user): void
    {
        if ($user->wasChanged('birthdate')) {
            Cache::forget('avg_user_age');
        }
    }

    public function deleted(UserModel $user): void
    {
        Cache::forget('avg_user_age');
    }
}
