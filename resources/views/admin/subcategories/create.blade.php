
<title>@yield('title','اضافه قسم جديده')</title>

@extends('layouts.admin')

@section('content')

    @if(Session::has('error'))
        <b class="alert alert-danger">{{Session('error')}}</b>
    @endif
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
    <div class="card-content collapse show container" >
        <div class="card-body">
            <form class="form" action="{{route('admin.maincategories.store')}}" method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-body">
                    <h4 class="form-section"><i class="fa fa-home" ></i>{{__('messages.بيانات القسم')}}</h4>
                    <div class="row">


                        <div class="col-md-12">
                            <div class="form-group ">
                                <label> {{__('messages.صورة القسم')}}</label>
                                {{--                                <label for="switcherycolor4" class="card-title ml-1"> حاله اللغه</label> --}}
                                {{--                                <input type="checkbox" id="switcherycolor4" class=" form-control switchery" data-color="success" checked name="active">--}}
                                <input type="file" class="form-control" name="photo">
                                @error('photo')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>
                        </div>
                        @if(!  is_null(getLanguages()))
                            @foreach(getLanguages() as $index=>$lang)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__('messages.أسم القسم')}}  {{ __('messages.'.$lang->abbr) }}</label>
                                <input type="text" name="category[{{$index}}][name]" value="{{old('name')}}" class="form-control"
                                      >
                                @error("category.$index.name")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 hidden">
                            <div class="form-group">
                                <label>أسم اختصار  {{ __('messages.'.$lang->abbr)}}</label>
                                <input type="text" name="category[{{$index}}][abbr]" value="{{$lang->abbr}}" class="form-control"
                                       >
                                @error("category.$index.abbr")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
{{--                                        <label>حاله  -{{$lang->getActive()}}</label>--}}

                                        <label>{{__('messages.الحاله')}}  {{ __('messages.'.$lang->abbr) }}  </label>

                                        {{--                                <label for="switcherycolor4" class="card-title ml-1"> حاله اللغه</label> --}}
                                        {{--                                <input type="checkbox" id="switcherycolor4" class=" form-control switchery" data-color="success" checked name="active">--}}
                                        <select name="category[{{$index}}][active]" class="form-control">
                                            <option value="1">{{__('messages.مفعله')}}   </option>
                                            <option value="0">  {{__('messages.غير مفعله')}}  </option>
                                        </select>

                                        @error('category.$index.active')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>




                            @endforeach
                        @endif

                        <div class="col-md-8">
                            <div class="form-group ">
<input type="submit" value="اضافه القسم" class="btn btn-info">
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
