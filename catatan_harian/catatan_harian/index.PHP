<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Admin - Dashboard HTML Template</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index.html">
                    <h1 class="tm-site-title mb-0">Product Admin</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>


            </div>

        </nav>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">

                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Catatan Harian</h2>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Create Data</button>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Catatan</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody id="table_catatan">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2018</b> All rights reserved.

                    Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template
                        Mo</a>
                </p>
            </div>
        </footer>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="createJudul">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Catatan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="createCatatan" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary createSimpan">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenterEdt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Title</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="updateJudul">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Catatan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="updateCatatan" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary updateSimpan" data-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>
    <script>
        $(document).ready(function() {
            loadData()

            $('#table_catatan').on('click', '.hapus', function() {
                var id = $(this).attr('key');
                var kondisi = confirm(`apa anda yakin ingin menghapus data ${id}`);
                if (kondisi == false) {
                    return;
                } else {
                    $.ajax({
                        type: "DELETE",
                        url: "http://localhost/rest-server/api/CatatanHarian",
                        data: {
                            id: id
                        },
                        dataType: "JSON",
                        success: function(response) {
                            loadData();
                        }
                    });
                }

            });

            $('#table_catatan').on('click', '.edit', function() {
                var id = $(this).attr('key');
                $.ajax({
                    type: "GET",
                    url: `http://localhost/rest-server/api/CatatanHarian?id=${id}`,
                    dataType: "JSON",
                    success: function(response) {
                        response.data.forEach(element => {
                            $('[name="id"]').val(element.id);
                            $('[name="updateJudul"]').val(element.judul);
                            $('[name="updateCatatan"]').val(element.catatan);
                        });
                    }
                });
            });

            $('.updateSimpan').on('click', function() {
                var id = $('[name="id"]').val();
                var judul = $('[name="updateJudul"]').val();
                var catatan = $('[name="updateCatatan"]').val();
                $.ajax({
                    type: "PUT",
                    url: "http://localhost/rest-server/api/CatatanHarian",
                    data: {
                        id: id,
                        judul: judul,
                        catatan: catatan
                    },
                    dataType: "JSON",
                    success: function(response) {
                        loadData();
                        $('[name="id"]').val("");
                        $('[name="updateJudul"]').val("");
                        $('[name="updateCatatan"]').val("");
                    }
                });
            });

            $('.createSimpan').on('click', function() {
                var judul = $('[name="createJudul"]').val();
                var catatan = $('[name="createCatatan"]').val();
                $.ajax({
                    type: "POST",
                    url: "http://localhost/rest-server/api/CatatanHarian",
                    data: {
                        judul: judul,
                        catatan: catatan
                    },
                    dataType: "JSON",
                    success: function(response) {
                        loadData();
                        $('[name="createJudul"]').val("");
                        $('[name="createCatatan"]').val("");
                    }
                });
            });



            function loadData() {
                $.ajax({
                    type: "GET",
                    url: "http://localhost/rest-server/api/CatatanHarian",
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response);
                        var html = "";
                        var i = 1;
                        response.data.forEach(element => {
                            html += `
                                <tr>
                                    <th>${i}</th>
                                    <td>${element.judul}</td>
                                    <td>${element.catatan}</td>
                                    <td>
                                        <button key="${element.id}" class="btn btn-success edit" data-toggle="modal" data-target="#exampleModalCenterEdt">Edit</button>
                                        <button key="${element.id}" class="btn btn-danger hapus">Hapus</button>
                                    </td>
                                </tr>
                            `;
                            i++;
                        });
                        $('#table_catatan').html(html);
                    }
                });
            }
        });
    </script>
</body>

</html>