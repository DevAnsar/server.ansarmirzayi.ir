@extends('admin.master')
@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">خانه</li>
        <li class="breadcrumb-item active"><a href="{{route('admin.resumes.index')}}">نمونه کارها</a></li>
        <li class="breadcrumb-item active">ویرایش نمونه کار</li>

        <!-- Breadcrumb Menu-->
        {{--<li class="breadcrumb-menu">--}}
            {{--<div class="btn-group" role="group" aria-label="Button group with nested dropdown">--}}
                {{--<a class="btn btn-secondary" href="{{route('admin.resumes.create')}}"><i class="icon-settings"></i>--}}
                    {{--&nbsp;افزودن نمونه کار جدید</a>--}}
            {{--</div>--}}
        {{--</li>--}}
    </ol>

    <div class="container-fluid">

        <div class="animated fadeIn">
            <div class="row">
               <div class="col-12">
                   <div class="card">
                       <div class="card-header">
                           ویرایش رزومه
                       </div>
                       <div class="card-block">
                           <form id="editResume" action="{{route('admin.resumes.update',['resume'=>$resume])}}" method="post" enctype="multipart/form-data" class="form-horizontal ">

                               @csrf
                               @method('patch')
                               <div class="form-group row">
                                   <label class="col-md-3 form-control-label" for="text-input">عنوان</label>
                                   <div class="col-md-9">
                                       <input type="text" value="{{old('title')?old('title'):$resume->title}}" id="text-input" name="title" class="form-control" placeholder="">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-md-3 form-control-label" for="email-input">لینک</label>
                                   <div class="col-md-9">
                                       <input type="text" value="{{old('url')?old('url'):$resume->url}}"  id="url" name="url" class="form-control" placeholder="">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-md-3 form-control-label" for="email-input">نام دامنه</label>
                                   <div class="col-md-9">
                                       <input type="text" value="{{old('domain')?old('domain'):$resume->domain}}" id="domain" name="domain" class="form-control" placeholder="">
                                   </div>
                               </div>

                               <div class="form-group row">
                                   <label class="col-md-3 form-control-label" for="textarea-input">توضیحات</label>
                                   <div class="col-md-9">
                                       <textarea id="textarea-input" name="description" rows="5" class="form-control" placeholder="">{!!old('description')?old('description'):$resume->description!!}</textarea>
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-md-3 form-control-label" for="file-input">تصویر</label>
                                   <div class="col-md-9">
                                       <input type="file" id="file-input" name="image">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-md-3 form-control-label" for="email-input">شماره ردیف</label>
                                   <div class="col-md-9">
                                       <input value="{{old('queue')?old('queue'):$resume->queue}}" type="number" id="queue" name="queue" class="form-control" placeholder="">
                                   </div>
                               </div>

                           </form>
                       </div>
                       <div class="card-footer">
                           <button type="submit" onclick="
                               let form=$('#editResume');
                               form.submit();
                           " class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> ذخیره</button>
                           {{--<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> کنسل</button>--}}
                       </div>
                   </div>
               </div>

            </div>
            <!--/row-->
        </div>

    </div>
    <!--/.container-fluid-->
@endsection