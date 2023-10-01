{{-- seperator field --}}

@includeWhen(!isset($field['wrapper']) || $field['wrapper'] !== false, 'crud::fields.inc.wrapper_start')
	<div class="seperator">{!! $field['value'] !!}</div>
@includeWhen(!isset($field['wrapper']) || $field['wrapper'] !== false, 'crud::fields.inc.wrapper_end')

{{-- CUSTOM CSS --}}
@push('crud_fields_styles')
    {{-- How to add some CSS? --}}
    @loadOnce('seperator_style')
        <style>
            .seperator {
                background-color: #f1f4f8;
                display:flex;
                justify-content:center;
                padding-top: 0.5rem!important;
                padding-bottom: 0.5rem!important;
                font-weight:bold;
            }
        </style>
    @endLoadOnce
@endpush