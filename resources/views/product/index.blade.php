@extends('admin.layout.master')
@section('title','Product Lists')

@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">
            <!--{ container start }-->
            <div class="main-container container-fluid">
                <!--{ PAGE HEADER START }-->
                <div class="page-header">
                    <h1 class="page-title">Products</h1>
                    <div>
                        <a href="#" class="btn btn-success fw-bolder"><i class="fa fa-plus-circle fa-lg"></i> Add Product</a>
                    </div>
                </div>
                <!--{ PAGE HEADER END }-->
                <div class="row">
                    <div class="col-12">
                        <div class="card table-card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="UserList_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row dt-row">
                                            <div class="col-sm-12">
                                                <table class="table dataTable no-footer" id="tableData">
                                                    <thead>
                                                        <tr class="bg-primary">
                                                            <th class="wd-15p border-bottom-0">First name</th>
                                                            <th class="wd-15p border-bottom-0">Last name</th>
                                                            <th class="wd-20p border-bottom-0">Position</th>
                                                            <th class="wd-15p border-bottom-0">Start date</th>
                                                            <th class="wd-10p border-bottom-0">Salary</th>
                                                            <th class="wd-25p border-bottom-0">E-mail</th>
                                                            <th class="wd-25p border-bottom-0">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="odd">
                                                            <td class="sorting_1">Alice</td>
                                                            <td>Johnson</td>
                                                            <td>Web Designer</td>
                                                            <td>2019/05/15</td>
                                                            <td>$75,000</td>
                                                            <td>alice.johnson@example.com</td>
                                                            <td name="bstable-actions">
                                                                <div class="btn-list">
                                                                    <a id="bEdit" type="button" class="btn btn-sm btn-primary">
                                                                        <span class="fe fe-edit"> </span>
                                                                    </a>
                                                                    <a id="bDel" type="button" class="btn  btn-sm btn-danger">
                                                                        <span class="fe fe-trash-2"> </span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr><tr class="even">
                                                            <td class="sorting_1">Alice</td>
                                                            <td>Johnson</td>
                                                            <td>Web Designer</td>
                                                            <td>2019/05/15</td>
                                                            <td>$75,000</td>
                                                            <td>alice.johnson@example.com</td>
                                                            <td name="bstable-actions">
                                                                <div class="btn-list">
                                                                    <a id="bEdit" type="button" class="btn btn-sm btn-primary">
                                                                        <span class="fe fe-edit"> </span>
                                                                    </a>
                                                                    <a id="bDel" type="button" class="btn  btn-sm btn-danger">
                                                                        <span class="fe fe-trash-2"> </span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr><tr class="odd">
                                                            <td class="sorting_1">Bob</td>
                                                            <td>Williams</td>
                                                            <td>Software Engineer</td>
                                                            <td>2020/02/28</td>
                                                            <td>$85,000</td>
                                                            <td>bob.williams@example.com</td>
                                                            <td name="bstable-actions">
                                                                <div class="btn-list">
                                                                    <a id="bEdit" type="button" class="btn btn-sm btn-primary">
                                                                        <span class="fe fe-edit"> </span>
                                                                    </a>
                                                                    <a id="bDel" type="button" class="btn  btn-sm btn-danger">
                                                                        <span class="fe fe-trash-2"> </span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr><tr class="even">
                                                            <td class="sorting_1">Bob</td>
                                                            <td>Williams</td>
                                                            <td>Software Engineer</td>
                                                            <td>2020/02/28</td>
                                                            <td>$85,000</td>
                                                            <td>bob.williams@example.com</td>
                                                            <td name="bstable-actions">
                                                                <div class="btn-list">
                                                                    <a id="bEdit" type="button" class="btn btn-sm btn-primary">
                                                                        <span class="fe fe-edit"> </span>
                                                                    </a>
                                                                    <a id="bDel" type="button" class="btn  btn-sm btn-danger">
                                                                        <span class="fe fe-trash-2"> </span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr><tr class="odd">
                                                            <td class="sorting_1">Charlie</td>
                                                            <td>Smith</td>
                                                            <td>Data Analyst</td>
                                                            <td>2018/09/10</td>
                                                            <td>$70,000</td>
                                                            <td>charlie.smith@example.com</td>
                                                            <td name="bstable-actions">
                                                                <div class="btn-list">
                                                                    <a id="bEdit" type="button" class="btn btn-sm btn-primary">
                                                                        <span class="fe fe-edit"> </span>
                                                                    </a>
                                                                    <a id="bDel" type="button" class="btn  btn-sm btn-danger">
                                                                        <span class="fe fe-trash-2"> </span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr><tr class="even">
                                                            <td class="sorting_1">Charlie</td>
                                                            <td>Smith</td>
                                                            <td>Data Analyst</td>
                                                            <td>2018/09/10</td>
                                                            <td>$70,000</td>
                                                            <td>charlie.smith@example.com</td>
                                                            <td name="bstable-actions">
                                                                <div class="btn-list">
                                                                    <a id="bEdit" type="button" class="btn btn-sm btn-primary">
                                                                        <span class="fe fe-edit"> </span>
                                                                    </a>
                                                                    <a id="bDel" type="button" class="btn  btn-sm btn-danger">
                                                                        <span class="fe fe-trash-2"> </span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr><tr class="odd">
                                                            <td class="sorting_1">Diana</td>
                                                            <td>Miller</td>
                                                            <td>UX Designer</td>
                                                            <td>2021/11/20</td>
                                                            <td>$80,000</td>
                                                            <td>diana.miller@example.com</td>
                                                            <td name="bstable-actions">
                                                                <div class="btn-list">
                                                                    <a id="bEdit" type="button" class="btn btn-sm btn-primary">
                                                                        <span class="fe fe-edit"> </span>
                                                                    </a>
                                                                    <a id="bDel" type="button" class="btn  btn-sm btn-danger">
                                                                        <span class="fe fe-trash-2"> </span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr><tr class="even">
                                                            <td class="sorting_1">Diana</td>
                                                            <td>Miller</td>
                                                            <td>UX Designer</td>
                                                            <td>2021/11/20</td>
                                                            <td>$80,000</td>
                                                            <td>diana.miller@example.com</td>
                                                            <td name="bstable-actions">
                                                                <div class="btn-list">
                                                                    <a id="bEdit" type="button" class="btn btn-sm btn-primary">
                                                                        <span class="fe fe-edit"> </span>
                                                                    </a>
                                                                    <a id="bDel" type="button" class="btn  btn-sm btn-danger">
                                                                        <span class="fe fe-trash-2"> </span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr><tr class="odd">
                                                            <td class="sorting_1">Ethan</td>
                                                            <td>Wilson</td>
                                                            <td>Project Manager</td>
                                                            <td>2017/06/05</td>
                                                            <td>$95,000</td>
                                                            <td>ethan.wilson@example.com</td>
                                                            <td name="bstable-actions">
                                                                <div class="btn-list">
                                                                    <a id="bEdit" type="button" class="btn btn-sm btn-primary">
                                                                        <span class="fe fe-edit"> </span>
                                                                    </a>
                                                                    <a id="bDel" type="button" class="btn  btn-sm btn-danger">
                                                                        <span class="fe fe-trash-2"> </span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr><tr class="even">
                                                            <td class="sorting_1">Ethan</td>
                                                            <td>Wilson</td>
                                                            <td>Project Manager</td>
                                                            <td>2017/06/05</td>
                                                            <td>$95,000</td>
                                                            <td>ethan.wilson@example.com</td>
                                                            <td name="bstable-actions">
                                                                <div class="btn-list">
                                                                    <a id="bEdit" type="button" class="btn btn-sm btn-primary">
                                                                        <span class="fe fe-edit"> </span>
                                                                    </a>
                                                                    <a id="bDel" type="button" class="btn  btn-sm btn-danger">
                                                                        <span class="fe fe-trash-2"> </span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
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
            </div>
            <!--{ container end }-->
        </div>
    </div>
@endsection

@section('style')
@endsection

@section('script')
    <script>
        $(function () {
            $('#tableData').DataTable()
        });
    </script>
@endsection
