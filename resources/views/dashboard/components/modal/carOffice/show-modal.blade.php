@props([
'carOffice',
'carTypes'
])

<div class="modal fade modal-bookmark" id="showModal_{{ $carOffice->id }}"
     tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">


            <div class="profile-img-style">
                <div class="row p-15 mt-3">
                    <div class="col-sm-8">


                        <div class="media">
                            <div class="avatar">
                                <img
                                    class="b-r-8"
                                    style=" width: 70px;
                                                                                height: 70px;
                                                                                background-size: cover;
                                                                                object-fit: cover;
                                                                            "
                                    src={{ $carOffice->getFirstMediaUrl('CarOffice') }}
                                                                            alt="#">
                            </div>
                            <div
                                class="m-l-20 media-body align-self-center">
                                <h4 class=" mt-2 user-name"
                                    style=""
                                >{{$carOffice->name}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 align-self-center">
                        <div class="float-sm-end m-r-5 ">
                            {{$carOffice->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
                <hr>
            </div>


            <div class="modal-body">
                <div>


                    <table class="product-page-width">
                        <tbody>
                        <tr>
                            <td>
                                <b>About
                                    &nbsp;&nbsp;&nbsp;:</b></td>
                            <td>{{ $carOffice->placeContact->about }}</td>
                        </tr>
                        <tr>
                            <td><b>Address &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                            </td>
                            <td class="txt-success">{{ $carOffice->placeContact->address }}</td>
                        </tr>
                        <tr>
                            <td><b>Phone Number &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                            </td>
                            <td>{{$carOffice->placeContact->phone_number}}</td>
                        </tr>
                        <tr>
                            <td><b>Open at &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                            </td>
                            <td>{{$carOffice->placeContact->open_at->format('H:i')}}</td>
                        </tr>
                        <tr>
                            <td><b>Close at &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                            </td>
                            <td>{{$carOffice->placeContact->close_at->format('H:i')}}</td>
                        </tr>

                        <tr>
                            <td><b>Open Day &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</b>
                            </td>
                            <td>
                                @foreach($carOffice->placeContact->open_days as $openDay)
                                    @switch($openDay)
                                        @case(App\Enums\DaysOfWeekEnum::SUN->value)
                                            {{ App\Enums\DaysOfWeekEnum::SUN->getHumanName() . " | "}}
                                            @break
                                        @case(App\Enums\DaysOfWeekEnum::MON->value)
                                            {{ App\Enums\DaysOfWeekEnum::MON->getHumanName() . " | "}}
                                            @break
                                        @case(App\Enums\DaysOfWeekEnum::TUE->value)
                                            {{ App\Enums\DaysOfWeekEnum::TUE->getHumanName() . " | "}}
                                            @break
                                        @case(App\Enums\DaysOfWeekEnum::WED->value)
                                            {{ App\Enums\DaysOfWeekEnum::WED->getHumanName() . " | "}}
                                            @break
                                        @case(App\Enums\DaysOfWeekEnum::THU->value)
                                            {{ App\Enums\DaysOfWeekEnum::THU->getHumanName() . " | "}}
                                            @break
                                        @case(App\Enums\DaysOfWeekEnum::FRI->value)
                                            {{ App\Enums\DaysOfWeekEnum::FRI->getHumanName() . " | "}}
                                            @break
                                        @case(App\Enums\DaysOfWeekEnum::SAT->value)
                                            {{ App\Enums\DaysOfWeekEnum::SAT->getHumanName() . " | "}}
                                            @break
                                    @endswitch
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            <td><b>car Type &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</b>
                            </td>
                            <td>
                                @foreach ($carOffice->carTypes as $carType)
                                    {{ $carType->name . ' | ' }}
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            <td><b>Owner Name&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                            </td>
                            <td>{{$carOffice->user->name}}</td>
                        </tr>
                        <tr>
                            <td><b>Owner Username&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                            </td>
                            <td>{{$carOffice->user->username}}</td>
                        </tr>
                        <tr>
                            <td><b>City&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                            </td>
                            <td>{{$carOffice->city->name}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <h6 class="product-title">Social Media&nbsp;&nbsp;&nbsp;:
                            &nbsp;&nbsp;&nbsp;</h6>
                    </div>
                    <div class="col-md-9">
                        <div class="product-icon">
                            <ul class="product-social">
                                <li class="d-inline-block"><a
                                        target="_blank"
                                        href={{$carOffice->placeContact->facebook_url}}>
                                        <i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="d-inline-block"><a
                                        target="_blank"
                                        href={{$carOffice->placeContact->instagram_url}}><i
                                            class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                            <form class="d-inline-block f-right"></form>
                        </div>
                    </div>
                </div>

            </div>


            <div class="modal-footer">

                <button class="btn btn-primary" type="button"
                        data-bs-dismiss="modal">Close
                </button>


            </div>
        </div>
    </div>
</div>

