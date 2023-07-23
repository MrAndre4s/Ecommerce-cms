@extends('layouts.app')
@section('content')
    <div class="d-flex flex-column">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Категории продуктов
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('main.index') }}" class="text-muted text-hover-primary">Главная</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Категории</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container">
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-ecommerce-product-filter="search"
                                       class="form-control form-control-solid w-250px ps-12"
                                       placeholder="Поиск"/>
                            </div>
                        </div>
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <a href="{{ route('product-categories.create') }}" class="btn btn-primary">
                                Добавить категорию
                            </a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                               data-kt-check-target=".form-check-input"
                                               value="1"/>
                                    </div>
                                </th>
                                <th class="text-end w-25px">#</th>
                                <th class="min-w-200px">Название</th>
                                <th class="text-end min-w-100px">Дата создание</th>
                                <th class="text-end min-w-100px">Количество продуктов</th>
                                <th class="text-end min-w-70px">Действия</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                            @foreach($productCategories as $productCategory)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox"
                                                   value="{{ $productCategory->id }}"/>
                                        </div>
                                    </td>
                                    <td class="text-end pe-1">
                                        <span class="fw-bold">#{{ $productCategory->id }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('product-categories.edit', $productCategory) }}"
                                               class="symbol symbol-50px">
                                                <span class="symbol-label"
                                                      style="background-image:url({{ asset('assets/img/no-photo.jpg') }});">
                                                </span>
                                            </a>
                                            <div class="ms-5">
                                                <a href="{{ route('product-categories.edit', $productCategory) }}"
                                                   class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                                    {{ $productCategory->title }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span
                                            class="fw-bold">{{ $productCategory->created_at->format('d/m/Y h:i') }}</span>
                                    </td>
                                    <td class="text-end pe-0">
                                        <span class="fw-bold"></span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#"
                                           class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                           data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Действия
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                        </a>
                                        <div
                                            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="{{ route('product-categories.edit', $productCategory) }}"
                                                   class="menu-link px-3">Редактировать</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a class="menu-link px-3 text-danger"
                                                   data-bs-toggle="modal"
                                                   data-bs-target="#modal-delete"
                                                   data-action="{{ route('product-categories.destroy', $productCategory) }}"
                                                   data-title="{{ $productCategory->title }}">
                                                    Удалить
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col d-flex align-items-center justify-content-end justify-content-md-end">
                                {{ $productCategories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
