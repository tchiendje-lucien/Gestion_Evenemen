<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ARSEL - Lister les administrateur</title>

@include('include.header_admin')

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('include.menu_bar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('include.nav_bar')
                <!-- /.container-fluid -->

            </div>
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <!-- Row -->

                    <div class="container-fluid">
                        <div class="mb-4 shadow card">
                            <div class="py-3 card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Liste des administrateur</h6>
                            </div>
                            <div class="card-body">
                                @if (session('fail_GesAdmin'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('fail_GesAdmin') }}
                                    </div>
                                @endif
                                @if (session('success_GesAdmin'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success_GesAdmin') }}
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Prenom</th>
                                                <th>Email</th>
                                                <th>Departement</th>
                                                <th>Role</th>
                                                <th>Etat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Prenom</th>
                                                <th>Email</th>
                                                <th>Departement</th>
                                                <th>Role</th>
                                                <th>Etat</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @if ($users->count() > 0)
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->NOM }}</td>
                                                        <td>{{ $user->PRENOM }}</td>
                                                        <td>{{ $user->EMAIL }}</td>
                                                        <td>{{ $user->LIBELLE_DPT }}</td>
                                                        <td>{{ $user->LIBELLE_ROLE }}</td>
                                                        <td>
                                                            @if ($user->IS_ADMIN == 0)
                                                                Désactivé
                                                            @else
                                                                Activé
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($user->IS_ADMIN == 0)
                                                                <a href="/activate_admin/{{ $user->ID_USER }}">
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-target="#staticBackdrop">
                                                                        Activer
                                                                    </button>
                                                                @else
                                                                    <a href="/deactivate_admin/{{ $user->ID_USER }}">
                                                                        <button type="button" class="btn btn-primary"
                                                                            data-target="#staticBackdrop">
                                                                            Desactiver
                                                                        </button>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Row -->
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('include.footer_admin')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="rounded scroll-to-top" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

@include('include.javasript_admin_link')

</body>

</html>
