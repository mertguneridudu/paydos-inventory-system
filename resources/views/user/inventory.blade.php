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
							<div class="row gy-5 g-xl-10">
								<div class="col-xl-12">
									<div class="card card-flush h-xl-100">
										<div class="card-header pt-7">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bolder badge badge-success text-white">{{ $user_info->name }}&nbsp;{{ $user_info->surname }}</span>
                                                <br>
                                                <span class="fw-bolder text-dark"> Inventory History </span>
											</h3>
										</div>
										<div class="card-body">
											<table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
												<thead>
													<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                        <th class="min-w-100px">Inventory Name</th>
														<th class="min-w-100px">Serial Number</th>
														<th class="text pe-3 min-w-100px">IMEI Number</th>
														<th class="text pe-3 min-w-100px">Note</th>
														<th class="text pe-3 min-w-100px">Removal Date</th>
														<th class="text pe-0 min-w-50px text-end">Status</th>
													</tr>
												</thead>
												<tbody class="fw-bolder text-gray-600">
                                                @foreach ($inventory_info as $item)
                                                    <tr>
                                                        <td class="text">{{ $item->name }}</td>
														@if( $item->seri_no != NULL)
															<td class="text">{{ $item->seri_no }}</td>
														@else
															<td class="text text-danger">No Serial Number</td>
														@endif
														@if( $item->imei_no != NULL)
                                                        	<td class="text">{{ $item->imei_no }}</td>
														@else
															<td class="text text-danger">No IMEI Number</td>
														@endif
														@if( $item->notes != NULL)
                                                        	<td class="text">{{ $item->notes }}</td>
														@else
															<td class="text text-danger">No Notes</td>
														@endif
														@if( $item->created_at != NULL)
															<td class="text">{{ $item->created_at }}</td>
														@else
															<td class="text text-danger">No Removal Date</td>
														@endif
                                                    @if( $item->status_info == 0)
                                                    <td class="text-end">
                                                        <span class="badge py-3 px-4 fs-7 badge-light-danger">Inactive</span>
                                                    </td>
                                                    @elseif ( $item->status_info == 1)
                                                    <td class="text-end">
                                                        <span class="badge py-3 px-4 fs-7 badge-light-success">Active</span>
                                                    </td>
                                                    @endif
                                                    </tr>
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
</body>

</html>
