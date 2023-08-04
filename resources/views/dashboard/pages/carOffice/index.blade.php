<x-dashboard-layout::dashboard title="Car Offices">


    <x-slot name="head">
        <link rel="stylesheet" type="text/css" href={{ asset('dashboard/assets/css/vendors/datatables.css') }}>
        <link rel="stylesheet" type="text/css" href={{ asset('dashboard/assets/css/vendors/select2.css')}}>
        <link rel="stylesheet" type="text/css" href={{ asset('dashboard/assets/css/vendors/scrollbar.css')}}>
    </x-slot>

    <x-slot name="javascript">
        <script src="{{ asset('dashboard/assets/js/select2/select2.full.min.js')}}"></script>
        <script src="{{ asset('dashboard/assets/js/select2/select2-custom.js')}}"></script>
        <script src={{ asset('dashboard/assets/js/datatable/datatables/jquery.dataTables.min.js') }}></script>
        <script src={{ asset('dashboard/assets/js/datatable/datatables/datatable.custom.js') }}></script>

    </x-slot>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header"
                         style="
                                display: flex;
                                justify-content: space-between;
                                align-items: center;">
                        <h5>Car Offices</h5>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#addCarOfficeModal">Add
                        </button>

                        <!-- Start - Add CarOffice -->

                        <x-dashboard-component::modal.carOffice.add-modal
                            :daysOfWeek="$daysOfWeek"
                            :users="$users"
                            :cities="$cities"
                            :carTypes="$carTypes"
                        />

                        <!-- End - Add CarOffice -->


                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-2">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>PhoneNumber</th>
                                    <th>Owner</th>
                                    <th>City</th>
                                    <th>Created date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach ($carOffices as $carOffice)
                                    <tr>
                                        <td>
                                            <img style="background-size: cover;
                                                        object-fit: cover;
                                                        width: 100px;
                                                        aspect-ratio: 3/2;
                                                        aspect-ratio: 3/2;"
                                                 src="{{ $carOffice->getFirstMediaUrl('CarOffice') }}"
                                                 alt="">
                                        </td>
                                        <td>
                                            <h6> {{$carOffice->name}} </h6>
                                            <span> {{$carOffice->placeContact->about }} </span>
                                        </td>
                                        <td>{{$carOffice->placeContact->phone_number }} </td>
                                        <td>{{ $carOffice->user->name }}</td>
                                        <td>{{ $carOffice->city->name }}</td>
                                        <td>{{ $carOffice->created_at->diffForHumans() }}</td>
                                        <td class='align-content-end w-25'>

                                            <!-- Start - Edit CarOffice -->
                                            <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#editCarOfficeModal_{{ $carOffice->id }}">
                                                <i class="fa fa-edit text-primary fs-5"></i>
                                            </button>

                                            <x-dashboard-component::modal.carOffice.update-modal
                                                :carOffice="$carOffice"
                                                :daysOfWeek="$daysOfWeek"
                                                :users="$users"
                                                :cities="$cities"
                                                :carTypes="$carTypes"
                                            />
                                            <!-- End - Edit CarOffice -->


                                            <!-- Start - Delete CarOffice  -->
                                            <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-original-title="test"
                                                    data-bs-target="#deleteModal_{{ $carOffice->id }}">
                                                <i class="fa fa-trash-o text-danger fs-5">
                                                </i>
                                            </button>

                                            <div class="modal fade" id="deleteModal_{{ $carOffice->id }}"
                                                 tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Delete
                                                                CarOffice</h5>
                                                            <button class="btn-close" type="button"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">Are You sure to delete CarOffice
                                                            ?
                                                        </div>

                                                        <div class="modal-footer">
                                                            <form style="display:initial"
                                                                  action={{ route('carOffice.destroy', $carOffice) }} method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-primary" type="button"
                                                                        data-bs-dismiss="modal">Close
                                                                </button>
                                                                <button class="btn btn-danger" type="submit">
                                                                    Delete
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End - Delete CarOffice -->


                                            <!-- Start - Show CarOffice  -->
                                            <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-original-title="test"
                                                    data-bs-target="#showModal_{{ $carOffice->id }}">
                                                <i class="fa fa-eye text-success fs-5">
                                                </i>
                                            </button>

                                            <x-dashboard-component::modal.carOffice.show-modal
                                                :carOffice="$carOffice"
                                                :carTypes="$carTypes"
                                            />
                                            <!-- End - Show CarOffice -->

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Zero Configuration  Ends-->

        </div>
        <!-- Container-fluid Ends-->
    </div>

</x-dashboard-layout::dashboard>
