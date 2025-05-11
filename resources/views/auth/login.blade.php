<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #444444;
    }
    .login-container {
        width: 300px;
        height: 340px;
        margin: auto;
        padding: 1.5rem;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    .login-container h2 {
        text-align: center;
        margin-bottom: 1rem;
        margin-top: 0rem;
        color: #333333;
    }
    .login-container .form-group {
        margin-bottom: 1rem;
    }
    .login-container .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #555555;
    }
    .login-container .form-group input {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #dddddd;
        border-radius: 4px;
    }
    .login-container .form-group input:focus {
        border-color: #007bff;
        outline: none;
    }
    .login-container .form-group.checkbox {
        display: flex;
        align-items: center;
    }
    .login-container .form-group.checkbox input {
        margin-right: 0.5rem;
    }
    .login-container .form-group .checkbox label {
        margin: 0;
    }
    .login-container .form-group .forgot-password {
        text-align: right;
        margin-top: 0rem;
    }
    .login-container .form-group .forgot-password a {
        color: #0056b3;
        text-decoration: none;
    }
    .login-container .form-group .forgot-password a:hover {
        text-decoration: underline;
    }
    .login-container .btn {
        width: 100%;
        padding: 0.75rem;
        background-color: #0056b3;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1rem;
    }
    .login-container .btn:hover {
        background-color: #0056b3;
    }
    .min-h-screen {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    /* Responsive styles */
    @media (max-width: 500px) {
        .login-container {
            width: 95vw;
            min-width: 0;
            height: auto;
            padding: 1rem;
        }
        .min-h-screen {
            height: auto;
            min-height: 100vh;
            padding: 1rem 0;
        }
    }
    @media (max-width: 350px) {
        .login-container {
            padding: 0.5rem;
        }
    }
</style>

<div class="min-h-screen flex items-center justify-center">
    <div class="login-container">
        <h2>Login</h2>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-group mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="form-group forgot-password">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <button type="submit" class="btn mt-4">
                {{ __('Log in') }}
            </button>
        </form>
    </div>
</div>
