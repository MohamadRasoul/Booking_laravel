<x-dashboard-layout::dashboard title="Hotel">


    <x-slot name="head">
        <link rel="stylesheet" type="text/css" href={{ asset('dashboard/assets/css/vendors/datatables.css') }}>
        <link rel="stylesheet" type="text/css" href={{ asset('dashboard/assets/css/vendors/select2.css') }}>
        <link rel="stylesheet" type="text/css" href={{ asset('dashboard/assets/css/vendors/scrollbar.css') }}>
    </x-slot>

    <x-slot name="javascript">
        <script src="{{ asset('dashboard/assets/js/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/select2/select2-custom.js') }}"></script>
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
                        <h5>Hotel</h5>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#addhotelModal">Add
                        </button>

                        <!-- Start - Add Restaurant -->

                        <x-dashboard-component::modal.hotel.add-modal :daysOfWeek="$daysOfWeek" :users="$users"
                            :cities="$cities" :roomTypes="$roomTypes" />

                        <!-- End - Add Restaurant -->


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


                                    @foreach ($hotels as $hotel)
                                        <tr>
                                            <td>
                                                <img style="background-size: cover;
                                                        object-fit: cover;
                                                        width: 100px;"
                                                    src="{{ $hotel->getFirstMediaUrl('Hotel') }}"
                                                    alt="">
                                            </td>
                                            <td>
                                                <h6> {{ $hotel->name }} </h6>
                                                <span> {{ $hotel->placeContact->about }} </span>
                                            </td>
                                            <td>{{ $hotel->placeContact->phone_number }} </td>
                                            <td>{{ $hotel->user->name }}</td>
                                            <td>{{ $hotel->city->name }}</td>
                                            <td>{{ $hotel->created_at->diffForHumans() }}</td>
                                            <td class='align-content-end w-25'>

                                                <!-- Start - Edit Restaurant -->
                                                 <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#edithoteltModal_{{ $hotel->id }}">
                                                    <i class="fa fa-edit text-primary fs-5"></i>
                                                </button>
                                                <x-dashboard-component::modal.hotel.update-modal :hotel="$hotel"
                                                    :daysOfWeek="$daysOfWeek" :users="$users" :cities="$cities"
                                                    :roomTypes="$roomTypes" />
                                                <!-- End - Edit Restaurant -->


                                                <!-- Start - Delete Restaurant  -->
                                                <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-original-title="test"
                                                    data-bs-target="#deleteModal_{{ $hotel->id }}">
                                                    <i class="fa fa-trash-o text-danger fs-5">
                                                    </i>
                                                </button>

                                                <div class="modal fade" id="deleteModal_{{ $hotel->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">Delete
                                                                    Hotel</h5>
                                                                <button class="btn-close" type="button"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">Are You sure to delete Hotel
                                                                ?
                                                            </div>

                                                            <div class="modal-footer">
                                                                <form style="display:initial"
                                                                    action={{ route('hotel.destroy', $hotel) }}
                                                                    method="POST">
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
                                                <!-- End - Delete Restaurant -->


                                                <!-- Start - Show Restaurant  -->
                                                <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-original-title="test"
                                                    data-bs-target="#showModal_{{ $hotel->id }}">
                                                    <i class="fa fa-eye text-success fs-5">
                                                    </i>
                                                </button>

                                                <x-dashboard-component::modal.hotel.show-modal :hotel="$hotel" />
                                                <!-- End - Show Restaurant -->

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
