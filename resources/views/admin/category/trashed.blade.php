@extends('layouts.master')
@section('title','Kategori')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Kategori Listesi</span>
                    </h3>

                </div>
                <div class="card-body">

                    <table class="table table-separate table-head-custom table-checkable dataTable no-footer" id="myTable" aria-describedby="kt_datatable_info" role="grid" style="width: 1231px;">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Record ID: activate to sort column descending" ># ID</th>
                            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" >Ana Kategori</th>
                            <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" >Alt Kategori</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">İŞLEMLER</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr class="odd">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td nowrap="nowrap">
                                    <a href="" class="btn btn-sm btn-clean btn-icon" title="Edit details" data-toggle="modal" data-target="#exampleModal-{{$category->id}}">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <a href="{{route('category.destroy',$category->id)}}" class="btn btn-sm btn-clean btn-icon delete-confirm" title="Delete">
                                        <i class="la la-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="post" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{$category->name}} | Kategoriyi Düzenleyin</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label><strong>Kategori Adı:</strong></label>
                                                    <input class="form-control form-control-solid" name="category_name" type="text" value="{{ $category->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class=" col-form-label text-lg-right"><strong>Alt kategori mi?</strong></label>
                                                    <div class="col-lg-3 d-flex justify-content-center">
                                                        <div class="radio-inline">
                                                            <label class="radio radio-lg">
                                                                <input type="radio" onclick="category(0)" @if(old('category')) checked="checked" @endif name="radios3_1" class="form-control"/>
                                                                <span></span>
                                                                Evet
                                                            </label>
                                                            <label class="radio radio-lg">
                                                                <input type="radio" onclick="category(1)" @if(!old('category')) style='display:none' @endif name="radios3_1" class="form-control"/>
                                                                <span></span>
                                                                Hayır
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group" id="myCategory">
                                                    <label class=" col-form-label text-lg-right"><strong>Ana Kategoriler</strong></label>
                                                    <div class="col-lg-12">
                                                        <select class="form-control form-control-solid guideAssign"  name="category_id">
                                                            @foreach($categories as $id=>$category)
                                                                <option value="{{ $id }}" @if(old('category_id')===$category->id) selected @endif>{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button  class="btn btn-primary font-weight-bold" name="upload" type="submit">Güncelle</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!--end::Body-->
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom card-stretch ">
                <div class="card-header">
                    <h3 class="card-title">Ürün İşlemleri</h3>
                </div>
                <form class="form" method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-md-center">
                        <div class="col-md-10">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li><b>{{ $error }}</b></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label><strong>Kategori Adı:</strong></label>
                                    <input class="form-control form-control-solid" name="name" type="text">
                                </div>
                                <div class="form-group">
                                    <label class=" col-form-label text-lg-right"><strong>Alt kategori mi?</strong></label>
                                    <div class="col-lg-3 d-flex justify-content-center">
                                        <div class="radio-inline">
                                            <label class="radio radio-lg">
                                                <input type="radio" onclick="category(0)" @if(old('category')) checked="checked" @endif  checked name="radios3_1" class="form-control"/>
                                                <span></span>
                                                Evet
                                            </label>
                                            <label class="radio radio-lg">
                                                <input type="radio" onclick="category(1)" @if(!old('category')) style='display:none' @endif name="radios3_1" class="form-control"/>
                                                <span></span>
                                                Hayır
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group" id="myCategory">
                                    <label class=" col-form-label text-lg-right"><strong>Ana Kategoriler</strong></label>
                                    <div class="col-lg-12">
                                        <select class="form-control form-control-solid guideAssign"  name="category_id">
                                            @foreach($categories as $id=>$category)
                                                <option value="{{ $id }}" @if(old('category_id')===$category->id) selected @endif>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer d-flex justify-content-lg-end">
                                <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
                                <button type="reset" class="btn btn-secondary">İptal Et</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('footer')
    <script>
        function category(x)
        {
            if(x==0)
                document.getElementById("myCategory").style.display='block';
            else
                document.getElementById("myCategory").style.display='none';
            return;
        }
    </script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                columns: [
                    null,
                    null,
                    { orderable: false }
                ],
                "language": {
                    "lengthMenu": "_MENU_ sayfa başına adet",
                    "zeroRecords": "Kayıt bulunamadı!",
                    "info": "_PAGE_ sayfasındasın.",
                    "infoEmpty": "Kayıt Bulunamadı!",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search":         "Arama:",
                    "paginate": {
                        "first":      "İlk",
                        "last":       "Son",
                        "next":       "Sonraki",
                        "previous":   "Önceki"
                    }
                },
                responsive: true

            });
        } );
    </script>
    <script>
        $('.delete-confirm').click(function (e) {
            e.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Silmek için emin misin?',
                text: "Bu öğeyi silmek istediğine emin misin?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, Sil!',
                cancelButtonText: 'Hayır, Silme!',
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    Swal.fire(
                        'Silindi!',
                        'İlgili içerik başarıyla silindi!',
                        'success'
                    )
                    window.location.href = url;
                    //result.dismiss can be 'cancel', 'overlay',
                    //'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    Swal.fire(
                        'İptal edildi!',
                        'Silme işlemi iptal edildi!',
                        'warning'
                    )
                }
            });
        });
    </script>
@endsection

