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
	<link href="{{ asset('asset/css/multi-select.css') }}" media="screen" rel="stylesheet" type="text/css" />
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
                                <form action="{{ url('team/' .$category->team_id) }}" method="POST" class="form d-flex flex-column flex-lg-row">
                                    @csrf
                                    @method("PATCH")
								<div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
									<div class="card card-flush py-4">
										<div class="card-header">
											<div class="card-title">
												<h2>Edit Department</h2>
											</div>
										</div>
										<div class="card-body pt-0 row">
											<label class="required form-label">Department Name </label>
											<div class="mb-10 fv-row row">

												<div class="col-lg-8">
													<input autocomplete="off" type="text" name="team_name" class="form-control mb-2" placeholder="Department Name"
														value="{{ $category->team_name }}" />
												</div>
												<div class="justify-content-end col-lg-4">
													<button type="submit" class="btn btn-primary">
														<span>Update</span>
													</button>
												</div>
											</div>
											<div class="text-muted fs-7">A department name is required and recommended to be unique.</div>
										</div>

									</div>


								</div>
							</form>
							<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
								<div class="post d-flex flex-column-fluid" id="kt_post">
									<div id="kt_content_container" class="container-xxl">
										<div class="card">
											<div class="card-body py-4">
												<table class="table table-bordered align-middle table-row-dashed fs-6 gy-5"
													   id="datatable">
													<thead>
													<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
														<th class="min-w-125px">Name Surname</th>
													</tr>
													</thead>
													<tbody class="text-gray-600 fw-bold">
													@foreach ($users as $item)
														<tr>
															<td class="d-flex align-items-center">
																<div class="d-flex flex-column">
																	<a class="text-gray-800 text-hover-primary mb-1">{{ $item->name }}
																		&nbsp;{{ $item->surname }}</a>
																</div>
															</td>
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
	<script>var hostUrl = "assets/";</script>
	<script src="{{ asset('asset/js/plugins.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/scripts.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/datatables.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/widgets.bundle.js') }}"></script>
	<script src="{{ asset('asset/js/widgets.js') }}"></script>
	<script src="{{ asset('asset/js/jquery.multi-select.js') }}"></script>
	<script src="{{ asset('asset/js/jquery.quicksearch.js') }}"></script>
	<script>
		$('.custom-headers').multiSelect({
			selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='All Users'>",
			selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='Users in Department'>",
			afterInit: function(ms){
				var that = this,
						$selectableSearch = that.$selectableUl.prev(),
						$selectionSearch = that.$selectionUl.prev(),
						selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
						selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

				that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
				.on('keydown', function(e){
					if (e.which === 40){
						that.$selectableUl.focus();
						return false;
					}
				});													<script>
				that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
				.on('keydown', function(e){
					if (e.which == 40){
						that.$selectionUl.focus();
						return false;
					}
				});
			},
			afterSelect: function(){
				this.qs1.cache();
				this.qs2.cache();
			},
			afterDeselect: function(){
				this.qs1.cache();
				this.qs2.cache();
			}
		});
	</script>

	<script>
		function RemoveKullanici(id) {
			$.ajax({
				url: '/kullanici_kaldir',
				type: 'post',
				data: {
					"_token": "{{ csrf_token() }}",
					id: id
				},
				dataType: 'json',
					success: function (data) {
						$("#rem_"+ id).remove();
				},
					error: function (request, status, error) {

					}
			});
		}
 	</script>
</body>

</html>
