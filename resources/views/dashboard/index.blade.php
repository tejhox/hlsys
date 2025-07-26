<x-app-layout>
    <div class="sm:flex">
        <div class="hidden sm:block sm:w-1/5">
            @include('layouts.sidebar')
        </div>

        <div x-data="{
            btnSelected: 'ER 01'
        }" @btn-selected.window="btnSelected = $event.detail.btnSelected"
            class="sm:w-4/5 mt-1 sm:h-screen sm:mt-0 flex flex-col">
            <div class="shadow p-1 flex-1 flex flex-col">

                <!-- Mobile -->
                <div class="sm:hidden space-y-1 flex-1 flex flex-col">
                    <x-dashboard-list-card>
                        <div x-show="btnSelected === 'ER 01'" x-cloak>
                            @include('dashboard.partials.list', [
                                'headers' => $line1group1,
                                'group' => 'GROUP 1',
                            ])
                            <hr class="border-1 my-2" />

                            @include('dashboard.partials.list', [
                                'headers' => $line1group2,
                                'group' => 'GROUP 2',
                            ])
                            <hr class="border-1 my-2" />

                            @include('dashboard.partials.list', [
                                'headers' => $line1group3,
                                'group' => 'GROUP 3',
                            ])
                        </div>

                        <div x-show="btnSelected === 'ER 02'" x-cloak>
                            @include('dashboard.partials.list', [
                                'headers' => $line2group1,
                                'group' => 'GROUP 1',
                            ])
                            <hr class="border-1 my-2" />

                            @include('dashboard.partials.list', [
                                'headers' => $line2group2,
                                'group' => 'GROUP 2',
                            ])
                            <hr class="border-1 my-2" />

                            @include('dashboard.partials.list', [
                                'headers' => $line2group3,
                                'group' => 'GROUP 3',
                            ])
                        </div>

                        <div x-show="btnSelected === 'ER 03'" x-cloak>
                            @include('dashboard.partials.list', [
                                'headers' => $line3group1,
                                'group' => 'GROUP 1',
                            ])
                            <hr class="border-1 my-2" />

                            @include('dashboard.partials.list', [
                                'headers' => $line3group2,
                                'group' => 'GROUP 2',
                            ])
                            <hr class="border-1 my-2" />

                            @include('dashboard.partials.list', [
                                'headers' => $line3group3,
                                'group' => 'GROUP 3',
                            ])
                        </div>

                        <div x-show="btnSelected === 'ER 150'" x-cloak>
                            @include('dashboard.partials.list', [
                                'headers' => $line4group1,
                                'group' => 'GROUP 1',
                            ])
                            <hr class="border-1 my-2" />

                            @include('dashboard.partials.list', [
                                'headers' => $line4group2,
                                'group' => 'GROUP 2',
                            ])
                            <hr class="border-1 my-2" />

                            @include('dashboard.partials.list', [
                                'headers' => $line4group3,
                                'group' => 'GROUP 3',
                            ])
                        </div>
                    </x-dashboard-list-card>
                </div>


                <!-- Desktop -->

                <div class="hidden sm:block space-y-1">
                    <x-dashboard-list-card>
                        <div x-show="btnSelected === 'ER 01'" x-cloak>
                            <div class="flex gap-2">
                                <div class="flex-1">
                                    @include('dashboard.partials.list', [
                                        'headers' => $line1group1,
                                        'group' => 'GROUP 1',
                                    ])
                                    {{-- <hr class="border-1 my-2" /> --}}
                                </div>
                                <div class="flex-1">
                                    @include('dashboard.partials.list', [
                                        'headers' => $line1group2,
                                        'group' => 'GROUP 2',
                                    ])
                                    {{-- <hr class="border-1 my-2" /> --}}
                                </div>
                                {{-- <div class="flex-1">
                                @include('dashboard.partials.list', [
                                    'headers' => $line1group3,
                                    'group' => 'GROUP 3',
                                ])
                            </div> --}}
                            </div>
                        </div>

                        <div x-show="btnSelected === 'ER 02'" x-cloak>
                            <div class="flex gap-2">
                                <div class="flex-1">
                                    @include('dashboard.partials.list', [
                                        'headers' => $line2group1,
                                        'group' => 'GROUP 1',
                                    ])
                                    {{-- <hr class="border-1 my-2" /> --}}
                                </div>
                                <div class="flex-1">
                                    @include('dashboard.partials.list', [
                                        'headers' => $line2group2,
                                        'group' => 'GROUP 2',
                                    ])
                                    {{-- <hr class="border-1 my-2" /> --}}
                                </div>
                                {{-- <div class="flex-1">
                                @include('dashboard.partials.list', [
                                    'headers' => $line2group3,
                                    'group' => 'GROUP 3',
                                ])
                            </div> --}}
                            </div>
                        </div>

                        <div x-show="btnSelected === 'ER 03'" x-cloak>
                            <div class="flex gap-2">
                                <div class="flex-1">
                                    @include('dashboard.partials.list', [
                                        'headers' => $line3group1,
                                        'group' => 'GROUP 1',
                                    ])
                                    {{-- <hr class="border-1 my-2" /> --}}
                                </div>
                                <div class="flex-1">
                                    @include('dashboard.partials.list', [
                                        'headers' => $line3group2,
                                        'group' => 'GROUP 2',
                                    ])
                                    {{-- <hr class="border-1 my-2" /> --}}
                                </div>
                                {{-- <div class="flex-1">
                                @include('dashboard.partials.list', [
                                    'headers' => $line3group3,
                                    'group' => 'GROUP 3',
                                ])
                            </div> --}}
                            </div>
                        </div>

                        <div x-show="btnSelected === 'ER 150'" x-cloak>
                            <div class="flex gap-2">
                                <div class="flex-1">
                                    @include('dashboard.partials.list', [
                                        'headers' => $line4group1,
                                        'group' => 'GROUP 1',
                                    ])
                                    {{-- <hr class="border-1 my-2" /> --}}
                                </div>
                                <div class="flex-1">
                                    @include('dashboard.partials.list', [
                                        'headers' => $line4group2,
                                        'group' => 'GROUP 2',
                                    ])
                                    {{-- <hr class="border-1 my-2" /> --}}
                                </div>
                                {{-- <div class="flex-1">
                                @include('dashboard.partials.list', [
                                    'headers' => $line4group3,
                                    'group' => 'GROUP 3',
                                ])
                            </div> --}}
                            </div>
                        </div>
                    </x-dashboard-list-card>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
