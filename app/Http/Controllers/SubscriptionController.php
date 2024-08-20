<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/subscribe",
     *     summary="Subscribe a user to a website",
     *     tags={"Subscriptions"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"website_id", "user_id"},
     *             @OA\Property(property="website_id", type="integer", example=1),
     *             @OA\Property(property="user_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Subscription created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="website_id", type="integer", example=1),
     *             @OA\Property(property="user_id", type="integer", example=1),
     *             @OA\Property(property="created_at", type="string", format="date-time", example="2024-08-20T10:00:00Z"),
     *             @OA\Property(property="updated_at", type="string", format="date-time", example="2024-08-20T10:00:00Z")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'website_id' => 'required|exists:websites,id',
            'user_id' => 'required|exists:users,id',
        ]);
    
        $subscription = Subscription::create($request->all());
    
        return response()->json($subscription, 201);
    }
}
