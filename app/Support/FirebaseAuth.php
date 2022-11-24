<?php

namespace App\Support;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Kreait\Firebase\Auth\UserRecord;
use Kreait\Firebase\Contract\Auth;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Lcobucci\JWT\UnencryptedToken;

class FirebaseAuth
{
    private Auth $firebaseAuth;
    private string $accessToken;
    private UnencryptedToken $verifiedIdToken;
    private UserRecord $user;

    /**
     * @throws AuthenticationException
     */
    public function __construct()
    {
        try {
            $this->firebaseAuth = Firebase::auth();
        } catch (\Throwable $e) {
            throw new AuthenticationException('Invalid Creating FireBase Auth!');
        }
    }

    /**
     * Get the valid phone number from access token.
     *
     * @return void
     * @throws AuthenticationException
     * @throws Exception
     */
    private function setUser(): void
    {
        $this->validateAccessToken();
        $uid = $this->verifiedIdToken->claims()->get('sub');

        try {
            $this->user = $this->firebaseAuth->getUser($uid);
        } catch (\Throwable $e) {
            throw new AuthenticationException($e);
        }
    }

    private function validateAccessToken(): void
    {
        try {
            $this->verifiedIdToken = $this->firebaseAuth->verifyIdToken($this->accessToken, true);
        } catch (\Throwable $e) {
            throw new FailedToVerifyToken($e);
        }
    }

    /**
     * @throws AuthenticationException
     */
    private function setAccessToken($token): FirebaseAuth
    {
        $this->accessToken = $token;
        $this->setUser();
        return $this;
    }


    private function getPhone(): ?string
    {
        return $this->user->phoneNumber;
    }

    private function getUser(): UserRecord
    {
        return $this->user;
    }

    public function phoneExists(string $phone,string $accessToken): bool
    {
        if(app()->isLocal()){
            return true;
        }
        try {
            $firebasePhone = $this->setAccessToken($accessToken)->getPhone();
        } catch (Exception $exception) {
            return false;
        }
        return $firebasePhone === $phone;
    }

}
