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
                    <button class="btn custom-create-edit-btn btn-primary fw-bold rounded-2 shadow-sm px-5 py-2 d-flex align-items-center unit-modal" type="button" data-bs-toggle="modal" data-bs-target="#unit_create_modal">
                        <i class="fa fa-plus-circle me-2"></i>
                        Add Unit
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
                                                        <th class="text-bolder">Actual Name</th>
                                                        <th class="text-bolder">Short Name</th>
                                                        <th class="text-bolder">Allow Decimal</th>
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
 <div class="modal fade" id="unit_create_modal" tabindex="-1" role="dialog">
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
                    <input type="hidden" name="unit_id" id="unit_id" value="">
                    <div class="mb-2">
                        <label for="name" class="form-label fw-semibold">Name: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name" required>
                        @error('name')
                        <div class="text-danger mt-1">
                            <small><strong>{{ $message }}</strong></small>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="short_name" class="form-label fw-semibold">Short name: <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="short_name" name="short_name" value="{{ old('nashort_nameme') }}" placeholder="Enter short name" required>
                        @error('name')
                        <div class="text-danger mt-1">
                            <small><strong>{{ $message }}</strong></small>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="allow_decimal" class="form-label fw-semibold">Allow decimal: <span class="text-danger">*</span></label>
                        <select id="allow_decimal" class="form-select select2" name="allow_decimal" required>
                            <option value="">Please Select</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                        @error('allow_decimal')
                        <div class="text-danger mt-1">
                            <small><strong>{{ $message }}</strong></small>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-2 mt-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                            <label class="form-check-label" for="flexCheckIndeterminate">
                                Add as multiple of other unit
                            </label>
                        </div>
                    </div>

                    <div id="unit-multiple-fields" class="row mt-3 d-none align-items-center">
                        <div class="col-md-2 fw-bold">
                            <span id="unit-label">1 Unit =</span>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="multiplier" name="base_unit_multiplier" placeholder="Times Base Unit">
                        </div>
                        <div class="col-md-5">
                            <select class="form-select select2" id="base-unit" name="base_unit">
                                <option selected="selected" value="">Select base unit</option>
                                <option value="1">PCS (PS)</option>
                                <option value="2">SET (SET)</option>
                                <option value="3">Gram (GM)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-light" data-bs-dismiss="modal">Cancle</a>
                    <a type="submit" class="btn btn-primary" id="unit-btn">Save</a>

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
                url: '{{ route('unit.datatable') }}',
                data: function (d) {
                    d.search = $('#searchFilter').val();
                }
            },
            columns: [
                {data: 'DT_RowIndex', name:'DT_RowIndex', orderable:false, searchable:false, className:'fw-semibold text-center'},
                {data: 'name', name: 'name', className: 'fw-semibold'},
                {data: 'short_name', name: 'short_name', className: 'fw-semibold'},
                {data: 'allow_decimal', name: 'allow_decimal', className: 'fw-semibold text-center'},
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

    document.addEventListener('DOMContentLoaded', function () {
        const checkbox = document.getElementById('flexCheckIndeterminate');
        const fields = document.getElementById('unit-multiple-fields');
        const nameInput = document.getElementById('name');
        const label = document.getElementById('unit-label');

        checkbox.addEventListener('change', function () {
            if (this.checked) {
                fields.classList.remove('d-none');
            } else {
                fields.classList.add('d-none');
            }
        });

        nameInput.addEventListener('input', function () {
            const value = nameInput.value.trim();
            if (value) {
                label.textContent = `1 ${value} =`;
            } else {
                label.textContent = '1 Unit =';
            }
        });
    });

    $(document).on('click', '.unit-modal', function (e) {
        // Reset the form
        $('#form')[0].reset();
        $('#unit_id').val('');
        $('#unit-btn').text('Save');
        $('#unit_create_modal .modal-title').text('Add Unit');

        $('#allow_decimal').val('').trigger('change');
        $('#base-unit').val('').trigger('change');

        $('#unit-multiple-fields').addClass('d-none');
        $('#flexCheckIndeterminate').prop('checked', false);
        $('#unit_create_modal').modal('show');
    });

    $(document).on('click', '.edit-unit', function (e) {
        e.preventDefault();
        const unitId = $(this).data('id');

        $.get("{{ url('units') }}/" + unitId + "/edit", function (data) {
            $('#unit_id').val(data.id);
            $('#name').val(data.name);
            $('#short_name').val(data.short_name);
            $('#allow_decimal').val(data.allow_decimal).trigger('change');
            $('#base-unit').val(data.base_unit).trigger('change');
            $('#multiplier').val(data.base_unit_multiplier);

            if (data.base_unit) {
                $('#unit-multiple-fields').removeClass('d-none');
                $('#flexCheckIndeterminate').prop('checked', true);
            } else {
                $('#unit-multiple-fields').addClass('d-none');
                $('#flexCheckIndeterminate').prop('checked', false);
            }

            $('#unit_create_modal .modal-title').text('Edit Unit');
            $('#unit-btn').text('Update');
            $('#unit_create_modal').modal('show');
        });
    });

    $(document).ready(function () {
        $('#unit-btn').on('click', function (e) {
            e.preventDefault();

            $('#unit-btn').addClass('d-none');
            $('#submit-loader').removeClass('d-none');

            const unitId = $('#unit_id').val();
            const isEdit = unitId !== '';

            const form = $('#form')[0];
            const formData = new FormData(form);

            let url = isEdit 
                ? "{{ url('units') }}/" + unitId 
                : "{{ route('units.store') }}";
            let method = isEdit ? 'POST' : 'POST';

            if (isEdit) {
                formData.append('_method', 'PUT');
            }

            if (isEdit) {
                $('#unit_create_modal .modal-title').text('Edit Unit');
            } else {
                $('#unit_create_modal .modal-title').text('Add Unit');
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
                    $('#unit-btn').removeClass('d-none');
                    $('#unit_create_modal').modal('hide');

                    if (!response.error) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.msg,
                            confirmButtonColor: '#75BA55',
                        }).then(() => {
                            $('#form')[0].reset();
                            $('#unit_id').val('');
                            $('#unit-btn').text('Save');
                            $('#unit-multiple-fields').addClass('d-none');
                            $('#allow_decimal').val('').trigger('change');
                            $('#base-unit').val('').trigger('change');
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
                    $('#unit-btn').removeClass('d-none');
                    $('#unit_create_modal').modal('hide');
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