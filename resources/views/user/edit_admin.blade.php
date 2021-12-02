<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ARSEL - Editer un adlinistrateur</title>

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
                        <div class="row">
                            <!-- Column -->
                            <!-- Column -->
                            <div class=" col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        @if (session('error_update'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ session('user_error') }}
                                            </div>
                                        @endif
                                        @if (session('success_update'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('success_update') }}
                                            </div>
                                        @endif
                                        @if (session('empty_input'))
                                            <div class="alert alert-danger" role="alert">{{ session('empty_input') }}
                                            </div>
                                        @endif
                                        @foreach ($infos_admin as $info_admin)
                                            <form class="form-horizontal form-material"
                                                action="{{ route('update_admin', $info_admin->ID_USER) }}"
                                                method="POST" role="form" enctype="multipart/form-data">
                                                @csrf
                                                @if ($infos_admin->count() > 0)
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="mb-4 form-group">
                                                                <label class="p-0 col-md-12">Nom</label>
                                                                <div class="p-0 col-md-12 border-bottom">
                                                                    <input type="text"
                                                                        placeholder="Veillez entrer le nom"
                                                                        class="p-0 border-0 form-control"
                                                                        name="nom_admin"
                                                                        value="{{ $info_admin->NOM }}" required>
                                                                    @if (session('name_error'))
                                                                        <span class="text-danger">
                                                                            {{ session('name_error ') }}
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-4 form-group">
                                                                <label class="p-0 col-md-12">Prenom</label>
                                                                <div class="p-0 col-md-12 border-bottom">
                                                                    <input type="text"
                                                                        placeholder="Veillez entrer le prenom"
                                                                        class="p-0 border-0 form-control"
                                                                        name="prenom_admin"
                                                                        value="{{ $info_admin->PRENOM }}" required>
                                                                    @if (session('prenom_error'))
                                                                        <span class="text-danger">
                                                                            {{ session('prenom_error') }}
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-4 form-group">
                                                                <label class="p-0 col-md-12">Email</label>
                                                                <div class="p-0 col-md-12 border-bottom">
                                                                    <input type="email"
                                                                        placeholder="Veillez entrer une adresse Email"
                                                                        class="p-0 border-0 form-control"
                                                                        name="email_admin"
                                                                        value="{{ $info_admin->EMAIL }}" required>
                                                                    <input type="hidden" name="csrf-token" value="" />
                                                                    @if (session('email_error'))
                                                                        <span class="text-danger">
                                                                            {{ session('email_error') }}
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-4 form-group">
                                                                <label class="p-0 col-md-12">Departement</label>
                                                                <div class="p-0 col-md-12 border-bottom">
                                                                    <select
                                                                        class="p-0 border-0 shadow-none form-select form-control-line"
                                                                        name="dept_admin">
                                                                        <option value="{{ $info_admin->ID_DPT }}">
                                                                            {{ $info_admin->LIBELLE_DPT }}
                                                                        </option>
                                                                        @foreach ($departement as $dept)
                                                                            <option value="{{ $dept->ID_DPT }}">
                                                                                {{ $dept->LIBELLE_DPT }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @if ($roles)
                                                            <div class="col-md-4">
                                                                <div class="mb-4 form-group">
                                                                    <label class="p-0 col-md-12">Role</label>
                                                                    <div class="p-0 col-md-12 border-bottom">
                                                                        <select
                                                                            class="p-0 border-0 shadow-none form-select form-control-line"
                                                                            name="role_admin">
                                                                            <option
                                                                                value="{{ $info_admin->ID_ROLE }}">
                                                                                {{ $info_admin->LIBELLE_ROLE }}
                                                                            </option>
                                                                            @foreach ($roles as $role)
                                                                                <option value={{ $role->ID_ROLE }}>
                                                                                    {{ $role->LIBELLE_ROLE }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="mb-4 form-group">
                                                            <div class="col-sm-12">
                                                                <input type="submit" class="btn btn-primary" value="Modifier">
                                                            </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                            </form>
                                            <div class="mb-4 form-group">
                                                <a href="/delete_admin/{{ $info_admin->ID_USER }}"
                                                    class="___class_+?39___">
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-primary">Supprimer</button>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
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

                </div>
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
