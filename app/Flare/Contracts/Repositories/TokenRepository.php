<?php

namespace FCLLA\Flare\Contracts\Repositories;

use FCLLA\Flare\Token;

interface TokenRepository
{
    /**
     * Get the given token by its value if it has not expired.
     *
     * @param  string  $token
     * @return Token
     */
    public function validToken($token);

    /**
     * Generate a new "web" token for the user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $name
     * @param  array  $data
     * @return Token
     */
    public function createToken($user, $name, array $data = []);

    /**
     * Create a new token cookie.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return \Symfony\Component\HttpFoundation\Cookie
     */
    public function createTokenCookie($user);

    /**
     * Update the given token.
     *
     * @param  Token  $token
     * @param  string  $name
     * @param  array  $abilities
     * @return void
     */
    public function updateToken(Token $token, $name, array $abilities = []);

    /**
     * Delete all of the expired tokens for the user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    public function deleteExpiredTokens($user);
}
