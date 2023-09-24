@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title">Manage Room </div>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">

                                    <div class="col-xl-12 mx-auto">

                                        <div class="card">
                                            <div class="card-body p-4">
                                                <h5 class="mb-4">Update Room </h5>

                                                <form class="row g-3" action="{{ route('update.room', $editData->id) }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-md-4">
                                                        <label for="input2" class="form-label">Name Room </label>
                                                        <input type="text" name="name" class="form-control"
                                                            id="input2" value="{{ $editData->name }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="input2" class="form-label">Type Room </label>
                                                        <select id="input7" name="room_type" class="form-select">
                                                            <option value="{{ $editData->room_type }}"  {{ $editData->room_type == 'meetingroom' ? 'selected' : '' }}>Meeting Room</option>
                                                            <option value="{{ $editData->room_type }}"  {{ $editData->room_type == 'room' ? 'selected' : '' }}>Room</option>
                                                            <option value="{{ $editData->room_type }}"  {{ $editData->room_type == 'workspace' ? 'selected' : '' }}>Working Space</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="input2" class="form-label">Room Capacity </label>
                                                        <input type="text" name="room_capacity" class="form-control"
                                                            id="input2" value="{{ $editData->room_capacity }}">
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="input7" class="form-label">Location</label>

                                                        <select id="input7" name="location" class="form-select">
                                                            
                                                            <option value="{{ $editData->location }}"
                                                                {{ $editData->location == 'sinaea' ? 'selected' : '' }}>
                                                                sinaea</option>
                                                            <option value="{{ $editData->location }}"
                                                                {{ $editData->location == 'capital_mall' ? 'selected' : '' }}>
                                                                Capital Mall</option>
                                                            <option value="{{ $editData->location }}"
                                                                {{ $editData->location == 'khan_younes' ? 'selected' : '' }}>
                                                                Khan Younes</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label for="input3" class="form-label">Image </label>
                                                        <input class="form-control" name="image" type="file"
                                                            id="image">
                                                        <br>
                                                        <div class="row mb-4">
                                                            <div class="col-sm-9 text-secondary">
                                                                <img id="showImage" src=" {{ asset($editData->image) }}"
                                                                    alt="Room" class="bg-primary" width="100">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="input11" class="form-label">Description </label>
                                                            <textarea name="short_desc" class="form-control" id="myeditorinstance" value="{{ $editData->short_desc }}">{!! $editData->short_desc !!}</textarea>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-12 mb-3">
                                                                @forelse ($basic_facility as $item)
                                                                    <div class="basic_facility_section_remove"
                                                                        id="basic_facility_section_remove">
                                                                        <div class="row add_item">
                                                                            <div class="col-md-8">
                                                                                <label for="facility_name"
                                                                                    class="form-label">
                                                                                    Room Facilities </label>
                                                                                <select name="facility_name[]"
                                                                                    id="facility_name" class="form-control">
                                                                                    <option value="">Select Facility
                                                                                    </option>
                                                                                    <option value="Complimentary Breakfast"
                                                                                        {{ $item->facility_name == 'Complimentary Breakfast' ? 'selected' : '' }}>
                                                                                        Complimentary Breakfast</option>
                                                                                    <option value="32/42 inch LED TV"
                                                                                        {{ $item->facility_name == 'Complimentary Breakfast' ? 'selected' : '' }}>
                                                                                        32/42 inch LED TV</option>

                                                                                    <option value="Smoke alarms"
                                                                                        {{ $item->facility_name == 'Smoke alarms' ? 'selected' : '' }}>
                                                                                        Smoke alarms</option>

                                                                                    <option value="Minibar"
                                                                                        {{ $item->facility_name == 'Complimentary Breakfast' ? 'selected' : '' }}>
                                                                                        Minibar</option>

                                                                                    <option value="Work Desk"
                                                                                        {{ $item->facility_name == 'Work Desk' ? 'selected' : '' }}>
                                                                                        Work Desk</option>

                                                                                    <option value="Free Wi-Fi"
                                                                                        {{ $item->facility_name == 'Free Wi-Fi' ? 'selected' : '' }}>
                                                                                        Free Wi-Fi</option>

                                                                                    <option value="Safety box"
                                                                                        {{ $item->facility_name == 'Safety box' ? 'selected' : '' }}>
                                                                                        Safety box</option>

                                                                                    <option value="Rain Shower"
                                                                                        {{ $item->facility_name == 'Rain Shower' ? 'selected' : '' }}>
                                                                                        Rain Shower</option>

                                                                                    <option value="Slippers"
                                                                                        {{ $item->facility_name == 'Slippers' ? 'selected' : '' }}>
                                                                                        Slippers</option>

                                                                                    <option value="Hair dryer"
                                                                                        {{ $item->facility_name == 'Hair dryer' ? 'selected' : '' }}>
                                                                                        Hair dryer</option>

                                                                                    <option value="Wake-up service"
                                                                                        {{ $item->facility_name == 'Wake-up service' ? 'selected' : '' }}>
                                                                                        Wake-up service</option>

                                                                                    <option value="Laundry & Dry Cleaning"
                                                                                        {{ $item->facility_name == 'Laundry & Dry Cleaning' ? 'selected' : '' }}>
                                                                                        Laundry & Dry Cleaning</option>

                                                                                    <option value="Electronic door lock"
                                                                                        {{ $item->facility_name == 'Electronic door lock' ? 'selected' : '' }}>
                                                                                        Electronic door lock</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group"
                                                                                    style="padding-top: 30px;">
                                                                                    <a
                                                                                        class="btn btn-success addeventmore"><i
                                                                                            class="lni lni-circle-plus"></i></a>
                                                                                    <span
                                                                                        class="btn btn-danger btn-sm removeeventmore"><i
                                                                                            class="lni lni-circle-minus"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                @empty

                                                                    <div class="basic_facility_section_remove"
                                                                        id="basic_facility_section_remove">
                                                                        <div class="row add_item">
                                                                            <div class="col-md-6">
                                                                                <label for="basic_facility_name"
                                                                                    class="form-label">Room Facilities
                                                                                </label>
                                                                                <select name="facility_name[]"
                                                                                    id="basic_facility_name"
                                                                                    class="form-control">
                                                                                    <option value="">Select Facility
                                                                                    </option>
                                                                                    <option
                                                                                        value="Complimentary Breakfast">
                                                                                        Complimentary Breakfast</option>
                                                                                    <option value="32/42 inch LED TV">
                                                                                        32/42
                                                                                        inch LED TV</option>
                                                                                    <option value="Smoke alarms">Smoke
                                                                                        alarms
                                                                                    </option>
                                                                                    <option value="Minibar"> Minibar
                                                                                    </option>
                                                                                    <option value="Work Desk">Work Desk
                                                                                    </option>
                                                                                    <option value="Free Wi-Fi">Free Wi-Fi
                                                                                    </option>
                                                                                    <option value="Safety box">Safety box
                                                                                    </option>
                                                                                    <option value="Rain Shower">Rain Shower
                                                                                    </option>
                                                                                    <option value="Slippers">Slippers
                                                                                    </option>
                                                                                    <option value="Hair dryer">Hair dryer
                                                                                    </option>
                                                                                    <option value="Wake-up service">Wake-up
                                                                                        service</option>
                                                                                    <option value="Laundry & Dry Cleaning">
                                                                                        Laundry & Dry Cleaning</option>
                                                                                    <option value="Electronic door lock">
                                                                                        Electronic door lock</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group"
                                                                                    style="padding-top: 30px;">
                                                                                    <a
                                                                                        class="btn btn-success addeventmore"><i
                                                                                            class="lni lni-circle-plus"></i></a>

                                                                                    <span
                                                                                        class="btn btn-danger removeeventmore"><i
                                                                                            class="lni lni-circle-minus"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforelse
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <div class="d-md-flex d-grid align-items-center gap-3">
                                                                <button type="submit" class="btn btn-primary px-4">Save
                                                                    Changes</button>
                                                            </div>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- // End primaryhome --}}
                                {{-- <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <a class="card-title btn btn-primary float-right" onclick="addRoomNo()"
                                                id="addRoomNo">
                                                <i class="lni lni-plus">Add New</i>
                                            </a>
                                            <div class="roomnoHide" id="roomnoHide">
                                                <form action="{{ route('store.room.no', $editData->id) }}"
                                                    method="post">
                                                    @csrf

                                                    <input type="hidden" name="room_type_id"
                                                        value="{{ $editData->roomtype_id }}">

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="input2" class="form-label">Room No </label>
                                                            <input type="text" name="room_no" class="form-control"
                                                                id="input2">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="input7" class="form-label">Status </label>
                                                            <select name="status" id="input7" class="form-select">
                                                                <option selected="">Select Status...</option>
                                                                <option value="Active">Active </option>
                                                                <option value="Inactive">Inactive </option>

                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">

                                                            <button type="submit" class="btn btn-success"
                                                                style="margin-top: 28px;">Save</button>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                     </div>
                                 </div>
                            </div> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <!--========== Start of add Basic Plan Facilities ==============-->
    <div style="visibility: hidden">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="basic_facility_section_remove" id="basic_facility_section_remove">
                <div class="container mt-2">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="basic_facility_name">Room Facilities</label>
                            <select name="facility_name[]" id="basic_facility_name" class="form-control">
                                <option value="">Select Facility</option>
                                <option value="Complimentary Breakfast">Complimentary Breakfast</option>
                                <option value="32/42 inch LED TV"> 32/42 inch LED TV</option>
                                <option value="Smoke alarms">Smoke alarms</option>
                                <option value="Minibar"> Minibar</option>
                                <option value="Work Desk">Work Desk</option>
                                <option value="Free Wi-Fi">Free Wi-Fi</option>
                                <option value="Safety box">Safety box</option>
                                <option value="Rain Shower">Rain Shower</option>
                                <option value="Slippers">Slippers</option>
                                <option value="Hair dryer">Hair dryer</option>
                                <option value="Wake-up service">Wake-up service</option>
                                <option value="Laundry & Dry Cleaning">Laundry & Dry Cleaning</option>
                                <option value="Electronic door lock">Electronic door lock</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" style="padding-top: 20px">
                            <span class="btn btn-success addeventmore"><i class="lni lni-circle-plus"></i></span>
                            <span class="btn btn-danger removeeventmore"><i class="lni lni-circle-minus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addeventmore", function() {
                var whole_extra_item_add = $("#whole_extra_item_add").html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", ".removeeventmore", function(event) {
                $(this).closest("#basic_facility_section_remove").remove();
                counter -= 1
            });
        });
    </script>
    <!--========== End of Basic Plan Facilities ==============-->

    <!--========== Start Room Number Add ==============-->
    <script>
        $('#roomnoHide').hide();
        $('#roomview').show();

        function addRoomNo() {
            $('#roomnoHide').show();
            $('#roomview').hide();
            $('#addRoomNo').hide();
        }
    </script>

    <!--========== End Room Number Add ==============-->
@endsection
