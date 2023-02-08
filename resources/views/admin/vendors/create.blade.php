
<title>@yield('title','اضافه متجر جديد ')</title>

@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
    <div class="card-content collapse show container" >
        <div class="card-body">
            <form class="form" action="{{route('admin.vendors.store')}}" method="post"
            enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <h4 class="form-section"><i class="fa fa-home" ></i>بيانات المتجر</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>أسم المتجر</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="أدخل أسم المتجر">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>رقم الهاتف</label>
                                <input type="text" name="mobile" value="{{old('mobile')}}" class="form-control" placeholder="أدخل رقم الهاتف للمتجر">
                                @error('mobile')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الايميل </label>
                                <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="أدخل البريد الاكتروني للمتجر">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>




                        <div class="col-md-6">
                            <div class="form-group">
                                <label> الرقم السري</label>
                                <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="أدخل رقم الهاتف للمتجر">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label>صوره اللجو</label>
                                <input type="file" name="logo"  value="{{old('logo')}}" class="form-control"  >
                                @error('logo')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group ">
                                <label> حاله المتجر</label>
                                <select name="active" class="form-control">
                                    <option value="0">غير مفعل    </option>
                                    <option value="1">مفعل    </option>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>  القسم الرئيسي</label>
                                <select name="category_id" class="form-control">

                                    @isset($categories)
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>عنوان المتجر</label>
                                <!-- id="pac-input" -->
                                
                                <input  type="text" name="address" value="{{old('address')}}" class="form-control" placeholder="أدخل عنوان المتجر">
                                @error('address')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                                <div id="map"></div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="submit" value="اضافه المتجر" class="btn btn-info">
                                <input type="reset" value=" الغاء" class="btn btn-warning">
                            </div>
                        </div>





                    </div>
                </div>

            </form>

        </div>
    </div>

            </div></div></div>
@endsection


    <script>
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js? key=YOUR_API_KEY&libraries=places">

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {

                // lat: 26.559074, lng: 31.695669
                lat:26.234850,lng:31.999090
            },
            zoom: 13
        });
        var input = /** @type {!HTMLInputElement} */(
            document.getElementById('pac-input'));

        var types = document.getElementById('type-selector');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            marker.setIcon(/** @type {google.maps.Icon} */({
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(35, 35)
            }));
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
            var radioButton = document.getElementById(id);
            radioButton.addEventListener('click', function() {
                autocomplete.setTypes(types);
            });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCk3SO9T9lMcBe5G3t_BOjOnrW2yjgErCg&libraries=places&callback=initMap&language=AR&region=EG"
        async defer></script>




