<!DOCTYPE html>
<html lang="en">

<head>
	<title>Paydos | Inventory System</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" />
    <link rel="shortcut icon" href="../asset/media/logos/favicon.ico" type="image/x-icon" >
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link href="{{ asset('asset/css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('asset/css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('asset/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed" style="
      --kt-toolbar-height: 55px;
      --kt-toolbar-height-tablet-and-mobile: 55px;
    ">
	<div class="d-flex flex-column flex-root">
		<div class="page d-flex flex-row flex-column-fluid">
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('include.header')
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<div class="post d-flex flex-column-fluid" id="kt_post">
						<div id="kt_content_container" class="container-xxl">
							<div class="card card-flush">
								<div class="card-header align-items-center py-5 gap-2 gap-md-5">
									@if ( Auth::user()->yetki == 1)
										<div class="card-title">
											<a href="{{ url('/inventory/create') }}" class="btn btn-primary">Add Product</a>
											</div>
										@else

									@endif

								</div>
							</div>
                            <br><br>
                            <div class="row g-6 g-xl-9">
                                @foreach ($inventory as $item)
                                <div class="col-md-6 col-xxl-4">
                                    <div class="card">
                                        <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                                            <div class="symbol symbol-65px symbol-circle mb-5">
                                                <img src="{{ url($item->image) }}" alt="image">
                                            </div>
                                            <a href="{{ url('/inventory/' . $item->id) }}" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">{{ $item->name }}</a>
                                            <div class="fw-bold text-gray-400 mb-6">{{ $item->category_name }}</div>
																						@if ( Auth::user()->yetki == 1)
																						<div class="d-flex flex-center flex-wrap">
																						<a href="{{ url('/inventory/' . $item->id . '/edit') }}" class="btn btn-success btn-sm me-1">Edit</a>

																							</div>
																							@else

																							@endif

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
						</div>
					</div>

				</div>
                @include('include.footer')
			</div>
		</div>
	</div>
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<span class="svg-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
				<path
					d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
					fill="currentColor" />
			</svg>
		</span>
	</div>
	<script src="{{ asset('asset/js/plugins.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/scripts.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/product/product.js') }}"></script>
	<script src="{{ asset('asset/js/widgets.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/widgets.js') }}"></script>
</body>

</html>
