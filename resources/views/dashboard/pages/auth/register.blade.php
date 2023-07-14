<x-dashboard-layout::auth title="Register">



    <div>
        <div><a class="logo" href="index.html"><img class="img-fluid for-light" src={{asset('dashboard/assets/images/logo/login.png')}}
                    alt="looginpage"><img class="img-fluid for-dark" src={{asset('dashboard/assets/images/logo/logo_dark.png')}}
                    alt="looginpage"></a></div>
        <div class="login-main">
            <form class="theme-form" method="POST" action="{{ route('register') }}">
                @csrf
                <h4>Create your account</h4>
                <p>Enter your personal d

                    <!-- Name -->etails to create account
                </p>
                <div class="form-group">
                    <label class="pt-0 col-form-label">Your Name</label>
                    <div class="row g-2">
                        <input class="form-control" type="text" required="" placeholder="First name"
                               name="name">
                        <x-dashboard-component::input-error field='name' class="mt-2"/>
                    </div>
                </div>


                <!-- Username Address -->
                <div class="form-group">
                    <label class="col-form-label">Username</label>
                    <input class="form-control" type="text" required="" placeholder="username"
                           name="username">
                    <x-dashboard-component::input-error field='username' class="mt-2"/>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div x-data='{showPassword:false}' class="form-input position-relative">
                        <input class="form-control" :type="showPassword ? 'text' : 'password'" required=""
                               placeholder="*********" name="password">
                        <x-dashboard-component::input-error field='password' class="mt-2"/>
                        <div class="show-hide"><span class="show" x-on:click="showPassword = !showPassword"></span>
                        </div>
                    </div>
                </div>
                <!-- Confirm Password -->
                <div class="form-group">
                    <label class="col-form-label">Confirm Password</label>
                    <div x-data='{showPassword:false}' class="form-input position-relative">
                        <input class="form-control" :type="showPassword ? 'text' : 'password'" required=""
                               placeholder="*********" name="password_confirmation">
                        <x-dashboard-component::input-error field='password_confirmation' class="mt-2"/>
                        <div class="show-hide"><span class="show" x-on:click="showPassword = !showPassword"></span>
                        </div>
                    </div>
                </div>

                <div class="mt-5 mb-0 form-group">
                    <button class="btn btn-primary btn-block w-100" type="submit">Create Account</button>
                </div>

                <p class="mt-4 mb-0 text-center">Already have an account?<a class="ms-2"
                        href="{{ route('login') }}">Sign
                        in</a></p>
            </form>
        </div>
    </div>


</x-dashboard-layout::auth>
