@extends('admin.master')
@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">خانه</li>
        <li class="breadcrumb-item active">مدیریت محتوا</li>
        <li class="breadcrumb-item active">ثابت ها</li>
    </ol>

    <div class="container-fluid">

        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            ثابت ها
                        </div>
                        <div class="card-block">
                            <form id="form" action="{{route('admin.settings.update')}}" method="post" class="form-horizontal " enctype="multipart/form-data">
                                @csrf
                                @foreach($settings as $setting)

                                    <div class="form-group row m-t-3">

                                        <div class="col-sm-3">
                                            <input type="text" id="input-small" name="{{$setting->key}}"
                                                   value="{{$setting->key}}" class="form-control input-sm">
                                        </div>
                                        <div class="col-sm-1">
                                            :
                                        </div>
                                        <div class="col-sm-7">
                                            @if($setting->type=='text')

                                                <input type="text" id="input-small" name="{{$setting->key.'_value'}}"
                                                       class="form-control input-sm" value="{{$setting->value}}">

                                            @elseif($setting->type=='textarea')

                                                <textarea type="html" id="input-small" name="{{$setting->key.'_value'}}"
                                                          class="form-control input-sm">{!! $setting->value !!}</textarea>

                                            @elseif($setting->type=='file')

                                                <a target="_blank" href="{{$setting->value}}"
                                                   class="input-sm">{{ $setting->value }}</a>
                                                <input type="file" name="{{$setting->key.'_value'}}">

                                            @endif
                                        </div>
                                    </div>

                                @endforeach
                            </form>

                        </div>
                        <div class="card-footer">
                            <button type="submit" onclick="
                               let form=$('#form');
                               form.submit();
                           " class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                                ذخیره
                            </button>
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