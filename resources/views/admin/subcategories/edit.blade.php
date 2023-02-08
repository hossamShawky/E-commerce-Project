
<title>@yield('title','تعديل بيانات القسم')</title>

@extends('layouts.admin')

@section('content')
<div class="app-content content col-md-12" >
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="card-content collapse show container " >
                <div class="card-body">
                    <hr/>
                    <img src="{{$mainCategory->photo}}" class="rounded-circle" alt="{{$mainCategory->name}}">
                    <hr/>

                    <form class="form" action="{{route('admin.maincategories.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$mainCategory->id}}" name="category_id">
                        <input type="hidden" value="{{$mainCategory->id}}" name="id">
                        <div class="form-body">
                            <h4 class="form-section"><i class="fa fa-home" ></i> تعديل بيانات  قسم {{$mainCategory->name}}  ب {{__('messages.'.getDefLang())}}</h4>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label> صورة القسم</label>
                                        {{--                                <label for="switcherycolor4" class="card-title ml-1"> حاله اللغه</label> --}}
                                        {{--                                <input type="checkbox" id="switcherycolor4" class=" form-control switchery" data-color="success" checked name="active">--}}
                                        <input type="file" class="form-control" name="photo">
                                        @error('photo')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>  اسم القسم</label>
                                        <input type="text" name="category[0][name]" value="{{$mainCategory->name}}" class="form-control"  >
                                        @error("category.0.name")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>



                                        <input type="hidden" name="category[0][translate_lang]" value="{{getDefLang()}}" class="form-control"  >






                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label> حاله القسم</label>

                                        <select name="category[0][active]" class="form-control">
                                            <option value="1" @if($mainCategory->active=='1') selected @endif>مفعله   </option>
                                            <option value="0" @if($mainCategory->active=='0') selected @endif>غير مفعله   </option>
                                        </select>

                                    </div>
                                </div>


                                <input type="submit" value="تحديث القسم" class="btn btn-info">
                                <a  href="{{route('admin.maincategories')}}"  class="btn btn-warning">الغاء   </a>



                            </div>
                        </div>

                    </form>

                    <hr>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                @isset($mainCategory->categories)
                                    @foreach($mainCategory->categories as $index=> $catLangs)
                     <li class="nav-item ">
                     <a  class="nav-link @if($index==0) active @endif" id="Tab{{$index}}" data-toggle="tab" aria-expanded="{{$index==0?'true':'false'}}"
                     aria-controls="Tab{{$index}}" href="#Tab{{$index}}" aria-selected="true" role="tab">
                         {{__('messages.'.$catLangs->translate_lang )}}
                     </a>
                     </li>

                                    @endforeach
                                @endisset
                    </ul>
                    <div class="tab-content px-1 pt-1" id="myTabContent">

                        @isset($mainCategory->categories)
                            @foreach($mainCategory->categories as $index=> $catLangs)
                        <div class="tab-pane container @if($index==0) active @endif " role="tabpanel" id="Tab{{$index}}"
                        aria-expanded="true"
                        aria-labelledby="Tab{{$index}}">
                            <form class="form" action="{{route('admin.maincategories.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$catLangs->id}}" name="category_id">
                                <input type="hidden" value="{{$catLangs->id}}" name="id">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="fa fa-home" ></i>
                                        تعديل بيانات  قسم {{$mainCategory->name}} ب{{__('messages.'.$catLangs->translate_lang)}}   </h4>
                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>  اسم القسم</label>
                                                <input type="text" name="category[0][name]" value="{{$catLangs->name}}" class="form-control"  >
                                                @error("category.0.name")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>



                                        <input type="text" name="category[0][translate_lang]"
                                               value="{{$catLangs->translate_of}}" class="form-control"  hidden>






                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label> حاله القسم</label>

                                                <select name="category[0][active]" class="form-control">
                                                    <option value="1" @if($catLangs->active=='1') selected @endif>مفعله   </option>
                                                    <option value="0" @if($catLangs->active=='0') selected @endif>غير مفعله   </option>
                                                </select>

                                            </div>
                                        </div>


                                        <input type="submit" value="تحديث القسم" class="btn btn-info">
                                        <a  href="{{route('admin.maincategories')}}"  class="btn btn-warning">الغاء   </a>



                                    </div>
                                </div>

                            </form>

                        </div>


                            @endforeach
                        @endisset
                    </div>

                    <hr/>


                </div>
            </div>

        </div></div></div>





@endsection