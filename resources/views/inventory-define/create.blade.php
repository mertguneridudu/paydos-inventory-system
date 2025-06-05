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
                        <form action="{{ url('inventory-define') }}" method="POST" class="form d-flex flex-column flex-lg-row">
                            @csrf
                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active">
                                        <div class="d-flex flex-column gap-7 gap-lg-10">
                                            <div class="card card-flush py-4">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <h2>Inventory Define</h2>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class="mb-10 col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 fv-row">
                                                                <label class="required form-label">Select Inventory (Only undefined and inactive ones will be displayed)</label>
                                                                <select class="form-select mb-2" name="feature_id" data-control="select2"
                                                                        data-placeholder="Select Inventory">
                                                                    <option></option>
                                                                    @foreach ($inventory as $item1)
                                                                        <option value="{{ $item1->feature_product_id }}">{{ $item1->name }} | {{ $item1->model_name }} | {{ $item1->seri_no }} | {{ $item1->imei_no }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6 fv-row">
                                                                <label class="required form-label">Select User</label>
                                                                <select class="form-select mb-2" name="user_id" data-control="select2"
                                                                        data-placeholder="Select User">
                                                                    <option></option>
                                                                    @foreach ($users as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->name }}&nbsp;{{ $item->surname }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-10 col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-6 fv-row">
                                                                <label class="form-label">Mac Address Ethernet</label>
                                                                <input autocomplete="off" id="MAC" type="text" name="mac_address_ethernet" class="form-control mb-2"
                                                                       placeholder="Mac Address Ethernet" value="" />
                                                            </div>
                                                            <div class="col-lg-6 fv-row">
                                                                <label class="form-label">Mac Address Wifi</label>
                                                                <input autocomplete="off" id="MAC1" type="text" name="mac_address_wifi" class="form-control mb-2"
                                                                       placeholder="Mac Address Wifi" value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-10 fv-row">
                                                        <label class="form-label">Status</label>
                                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="1" id="status" name="status_info" checked="checked">
                                                            <label class="form-check-label fw-bold text-gray-400 ms-3" for="status">Active</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <span>Define</span>
                                    </button>
                                </div>
                            </div>
                        </form>
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
    document.getElementById("MAC").addEventListener('keyup', function() {
        this.value =
            (this.value.toUpperCase()
                .replace(/[^\d|A-Z]/g, '')
                .match(/.{1,2}/g) || [])
                .join(":")
    });
</script>
<script>
    document.getElementById("MAC1").addEventListener('keyup', function() {
        this.value =
            (this.value.toUpperCase()
                .replace(/[^\d|A-Z]/g, '')
                .match(/.{1,2}/g) || [])
                .join(":")
    });
</script>
</body>

</html>
