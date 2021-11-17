@extends('admin.master')
@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">خانه</li>
        <li class="breadcrumb-item active">نمونه کارها</li>

        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <a class="btn btn-secondary" href="{{route('admin.resumes.create')}}"><i class="icon-settings"></i>
                    &nbsp;افزودن نمونه کار جدید</a>
            </div>
        </li>
    </ol>

    <div class="container-fluid">

        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            لیست نمونه کارها
                        </div>
                        <div class="card-block">
                            <table class="table table-bordered table-striped table-condensed">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>توضیحات</th>
                                    <th>لینک</th>
                                    <th>دامنه</th>
                                    <th>تصویر</th>
                                    <th>تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($resumes as $resume)
                                    <tr>
                                        <td>{{$resume->queue}}</td>
                                        <td>
                                            {{$resume->title}}
                                        </td>
                                        <td>
                                            {!! $resume->description !!}
                                        </td>
                                        <td>
                                            <a href="{{$resume->url}}">
                                                <span class="tag tag-success">
                                                    {{$resume->url}}
                                                </span>
                                            </a>
                                        </td>

                                        <td>
                                            {{$resume->domain}}
                                        </td>
                                        <td>
                                            <img style="min-width: 100px;max-width: 150px"
                                                 src="{{asset($resume->image)}}">
                                        </td>
                                        <td>

                                            <a href="{{route('admin.resumes.edit',['resume'=>$resume])}}">
                                                <span class="tag tag-info">
                                                       ویرایش
                                                </span>
                                            </a>

                                            <form method="post" action="{{route('admin.resumes.destroy',['resume'=>$resume])}}">
                                                @method('delete')
                                                @csrf

                                                <button class="tag tag-danger" type="submit" onclick="return confirm('آیا مطمعن هستید')">
                                                   حذف
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {{--<nav>--}}
                            {{--<ul class="pagination">--}}
                            {{--<li class="page-item"><a class="page-link" href="#">Prev</a>--}}
                            {{--</li>--}}
                            {{--<li class="page-item active">--}}
                            {{--<a class="page-link" href="#">1</a>--}}
                            {{--</li>--}}
                            {{--<li class="page-item"><a class="page-link" href="#">2</a>--}}
                            {{--</li>--}}
                            {{--<li class="page-item"><a class="page-link" href="#">3</a>--}}
                            {{--</li>--}}
                            {{--<li class="page-item"><a class="page-link" href="#">4</a>--}}
                            {{--</li>--}}
                            {{--<li class="page-item"><a class="page-link" href="#">Next</a>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                            {{--</nav>--}}
                        </div>
                    </div>
                </div>
                <!--/col-->

            </div>
            <!--/row-->
        </div>

    </div>
    <!--/.container-fluid-->
@endsection