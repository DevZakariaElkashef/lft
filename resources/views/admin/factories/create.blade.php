@extends("layouts.admin")
@section("content")
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                {{ __('admin.add_new_factory') }}
            </div>
            <div class="mt-3">
                <a href="{{ route('factories.index') }}" class="btn btn-secondary float-right">
                    {{ __('main.back') }}
                </a>
            </div>
        </div>
        @include('admin.factories.form')
    </div>
@endsection