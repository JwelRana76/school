<x-admin title="Class">
    <x-page-header head="Class" />
    <div class="row">
        <div class="col-md-3">
            <div class="card p-3">
                <x-form method="post" action="{{ route('class.store') }}">
                    <x-input id="id" type="hidden" value="{{ $classes->id ?? null }}" />
                    <x-input id="name" value="{{ $classes->name ?? null }}" />
                    <x-button value="Save" />
                </x-form>
            </div>
        </div>
        <div class="col-md-9">
            <x-data-table dataUrl="/acamedic/class" id="classses" :columns="$columns" />
        </div>
    </div>
    @push('js')
        <script>
             
        </script>
    @endpush
</x-admin>