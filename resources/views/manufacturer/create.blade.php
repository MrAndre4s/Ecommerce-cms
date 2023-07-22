@extends('layouts.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-toolbar py-3 py-lg-6">
            <div class="app-container d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Новый производитель
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('main.index') }}" class="text-muted text-hover-primary">Главная</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('manufacturers.index') }}" class="text-muted text-hover-primary">Производители</a>
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
                <form class="form d-flex flex-column flex-lg-row" action="{{ route('manufacturers.store') }}"
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
                                    <label class="form-label required">Название производителя</label>
                                    <input type="text" name="title" class="form-control mb-2"
                                           placeholder="Производитель" value="{{ old('title') }}"/>
                                    @error('title')
                                    <div class="fs-7 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Изображение</h2>
                                </div>
                            </div>
                            <div class="card-body text-center pt-0">
                                <style>
                                    .image-input-placeholder {
                                        background-image: url('{{ asset('assets/img/no-photo.jpg') }}');
                                    }

                                    [data-bs-theme="dark"] .image-input-placeholder {
                                        background-image: url('{{ asset('assets/img/no-photo.jpg') }}');
                                    }
                                </style>
                                <div
                                    class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <div class="image-input-wrapper w-150px h-150px"></div>
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Change avatar">
                                        <i class="ki-duotone ki-pencil fs-7">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg"/>
                                        <input type="hidden" name="avatar_remove"/>
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        title="Cancel avatar">
											<i class="ki-duotone ki-cross fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        title="Remove avatar">
											<i class="ki-duotone ki-cross fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</span>
                                </div>
                                <div class="text-muted fs-7">Set the category thumbnail image. Only
                                    *.png, *.jpg and *.jpeg image files are accepted
                                </div>
                            </div>
                        </div>
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Статус</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <select class="form-select mb-2" name="post_status" data-control="select2"
                                        data-hide-search="true" data-placeholder="Выберите статус">
                                    <option></option>
                                    @foreach($postStatus as $key => $status)
                                        <option value="{{ $status }}"
                                            @selected(old('post_status') == $status)>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('post_status')
                                <div class="fs-7 text-danger">{{ $message }}</div>
                                @enderror
                                <div class="mt-10 {{ (old('post_status') != 'Запланировано') ? 'd-none' : '' }}">
                                    <label for="published_at" class="form-label">Дата публикации</label>
                                    <input class="form-control" id="published_at" name="published_at"
                                           value="{{ old('published_at') }}" placeholder="Выберите дату"/>
                                    @error('published_at')
                                    <div class="fs-7 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card card-flush py-4">
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('manufacturers.index') }}" class="btn btn-light me-5">Отмена</a>
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Сохранить</span>
                                    <span class="indicator-progress">Сохранение...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
