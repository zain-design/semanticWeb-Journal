<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="<?php echo base_url("user") ?>/css/home.css" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="bg">
        <!-- <div class="container">
            <div class="row pt-1 pb-1">
                <div class="col-lg-12 text-center header">
                    <h3 class="text-center">Sistem Informasi Pelacakan Karya Ilmiah</h3>
                    <h5 class="text-center">Dosen Teknik Informatika Universitas Muria Kudus</h5>
                </div>
            </div>
        </div> -->


        <div class="header-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="search-card">
                            <h1 class="greeting">Sistem Informasi Pencarian Karya Ilmiah</h1>
                            <p>Cari karya ilmiah yang bisa membantu anda mengerjakan tugas dan menambah wawasan</p>
                            <form class="form-group" action="/search" method="get" id="search">
                                <input class="form-control" type="text" placeholder="Search..." name="query"><br />
                                <input type="hidden" name="Year" value="All" />
                                <input class="btn btn-primary form-control submit" type="submit" value="SEARCH">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>