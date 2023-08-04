<x-dashboard-layout::dashboard title="Clinics">


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
                        <h5>Clinics</h5>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#addClinicModal">Add
                        </button>

                        <!-- Start - Add clinic -->

                        <x-dashboard-component::modal.clinic.add-modal :daysOfWeek="$daysOfWeek" :users="$users"
                                                                       :cities="$cities"
                                                                       :clinicSpecializations="$clinicSpecializations"/>

                        <!-- End - Add clinic -->


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


                                @foreach ($clinics as $clinic)
                                    <tr>
                                        <td>
                                            <img style="background-size: cover;
                                                        object-fit: cover;
                                                        width: 100px;
                                                        aspect-ratio: 3/2;"
                                                 src="{{ $clinic->getFirstMediaUrl('Clinic') }}" alt="">
                                        </td>
                                        <td>
                                            <h6> {{ $clinic->name }} </h6>
                                            <span> {{ $clinic->placeContact->about }} </span>
                                        </td>
                                        <td>{{ $clinic->placeContact->phone_number }} </td>
                                        <td>{{ $clinic->user->name }}</td>
                                        <td>{{ $clinic->city->name }}</td>
                                        <td>{{ $clinic->created_at->diffForHumans() }}</td>
                                        <td class='align-content-end w-25'>

                                            <!-- Start - Edit clinic -->
                                            <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#editClinicModal_{{ $clinic->id }}">
                                                <i class="fa fa-edit text-primary fs-5"></i>
                                            </button>

                                            <x-dashboard-component::modal.clinic.update-modal :clinic="$clinic"
                                                                                              :daysOfWeek="$daysOfWeek"
                                                                                              :users="$users"
                                                                                              :cities="$cities"
                                                                                              :clinicSpecializations="$clinicSpecializations"/>
                                            <!-- End - Edit clinic -->


                                            <!-- Start - Delete clinic  -->
                                            <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-original-title="test"
                                                    data-bs-target="#deleteModal_{{ $clinic->id }}">
                                                <i class="fa fa-trash-o text-danger fs-5">
                                                </i>
                                            </button>

                                            <div class="modal fade" id="deleteModal_{{ $clinic->id }}"
                                                 tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Delete
                                                                clinic</h5>
                                                            <button class="btn-close" type="button"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">Are You sure to delete clinic
                                                            ?
                                                        </div>

                                                        <div class="modal-footer">
                                                            <form style="display:initial"
                                                                  action={{ route('clinic.destroy', $clinic) }}
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
                                            <!-- End - Delete clinic -->


                                            <!-- Start - Show clinic  -->
                                            <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-original-title="test"
                                                    data-bs-target="#showModal_{{ $clinic->id }}">
                                                <i class="fa fa-eye text-success fs-5">
                                                </i>
                                            </button>

                                            <x-dashboard-component::modal.clinic.show-modal :clinic="$clinic"/>
                                            <!-- End - Show clinic -->

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
