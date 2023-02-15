<!doctype html>
<html>

<head>
    <base href="{{ asset('') }}" />
    <title>Reset-Password</title>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="robots" content="index, follow">
    <link rel="shortcut icon" type="image/png" href="html/favicon.png">

    <link rel="stylesheet" type="text/css" href="html/css/bootstrap.min.css?6664">
    <link rel="stylesheet" type="text/css" href="html/style.css?9085">
    <link rel="stylesheet" type="text/css" href="html/css/animate.min.css?2320">
    <link rel="stylesheet" type="text/css" href="html/css/cd-swiper.css?7770">

    <link rel="stylesheet" type="text/css" href="html/css/feather.min.css">
    <link rel="stylesheet" type="text/css" href="html/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="html/css/ionicons.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,40&display=swap&subset=latin,latin-ext'
        rel='stylesheet' type='text/css'>

    @livewireStyles

    <!-- Analytics -->

    <!-- Analytics END -->

</head>

<body>
    <!-- Main container -->
    <div class="page-container">

        <!-- bloc-29 -->
        <div class="bloc tc-7996 bloc-fill-screen bgc-5783 l-bloc" id="bloc-29">
            <div class="container">
                <div class="row row-32-style align-items-center">
                    <div
                        class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-12 offset-0 cardadmin2">
                        <h1
                            class="text-lg-center text-md-center h1-เข้าสู่ระบบ-style text-sm-center text-center mg-sm mg-md-sm">
                            รีเซ็ต รหัสผ่าน
                        </h1>
                        @livewire('forget-password.forget-component')
                    </div>
                </div>
            </div>
        </div>
        <!-- bloc-29 END -->

        <!-- bloc-28 -->
        <div class="bloc tc-2768 l-bloc" id="bloc-28">
            <div class="container bloc-no-padding-lg bloc-no-padding-md bloc-no-padding-sm bloc-no-padding">
                <div class="row card13">
                    <div class="text-md-left text-center col-md-12 col-sm-12 col-lg-8 offset-lg-2">
                        <div id="modal-8975" class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog  modal-dialog-centered" role="document">
                                <div class="bgc-3252 modal-content">
                                    <div class="card-body-style modal-body">
                                        <div class="text-center w-100">
                                            <span class="icon-md feather-icon icon-circle-cross icon-2224"></span>
                                        </div>
                                        <p class="mx-auto d-block text-lg-center mg-lg p-46-style">
                                            รหัสผ่านไม่ถูกต้อง
                                        </p>
                                        <div class="row">
                                            <div class="offset-lg-4 col-lg-4">
                                                <a href="#" class="btn btn-clean btn-d btn-sq btn-lg btn-14-style"
                                                    data-toggle="modal" data-target="#modal-8975">ตกลง</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- bloc-28 END -->

        <!-- bloc-29 -->
        <div class="bloc tc-2768 l-bloc" id="bloc-29">
            <div class="container bloc-md bloc-md-md bloc-md-sm bloc-no-padding-lg">
                <div class="row card13">
                    <div class="text-md-left text-center col-md-12 col-sm-12 col-lg-8 offset-lg-2">
                        <div id="modal-31907" class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog  modal-dialog-centered" role="document">
                                <div class="bgc-3252 modal-content">
                                    <div class="card-body-style modal-body">
                                        <div class="text-center w-100">
                                            <span class="icon-md feather-icon icon-circle-check icon-3530"></span>
                                        </div>
                                        <p class="mx-auto d-block text-lg-center mg-lg p-46-style">
                                            รีเซ็ตรหัสผ่านเรียบร้อยแล้ว
                                        </p>
                                        <div class="row">
                                            <div class="offset-lg-4 col-lg-4">
                                                <a href="#" class="btn btn-clean btn-d btn-sq btn-lg btn-14-style"
                                                    data-toggle="modal" data-target="#modal-31907">ตกลง</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- bloc-29 END -->

    </div>
    <!-- Main container END -->



    <!-- Additional JS -->
    <script src="html/js/jquery.min.js?7646"></script>
    <script src="html/js/bootstrap.bundle.min.js?7859"></script>
    <script src="html/js/blocs.min.js?5546"></script>
    <script src="html/js/lazysizes.min.js" defer></script>
    <script src="html/js/cd-swiper.min.js?1361"></script>
    <script src="html/js/mresize.js?1561"></script>
    <script src="html/js/card-designer.js?994"></script><!-- Additional JS END -->

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>

</body>

</html>
