
<title>@yield('title','تعديل  اللغه')</title>
 
@extends('layouts.admin')

@section('content')
    <div class="app-content content col-md-8">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="card-content collapse show container" >
                    <div class="card-body">
                        <form class="form" action="{{route('admin.languages.update')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$lang->id}}" name="lang_id">
                            <div class="form-body">
                                <h4 class="form-section"><i class="fa fa-home" ></i>بيانات اللغه</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>أسم اللغه</label>
                                            <input type="text" name="name" value="{{$lang->name}}" class="form-control" placeholder="أدخل أسم اللغه">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>أسم الأختصار</label>
                                            <input type="text" name="abbr" value="{{$lang->abbr}}" class="form-control" placeholder="أدخل أسم اللغه">
                                            @error('abbr')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> أتجاه اللغه</label>
                                            <select name="direction" class="form-control">
                                                <option value="rtl" @if($lang->direction=='rtl') selected @endif>من اليمين الي اليسار</option>
                                                <option value="ltr" @if($lang->direction=='ltr') selected @endif>من اليسار الي اليمين</option>
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
                                                <option value="1" @if($lang->active=='1') selected @endif>مفعله   </option>
                                                <option value="0" @if($lang->active=='0') selected @endif>غير مفعله   </option>
                                            </select>

                                        </div>
                                    </div>


                                    <input type="submit" value="تحديث اللغه" class="btn btn-info">
                                    <a  href="{{route('admin.languages')}}"  class="btn btn-warning">الغاء   </a>



                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div></div></div>
@endsection
