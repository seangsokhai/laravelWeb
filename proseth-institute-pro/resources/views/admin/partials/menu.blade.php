<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt"></i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon"></i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link pl-5 {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link pl-5 {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">

                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link pl-5 {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">

                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}?role=3" class="nav-link pl-5 {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">

                                    Teachers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}?role=4" class="nav-link pl-5 {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    Students
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('course_class_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="fas fa-graduation-cap nav-icon"></i>
                    Manage Courses 
                </a>
                <ul class="nav-dropdown-items">
                    @can('mainCategory_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.main-category.index') }}" class="nav-link pl-5 {{ request()->is('admin/mainCategory_access') || request()->is('admin/mainCategory_access/*') ? 'active' : '' }}">
                                Main Category
                            </a>
                        </li>
                    @endcan

                    @can('subCategory_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.sub-category.index') }}" class="nav-link pl-5 {{ request()->is('admin/subCategory_access') || request()->is('admin/subCategory_access/*') ? 'active' : '' }}">
                                sub Category
                            </a>
                        </li>
                    @endcan

                    @can('course_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.course.index') }}" class="nav-link pl-5 {{ request()->is('admin/cousre_access') || request()->is('admin/cousre_access/*') ? 'active' : '' }}">
                                Cousre
                            </a>
                        </li>
                    @endcan

                    @can('instructor_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.instructor.index') }}" class="nav-link pl-5 {{ request()->is('admin/instructor_access') || request()->is('admin/instructor_access/*') ? 'active' : '' }}">
                                Instructor
                            </a>
                        </li>
                    @endcan

                    @can('schedule_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.schedule.index') }}" class="nav-link pl-5 {{ request()->is('admin/schedule_access') || request()->is('admin/schedule_access/*') ? 'active' : '' }}">
                                Schedule
                            </a>
                        </li>
                    @endcan

                    @can('student_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.student.index') }}" class="nav-link pl-5 {{ request()->is('admin/student_access') || request()->is('admin/student_access/*') ? 'active' : '' }}">
                                Student
                            </a>
                        </li>
                    @endcan

                    @can('subscrib_query_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.subscrib-query.index') }}" class="nav-link pl-5 {{ request()->is('admin/subscrib_query_access') || request()->is('admin/subscrib_query_access/*') ? 'active' : '' }}">
                                Subscrib Query
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>      
            @endcan

            @can('blog_class_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fas fa-newspaper nav-icon"></i>
                    Manage Blog 
                </a>
                <ul class="nav-dropdown-items">
                    @can('blogCategory_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.blog_category.index') }}" class="nav-link pl-5 {{ request()->is('admin/blogCategory_access') || request()->is('admin/blogCategory_access/*') ? 'active' : '' }}">
                                Blog Category
                            </a>
                        </li>
                    @endcan

                    @can('blog_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.blog.index') }}" class="nav-link pl-5 {{ request()->is('admin/blog_access') || request()->is('admin/blog_access/*') ? 'active' : '' }}">
                                Blog
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>      
            @endcan

            @can('website_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fas fa-globe-asia nav-icon"></i>
                    Manage Website
                </a>
                <ul class="nav-dropdown-items">
                    @can('slide_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.slide.index') }}" class="nav-link pl-5 {{ request()->is('admin/slide_access') || request()->is('admin/slide_access/*') ? 'active' : '' }}">
                                Slide Show
                            </a>
                        </li>
                    @endcan
                    @can('about_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.about') }}" class="nav-link pl-5 {{ request()->is('admin/about_access') || request()->is('admin/about_access/*') ? 'active' : '' }}">
                                About Page
                            </a>
                        </li>
                    @endcan
                    @can('team_access')
                        <li class="nav-item">
                            <a href="{{ route('admin.team.index') }}" class="nav-link pl-5 {{ request()->is('admin/team_access') || request()->is('admin/team_access/*') ? 'active' : '' }}">
                                Team
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>      
            @endcan

            @can('school_class_access')
                <li class="nav-item">
                    <a href="{{ route("admin.school-classes.index") }}" class="nav-link {{ request()->is('admin/school-classes') || request()->is('admin/school-classes/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-school nav-icon">

                        </i>
                        {{ trans('cruds.schoolClass.title') }}
                    </a>
                </li>
            @endcan
            @can('lesson_access')
                <li class="nav-item">
                    <a href="{{ route("admin.lessons.index") }}" class="nav-link {{ request()->is('admin/lessons') || request()->is('admin/lessons/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-clock nav-icon">

                        </i>
                        {{ trans('cruds.lesson.title') }}
                    </a>
                </li>
            @endcan

            @can('calendar')
            <li class="nav-item">
                <a href="{{ route("admin.calendar.index") }}" class="nav-link {{ request()->is('admin/calendar') || request()->is('admin/calendar/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-calendar nav-icon">

                    </i>
                    Calendar
                </a>
            </li>
            @endcan

            @can('email_access')
            <li class="nav-item">
                <a href="{{ route("admin.email.index") }}" class="nav-link {{ request()->is('admin/email') || request()->is('admin/email/*') ? 'active' : '' }}">
                    <i class="fa-fw fa fa-envelope nav-icon"></i>
                    Email
                </a>
            </li>
            @endcan

            @can('setting_access')
                <li class="nav-item">
                    <a href="{{ route("admin.setting") }}" class="nav-link {{ request()->is('admin/setting') || request()->is('admin/setting/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-school nav-icon">

                        </i>
                        Setting
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
