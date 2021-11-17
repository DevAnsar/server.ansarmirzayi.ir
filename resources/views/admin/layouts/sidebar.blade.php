<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="icon-speedometer"></i> داشبرد
                    {{--<span class="tag tag-info">جدید</span>--}}
                </a>
            </li>


            <li class="nav-title">
                مدیریت نمونه کارها
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.resumes.index')}}"><i class="icon-user-follow"></i>نمونه کارها</a>
                <a class="nav-link" href="{{route('admin.resumes.create')}}"><i class="icon-people"></i>ثبت نمونه کار</a>
            </li>

            <li class="nav-title">
                مدیریت محتوا
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.settings.index')}}"><i class="icon-user-follow"></i>ثابت ها</a>

            </li>



        </ul>
    </nav>
</div>