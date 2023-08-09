@extends('layouts.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Новый товар
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('main.index') }}" class="text-muted text-hover-primary">Главная</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('products.index') }}" class="text-muted text-hover-primary">Товары</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Добавление</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container">
                <form class="form d-flex flex-column flex-lg-row" action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 me-lg-10">
                        <ul
                            class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                   href="#kt_ecommerce_add_product_general">Основные</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                   href="#kt_ecommerce_add_product_advanced">Расширенные</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                                 role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Основные</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="mb-10">
                                                <label class="required form-label">Название товара</label>
                                                <input type="text" name="title"
                                                       class="form-control mb-2" placeholder="Название"
                                                       value="{{ old('title', '') }}"/>
                                                @error('title')
                                                <div class="fs-7 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-10">
                                                <label class="form-label">Описание</label>
                                                <textarea id="tinymce_editor" name="content"
                                                          class="tox-target">
                                                    {{ old('content' ,'') }}
                                                </textarea>
                                                @error('content')
                                                <div class="fs-7 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-10">
                                                <label class="form-label">Производитель</label>
                                                <select name="manufacturer_id" class="form-select"
                                                        data-control="select2"
                                                        data-placeholder="Выберите производителя">
                                                    <option selected disabled>Выберите производителя</option>
                                                    @foreach($manufacturers as $manufacturer)
                                                        <option value="{{ $manufacturer->id }}"
                                                            @selected(old('manufacturer_id', '') == $manufacturer->id)>
                                                            {{ $manufacturer->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('manufacturer_id')
                                                <div class="fs-7 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Галерея</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="fv-row mb-2">
                                                <div class="dropzone"
                                                     id="kt_ecommerce_add_product_media">
                                                    <div class="dz-message needsclick">
                                                        <i class="ki-duotone ki-file-up text-primary fs-3x">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bold text-gray-900 mb-1">
                                                                Перетащите файлы сюда или нажмите, чтобы загрузить.
                                                            </h3>
                                                            <span class="fs-7 fw-semibold text-gray-400">
                                                                Загрузите до 10 файлов
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fs-7 text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced"
                                 role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Инвентарь</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="mb-10">
                                                <label class="required form-label">Артикул</label>
                                                <input type="text" name="sku" class="form-control mb-2"
                                                       placeholder="Артикул товара" value="{{ old('sku', '') }}"/>
                                                @error('sku')
                                                <div class="fs-7 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-10">
                                                <label class="required form-label">Цена</label>
                                                <div class="d-flex gap-3">
                                                    <input type="number" name="price"
                                                           class="form-control mb-2" placeholder="Цена товара"
                                                           value="{{ old('price') }}"/>
                                                </div>
                                                @error('price')
                                                <div class="fs-7 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-10">
                                                <label class="form-label">Цена товара по скидке</label>
                                                <div class="d-flex gap-3">
                                                    <input type="number" name="discount_price"
                                                           class="form-control mb-2" placeholder="Цена"
                                                           value="{{ old('discount_price') }}"/>
                                                </div>
                                                @error('discount_price')
                                                <div class="fs-7 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-10">
                                                <label class="form-label">Количество</label>
                                                <div class="d-flex gap-3">
                                                    <input type="number" name="stock"
                                                           class="form-control mb-2" placeholder="Запасы"
                                                           value="{{ old('stock') }}"/>
                                                </div>
                                                @error('stock')
                                                <div class="fs-7 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-10">
                                                <label class="form-label">Рейтинг</label>
                                                <input type="number" name="rating" class="form-control mb-2"
                                                       placeholder="Рейтинг товара" value="{{ old('rating') }}"/>
                                                @error('rating')
                                                <div class="fs-7 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Характеристики</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <label class="form-label">Добавить характеристики</label>
                                            <div id="product_characteristics">
                                                <div class="form-group">
                                                    <div data-repeater-list="product_characteristics"
                                                         class="d-flex flex-column gap-3">
                                                        <div data-repeater-item
                                                             class="form-group d-flex flex-wrap align-items-center gap-5">
                                                            <div class="w-100 w-md-300px">
                                                                <select class="form-select"
                                                                        name="product_characteristic_id"
                                                                        data-placeholder="Выберите характеристику">
                                                                    <option value="" selected>
                                                                        Выберите характеристику
                                                                    </option>
                                                                    @foreach($productCharacteristics as $characteristic)
                                                                        <option value="{{ $characteristic->id }}">
                                                                            {{ $characteristic->title }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <input type="text" class="form-control mw-100 w-200px"
                                                                   name="value"
                                                                   placeholder="Значение"/>
                                                            <button type="button"
                                                                    data-repeater-delete=""
                                                                    class="btn btn-sm btn-icon btn-light-danger">
                                                                <i class="ki-duotone ki-cross fs-1">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-5">
                                                    <button type="button" data-repeater-create=""
                                                            class="btn btn-sm btn-light-primary">
                                                        <i class="ki-duotone ki-plus fs-2"></i>
                                                        Добавить характеристику
                                                    </button>
                                                </div>
                                            </div>
                                            @error('product_characteristics')
                                            <div class="fs-7 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
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
                                        background-image: url('{{ asset('assets/media/svg/files/blank-image.svg') }}');
                                    }

                                    [data-bs-theme="dark"] .image-input-placeholder {
                                        background-image: url('{{ asset('assets/media/svg/files/blank-image-dark.svg') }}');
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
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the product thumbnail image. Only
                                    *.png, *.jpg and *.jpeg image files are accepted
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Статус</h2>
                                </div>
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-success w-15px h-15px"
                                         id="kt_ecommerce_add_product_status"></div>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Select2-->
                                <select class="form-select mb-2" data-control="select2"
                                        data-hide-search="true" data-placeholder="Select an option"
                                        id="kt_ecommerce_add_product_status_select">
                                    <option></option>
                                    <option value="published" selected="selected">Published</option>
                                    <option value="draft">Draft</option>
                                    <option value="scheduled">Scheduled</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <!--end::Select2-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the product status.</div>
                                <!--end::Description-->
                                <!--begin::Datepicker-->
                                <div class="d-none mt-10">
                                    <label for="kt_ecommerce_add_product_status_datepicker"
                                           class="form-label">Select publishing date and time</label>
                                    <input class="form-control"
                                           id="kt_ecommerce_add_product_status_datepicker"
                                           placeholder="Pick date & time"/>
                                </div>
                                <!--end::Datepicker-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Status-->
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Детали товара</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="form-check form-switch form-check-custom form-check-solid mb-4">
                                    <input class="form-check-input" type="checkbox" name="is_recommended" value="1"
                                           id="flexSwitchDefault"/>
                                    <label class="form-check-label" for="flexSwitchDefault">
                                        Рекомендовать товар
                                    </label>
                                </div>
                                @error('is_recommended')
                                <div class="fs-7 text-danger">{{ $message }}</div>
                                @enderror
                                <label class="form-label">Категории</label>
                                <select name="product_category_id" class="form-select mb-2" data-control="select2"
                                        data-placeholder="Выберите категорию" data-allow-clear="true">
                                    <option selected disabled></option>
                                    @foreach($productCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('product_category_id')
                                <div class="fs-7 text-danger">{{ $message }}</div>
                                @enderror
                                <label class="form-label d-block">Теги</label>
                                <select name="product_tags[]" class="form-select mb-2" data-control="select2"
                                        data-placeholder="Выберите теги" data-allow-clear="true"
                                        multiple="multiple">
                                    @foreach($productTags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                                @error('product_tags')
                                <div class="fs-7 text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card card-flush py-4">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('products.index') }}"
                                   id="kt_ecommerce_add_product_cancel"
                                   class="btn btn-light me-5">Отмена</a>
                                <button type="submit" id="kt_ecommerce_add_product_submit"
                                        class="btn btn-primary">
                                    <span class="indicator-label">Сохранить</span>
                                    <span class="indicator-progress">Сохранение...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!--end::Aside column-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection
