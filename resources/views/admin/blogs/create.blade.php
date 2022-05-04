@extends('admin.master')
@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">خانه</li>
        <li class="breadcrumb-item active"><a href="{{route('admin.blogs.index')}}">وبلاگ</a></li>
        <li class="breadcrumb-item active">افزودن پست جدید</li>
    </ol>

    <div class="container-fluid">

        <div class="animated fadeIn">
            <div class="row">
               <div class="col-12">
                   <div class="card">
                       <div class="card-header">
                           نوشتن پست جدید
                       </div>
                       <div class="card-block">
                           <form id="createNewResume" action="{{route('admin.blogs.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal ">

                               @csrf
                               <div class="form-group row">
                                   <label class="col-md-3 form-control-label" for="text-input">عنوان</label>
                                   <div class="col-md-9">
                                       <input type="text" value="{{old('title')}}" id="text-input" name="title" class="form-control" placeholder="">
                                   </div>
                               </div>

                               <div class="form-group row">
                                   <label class="col-md-3 form-control-label" for="textarea-input">توضیحات کوتاه</label>
                                   <div class="col-md-9">
                                       <textarea id="textarea-input" name="description" rows="5" class="form-control" placeholder="">{{old('description')}}</textarea>
                                   </div>
                               </div>

                               <div class="form-group row">
                                   <label class="col-md-3 form-control-label" for="textarea-input">محتوای پست</label>
                                   <div class="col-md-9">
                                       <textarea id="textarea-input" name="body" rows="5" class="form-control" placeholder="">{{old('body')}}</textarea>
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-md-3 form-control-label" for="file-input">تصویر اصلی</label>
                                   <div class="col-md-9">
                                       <input type="file" id="file-input" name="image">
                                   </div>
                               </div>

                               <div class="form-group row">
                                   <label class="col-md-3 form-control-label" for="file-input">حالت پست</label>
                                   <div class="col-md-9">
                                       <select class="custom-select select">
                                           <option>پیشنویس</option>
                                           <option>انتشار</option>
                                       </select>
                                   </div>
                               </div>

                               <div class="form-group row">
                                   <label class="col-md-3 form-control-label" for="email-input">شماره ردیف</label>
                                   <div class="col-md-9">
                                       <input value="{{old('queue')}}" type="number" id="queue" name="queue" class="form-control" placeholder="">
                                   </div>
                               </div>

                           </form>
                       </div>
                       <div class="card-footer">
                           <button type="submit" onclick="
                               let form=$('#createNewResume');
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
