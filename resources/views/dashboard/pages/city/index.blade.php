<x-dashboard-layout::dashboard title="Cities">


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
                        <h5>Cities</h5>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#addCityModal">Add
                        </button>

                        <!-- Start - Add City Modal -->
                        <div class="modal
                                fade" id="addCityModal" tabindex="-1"
                             role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">Add City</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('city.store') }}" method='post'>
                                            @csrf
                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Name</label>
                                                <input class="form-control" type="text" name='name'
                                                       value="{{ old('name') }}">
                                                @error('name')
                                                <x-dashboard-component::input-error field="name" :="$message">
                                                </x-dashboard-component::input-error>
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
                        <!-- End - Add City Modal -->


                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-2">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach ($cities as $city)
                                    <tr>
                                        <td>{{ $city->name }}</td>

                                        <td class='align-content-end w-25'>

                                            <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#editCityModal_{{ $city->id }}">
                                                <i class="fa fa-edit text-primary fs-5"></i>
                                            </button>

                                            <!-- Start - Edit City Modal -->
                                            <div class="modal fade" id="editCityModal_{{ $city->id }}"
                                                 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel2">
                                                                Edit
                                                                {{ ' - ' . $city->name }}</h5>
                                                            <button class="btn-close" type="button"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action={{ route('city.update', $city->id) }}
                                                                    method='post'>
                                                                @method('put')
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label class="col-form-label"
                                                                           for="recipient-name">Name</label>
                                                                    <input class="form-control" type="text"
                                                                           name='name'
                                                                           value="{{ old('name') ?? $city->name }}">
                                                                </div>
                                                                <div class="modal-footer"
                                                                     style="border-top: 0;
                                                                                    padding: 0;">
                                                                    <button class="btn btn-secondary" type="button"
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
                                            <!-- End - Edit City Modal -->


                                            <!-- Start - Delete City  -->

                                            <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-original-title="test"
                                                    data-bs-target="#deleteModal_{{ $city->id }}">
                                                <i class="fa fa-trash-o text-danger fs-5">
                                                </i>
                                            </button>


                                            <div class="modal fade" id="deleteModal_{{ $city->id }}"
                                                 tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Delete
                                                                City</h5>
                                                            <button class="btn-close" type="button"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">Are You sure to delete City ?
                                                        </div>

                                                        <div class="modal-footer">
                                                            <form style="display:initial"
                                                                  action={{ route('city.destroy', $city) }}
                                                                    method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-primary" type="button"
                                                                        data-bs-dismiss="modal">Close
                                                                </button>
                                                                <button class="btn btn-danger"
                                                                        type="submit">Delete
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End - Delete City -->

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
