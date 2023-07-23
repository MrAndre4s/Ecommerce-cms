@extends('layouts.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-toolbar py-3 py-lg-6">
            <div class="app-container d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Новая категория
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('main.index') }}" class="text-muted text-hover-primary">Главная</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('product-tags.index') }}"
                               class="text-muted text-hover-primary">Категории</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a class="text-muted text-hover-primary">Добавление</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="app-content flex-column-fluid">
            <div class="app-container">
                <form class="form d-flex flex-column flex-lg-row" action="{{ route('product-categories.store') }}"
                      method="post">
                    @csrf
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 me-lg-10">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Основные</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="mb-10">
                                    <label class="form-label required">Название категории</label>
                                    <input type="text" name="title" class="form-control mb-2"
                                           placeholder="Категория" value="{{ old('title') }}"/>
                                    @error('title')
                                    <div class="fs-7 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7">
                        <div class="card card-flush py-4">
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('product-tags.index') }}" class="btn btn-light me-5">Отмена</a>
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Сохранить</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
