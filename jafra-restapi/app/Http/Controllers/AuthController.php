<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Consultants;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

class AuthController extends Controller
{
    /* midleware for controller */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'tokenValidity']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = Validator::make($request->all() , [
            'username' => ['required'],
            'password' => ['required']
        ]);

        if ($credentials->fails()) {
            return response()->json($credentials->errors(), 422);
        }

        if (! $token = auth()->attempt(
            [
                'consultant_username' => $request->input('username'),
                'password' => $request->input('password')
            ])
        ) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token)->withCookie(cookie('auth', $token, auth()->factory()->getTTL() * 60, 'api/auth/login', 'ransombroker.biz.id'));
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        /*
         *  restructured payload
         * */
        $consultantId = auth()->user()->getAuthIdentifier();
        $getConsultantData = Consultants::where('consultant_id', $consultantId)->get();

        $consultantData = array();

        foreach ($getConsultantData as $data) {
            $consultantData["consultant_id"] = $data->consultant_unique_id;
            $consultantData["consultant_name"] = $data->consultant_name;
            $consultantData["seat"] = $data->seat;
            $consultantData["ticket_type"] = $data->ticket_type;
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'dt' => $consultantData
        ]);
    }

    /**
     * Get the token validity.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function tokenValidity()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['Unauthorized'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], 401);
        } catch (TokenInvalidException $e) {
            return response()->json([
                'validity' => false,
                'message' => 'token is invalid'
            ], 401);
        } catch (JWTException $e) {
            return response()->json(['token_absent'], 401);
        }

        return response()->json([
            'validitiy'  => true,
            'message' => 'token is valid'
        ]);
    }

    /**
     * Get the token Auth User Profile.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthUser(Request $request )
    {
        return response()->json($request->cookie('auth'));
    }
}
