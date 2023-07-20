<x-dashboard-layout::dashboard title="Notifications">


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
                        <h5>Notifications</h5>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#addNotificationModal">Send Notification To All User
                        </button>

                        <!-- Start - Add Notification Modal -->
                        <div class="modal
                                fade" id="addNotificationModal" tabindex="-1"
                             role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">Add Notification</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('notification.store') }}" method='post'
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Title</label>
                                                <input class="form-control" type="text" name='title'
                                                       value="{{ old('title') }}">
                                                <x-dashboard-component::input-error
                                                    field='title'></x-dashboard-component::input-error>
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Message</label>
                                                <input class="form-control" type="text" name='message'
                                                       value="{{ old('message') }}">
                                                <x-dashboard-component::input-error
                                                    field='message'></x-dashboard-component::input-error>
                                            </div>

                                            <div class="mb-3">
                                                <label class="col-form-label" for="recipient-name">Image</label>
                                                <input class="form-control" type="file" name='image'>
                                                <x-dashboard-component::input-error
                                                    field='image'></x-dashboard-component::input-error>
                                            </div>
                                            <div class="modal-footer"
                                                 style="border-top: 0;
                                                             padding: 0;">
                                                <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Close
                                                </button>
                                                <button class="btn btn-primary" type="submit">
                                                    Send
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End - Add Notification Modal -->

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-2">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>To User</th>
                                    <th>Is Readed</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach ($notifications as $notification)
                                    <tr>
                                        <td>{{ $notification->data['title'] }}</td>
                                        <td>{{ $notification->data['message'] }}</td>
                                        <td>{{ $notification->notifiable->name }}</td>
                                        <td @class([
                                                'font-success' => $notification->read_at ,
                                                'font-danger' => ! $notification->read_at ,
                                            ])>{{ $notification->read_at ? "YES" : "NO" }}</td>

                                        <td class='align-content-end w-25'>


                                            <!-- Start - Delete Notification  -->
                                            <button class="btn" type="button" data-bs-toggle="modal"
                                                    data-original-title="test"
                                                    data-bs-target="#deleteModal_{{ $notification->id }}">
                                                <i class="fa fa-trash-o text-danger fs-5">
                                                </i>
                                            </button>


                                            <div class="modal fade" id="deleteModal_{{ $notification->id }}"
                                                 tabindex="-1" role="dialog"
                                                 aria-labelledby="deleteModalLabel_{{ $notification->id }}"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel_{{ $notification->id }}">Delete
                                                                Notification</h5>
                                                            <button class="btn-close" type="button"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">Are You sure to delete Notification ?
                                                        </div>

                                                        <div class="modal-footer">

                                                            <form style="display:initial"
                                                                  action={{ route('notification.destroy', $notification->id) }} method="POST">
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

                                            <!-- End - Delete Notification -->

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
