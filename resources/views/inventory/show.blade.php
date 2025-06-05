<!DOCTYPE html>
<html lang="en">

<head>
	<title>Paydos | Inventory System</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
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
                            <div class="card mb-5 mb-xl-10">
								<div class="card-body pt-9 pb-0">
									<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
										<div class="me-7 mb-4">
											<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
												<img src="{{ asset($inventory->image) }}" alt="image" />

											</div>
										</div>
										<div class="flex-grow-1">
											<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
												<div class="d-flex flex-column">
													<div class="d-flex align-items-center mb-2">
														<a class="text-gray-900 fs-2 fw-bolder me-1">{{ $inventory->name }}</a>
													</div>
												</div>
												@if ( Auth::user()->yetki == 1)
												<div class="d-flex my-4">
													<a href="{{ url('/inventory-detail/create/'.$inventory->id) }}" class="btn btn-sm btn-primary me-2">Add New Product</a>
												</div>
																							@else

																							@endif

											</div>
											<div class="d-flex flex-wrap flex-stack">
												<div class="d-flex flex-column flex-grow-1 pe-8">
													<div class="d-flex flex-wrap">
														<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<div class="d-flex align-items-center">
																<div class="fs-2 fw-bolder">{{ $inventory->piece }}</div>
															</div>
															<div class="fw-bold fs-6 text-gray-400">Stock</div>
														</div>
														<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<div class="d-flex align-items-center">
																<div class="fs-2 fw-bolder">0</div>
															</div>
															<div class="fw-bold fs-6 text-gray-400">Delivered</div>
														</div>
														<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
															<div class="d-flex align-items-center">
																<div class="fs-2 fw-bolder">{{ $inventory->piece }}</div>
															</div>
															<div class="fw-bold fs-6 text-gray-400">Remaining in Inventory</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row gy-5 g-xl-10">
								<div class="col-xl-12">
									<div class="card card-flush h-xl-100">
										<div class="card-header pt-7">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder text-dark">Product Details</span>
											</h3>
										</div>
										<div class="card-body">
											<table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
												<thead>
													<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                        <th class="min-w-100px">Model Name</th>
														<th class="text pe-3 min-w-100px">IMEI Number</th>
														<th class="text pe-3 min-w-100px">Serial Number</th>
                                                        <th class="min-w-100px">Product Entry Date</th>
														<th class="text pe-3 min-w-100px">Note</th>
														@if ( Auth::user()->yetki == 1)


														<th class="text pe-0 min-w-50px text-end">Action</th>
														@else

															@endif
													</tr>
												</thead>
												<tbody class="fw-bolder text-gray-600">
                                                    @foreach ($inventories as $item)
                                                    <tr class="remove" id="rem_{{$item->feature_product_id}}">
														<td class="text-dark">{{ $item->model_name }}</td>
														<td class="text">{{ $item->imei_no }}</td>
														<td class="text">{{ $item->seri_no }}</td>
														<td class="text">{{ $item->created_at }}</td>
														<td class="text">{{ $item->notes }}</td>
														@if ( Auth::user()->yetki == 1)


														<td>
															<div class="d-flex justify-content-end flex-shrink-0">
																<a href="{{ url('/inventory-detail/' . $item->feature_product_id . '/edit') }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                                            fill="none">
                                                                            <path opacity="0.3"
                                                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                                fill="currentColor" />
                                                                            <path
                                                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                                fill="currentColor" />
                                                                        </svg>
                                                                    </span>
                                                                </a>
																<a href="javascript:();" onclick="RemoveInventoryItem({{$item->feature_product_id}})" data-id="{{ $item->feature_product_id }}" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm btremove">
																	@csrf
																	<span class="svg-icon svg-icon-3">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
																			fill="none">
																			<path
																				d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
																				fill="currentColor" />
																			<path opacity="0.5"
																				d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
																				fill="currentColor" />
																			<path opacity="0.5"
																				d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
																				fill="currentColor" />
																		</svg>
																	</span>
																</a>
															</div>
														</td>
													</tr>
													@else

																							@endif
                                                    @endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
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
	<script src="{{ asset('asset/js/datatables.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/widgets.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/widgets.js') }}"></script>
	<script>

		function RemoveInventoryItem(feature_product_id) {
			var isConfirmed = confirm("Are you sure you want to delete this product?");

			if (isConfirmed) {
				$.ajax({
					url: '/inventory_inactive',
					type: 'post',
					data: {
						"_token": "{{ csrf_token() }}",
						id: feature_product_id
					},
					dataType: 'json',
					success: function (data) {
						$("#rem_" + feature_product_id).remove();
					},
					error: function (request, status, error) {
					}
				});
			}
		}
 </script>
</body>

</html>
