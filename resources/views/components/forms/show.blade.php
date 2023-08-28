<!-- Simplicity is an acquired taste. - Katharine Gerould -->

<!-- inputs -->
<div @class(['form-group md:grid grid-cols-2 gap-2 mt-4'])>
    @foreach ($fields as $attr => $value)
        @php
            $fill = $item->{$attr};
        @endphp

        <div @class(['m-2', 'col-span-2' => isset($value['colspan'])])>

            <x-input-label for="{{ $attr }}" value="{!! $value['title'] !!}"></x-input-label>

            @if ($value['field'] === 'richtext')
                <textarea class="block mt-1 w-full border-2 py-2 px-4 rounded-full outline-0" id="reader">
                    {!! old($attr) ?? $fill !!}
                </textarea>
            @else
                <x-text-input class="block mt-1 w-full border-2 py-2 px-4 rounded-full outline-0" value="{{ old($attr) ?? $fill }}"
                    readonly />
            @endif

        </div>
    @endforeach
    <div class="flex items-center justify-start mt-4">
        <a href="{{ url()->previous() }}">
            <x-primary-button class="ml-4">
                {{ __('Retour') }}
            </x-primary-button>
        </a>
    </div>
</div>

<script>
    ClassicEditor.create(document.querySelector("#reader"), {
        toolbar: [],
    }).then(editor => {
        editor.enableReadOnlyMode("editor");
        console.log(editor);
    }).catch(error => {
        console.error(error);
    });
</script>
