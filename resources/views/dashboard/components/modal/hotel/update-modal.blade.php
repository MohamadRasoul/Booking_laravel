@props(['hotel', 'daysOfWeek', 'users', 'cities', 'roomTypes'])

<div class="modal fade modal-bookmark" id="edithoteltModal_{{ $hotel->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">
                    Edit
                    {{ ' - ' . $hotel->name }}</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action={{ route('hotel.update', $hotel->id) }} method='post' enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    {{-- Name Field --}}
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Name</label>
                        <input class="form-control" type="text" name='name'
                               value="{{ old('name') ?? $hotel->name }}">
                        @error('name')
                        <x-dashboard-component::input-error field="name" :="$message"/>
                        @enderror
                    </div>


                    {{-- About Field --}}
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">About</label>
                        <textarea class="form-control" id="validationTextarea" name='about'>
                                                                        {{ old('about') ?? $hotel->placeContact->about }}
                                                                    </textarea>

                        @error('about')
                        <x-dashboard-component::input-error field="about"
                                                            :="$message"></x-dashboard-component::input-error>
                        @enderror
                    </div>


                    {{-- Address Field --}}
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Address</label>
                        <input class="form-control" type="text" name='address'
                               value="{{ old('address') ?? $hotel->placeContact->address }}">
                        @error('address')
                        <x-dashboard-component::input-error field="address"
                                                            :="$message"></x-dashboard-component::input-error>
                        @enderror
                    </div>


                    {{-- Phone_Number Field --}}
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Phone
                            Number</label>
                        <input class="form-control" type="text" name='phone_number'
                               value="{{ old('phone_number') ?? $hotel->placeContact->phone_number }}">
                        @error('phone_number')
                        <x-dashboard-component::input-error field="phone_number"
                                                            :="$message"></x-dashboard-component::input-error>
                        @enderror
                    </div>

                    <div class="row m-0 col-md-12">
                        {{-- Latitude Field --}}
                        <div class="mb-3 mt-0  p-l-0 col-md-6">
                            <label class="col-form-label" for="recipient-name">Latitude</label>
                            <input class="form-control" type="text" name='latitude'
                                   value="{{ old('latitude') ?? $hotel->placeContact->latitude }}">
                            @error('latitude')
                            <x-dashboard-component::input-error field="latitude"
                                                                :="$message"></x-dashboard-component::input-error>
                            @enderror
                        </div>


                        {{-- Longitude Field --}}
                        <div class="mb-3 mt-0 p-r-0 col-md-6">
                            <label class="col-form-label" for="recipient-name">Longitude</label>
                            <input class="form-control" type="text" name='longitude'
                                   value="{{ old('longitude') ?? $hotel->placeContact->longitude }}">
                            @error('longitude')
                            <x-dashboard-component::input-error field="longitude"
                                                                :="$message"></x-dashboard-component::input-error>
                            @enderror
                        </div>
                    </div>

                    <div class="row m-0 col-md-12">
                        {{-- Open_At Field --}}
                        <div class="mb-3 mt-0  p-l-0 col-md-6">
                            <label class="col-form-label" for="recipient-name">Open
                                At</label>

                            <input class="form-control" type="time" name='open_at'
                                   value="{{ old('open_at') ?? $hotel->placeContact->open_at }}">
                            @error('open_at')
                            <x-dashboard-component::input-error field="open_at"
                                                                :="$message"></x-dashboard-component::input-error>
                            @enderror
                        </div>


                        {{-- Close_At Field --}}
                        <div class="mb-3 mt-0 p-r-0 col-md-6">
                            <label class="col-form-label" for="recipient-name">Close
                                At</label>
                            <input class="form-control" type="time" name='close_at'
                                   value="{{ old('close_at') ?? $hotel->placeContact->close_at }}">
                            @error('close_at')
                            <x-dashboard-component::input-error field="close_at"
                                                                :="$message"></x-dashboard-component::input-error>
                            @enderror
                        </div>
                    </div>

                    {{-- Open_Days Field --}}
                    <div class="mb-3">
                        <div class="col-form-label">Open Days</div>
                        <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"
                                name="open_days[]">
                            @foreach ($daysOfWeek as $keyDay => $day)
                                <option
                                    @selected(!!Arr::first(old('open_days') ?? $hotel->placeContact->open_days, fn($el) => $el == $keyDay)) value={{ $keyDay }}>
                                    {{ $day }}
                                </option>
                            @endforeach

                        </select>

                        @error('open_days')
                        <x-dashboard-component::input-error field="open_days"
                                                            :="$message"></x-dashboard-component::input-error>
                        @enderror
                    </div>

                    {{-- Table_Type Field --}}
                    <div class="mb-3">
                        <div class="col-form-label">Room Type</div>
                        <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple"
                                name="room_types[]" required="">

                            @foreach ($roomTypes as $roomType)
                                <option
                                    @selected(!!Arr::first(old('room_types') ?? $hotel->roomTypes()->allRelatedIds(), fn($el) => $el == $roomType->id)) value={{ $roomType->id }}>{{ $roomType->name }}
                                </option>
                            @endforeach

                        </select>

                        @error('room_types')
                        <x-dashboard-component::input-error field="roomType"
                                                            :="$message"></x-dashboard-component::input-error>
                        @enderror
                    </div>


                    {{-- Image Field --}}
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Image</label>
                        <input class="form-control" type="file" aria-label="image example" name='image'>

                        @error('image')
                        <x-dashboard-component::input-error field="image"
                                                            :="$message"></x-dashboard-component::input-error>
                        @enderror
                    </div>


                    <div class="row m-0 col-md-12">


                        {{-- FaceBook Field --}}
                        <div class="mb-3 mt-0  p-l-0 col-md-6">
                            <label class="col-form-label" for="recipient-name">FaceBook
                                Url</label>
                            <input class="form-control" type="text" name='facebook_url'
                                   value="{{ old('facebook_url') ?? $hotel->placeContact->facebook_url }}"
                                   required="">
                            @error('facebook_url')
                            <x-dashboard-component::input-error field="facebook_url"
                                                                :="$message"></x-dashboard-component::input-error>
                            @enderror
                        </div>


                        {{-- Instagram Field --}}
                        <div class="mb-3 mt-0 p-r-0 col-md-6">
                            <label class="col-form-label" for="recipient-name">Instagram</label>
                            <input class="form-control" type="text" name='instagram_url'
                                   value="{{ old('instagram_url') ?? $hotel->placeContact->instagram_url }}"
                                   required="">
                            @error('instagram_url')
                            <x-dashboard-component::input-error field="instagram_url"
                                                                :="$message"></x-dashboard-component::input-error>
                            @enderror
                        </div>
                    </div>


                    <div class="row m-0 col-md-12">
                        {{-- User Field --}}
                        <div class="mb-3 mt-0  p-l-0 col-md-6">
                            <label class="col-form-label" for="recipient-name">User</label>

                            <select class="form-select" aria-label="select example" name="user_id">
                                <option selected disabled value="">Select The User
                                </option>
                                @foreach ($users as $user)
                                    <option @selected($user->id ==$hotel->user_id) value={{ $user->id }}>
                                        {{ $user->username }}</option>
                                @endforeach
                            </select>

                            @error('user_id')
                            <x-dashboard-component::input-error field="user_id"
                                                                :="$message"></x-dashboard-component::input-error>
                            @enderror
                        </div>


                        {{-- City Field --}}
                        <div class="mb-3 mt-0 p-r-0 col-md-6">
                            <label class="col-form-label" for="recipient-name">City</label>

                            <select class="form-select" aria-label="select example" name="city_id">
                                <option selected disabled value="">Select The City
                                </option>
                                @foreach ($cities as $city)
                                    <option
                                        @selected($city->id == $hotel->city_id) value={{ $city->id }}>{{ $city->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('city_id')
                            <x-dashboard-component::input-error field="city_id"
                                                                :="$message"></x-dashboard-component::input-error>
                            @enderror
                        </div>
                    </div>


                    <div class="modal-footer"
                         style="border-top: 0;
                                                                                    padding: 0;">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close
                        </button>
                        <button class="btn btn-primary" type="submit">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
