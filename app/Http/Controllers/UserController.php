<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function performanceTest(Request $request): JsonResponse
    {
        $avgAge = Cache::remember('avg_user_age', now()->addHours(6), function () {
            return (float) DB::table('user')
                ->whereNotNull('birthdate')
                ->selectRaw('AVG(TIMESTAMPDIFF(YEAR, birthdate, CURDATE()))')
                ->value('avg_user_age');
        });

        $avgAge = $avgAge !== null ? (float) $avgAge : null;

        return response()->json([
            'avgAge' => round($avgAge, 1),
        ]);
    }

    public function printUsers()
    {
        $randomIds = [];
        $userNames = '';

        while (count($randomIds) < 50) {
            $randomIds[] = mt_rand(1, 1_000_000);
        }

        $randomIds = array_unique($randomIds);

        $users = UserModel::whereIn('id', $randomIds)
            ->select('name', 'surname')
            ->get();

        foreach ($users as $user) {
            $userNames .= $user->name.' '.$user->surname.'<br>';
        }

        return $userNames;
    }

    public function cache()
    {
        $avgAge = Cache::remember('avg_user_age', now()->addHours(6), function () {
            return (float) DB::table('user')
                ->whereNotNull('birthdate')
                ->selectRaw('AVG(TIMESTAMPDIFF(YEAR, birthdate, CURDATE())) AS avg_age')
                ->value('avg_age');
        });
    }
}
