<x-dashboard-layout::auth title="Login">
    <!-- Session Status -->


    <div>
        <div>
            <a class="logo text-start" href="index.html"><img class="img-fluid for-light"
                                                              src={{ asset('dashboard/assets/images/logo/login.png') }} alt="looginpage"/><img
                    class="img-fluid for-dark" src={{ asset('dashboard/assets/images/logo/logo_dark.png') }}
                    alt="looginpage"/></a>
        </div>
        <div class="login-main">
            <form class="theme-form" method="POST" action="{{ route('login') }}">
                @csrf

                <h4>Sign in to account</h4>
                <p>Enter your username & password to login</p>

                <!-- Username Address -->
                <div class="form-group">
                    <label class="col-form-label">Username</label>
                    <input class="form-control" type="text" required="" placeholder="username"
                           name="username" :value="old('username')" autofocus autocomplete="username"/>
                    <x-dashboard-component::input-error field="username" class="mt-2"/>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div x-data='{showPassword:false}' class="form-input position-relative">
                        <input class="form-control" :type="showPassword ? 'text' : 'password'" required=""
                               placeholder="*********" name="password" autocomplete="current-password"/>
                        <x-dashboard-component::input-error field='password' class="mt-2"/>
                        <div class="show-hide">
                            <span class="show" x-on:click="showPassword = !showPassword"> </span>
                        </div>
                    </div>
                </div>

                <div class="mb-0 form-group">

                    <!-- Remember Me -->
                    <div class="p-0 checkbox">
                        <input id="checkbox1" type="checkbox" name="remember"/>
                        <label class="text-muted" for="checkbox1">Remember password</label>
                    </div>

                    <!-- Submit -->
                    <button class="mt-5 btn btn-primary btn-block w-100" type="submit">
                        Sign in
                    </button>
                </div>

                {{--                <p class="mt-4 mb-0 text-center">--}}
                {{--                    Don't have account?<a class="ms-2" href={{ route('register') }}>Create Account</a>--}}
                {{--                </p>--}}
            </form>
        </div>
    </div>


</x-dashboard-layout::auth>
