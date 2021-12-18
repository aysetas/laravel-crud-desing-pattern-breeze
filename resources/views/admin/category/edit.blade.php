@extends('layouts.master')
@section('title','Kategori Oluştur')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="card-header">
                        <h5 class="card-title" id="exampleModalLabel">{{$category->name}} | Kategoriyi Düzenleyin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label><strong>Kategori Adı:</strong></label>
                            <input class="form-control form-control-solid" name="name" type="text"
                                   value="{{ $category->name }}">
                        </div>
                        <div class="form-group">
                            <label class=" col-form-label text-lg-right"><strong>Alt kategori mi?</strong></label>
                            <div class="col-lg-3 d-flex justify-content-center">
                                <div class="radio-inline">
                                    <label class="radio radio-lg">
                                        <input type="radio" onclick="category(0)" @if(old('category')) checked="checked"
                                               @endif name="radios3_1" class="form-control"/>
                                        <span></span>
                                        Evet
                                    </label>
                                    <label class="radio radio-lg">
                                        <input type="radio" onclick="category(1)"
                                               @if(!old('category')) style='display:none' @endif name="radios3_1"
                                               class="form-control"/>
                                        <span></span>
                                        Hayır
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group" id="myCategory">
                            <label class=" col-form-label text-lg-right"><strong>Ana Kategoriler</strong></label>
                            <div class="col-lg-12">
                                <select class="form-control form-control-solid guideAssign" name="category_id">
                                    @foreach($categories as $id=>$category)
                                        <option value="{{ $id }}"
                                                @if(old('category_id')===$category->id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary font-weight-bold" name="upload" type="submit">Güncelle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
