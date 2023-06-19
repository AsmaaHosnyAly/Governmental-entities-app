@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    الموظفين
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    قائمة الموظفين
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <a href="{{ route('employees.create') }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">اضافة موظف</a><br><br>
                            <br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم الموظف</th>
                                            <th>النوع</th>
                                            <th>تاريخ الالتحاق</th>
                                            <th>التخصص</th>
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($employees as $Employee)
                                            <tr>
                                                <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>{{ $Employee->Name }}</td>
                                                <td>{{ $Employee->genders->Name }}</td>
                                                <td>{{ $Employee->Joining_Date }}</td>
                                                <td>{{ $Employee->specializations->Name }}</td>
                                                <td>
                                                    <a href="{{ route('employees.edit', $Employee->id) }}"
                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#delete_Teacher{{ $Employee->id }}"
                                                        title="{{ trans('Grades_trans.Delete') }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="delete_Teacher{{ $Employee->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('employees.destroy', 'test') }}"
                                                        method="post">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title" id="exampleModalLabel">
                                                                    حذف موظف</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>{{$Employee->Name}} هل تريد حذف</p>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $Employee->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">تراجع</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">تأكيد الحذف</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
