<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Aboreto&family=ABeeZee&display=swap">
</head>

<body>
    <div class="content-wrapper">
        <div class="welcome-message"> 
            <p style="color: #909090 ">
                Hello!
                <br>
                Welcome Back
            </p>
        </div>

        <div class="form-container">
            <x-guest-layout>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4 white">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4 " style="bg-transparent">
                        <label style="bg-transparent" for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <br>
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        @if (Route::has('register'))
                            
                            <x-primary-button class="ms-3" >
                                <a href="{{ route('register') }}" class="text-white bg-transparent"  > 
                                    {{ __('Register') }}
                                </a>
                            </x-primary-button>
                        @endif
                        <x-primary-button class="ms-3" style="">
                            {{ __('Login') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-guest-layout>
        </div>
    </div>

    <style>
        html, body {
            background-color: #FFFCF8;
            margin: 0;
            /* height: 125.5vh; */
            display: flex;
            align-items: center;
            justify-content: center;
            /* overflow: hidden; */
            font-family: "Aboreto", sans-serif;
        }

        .content-wrapper {
            margin-top:0;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .welcome-message {
            font-family: "ABeeZee", sans-serif;
            text-align: center;
            color: #776B5D;
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .form-container {
            background-color: #FFFFFF; /* White background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-form {
            width: 100%;
        }
    </style>
</body>
