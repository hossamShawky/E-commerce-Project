

<title>@yield('title','لغات الموقع')</title>

@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
    <div class="card-content">

        @if(Session::has('error'))
            <b class="alert alert-danger">{{Session('error')}}</b>
        @endif
        @if(Session::has('message'))
            <b class="alert alert-success">{{Session('message')}}</b>
        @endif



        <ul class="menu-content">
            <li class="active"><a class="menu-item" href="{{route('admin.languages')}}"
                                  data-i18n="nav.dash.ecommerce">  الرئيسيه  </a>
            </li>
            <li><a class="menu-item" href="{{route('admin.languages.create')}}" data-i18n="nav.dash.crypto">أضافة
                    لغه جديده </a>
            </li>
        </ul>


        <div class="table-responsive">
            <table class="table table-de mb-0">
                <thead>
                <tr>
                    <th>اسم اللغه</th>
                    <th>الاختصار</th>
                    <th>الاتجاه</th>
                    <th>الحاله</th>
                    <th>الاجراءات</th>
                </tr>
                </thead>
                <tbody>
               @isset($languages)
@foreach($languages as $lang)
    <tr class="text-black-50">
        <td>{{$lang->name}}</td>
        <td>{{$lang->abbr}}</td>
        <td>{{$lang->getDirection()}}</td>
        <td>{{$lang->getActive()}}</td>
        <td>
            <a href="{{route('admin.languages.edit',$lang->id)}}" class="btn-outline-accent-1 btn btn-primary">تعديل</a>
            <a href="{{route('admin.languages.delete',$lang->id)}}" class="btn-outline-accent-1 btn btn-danger">حذف</a>

        </td>
    </tr>
@endforeach
    @endisset

               <b> {{$languages->links()}}</b>
                </tbody>
            </table>
        </div>
    </div>
        </div></div>

@endsection
