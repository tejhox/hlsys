<x-app-layout>
    <div class="p-1 mt-1 sm:mt-0 sm:w-4/5">
        <div class="sm:min-h-full sm:w-2/5 sm:rounded-md">
            @include('production.partials.header')
            @include('production.partials.accumulation')
            @include('production.partials.main')
        </div>
    </div>
    <x-modals.confirm-delete-modal />
    <x-modals.dekidaka-input-modal />
</x-app-layout>
