<?php

/*
 * Copyright (C) 2026 mohamed
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Core;
use Interfaces\iSession;
use function getenv;

/**
 * Description of SessionManager
 *
 * @author mohamed
 */
class SessionManager 
implements iSession
{
    public function __construct() {
        ini_set('session.use_only_cookies', 1);
        ini_set('session.use_strict_mode', 1);

        session_set_cookie_params([
            'lifetime' => getenv("lifetime") ?? 60 * 30,
            'domain' => getenv("host") ?? "localhost",
            'path' => '/',
            'secure' => getenv("production") ?? false,
            'httponly' => getenv("production") ?? false,
            'latex' => getenv("production") ?? false
        ]);

        session_start();
        $this->GenerateTokens();
    }
    
    private function GenerateTokens(): void
    {
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
        $_SESSION["CSRF"] = bin2hex(random_bytes(32));
    }
    
    private function CheckValidToken(): void
    {
        $interval = getenv("lifetime") ?? 60 * 30;
        if (time() - $_SESSION['last_regeneration'] >= $interval) {
            $this->GenerateTokens();
        }
    }
    
    public function Add(string $title, mixed $value): void {
        $this->CheckValidToken();
        $_SESSION[$title] = $value;
    }
    
    public function IsExists(string $title): bool
    {
        if(isset($_SESSION[$title])){
            return true;
        }
        return false;
    }

    /*
     * @return null if there is no session
     */
    public function Get(string $title): mixed {
        $this->CheckValidToken();
        if(!$this->IsExists($title)){
            return null;
        }
        return $_SESSION[$title];
    }
}
