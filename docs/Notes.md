### Routes Generated Array
```php
        $arr = [
            "subdomain" => [
                "GET" => [
                    "" => ["class" => "Viewer", "method" => "HTMLRender", "param" => ["landing"]],
                    "login" => ["class" => "Viewer","method" => "HTMLRender" ,"param" => ["user/login"]],
                    "signup" => ["class" => "Viewer","method" => "HTMLRender" ,"param" => ["user/signup"]],
                    "logout" => ["class" => "LogoutController","method" => "__constractor" ,"param" => []]
                ],
                "POST" => [
                    "login" => ["class" => "LoginController","method" => "Login" ,"param" => []], 
                    "signup" => ["class" => "SignupControler","method" => "Signup" ,"param" => []]
                ]
            ]
        ];
```
