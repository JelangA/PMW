<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img class="d-inline-block" width="32px" height="30.61px" src="{{ asset('logo/pmwpolban-2.png') }}" alt="">
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="{{ asset('logo/pmwpolban-2.png') }}" alt="">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('Master') }}</li>
            <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i> <span>{{ __('Dashboard') }}</span></a></li>

            @hasrole('Administrator')
                <li class="menu-header">{{ __('Management Data') }}</li>
                <li class="{{ Request::routeIs('carousel.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('carousel.index') }}"><i class="fas fa-image"></i> <span>{{ __('Mading') }}</span></a></li>
                <li class="{{ Request::routeIs('workshop.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('workshop.index') }}"><i class="fas fa-briefcase"></i> <span>{{ __('Pelatihan') }}</span></a></li>
                <li class="{{ Request::routeIs('poster.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('poster.index') }}"><i class="fas fa-image"></i> <span>{{ __('Poster') }}</span></a></li>
                <li class="{{ Request::routeIs('download.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('download.index') }}"><i class="fas fa-download"></i> <span>{{ __('Unduhan') }}</span></a></li>
                <li class="{{ Request::routeIs('timeline.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('timeline.index') }}"><i class="fas fa-calendar"></i> <span>{{ __('Jadwal Kegiatan') }}</span></a></li>
                <li class="{{ Request::routeIs('video.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('video.index') }}"><i class="fas fa-video"></i> <span>{{ __('Video') }}</span></a></li>
                <li class="dropdown ">
                    <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>{{ __('Pengguna') }}</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::routeIs('user.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('user.index') }}">{{ __('Operator') }}</a></li>
                        <li class="{{ Request::routeIs('lecturer.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('lecturer.index') }}">{{ __('Dosen') }}</a></li>
                        <li class="{{ Request::routeIs('student.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('student.index') }}">{{ __('Mahasiswa') }}</a></li>
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>{{ __('Usulan Peserta') }}</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::routeIs('proposal.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('proposal.index') }}">{{ __('Diusulkan') }}</a></li>
                        <li class="{{ Request::routeIs('verif.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('verif.index') }}">{{ __('Diverifikasi') }}</a></li>
                        <li class=""><a class="nav-link" href="">{{ __('Didanai') }}</a></li>
                    </ul>
                </li>
            @endhasrole

            @hasrole('Operator')
                <li class="menu-header">{{ __('Management Data') }}</li>
                <li class="{{ Request::routeIs('workshop.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('workshop.index') }}"><i class="fas fa-briefcase"></i> <span>{{ __('Pelatihan') }}</span></a></li>
                <li class="dropdown ">
                    <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>{{ __('Usulan Peserta') }}</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::routeIs('proposal.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('proposal.index') }}">{{ __('Diusulkan') }}</a></li>
                        <li class="{{ Request::routeIs('verif.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('verif.index') }}">{{ __('Diverifikasi') }}</a></li>
                        <li class=""><a class="nav-link" href="">{{ __('Didanai') }}</a></li>
                    </ul>
                </li>
            @endhasrole

            @hasrole('Student')
                <li class="menu-header">{{ __('Management Data') }}</li>
                <li class="{{ Request::routeIs('complete-proposal.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('complete-proposal.index') }}"><i class="fas fa-image"></i> <span>{{ __('Usulan') }}</span></a></li>
            @endhasrole
        </ul>
    </aside>
</div>
