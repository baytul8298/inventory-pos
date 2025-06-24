@extends('admin.layout.master')
@section('title','Units')
@section('page-title', 'Units')

@section('content')
@include('admin.dashboard.inc.purchase_sidebar')

<div class="main-content app-content mt-0">
    <div class="side-app">
        <!-- Container Start -->
        <div class="main-container container-fluid">
            <div class="row mt-6 mb-4">
                <div class="col-12 text-end" style="display: flex; justify-content: end">
                    <button class="btn custom-create-edit-btn btn-primary fw-bold rounded-2 shadow-sm px-5 py-2 d-flex align-items-center add-modal" type="button" data-bs-toggle="modal" data-bs-target="#create_modal">
                        <i class="fa fa-plus-circle me-2"></i>
                        Add Brand
                    </button>
                </div>
            </div>
            <!-- Modules Grid -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0 table-card">
                        <div class="card-body">
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-6 d-flex align-items-center">
                                    <label class="mb-0 d-flex align-items-center">
                                        Show
                                        <select name="tableData_length" aria-controls="tableData"
                                                class="form-select form-select-sm mx-2 rounded-2 shadow-sm"
                                                style="width: auto; min-width: 70px;">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                        entries
                                    </label>
                                </div>

                                <div class="col-md-6 d-flex justify-content-end align-items-center gap-3">
                                    <div class="input-group shadow-sm rounded-2 overflow-hidden"
                                         style="max-width: 400px;">
                                        <input type="text" class="form-control border-0 custom-search py-2 px-5" placeholder="Search name or short name" id="searchFilter" style="background-color: #f5f5f5;">
                                        <button type="button" class="btn btn-light refresh border-0 px-3">
                                            <i class="fe fe-refresh-ccw"></i> Clear
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive mt-5">
                                <div id="UserList_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="row dt-row">
                                        <div class="col-sm-12">
                                            <table class="table dataTable no-footer" id="tableData">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center text-bolder">#</th>
                                                        <th class="text-bolder">Brand Name</th>
                                                        <th class="text-bolder">Note</th>
                                                        <th class="text-center text-bolder">Actions</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </div>
</div>

 <!-- { Modal } -->
 <div class="modal fade" id="create_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Unit</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </span>
                </button>
            </div>
            <form class="form" id="form" action="#" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="brand_id" id="brand_id" value="">
                    <div class="mb-2">
                        <label for="name" class="form-label fw-semibold">Brand Name: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name" required>
                        @error('name')
                        <div class="text-danger mt-1">
                            <small><strong>{{ $message }}</strong></small>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="short_description" class="form-label fw-semibold">Short description: </label>
                        <input class="form-control" type="text" id="short_description" name="short_description" value="{{ old('short_description') }}" placeholder="Enter short name" required>
                        @error('short_description')
                        <div class="text-danger mt-1">
                            <small><strong>{{ $message }}</strong></small>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-light" data-bs-dismiss="modal">Cancle</a>
                    <a type="submit" class="btn btn-primary" id="save-btn">Save</a>

                    <button id="submit-loader" class="btn btn-success box-shadow text-small d-none" disabled>
                        <span class="">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('style')
<style>
    .page-header .breadcrumb {
        margin-top: 0 !important;
    }
    .module-box {
        height: 110px;
        background: linear-gradient(135deg, #3b3a3a, #01C0C8);
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .module-box:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
    }

    .page-header .breadcrumb {
        background: transparent;
        padding: 0;
        margin-top: 10px;
    }
    .swal2-container {
        z-index: 2000 !important;
    }
</style>
@endsection

@section('script')
<script>
    let table;
    $(function () {
        table = $('#tableData').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            lengthChange: false,
            ajax: {
                url: '{{ route('brand.datatable') }}',
                data: function (d) {
                    d.search = $('#searchFilter').val();
                }
            },
            columns: [
                {data: 'DT_RowIndex', name:'DT_RowIndex', orderable:false, searchable:false, className:'fw-semibold text-center'},
                {data: 'name', name: 'name', className: 'fw-semibold'},
                {data: 'description', name: 'description', className: 'fw-semibold'},
                {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
            ],
            pagingType: "full_numbers",
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100],
            language: {
                paginate: {
                    first: "<i class='mdi mdi-page-first'></i>",
                    last: "<i class='mdi mdi-page-last'></i>",
                    previous: "<i class='mdi mdi-chevron-left'></i>",
                    next: "<i class='mdi mdi-chevron-right'></i>"
                }
            },
            responsive: true,
            autoWidth: false,
        });

        $('#searchFilter').on('keyup', function () {
            table.draw();
        });

        $('[name="tableData_length"]').on('change', function () {
            table.page.len($(this).val()).draw();
        });

        // Clear/refresh all content.
        $('.refresh').click(function () {
            $('#searchFilter').val('');
            table.ajax.reload();
        });
    });

    $(document).on('click', '.add-modal', function (e) {
        // Reset the form
        $('#form')[0].reset();
        $('#brand_id').val('');
        $('#name').val('');
        $('#short_description').val('');
        $('#save-btn').text('Save');
        $('#create_modal .modal-title').text('Add Brand');

        $('#create_modal').modal('show');
    });

    $(document).on('click', '.edit-data', function (e) {
        e.preventDefault();
        const pramId = $(this).data('id');

        $.get("{{ url('brands') }}/" + pramId + "/edit", function (data) {
            $('#brand_id').val(data.id);
            $('#name').val(data.name);
            $('#short_description').val(data.description);

            $('#create_modal .modal-title').text('Edit Unit');
            $('#save-btn').text('Update');
            $('#create_modal').modal('show');
        });
    });

    $(document).ready(function () {
        $('#save-btn').on('click', function (e) {
            e.preventDefault();

            $('#save-btn').addClass('d-none');
            $('#submit-loader').removeClass('d-none');

            const pramId = $('#brand_id').val();
            const isEdit = pramId !== '';

            const form = $('#form')[0];
            const formData = new FormData(form);

            let url = isEdit 
                ? "{{ url('brands') }}/" + pramId 
                : "{{ route('brands.store') }}";
            let method = isEdit ? 'POST' : 'POST';

            if (isEdit) {
                formData.append('_method', 'PUT');
            }

            if (isEdit) {
                $('#create_modal .modal-title').text('Edit Brand');
            } else {
                $('#create_modal .modal-title').text('Add Brand');
            }

            $.ajax({
                type: method,
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $('#submit-loader').addClass('d-none');
                    $('#save-btn').removeClass('d-none');
                    $('#create_modal').modal('hide');

                    if (!response.error) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.msg,
                            confirmButtonColor: '#75BA55',
                        }).then(() => {
                            $('#form')[0].reset();
                            $('#brand_id').val('');
                            $('#name').val('');
                            $('#short_description').val('');
                            $('#save-btn').text('Save');
                            table.ajax.reload(null, false);
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.msg,
                        });
                    }
                },
                error: function (xhr) {
                    $('#submit-loader').addClass('d-none');
                    $('#save-btn').removeClass('d-none');
                    $('#create_modal').modal('hide');
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed!',
                        text: xhr.responseJSON?.message || 'Something went wrong.',
                    });
                }
            });
        });
    });

</script>
@endsection