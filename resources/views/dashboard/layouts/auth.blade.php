<x-dashboard-layout::app :title="$title">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-5">
                <img class="bg-center bg-img-cover" src={{ asset('dashboard/assets/images/login/3.jpg') }}
                    alt="looginpage" />
            </div>
            <div class="p-0 col-xl-7">
                <div class="login-card">

                    {{ $slot }}

                </div>
            </div>
        </div>
    </div>

</x-dashboard-layout::app>
