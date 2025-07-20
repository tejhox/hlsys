<x-app-layout>
    <div x-data="{
        btnSelected: 'ER 01'
    }" @btn-selected.window="btnSelected = $event.detail.btnSelected" class="sm:w-4/5 p-1">
        <div class="bg-white/20 shadow rounded-lg p-1">

            <!-- Mobile -->
            <div class="sm:hidden space-y-1">
                <x-dashboard-list-card>
                    <div x-show="btnSelected === 'ER 01'" x-cloak>
                        @include('dashboard.partials.list', [
                            'headers' => $line1group1,
                            'color' => 'bg-gray-700/60',
                            'group' => 'GROUP 1',
                        ])
                        <hr class="border-1 my-2" />

                        @include('dashboard.partials.list', [
                            'headers' => $line1group2,
                            'color' => 'bg-gray-700/60',
                            'group' => 'GROUP 2',
                        ])
                        <hr class="border-1 my-2" />

                        @include('dashboard.partials.list', [
                            'headers' => $line1group3,
                            'color' => 'bg-gray-700/60',
                            'group' => 'GROUP 3',
                        ])
                    </div>

                    <div x-show="btnSelected === 'ER 02'" x-cloak>
                        @include('dashboard.partials.list', [
                            'headers' => $line2group1,
                            'color' => 'bg-gray-700/60',
                            'group' => 'GROUP 1',
                        ])
                        <hr class="border-1 my-2" />

                        @include('dashboard.partials.list', [
                            'headers' => $line2group2,
                            'color' => 'bg-gray-700/60',
                            'group' => 'GROUP 2',
                        ])
                        <hr class="border-1 my-2" />

                        @include('dashboard.partials.list', [
                            'headers' => $line2group3,
                            'color' => 'bg-gray-700/60',
                            'group' => 'GROUP 3',
                        ])
                    </div>

                    <div x-show="btnSelected === 'ER 03'" x-cloak>
                        @include('dashboard.partials.list', [
                            'headers' => $line3group1,
                            'color' => 'bg-gray-700/60',
                            'group' => 'GROUP 1',
                        ])
                        <hr class="border-1 my-2" />

                        @include('dashboard.partials.list', [
                            'headers' => $line3group2,
                            'color' => 'bg-gray-700/60',
                            'group' => 'GROUP 2',
                        ])
                        <hr class="border-1 my-2" />

                        @include('dashboard.partials.list', [
                            'headers' => $line3group3,
                            'color' => 'bg-gray-700/60',
                            'group' => 'GROUP 3',
                        ])
                    </div>

                    <div x-show="btnSelected === 'ER 150'" x-cloak>
                        @include('dashboard.partials.list', [
                            'headers' => $line4group1,
                            'color' => 'bg-gray-700/60',
                            'group' => 'GROUP 1',
                        ])
                        <hr class="border-1 my-2" />

                        @include('dashboard.partials.list', [
                            'headers' => $line4group2,
                            'color' => 'bg-gray-700/60',
                            'group' => 'GROUP 2',
                        ])
                        <hr class="border-1 my-2" />

                        @include('dashboard.partials.list', [
                            'headers' => $line4group3,
                            'color' => 'bg-gray-700/60',
                            'group' => 'GROUP 3',
                        ])
                    </div>
                </x-dashboard-list-card>


                <!-- Desktop -->
                {{-- <div class="hidden space-y-1 sm:flex sm:space-y-0 sm:space-x-2 sm:mt-1">
                <div class="space-y-1 sm:w-1/2 sm:space-y-2">
                    <x-dashboard-list-card title="ER 01">
                        @include('dashboard.partials.list', ['headers' => $headers->where('line_id', '1')])
                    </x-dashboard-list-card>
                    <x-dashboard-list-card title="ER 03">
                        @include('dashboard.partials.list', ['headers' => $headers->where('line_id', '3')])
                    </x-dashboard-list-card>
                </div>
                <div class="space-y-1 sm:w-1/2 sm:space-y-2">
                    <x-dashboard-list-card title="ER 02">
                        @include('dashboard.partials.list', ['headers' => $headers->where('line_id', '2')])
                    </x-dashboard-list-card>
                    <x-dashboard-list-card title="ER 150">
                        @include('dashboard.partials.list', ['headers' => $headers->where('line_id', '4')])
                    </x-dashboard-list-card>
                </div>
            </div> --}}
            </div>
        </div>
</x-app-layout>
