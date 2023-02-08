

<title>@yield('title',' المتاجر')</title>

@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
    <div class="card-content">

     <div class="row text-center">
         <div class="col-lg-12 col-md-12 col-sm-12">
             @if(Session::has('error'))
                 <b class="alert alert-danger">{{Session('error')}}</b>
             @endif
             @if(Session::has('message'))
                 <b class="alert alert-success">{{Session('message')}}</b>
             @endif
         </div>
     </div>



        <ul class="menu-content">
            <li class="active"><a class="menu-item" href="{{route('admin.vendors')}}"
                                  data-i18n="nav.dash.ecommerce">  الرئيسيه  </a>
            </li>
            <li><a class="menu-item" href="{{route('admin.vendors.create')}}" data-i18n="nav.dash.crypto">أضافة
                    متجر جديد  </a>
            </li>
        </ul>


        <div class="table-responsive">
            <table class="table table-de mb-0">
                <thead>
                <tr>
                    <th>اسم المتجر</th>
                    <th>الهاتف</th>
                    <th>القسم الرئيسي</th>
                    <th>اللوجو</th>
{{--                    <th>العنوان</th>--}}
                    <th>الحاله</th>
                    <th>الاجراءات</th>
                </tr>
                </thead>
                <tbody>
               @isset($vendors)
@foreach($vendors as $vendor)
    <tr class="text-black-50">
        <td>{{$vendor->name}}</td>
        <td>{{$vendor->mobile}}</td>
        <td>{{__('messages.'.$vendor->mainCategory->name)}}</td>
        <td><img src="{{$vendor->logo}}" width="50" height="50" alt="img_"> </td>
{{--        <td>{{$vendor->address}}</td>--}}
        <td>{{$vendor->getActive()}}</td>
{{--        <td>{{$vendor->active}}</td>--}}
        <td>
            <a href="{{route('admin.vendors.edit',$vendor->id)}}" class="btn-outline-accent-1 btn btn-primary">تعديل</a>
            <a href="{{route('admin.vendors.delete',$vendor->id)}}" class="btn-outline-accent-1 btn btn-danger">حذف</a>
            @if($vendor->active=='0')
                <a href="" class="btn-outline-accent-1 btn btn-danger"> تفعيل</a>
            @else
                <a href="" class="btn-outline-accent-1 btn btn-danger"> الغاء تفعيل</a>
            @endif

        </td>
    </tr>
@endforeach
    @endisset

               <b> {{$vendors->links()}}</b>
                </tbody>
            </table>
        </div>
    </div>
        </div></div>

@endsection
