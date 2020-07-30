<form class="d-inline" method="POST" action="{{ $action }}" onsubmit="return confirm('Are You Sure You Want to Delete This?')">
    @csrf
    @method($method ?? 'POST')
        <button
            type="submit"
            class="{{ $class ?? '' }}"
        >
            {{ $slot }}
        </button>
</form>
