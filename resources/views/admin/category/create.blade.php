@extends('layouts.master')
@section('title','Kategori Oluştur')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom card-stretch ">
                <div class="card-header">
                    <h3 class="card-title">Ürün İşlemleri</h3>
                </div>
                <form class="form" method="POST" action="{{ route('category.store') }}"
                      enctype="multipart/form-data">
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
                                    <label class=" col-form-label text-lg-right"><strong>Alt kategori
                                            mi?</strong></label>
                                    <div class="col-lg-3 d-flex justify-content-center">
                                        <div class="radio-inline">
                                            <label class="radio radio-lg">
                                                <input type="radio" onclick="category(0)"
                                                       @if(old('category')) checked="checked" @endif  checked
                                                       name="radios3_1" class="form-control"/>
                                                <span></span>
                                                Evet
                                            </label>
                                            <label class="radio radio-lg">
                                                <input type="radio" onclick="category(1)"
                                                       @if(!old('category')) style='display:none'
                                                       @endif name="radios3_1" class="form-control"/>
                                                <span></span>
                                                Hayır
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group" id="myCategory">
                                    <label class=" col-form-label text-lg-right"><strong>Ana
                                            Kategoriler</strong></label>
                                    <div class="col-lg-12">
                                        <select class="form-control form-control-solid guideAssign"
                                                name="category_id">
                                            @foreach($categories as $id=>$category)
                                                <option value="{{ $id }}"
                                                        @if(old('category_id')===$category->id) selected @endif>{{$category->name}}</option>
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
