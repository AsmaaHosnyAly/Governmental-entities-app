@extends('layouts.master')
@section('css')
    @toastr_css
    
    {{-- <link href="flasher_toastr" rel="stylesheet"/> --}}
    {{-- @flasher_toastr --}}

@section('title')
    الرئيسية\الهيئات الحكومية
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

{{-- @if ($errors->any())
    <div class="error">{{ $errors->first('Name') }}</div>
@endif --}}

<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> الهيئات الحكومية</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">الرئيسية</a></li>
                <li class="breadcrumb-item active">الهيئات الحكومية</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="row">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <button type="button" class="button x-small" data-toggle="modal"
                                data-target="#exampleModal">
                                اضافة هيئة حكومية
                            </button>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered p-0">
                                    <thead>
                                        <tr>
                                            <th>رقم الهيئة الحكومية</th>
                                            <th>اسم الهيئةالحكومية</th>
                                            <th>ملاحظات</th>
                                            <th>تاريخ الانشاء</th>
                                            {{-- <th>عدد الشكاوي</th> --}}
                                            {{-- <th>عدد الموظفين</th> --}}
                                            <th>العمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($entities as $entity)
                                            <?php $i++; ?>
                                            <tr>

                                                <td>{{ $i }}</td>
                                                <td>{{ $entity->Name }}</td>
                                                <td>{{ $entity->Notes }}</td>
                                                <td>{{ $entity->created_at }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm"
                                                        data-toggle="modal" data-target="#edit{{ $entity->id }}"
                                                        title="Edit"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal" data-target="#delete{{ $entity->id }}"
                                                        title="delete"><i class="fa fa-trash"></i></button>
                                                </td>
                                                {{-- <a href="{{ route('entities.edit', $entity->id) }}"> Edit</a>
                                                <form action="{{ route('entities.destroy', $entity->id) }}"
                                                    method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"> Delete</button>
                                                </form>
                                                </td> --}}
                                            </tr>

                                            <!-- edit_modal_Grade -->
                                            <div class="modal fade" id="edit{{ $entity->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="modal-title" id="exampleModalLabel">
                                                               تعديل الهيئة الحكومية
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- update_form -->
                                                            <form action="{{route('entities.update',$entity->id)}}" method="post">
                                                
                                                                @method('PATCH')
                                                                {{-- {{ method_field('patch') }} --}}
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label for="Name"
                                                                            class="mr-sm-2">اسم الهيئة الحكومية
                                                                            :</label>
                                                                        <input id="Name" type="text"
                                                                            name="Name" class="form-control"
                                                                            value="{{$entity->Name}}"
                                                                            required>
                                                                        <input id="id" type="hidden"
                                                                            name="id" class="form-control"
                                                                            value="{{ $entity->id }}">
                                                                    </div>
                                                            
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        for="exampleFormControlTextarea1">الملاحظات
                                                                        :</label>
                                                                    <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3">{{ $entity->Notes }}</textarea>
                                                                </div>
                                                                <br><br>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">اغلاق</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success">تعديل</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            
                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $entity->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                حذف الهيئة الحكومية
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('entities.destroy', $entity->id) }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                حذف الهيئة الحكومية
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $entity->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">اغلاق</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">حذف</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add_modal_Grade -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                    id="exampleModalLabel">
                                    اضف الهيئة الحكومية
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- add_form -->
                                <form action="{{ route('entities.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <label for="Name" class="mr-sm-2">اسم الهيئة الحكومية
                                                :</label>
                                            <input id="Name" type="text" name="Name"
                                                class="form-control">
                                        </div>
                                        {{-- <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('Grades_trans.stage_name_en') }}
                                                :</label>
                                            <input type="text" class="form-control" name="Name_en">
                                        </div> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">ملاحظات
                                            :</label>
                                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <br><br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                <button type="submit" class="btn btn-success">حفظ البيانات</button>
                            </div>
                            </form>

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
