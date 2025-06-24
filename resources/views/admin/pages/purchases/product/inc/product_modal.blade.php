<div class="modal fade" id="create_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
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
                    <input type="hidden" name="product_id" id="product_id" value="">
                    <div class="row align-items-center mb-2">
                        <div class="col-md-4 mb-2">
                            <label for="product_name" class="form-label fw-semibold">Product Name: <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="product_name" name="product_name" value="{{ old('product_name') }}" placeholder="Enter name">
                            @error('product_name')
                            <div class="text-danger mt-1">
                                <small><strong>{{ $message }}</strong></small>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="sku" class="form-label fw-semibold">SKU:</label>
                            <input class="form-control" type="text" id="sku" name="sku" value="{{ old('sku') }}" placeholder="Enter SKU">
                            @error('sku')
                            <div class="text-danger mt-1">
                                <small><strong>{{ $message }}</strong></small>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="short_description" class="form-label fw-semibold">Barcode:  <span class="text-danger">*</span></label>
                            <select class="form-select select2" id="barcode_id" name="barcode_id">
                                <option selected="selected" value="">Please select </option>
                                @foreach ($codes as $code)
                                    <option value="{{ $code->type }}">{{ $code->name }}</option>
                                @endforeach
                            </select>
                            @error('duration')
                            <div class="text-danger mt-1">
                                <small><strong>{{ $message }}</strong></small>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="unit_id" class="form-label fw-semibold">Unit:  <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="form-select select2" id="unit_id" name="unit_id" aria-label="Example select with button addon">
                                    <option selected="">Please select</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-primary" type="button"><i class="fa fa-plus-circle fa-lg"></i></button>
                                @error('duration')
                                <div class="text-danger mt-1">
                                    <small><strong>{{ $message }}</strong></small>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            <label for="brand_id" class="form-label fw-semibold">Brand:  <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select class="form-select select2" id="brand_id" name="brand_id" aria-label="Example select with button addon">
                                    <option selected="">Please select</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-primary" type="button"><i class="fa fa-plus-circle fa-lg"></i></button>
                            </div>
                            @error('duration')
                            <div class="text-danger mt-1">
                                <small><strong>{{ $message }}</strong></small>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="category_id" class="form-label fw-semibold">Category:  <span class="text-danger">*</span></label>
                            <select class="form-select select2" id="category_id" name="category_id">
                                <option selected="selected" value="">Please select </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('duration')
                            <div class="text-danger mt-1">
                                <small><strong>{{ $message }}</strong></small>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="alert_quantity" class="form-label fw-semibold">Alert Quantity:</label>
                            <input class="form-control" type="text" id="alert_quantity" name="alert_quantity" value="{{ old('alert_quantity') }}" placeholder="Enter alert quantity">
                            @error('alert_quantity')
                            <div class="text-danger mt-1">
                                <small><strong>{{ $message }}</strong></small>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="re_oreder_level" class="form-label fw-semibold">Re-order level:</label>
                            <input class="form-control" type="text" id="re_oreder_level" name="re_oreder_level" value="{{ old('re_oreder_level') }}" placeholder="Enter re-order level">
                            @error('re_oreder_level')
                            <div class="text-danger mt-1">
                                <small><strong>{{ $message }}</strong></small>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="purchase_rate" class="form-label fw-semibold">Purchase Price:</label>
                            <input class="form-control" type="text" id="purchase_rate" name="purchase_rate" value="0" placeholder="Enter purchase rate">
                            @error('purchase_rate')
                            <div class="text-danger mt-1">
                                <small><strong>{{ $message }}</strong></small>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="selling_price" class="form-label fw-semibold">Sales Price:</label>
                            <input class="form-control" type="text" id="selling_price" name="selling_price" value="{{ old('selling_price') }}" placeholder="Enter sale rate">
                            @error('selling_price')
                            <div class="text-danger mt-1">
                                <small><strong>{{ $message }}</strong></small>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="wholesale_rate" class="form-label fw-semibold">Wholesale Price:</label>
                            <input class="form-control" type="text" id="wholesale_rate" name="wholesale_rate" value="0" placeholder="Enter wholesale rate">
                            @error('wholesale_rate')
                            <div class="text-danger mt-1">
                                <small><strong>{{ $message }}</strong></small>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="vat" class="form-label fw-semibold">VAT (%):</label>
                            <input class="form-control" type="text" id="vat" name="vat" value="0" placeholder="Enter VAT">
                            @error('vat')
                            <div class="text-danger mt-1">
                                <small><strong>{{ $message }}</strong></small>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="product_image" class="form-label fw-semibold">Image:</label>
                            <input type="file" name="product_image" id="product_image" class="form-control dropify" data-max-file-size="2M" data-allowed-file-extensions="png jpg jpeg gif pdf doc docx"/>

                            @error('product_image')
                            <div class="text-danger mt-1">
                                <small><strong>{{ $message }}</strong></small>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-8 mb-2">
                            <label for="kt_docs_ckeditor_classic" class="form-label fw-semibold">Description:</label>
                            <textarea name="description" id="kt_docs_ckeditor_classic"></textarea>
                        </div>              
                         <!-- Checkboxes aligned with input -->
                        <div class="col-md-4 d-flex align-items-center gap-4" style="margin-top: 33px;">
                            <div class="form-check mb-0">
                                <label class="custom-control custom-checkbox-md">
                                    <input type="checkbox" class="custom-control-input" id="flexCheckIndeterminate" name="example-checkbox7" value="option7">
                                    <span class="custom-control-label">Manage Stock?</span>
                                </label>
                            </div>
                            <div class="form-check mb-0">
                                <label class="custom-control custom-checkbox-md">
                                    <input type="checkbox" class="custom-control-input" id="isService" name="example-checkbox7" value="option7">
                                    <span class="custom-control-label">Is Service</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="unit-multiple-fields" class="row mt-3 d-none align-items-center">
                            <div class="col-md-4 mb-2">
                                <label for="short_description" class="form-label fw-semibold">Warranty:  <span class="text-danger">*</span></label>
                                <select class="form-select select2" id="barcode_id" name="barcode_id">
                                    <option selected="selected" value="">Please select </option>
                                    @foreach ($warranties as $warranty)
                                        <option value="{{ $warranty->id }}">{{ $warranty->name }}</option>
                                    @endforeach
                                </select>
                                @error('duration')
                                <div class="text-danger mt-1">
                                    <small><strong>{{ $message }}</strong></small>
                                </div>
                                @enderror
                            </div>
                        </div>
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
