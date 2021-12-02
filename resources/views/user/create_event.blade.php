<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ARSEL - gérer un adlinistrateur</title>

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
                    <div class="container-fluid">
                        <div class="mb-4 shadow card">
                            <div class="py-3 card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Gerer les administrateur</h6>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="{{ URL::to('/store_admin') }}"
                                    method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @if (session('user_error'))
                                        <div class="alert alert-danger" role="alert">{{ session('user_error') }}
                                        </div>
                                    @endif
                                    @if (session('empty_input'))
                                        <div class="alert alert-danger" role="alert">{{ session('empty_input') }}
                                        </div>
                                    @endif
                                    @if (session('success_create'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success_create') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4 form-group">
                                                <label class="p-0 col-md-12">Titre de l'evenement</label>
                                                <div class="p-0 col-md-12 border-bottom">
                                                    <input type="texte" class="p-0 border-0 form-control"
                                                        name="title_event" value="{{ old('title_event') }}" required>
                                                    @if (session('title_event'))
                                                        <span class="text-danger">
                                                            {{ session('title_event ') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4 form-group">
                                                <label class="p-0 col-md-12">Daye du debut</label>
                                                <div class="p-0 col-md-12 border-bottom">
                                                    <input type="date" class="p-0 border-0 form-control"
                                                        name="start_event" value="{{ @old('start_event') }}"
                                                        required>
                                                    @if (session('start_event'))
                                                        <span class="text-danger">
                                                            {{ session('start_event') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4 form-group">
                                                <label class="p-0 col-md-12">Date de fin</label>
                                                <div class="p-0 col-md-12 border-bottom">
                                                    <input type="date" class="p-0 border-0 form-control"
                                                        name="end_event" value="{{ @old('end_event') }}" required>
                                                    <input type="hidden" name="csrf-token"
                                                        value="{{ csrf_token() }}" />
                                                    @if (session('end_event'))
                                                        <span class="text-danger">
                                                            {{ session('end_event') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-md-6">
                                                <div class="mb-4 form-group">
                                                    <div class="p-0 col-md-12 border-bottom">
                                                        <label for="exampleFormControlTextarea1">Description
                                                            de l'evenement</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                            rows="3" placeholder="Saisir une Description de l'evenement" id="desc_event"
                                                            name="desc_event" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="mb-2 form-group">
                                            <div class="col-sm-12">
                                                <input type="submit" class="btn btn-primary" value="Creer" style="margin-bottom: -10rem">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Titre</th>
                                                <th>Date debut</th>
                                                <th>Date fin</th>
                                                <th>Etat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Titre</th>
                                                <th>Date debut</th>
                                                <th>Date fin</th>
                                                <th>Etat</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                         <tbody>
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
