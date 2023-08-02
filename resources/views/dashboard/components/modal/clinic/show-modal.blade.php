@props(['clinic'])

<div class="modal fade modal-bookmark" id="showModal_{{ $clinic->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="profile-img-style">
                <div class="row p-15 mt-3">
                    <div class="col-sm-8">


                        <div class="media">
                            <div class="avatar">
                                <img class="b-r-8"
                                    style=" width: 70px;
                                            height: 70px;
                                            background-size: cover;
                                            object-fit: cover;
                                                                            "
                                    src="{{ $clinic->getFirstMediaUrl('Clinic') }}" alt="#">
                            </div>
                            <div class="m-l-20 media-body align-self-center">
                                <h4 class=" mt-2 user-name" style="">{{ $clinic->name }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 align-self-center">
                        <div class="float-sm-end m-r-5 ">
                            {{ $clinic->created_at->diffForHumans() }}
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
                                        &nbsp;&nbsp;&nbsp;:</b>
                                </td>
                                <td>{{ $clinic->placeContact->about }}</td>
                            </tr>
                            <tr>
                                <td><b>Address &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                                </td>
                                <td class="txt-success">{{ $clinic->placeContact->address }}</td>
                            </tr>
                            <tr>
                                <td><b>Phone Number &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                                </td>
                                <td>{{ $clinic->placeContact->phone_number }}</td>
                            </tr>
                            <tr>
                                <td><b>Open at &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                                </td>
                                <td>{{ $clinic->placeContact->open_at->format('H:i') }}</td>
                            </tr>
                            <tr>
                                <td><b>Close at &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                                </td>
                                <td>{{ $clinic->placeContact->close_at->format('H:i') }}</td>
                            </tr>

                            <tr>
                                <td><b>Open Day &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</b>
                                </td>
                                <td>
                                    @foreach ($clinic->placeContact->open_days as $openDay)
                                        @switch($openDay)
                                            @case(App\Enums\DaysOfWeekEnum::SUN->value)
                                                {{ App\Enums\DaysOfWeekEnum::SUN->getHumanName() . ' | ' }}
                                            @break

                                            @case(App\Enums\DaysOfWeekEnum::MON->value)
                                                {{ App\Enums\DaysOfWeekEnum::MON->getHumanName() . ' | ' }}
                                            @break

                                            @case(App\Enums\DaysOfWeekEnum::TUE->value)
                                                {{ App\Enums\DaysOfWeekEnum::TUE->getHumanName() . ' | ' }}
                                            @break

                                            @case(App\Enums\DaysOfWeekEnum::WED->value)
                                                {{ App\Enums\DaysOfWeekEnum::WED->getHumanName() . ' | ' }}
                                            @break

                                            @case(App\Enums\DaysOfWeekEnum::THU->value)
                                                {{ App\Enums\DaysOfWeekEnum::THU->getHumanName() . ' | ' }}
                                            @break

                                            @case(App\Enums\DaysOfWeekEnum::FRI->value)
                                                {{ App\Enums\DaysOfWeekEnum::FRI->getHumanName() . ' | ' }}
                                            @break

                                            @case(App\Enums\DaysOfWeekEnum::SAT->value)
                                                {{ App\Enums\DaysOfWeekEnum::SAT->getHumanName() . ' | ' }}
                                            @break
                                        @endswitch
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <td><b>Experience years&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                                </td>
                                <td>{{ $clinic->experience_years }}</td>
                            </tr>

                            <tr>
                                <td><b>Session duration&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                                </td>
                                <td>{{ $clinic->session_duration }}</td>
                            </tr>

                            <tr>
                                <td><b>Clinic Specialization&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                                </td>
                                <td>{{ $clinic->clinicSpecialization->name }}</td>
                            </tr>

                            <tr>
                                <td><b>Clinic Sessions&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                                </td>
                                <td>
                                    @foreach ($clinic->clinicSessions as $clinicSession)
                                        {{ \Carbon\Carbon::parse($clinicSession->start_time)->format('H:i') . ' ~ ' . \Carbon\Carbon::parse($clinicSession->end_time)->format('H:i') . ' | ' }}
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <td><b>Owner Name&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                                </td>
                                <td>{{ $clinic->user->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Owner Username&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                                </td>
                                <td>{{ $clinic->user->username }}</td>
                            </tr>
                            <tr>
                                <td><b>City&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b>
                                </td>
                                <td>{{ $clinic->city->name }}</td>
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
                                <li class="d-inline-block"><a target="_blank"
                                        href={{ $clinic->placeContact->facebook_url }}>
                                        <i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="d-inline-block"><a target="_blank"
                                        href={{ $clinic->placeContact->instagram_url }}><i
                                            class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                            <form class="d-inline-block f-right"></form>
                        </div>
                    </div>
                </div>

            </div>


            <div class="modal-footer">

                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close
                </button>


            </div>
        </div>
    </div>
</div>
