
<title>@yield('title','اضافه لغه جديده')</title>

@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
    <div class="card-content collapse show container" >
        <div class="card-body">
            <form class="form" action="{{route('admin.languages.store')}}" method="post">
                @csrf
                <div class="form-body">
                    <h4 class="form-section"><i class="fa fa-home" ></i>بيانات اللغه</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>أسم اللغه</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="أدخل أسم اللغه">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>أسم الأختصار</label>
                                <input type="text" name="abbr" value="{{old('abbr')}}" class="form-control" placeholder="أدخل أسم اللغه">
                                @error('abbr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> أتجاه اللغه</label>
<select name="direction" class="form-control">
    <option value="rtl">من اليمين الي اليسار</option>
    <option value="ltr">من اليسار الي اليمين</option>
</select>

                                @error('direction')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label> حاله اللغه</label>
{{--                                <label for="switcherycolor4" class="card-title ml-1"> حاله اللغه</label> --}}
{{--                                <input type="checkbox" id="switcherycolor4" class=" form-control switchery" data-color="success" checked name="active">--}}
                                <select name="active" class="form-control">
                                    <option value="1">مفعله   </option>
                                    <option value="0">غير مفعله   </option>
                                </select>

                            </div>
                        </div>


<input type="submit" value="اضافه اللغه" class="btn btn-info">
<input type="reset" value=" الغاء" class="btn btn-warning">



                    </div>
                </div>

            </form>

        </div>
    </div>

            </div></div></div>
@endsection
