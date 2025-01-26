<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        
        <span class="brand-text font-weight-light">Web Apps</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
								with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                    <i class="fa-solid fa-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link">
                    <i class="fa-solid fa-user"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('mahasiswa.index')}}" class="nav-link">
                    <i class="fa-solid fa-user-tie"></i>
                        <p>Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dosen.index')}}" class="nav-link">
                    <i class="fa-solid fa-user-graduate"></i>
                        <p>Dosen</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('matakuliah.index')}}" class="nav-link">
                    <i class="fa-solid fa-book"></i>
                        <p>Matakuliah</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('programstudi.index')}}" class="nav-link">
                    <i class="fa-solid fa-book"></i>
                        <p>Program Studi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('semester.index')}}" class="nav-link">
                    <i class="fa-solid fa-book"></i>
                        <p>Semester</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('ruangkelas.index')}}" class="nav-link">
                    <i class="fa-solid fa-building"></i>
                        <p>Ruang Kelas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tingkat.index')}}" class="nav-link">
                    <i class="fa-solid fa-building"></i>
                        <p>Tingkat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tahunakademik.index')}}" class="nav-link">
                    <i class="fa-solid fa-building"></i>
                        <p>Tahun Akademik</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('statusmahasiswa.index')}}" class="nav-link">
                    <i class="fa-solid fa-building"></i>
                        <p>Status Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('statusmahasiswa.index')}}" class="nav-link">
                    <i class="fa-solid fa-briefcase"></i>
                        <p>Magang</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>