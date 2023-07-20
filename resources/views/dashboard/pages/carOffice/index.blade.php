<x-dashboard-layout::dashboard title="Car Offices">


    <x-slot name="head">
        <link rel="stylesheet" type="text/css" href={{ asset('dashboard/assets/css/vendors/datatables.css') }}>
    </x-slot>

    <x-slot name="javascript">
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

                        <!-- Start - Add CarOffice Modal -->

                        <div class="modal fade" id="addCarOfficeModal" tabindex="-1"
                             role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">Add CarOffice</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('carOffice.store') }}" method='post'>
                                            @csrf
                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Name</label>
                                                <input class="form-control" type="text" name='name'
                                                       value="{{ old('name') }}">
                                                @error('name')
                                                <x-dashboard-component::input-error
                                                    :="$message"></x-dashboard-component::input-error>
                                                @enderror
                                            </div>
                                            <div class="modal-footer"
                                                 style="border-top: 0;
                                                             padding: 0;">
                                                <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Close
                                                </button>
                                                <button class="btn btn-primary" type="submit">
                                                    Save
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- End - Add CarOffice Modal -->


                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Owner</th>
                                    <th>Start date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach ($carOffices as $carOffice)
                                    <tr>
                                        <td><img
                                                src="{{ asset('dashboard/assets/images/ecommerce/product-table-1.png') }}"
                                                alt=""></td>
                                        <td>
                                            <h6> {{$carOffice->name}} </h6>
                                            <span>Interchargebla lens Digital Camera with APS-C-X Trans CMOS Sens</span>
                                        </td>
                                        <td>{{ $carOffice->name }}</td>
                                        <td>2011/04/25</td>
                                        <td class='align-content-end w-25'>

                                            <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#editCarOfficeModal_{{ $carOffice->id }}">
                                                <i class="fa fa-edit text-primary fs-5"></i>
                                            </button>

                                            <!-- Start - Edit CarOffice Modal -->
                                            <div class="modal fade" id="editCarOfficeModal_{{ $carOffice->id }}"
                                                 tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel2">
                                                                Edit
                                                                {{ ' - ' . $carOffice->name }}</h5>
                                                            <button class="btn-close" type="button"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action={{ route('carOffice.update', $carOffice->id) }}
                                                                    method='post'>
                                                                @method('put')
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label class="col-form-label"
                                                                           for="recipient-name">Name</label>
                                                                    <input class="form-control" type="text"
                                                                           name='name'
                                                                           value="{{ old('name') ?? $carOffice->name }}">
                                                                </div>
                                                                <div class="modal-footer"
                                                                     style="border-top: 0;
                                                                                    padding: 0;">
                                                                    <button class="btn btn-secondary"
                                                                            type="button"
                                                                            data-bs-dismiss="modal">Close
                                                                    </button>
                                                                    <button class="btn btn-primary"
                                                                            type="submit">Save
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End - Edit CarOffice Modal -->


                                            <!-- Start - Delete CarOffice  -->
                                                <button class="btn" type="button" data-bs-toggle="modal"
                                                        data-original-title="test"
                                                        data-bs-target="#deleteModal_{{ $carOffice->id }}">
                                                    <i class="fa fa-trash-o text-danger fs-5">
                                                    </i>
                                                </button>

                                                <div class="modal fade" id="deleteModal_{{ $carOffice->id }}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">Delete
                                                                    CarOffice</h5>
                                                                <button class="btn-close" type="button"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">Are You sure to delete CarOffice ?
                                                            </div>

                                                            <div class="modal-footer">
                                                                <form style="display:initial"
                                                                      action={{ route('carOffice.destroy', $carOffice) }} method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-primary" type="button"
                                                                            data-bs-dismiss="modal">Close
                                                                    </button>
                                                                    <button class="btn btn-danger" type="submit">Delete
                                                                    </button>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            <!-- End - Delete CarOffice -->

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
