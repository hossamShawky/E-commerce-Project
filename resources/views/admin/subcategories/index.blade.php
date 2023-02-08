

<title>@yield('title','أقسام الموقع')</title>

@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
    <div class="card-content">

      <div class="row text-center" >
          <div class="col-lg-12 col-md-12 col-sm-12">
              @if(Session::has('error'))
                  <b class="alert alert-danger">{{Session('error')}}</b>
              @endif
              @if(Session::has('message'))
                  <b class="alert alert-success col-md-12">{{Session('message')}}</b>
              @endif
          </div>
      </div>



        <ul class="menu-content">
            <li class="active"><a class="menu-item" href="{{route('admin.subcategories')}}"
                                  data-i18n="nav.dash.ecommerce">   الأقسام الفرعيه  </a>
            </li>
            <li><a class="menu-item" href="{{route('admin.subcategories.create')}}" data-i18n="nav.dash.crypto">أضافة
                    قسم    فرعي  جديد  </a>
            </li>
        </ul>


            <div class="table-responsive display  ">
{{--                scroll-horizontal--}}
            <table class="table table-de mb-0 nowrap  text-center table-striped table-bordered">
                <thead>
                <tr>
                    <th>اسم القسم</th>
                    <th> اللغه</th>
                    <th>الصورة</th>
                    <th>الحاله</th>
                    <th>الاجراءات</th>
                </tr>
                </thead>
                <tbody>
               @isset($subcategories)
@foreach($subcategories as $cat)
    <tr class="text-black-50">
        <td>{{$cat->name}}</td>
        <td>{{__('messages.'.getDefLang())}}</td>
        <td> <img src="{{  $cat->photo  }}" width="50" height="50"> </td>
       <td>{{$cat->getActive()}}</td>

        <td>
            <a href="{{route('admin.subcategories.edit',$cat->id)}}" class="btn-outline-accent-1 btn btn-primary">تعديل</a>
            <a href="{{route('admin.subcategories.delete',$cat->id)}}"class="btn-outline-accent-1 btn btn-danger">حذف</a>
            @if($cat->active==1)
                <a href="{{route('admin.subcategories.switchsubcategorystatus',$cat->id)}}" class="btn-outline-accent-1 btn btn-danger">الغاء تفعيل</a>
                @else
                <a href="{{route('admin.subcategories.switchsubcategorystatus',$cat->id)}}" class="btn-outline-accent-1 btn btn-danger">تفعيل</a>
                @endif

        </td>
    </tr>
@endforeach
    @endisset

{{--     <b> {{$maincats->links()}}</b>--}}
                </tbody>
            </table>


        </div>
    </div>
        </div></div>




@endsection
