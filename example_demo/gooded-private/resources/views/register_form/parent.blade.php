
<!doctype html>
<html>
<head>
    <base href="{{ asset('') }}" />
    <title>Register-Parent</title>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
	<meta name="robots" content="index, follow">
    <link rel="shortcut icon" type="image/png" href="html/favicon.png">

	<link rel="stylesheet" type="text/css" href="html/css/bootstrap.min.css?6664">
	<link rel="stylesheet" type="text/css" href="html/style.css?9085">
	<link rel="stylesheet" type="text/css" href="html/css/animate.min.css?2320">
	<link rel="stylesheet" type="text/css" href="html/css/cd-swiper.css?6143">

	<link rel="stylesheet" type="text/css" href="html/css/feather.min.css">
	<link rel="stylesheet" type="text/css" href="html/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="html/css/ionicons.min.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,40&display=swap&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    @livewireStyles
<!-- Analytics -->

<!-- Analytics END -->

</head>
<body>
<!-- Main container -->
<div class="page-container">

<!-- bloc-29 -->
<div class="bloc tc-7996 bloc-fill-screen cardfit3 bgc-1974 bloc-bg-texture texture-geometry-shapes d-bloc" id="bloc-29">
	<div class="container">
		<div class="row row-32-style align-items-center">
			<div class="col-md-3 offset-md-7 col-sm-4 offset-sm-7 offset-lg-7 col-lg-2 col-7 offset-5">
				<h3 class="mg-sm text-lg-right btn-resize-mode h3-style text-sm-right text-right">
					<span class="feather-icon icon-reply icon-4645"></span> <a class="h3-style" href="{{url()->previous()}}">กลับไปยังเข้าสู่ระบบ</a>
				</h3>
			</div>
			<div class="col-lg-6 offset-lg-3 col-12 offset-0 cardadmin2 col-md-10 offset-md-1 col-sm-12 offset-sm-0">
				<img src="html/img/lazyload-ph.png" data-src="html/img/good_login2.svg" class="img-fluid mx-auto d-block img-43-style lazyload" alt="mail" width="45" height="42">
				<h1 class="text-lg-center text-md-center h1-เข้าสู่ระบบ-style text-sm-center text-center mg-sm mg-md-sm mg-clear-xs">
					ผู้ปกครอง
				</h1>
				<h1 class="text-lg-center text-md-center text-sm-center text-center mg-md-sm h1-style mg-md mg-md-xs">
					สมัครสมาชิก
				</h1>
                @livewire('register-form.parent.add-component')
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
<script src="html/js/cd-swiper.min.js?7920"></script>
<script src="html/js/mresize.js?4388"></script>
<script src="html/js/card-designer.js?5927"></script><!-- Additional JS END -->

@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>

</body>
</html>
