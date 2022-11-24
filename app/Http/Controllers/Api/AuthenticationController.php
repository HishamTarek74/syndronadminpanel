<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ForgetPasswordRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\CustomerResource;
use App\Models\User;
use App\Support\FirebaseAuth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Api\LoginRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Authentication class with firebase for api
 */
class AuthenticationController extends Controller
{
    use  ValidatesRequests;


    /**
     * @var FirebaseAuth
     */
    private FirebaseAuth $firebaseAuth;


    /**
     * @param  FirebaseAuth  $firebaseAuth
     */
    public function __construct(FirebaseAuth $firebaseAuth)
    {
        $this->firebaseAuth = $firebaseAuth;
    }

    /**
     * Handle a register request to the application using firebase.
     *
     * @param  RegisterRequest  $request
     * @return CustomerResource|JsonResponse
     */

    public function register(RegisterRequest $request)
    {
        if ($this->firebaseAuth->phoneExists($request->phone, $request->access_token)) {

            $user = User::forceCreate([
              'firebase_id' => $request->firebase_id,
              'email' => $request->email,
              'name' => $request->name,
              'last_name' => $request->last_name,
              'gender' => $request->gender,
              'age_group_id' => $request->age_group_id,
              'phone' => $request->phone,
              'password' =>  Hash::make($request->password),
              'country_id' => $request->country_id,
              'phone_verified_at' => now(),
              'email_verified_at' => null,
           ]);

            return $this->getAuthUserResponse( $user->fresh());
        }
        return response()->json(['error' => 'firebase token is expired or phone is incorrect!'], 422);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  LoginRequest  $request
     * @return CustomerResource|JsonResponse
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt([ 'phone'=>$request->phone,'password'=> $request->password])) {
            $user = User::wherePhone($request->phone)->firstOrFail();

            $user->update(['firebase_id' => $request->firebase_id]);

            return $this->getAuthUserResponse( $user->fresh());
        }
        return response()->json(['error' => 'phone or password is not incorrect!'], 403);
    }

    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([], 202);
    }

    /**
     * @param  ForgetPasswordRequest  $request
     * @return CustomerResource|JsonResponse
     */
    public function forgetPassword(ForgetPasswordRequest $request)
    {
        if ($this->firebaseAuth->phoneExists($phone=$request->phone, $request->access_token)) {
            $user = User::wherePhone($phone)->firstOrFail();
            $user->update(['password' =>  Hash::make($request->password),'firebase_id'=>$request->firebase_id]);
            return $this->getAuthUserResponse($user->fresh());
        }
        return response()->json(['error' => 'firebase token is expired or phone is incorrect!'], 422);
    }


    /**
     * @param  User  $user
     * @return CustomerResource
     */
    private function getAuthUserResponse(User $user)
    {
        return $user->getResource()->additional([
            'token' => $user->createTokenForDevice(request()->header('user-agent')),
            'firebase_id' => $user->firebase_id
        ]);
    }

}
