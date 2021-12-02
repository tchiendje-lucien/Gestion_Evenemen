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
                                <h6 class="m-0 font-weight-bold text-primary">Liste de mes evenements</h6>
                            </div>
                            <div class="card-body" style="margin-bottom: 20rem">
                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="form-horizontal form-material" action="{{ URL::to('/store_event') }}"
                                    method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4 form-group">
                                                <label class="p-0 col-md-12">Titre de l'evenement</label>
                                                <div class="p-0 col-md-12 border-bottom">
                                                    <input type="texte" class="p-0 border-0 form-control"
                                                        name="title_event" value="{{ @old('title_event') }}" required>
                                                    @error('title_event')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4 form-group">
                                                <label class="p-0 col-md-12">Date du debut</label>
                                                <div class="p-0 col-md-12 border-bottom">
                                                    <input type="date" class="p-0 border-0 form-control"
                                                        name="date_start" id="date_start"
                                                        value="{{ @old('date_start') }}" required>
                                                    @error('date_start')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-4 form-group">
                                                <label class="p-0 col-md-12">Date de fin</label>
                                                <div class="p-0 col-md-12 border-bottom">
                                                    <input type="date" class="p-0 border-0 form-control" name="date_end"
                                                        id="date_end" value="{{ @old('date_end') }}" required>
                                                    <input type="hidden" name="csrf-token"
                                                        value="{{ csrf_token() }}" />
                                                    @error('date_end')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4 form-group">
                                                <div class="p-0 col-md-12 border-bottom">
                                                    <label for="exampleFormControlTextarea1">Description
                                                        de l'evenement</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                                        rows="3" placeholder="Saisir une Description de l'evenement"
                                                        id="desc_event" name="desc_event"
                                                        value="{{ @old('desc_event') }}" required></textarea>
                                                    @error('desc_event')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2 form-group">
                                            <div class="col-sm-12">
                                                <input type="submit" class="btn btn-primary" value="Creer"
                                                    style="margin-bottom: -10rem">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Titre</th>
                                                <th>Description</th>
                                                <th>Date debut</th>
                                                <th>Date fin</th>
                                                <th>Etat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Titre</th>
                                                <th>Description</th>
                                                <th>Date debut</th>
                                                <th>Date fin</th>
                                                <th>Etat</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @if ($select_events->count() > 0)
                                                @foreach ($select_events as $select_events)
                                                    <tr>
                                                        <td>{{ $select_events->TITRE_EVENT }}</td>
                                                        <td><?php echo substr($select_events->DESC_EVENT, 0, 50); ?> ....</td>
                                                        <td>{{ $select_events->START_EVENT }}</td>
                                                        <td>{{ $select_events->END_EVENT }}</td>
                                                        <td>
                                                            @if ($select_events->ETAT_EVENT == 0)
                                                                Passé
                                                            @else
                                                                Activé
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($select_events->ETAT_EVENT == 0)
                                                                <ul class="m-0 list-inline">
                                                                    <li class="list-inline-item">
                                                                        <a
                                                                            href="/edit_event/{{ $select_events->ID_EVENT }}">
                                                                            <button
                                                                                class="btn btn-success btn-sm rounded-0"
                                                                                type="button" data-toggle="tooltip"
                                                                                data-placement="top" title="Edit"><i
                                                                                    class="fa fa-edit"></i></button>
                                                                        </a>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <a
                                                                            href="/activate_admin/{{ $select_events->ID_EVENT }}">
                                                                            <button
                                                                                class="btn btn-danger btn-sm rounded-0"
                                                                                type="button"
                                                                                data-toggle="tooltip modal"
                                                                                data-target="#staticBackdrop"
                                                                                data-placement="top" title="Delete"><i
                                                                                    class="fa fa-trash"></i></button>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            @else
                                                                <ul class="m-0 list-inline">
                                                                    <li class="list-inline-item">
                                                                        <a
                                                                            href="evenement/{{ $select_events->ID_EVENT }}">
                                                                            <button
                                                                                class="btn btn-success btn-sm rounded-0"
                                                                                type="button" data-toggle="tooltip"
                                                                                data-placement="top" title="Edit"><i
                                                                                    class="fa fa-edit"></i></button>
                                                                        </a>
                                                                    </li>
                                                                    <li class="list-inline-item"><a
                                                                            href="delete_event/{{ $select_events->ID_EVENT }}">
                                                                            <button
                                                                                class="btn btn-danger btn-sm rounded-0"
                                                                                type="button" data-toggle="tooltip"
                                                                                data-placement="top" title="Delete"><i
                                                                                    class="fa fa-trash"></i></button></a>
                                                                    </li>
                                                                </ul>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <h3>Aucun evenement</h3>
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
    <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("date_start")[0].setAttribute('min', today);
        document.getElementsByName("date_end")[0].setAttribute('min', today);

        $(document).on('click', '.deleteUser', function() {
            alert("bonjour")
            var id_event = $(this).attr('data-id');
            $('#app_id').val(id_event);
            $('#staticBackdrop').modal('show');
        });
    </script>

    @include('include.javasript_admin_link')
</body>

</html>
