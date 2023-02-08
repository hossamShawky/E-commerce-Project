
<title>@yield('title','تعديل  المتجر')</title>

@extends('layouts.admin')
@section('content')
    <div class="app-content content col-md-8">
        <div class="content-wrapper">
            <div class="content-header row">



                <div class="card-content collapse show container" >
                    <div class="card-body">
                        <center>
                            <img src= "{{"/".$vendor->logo}}" class="rounded-circle  " alt="{{$vendor->name}}"
                                 width="150" height="100"   >
                        </center>

                        <form class="form" action="{{route('admin.vendors.update')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
                            <input type="hidden" name="id" value="{{$vendor->id}}">
                            <div class="form-body">
                                <h4 class="form-section"><i class="fa fa-home" ></i>بيانات المتجر</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>أسم المتجر</label>
                                            <input type="text" name="name" value="{{$vendor->name}}" class="form-control" placeholder="أدخل أسم المتجر">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>رقم الهاتف</label>
                                            <input type="text" name="mobile" value="{{$vendor->mobile}}" class="form-control" placeholder="أدخل رقم الهاتف للمتجر">
                                            @error('mobile')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>الايميل </label>
                                            <input type="text" name="email" value="{{$vendor->email}}" class="form-control" placeholder="أدخل البريد الاكتروني للمتجر">
                                            @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>




                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> الرقم السري</label>
                                            <input type="password" name="password" value="{{$vendor->password}}" class="form-control" placeholder="أدخل رقم الهاتف للمتجر">
                                            @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>صوره اللجو</label>
                                            <input  type="file" name="logo"  value="{{$vendor->logo}}" class="form-control"  >
                                            @error('logo')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label> حاله المتجر</label>
                                            <select name="active" class="form-control">
                                                <option value="1" @if($vendor->active==1) selected @endif>مفعله   </option>
                                                <option value="0" @if($vendor->active==0) selected @endif>غير مفعله   </option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label>  القسم الرئيسي</label>
                                            <select name="category_id" class="form-control">

                                                @isset($categories)
                                                    @foreach($categories as $category)
                         <option value="{{$category->id}}" @if($vendor->category_id==$category->id) selected @endif>{{$category->name}}</option>
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
                                            <input id="pac-input" type="text" name="address" value="{{$vendor->address}}" class="form-control" placeholder="أدخل عنوان المتجر">
                                            @error('address')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div id="map"></div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="submit" value="تحديث المتجر" class="btn btn-info">
                                            <a href="{{route('admin.vendors')}}"  class="btn btn-warning">الغاء</a>
                                        </div>
                                    </div>





                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div></div></div>
@endsection