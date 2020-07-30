<div>
    <div class="form-group">
        <label for={{ $field }}>{{ $label }}</label>
        <input
            type="text"
            class="form-control {{ $errors->has($field) ? 'is-invalid' :'' }}"
            name={{ $field }}
            value="{{ old($field, isset($model->$field) ? $model->$field : null) }}"
        />
        <div class="invalid-feedback">
            {{ $errors->first($field) }}
        </div>
    </div>
</div>
