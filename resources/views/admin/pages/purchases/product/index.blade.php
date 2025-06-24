@extends('admin.layout.master')
@section('title','Product')
@section('page-title', 'Product')

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
                        Add Product
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
                                                        <th class="text-bolder">Name</th>
                                                        <th class="text-bolder">Description</th>
                                                        <th class="text-bolder">Duration</th>
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
@include('admin.pages.purchases.product.inc.product_modal')
 

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
    .ck-editor__editable_inline {
        min-height: 160px;
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
                url: '{{ route('warranty.datatable') }}',
                data: function (d) {
                    d.search = $('#searchFilter').val();
                }
            },
            columns: [
                {data: 'DT_RowIndex', name:'DT_RowIndex', orderable:false, searchable:false, className:'fw-semibold text-center'},
                {data: 'name', name: 'name', className: 'fw-semibold'},
                {data: 'description', name: 'description', className: 'fw-semibold'},
                {data: 'duration', name: 'duration', className: 'fw-semibold'},
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

        const serviceCheckbox = document.getElementById('isService');
        const purchaseRateInput = document.getElementById('purchase_rate');

        checkbox?.addEventListener('change', function () {
            if (this.checked) {
                fields?.classList.remove('d-none');
            } else {
                fields?.classList.add('d-none');
            }
        });

        serviceCheckbox?.addEventListener('change', function () {
            if (this.checked) {
                purchaseRateInput.disabled = true;
            } else {
                purchaseRateInput.disabled = false;
            }
        });
    });

    $(document).on('click', '.add-modal', function (e) {
        // Reset the form
        $('#form')[0].reset();
        $('#product_id').val('');
        $('#name').val('');
        $('#description').val('');
        $('#duration').val('');
        $('#duration_type').val('').trigger('change');

        $('#save-btn').text('Save');
        $('#create_modal .modal-title').text('Add Product');
        $('#create_modal').modal('show');
    });

    $(document).on('click', '.edit-data', function (e) {
        e.preventDefault();
        const pramId = $(this).data('id');

        $.get("{{ url('warranties') }}/" + pramId + "/edit", function (data) {
            $('#product_id').val(data.id);
            $('#name').val(data.name);
            $('#description').val(data.description);
            $('#duration').val(data.duration);
            $('#duration_type').val(data.duration_type).trigger('change');

            $('#create_modal .modal-title').text('Edit Warranty');
            $('#save-btn').text('Update');
            $('#create_modal').modal('show');
        });
    });

    $(document).ready(function () {
        $('#save-btn').on('click', function (e) {
            e.preventDefault();

            $('#save-btn').addClass('d-none');
            $('#submit-loader').removeClass('d-none');

            const pramId = $('#product_id').val();
            const isEdit = pramId !== '';

            const form = $('#form')[0];
            const formData = new FormData(form);

            let url = isEdit 
                ? "{{ url('products') }}/" + pramId 
                : "{{ route('products.store') }}";
            let method = isEdit ? 'POST' : 'POST';

            if (isEdit) {
                formData.append('_method', 'PUT');
            }

            if (isEdit) {
                $('#create_modal .modal-title').text('Edit Product');
            } else {
                $('#create_modal .modal-title').text('Add Product');
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

                    if (!response.error) {
                        $('#create_modal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.msg,
                            confirmButtonColor: '#75BA55',
                        }).then(() => {
                            $('#form')[0].reset();
                            $('#product_id').val('');
                            $('#name').val('');
                            $('#description').val('');
                            $('#duration').val('');
                            $('#duration_type').val('').trigger('change');
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

                    if (xhr.status === 422) {
                        // Clear previous errors
                        $('.text-danger').remove();
                        $('.is-invalid').removeClass('is-invalid');

                        const errors = xhr.responseJSON.errors;

                        $.each(errors, function (field, messages) {
                            const input = $('[name="' + field + '"]');

                            if (input.length) {
                                input.addClass('is-invalid');

                                const errorHtml = `
                                    <div class="text-danger mt-1">
                                        <small><strong>${messages[0]}</strong></small>
                                    </div>
                                `;

                                if (input.closest('.form-group').length) {
                                    input.closest('.form-group').append(errorHtml);
                                } else {
                                    input.after(errorHtml);
                                }
                            }
                        });

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: xhr.responseJSON?.message || 'Something went wrong.',
                        });
                    }
                }
            });
        });

        $('#create_modal').on('show.bs.modal', function () {
            $('.text-danger').remove();
            $('.is-invalid').removeClass('is-invalid');
        });
    });

    ClassicEditor
        .create(document.querySelector('#kt_docs_ckeditor_classic'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection