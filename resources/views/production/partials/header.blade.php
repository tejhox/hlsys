<div class="bg-gradient-to-r from-blue-200 to-blue-700 shadow rounded-lg p-2">
    <div class="text-xs text-white text-right font-semibold">
        @if (Auth::check())
            {{ Auth::user()->name }}
        @endif
        -
        @if (Auth::check())
            {{ Auth::user()->nik }}
        @endif
    </div>
    <hr class="border-1  mb-2 mt-1" />

    <form method="POST" action="{{ route('dekidaka-header.storeOrUpdate') }}">
        <div x-data="{ editMode: false }" x-cloak>
            @csrf

            <!-- editMode Tidak Aktif-->

            <div class="flex" :class="editMode ? 'hidden' : ''">
                <div class="w-1/3 space-y-1">
                    @if ($header)
                        <input value="{{ $header->line->name }}"
                            class="input input-sm border-slate-400 bg-white text-slate-800 text-xs"
                            :readonly="!editMode" :disabled="editMode" />

                        <input value="{{ $header->product->name }}"
                            class="input input-sm border-slate-400 bg-white text-slate-800 text-xs"
                            :readonly="!editMode" :disabled="editMode" />
                    @else
                        <select name="line_id" class="select select-sm border-slate-400 bg-white text-slate-800 text-xs"
                            :disabled="editMode">
                            @foreach ($lines as $line)
                                <option value="{{ $line->id }}">{{ $line->name }}</option>
                            @endforeach
                        </select>

                        <select name="product_id"
                            class="select select-sm border-slate-400 bg-white text-slate-800 text-xs"
                            :disabled="editMode">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div class="w-2/3 ms-1 space-y-1">
                    <div class="flex">
                        <div class="w-1/2">
                            @if ($header)
                                <input value="Shift {{ $header->shift->shift }}"
                                    class="input input-sm border-slate-400 bg-white text-slate-800 text-xs"
                                    :readonly="!editMode" :disabled="editMode" />
                            @else
                                <select name="shift_id"
                                    class="select select-sm border-slate-400 bg-white text-slate-800 text-xs"
                                    :disabled="editMode">

                                    @foreach ($shifts as $shift)
                                        <option value="{{ $shift->id }}">Shift {{ $shift->shift }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="w-1/2 ms-1">
                            @if ($header)
                                <input value="Group {{ $header->group->group }}"
                                    class="input input-sm border-slate-400 bg-white text-slate-800 text-xs"
                                    :readonly="!editMode" :disabled="editMode" />
                            @else
                                <select name="group_id"
                                    class="select select-sm border-slate-400 bg-white text-slate-800 text-xs"
                                    :disabled="editMode">
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">Group {{ $group->group }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>

                    <div x-data="{ dateDisplay: '{{ $header ? \Carbon\Carbon::parse($header->date)->format('d-m-Y') : '' }}', dateValue: '{{ $header ? \Carbon\Carbon::parse($header->date)->format('Y-m-d') : '' }}' }">
                        <input type="text" x-model="dateDisplay" x-init="flatpickr($el, {
                            dateFormat: 'd-m-Y',
                            defaultDate: dateDisplay,
                            onChange: (selectedDates, dateStr, instance) => {
                                let y = selectedDates[0].getFullYear();
                                let m = String(selectedDates[0].getMonth() + 1).padStart(2, '0');
                                let d = String(selectedDates[0].getDate()).padStart(2, '0');
                                dateValue = `${y}-${m}-${d}`;
                            }
                        })" placeholder="Pilih Tanggal"
                            class="input input-sm border-slate-400 bg-white text-slate-900 text-xs" @if ($header)
                        readonly
                        @endif
                        :disabled="editMode"
                        />
                        <input type="hidden" name="date" :value="dateValue" />
                    </div>

                </div>
            </div>

            <!-- editMode Aktif -->

            <div class="flex" :class="editMode ? '' : 'hidden'">

                @if ($header)
                    <input type="hidden" name="header_id" value="{{ $header->id }}">
                @endif

                <div class="w-1/3 space-y-1">
                    <select name="line_id" class="select select-sm border-slate-400 bg-white text-slate-800 text-xs"
                        @if (!$header) disabled @endif>
                        @foreach ($lines as $line)
                            <option value="{{ $line->id }}" @if ($header && $line->id == $header->line_id) selected @endif>
                                {{ $line->name }}
                            </option>
                        @endforeach
                    </select>

                    <select name="product_id" class="select select-sm border-slate-400 bg-white text-slate-800 text-xs"
                        @if (!$header) disabled @endif>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" @if ($header && $product->id == $header->product_id) selected @endif>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="w-2/3 ms-1 space-y-1">
                    <div class="flex">
                        <div class="w-1/2">
                            <select name="shift_id"
                                class="select select-sm border-slate-400 bg-white text-slate-800 text-xs"
                                @if (!$header) disabled @endif>
                                @foreach ($shifts as $shift)
                                    <option value="{{ $shift->id }}"
                                        @if ($header && $shift->id == $header->shift_id) selected @endif>
                                        Shift {{ $shift->shift }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-1/2 ms-1">
                            <select name="group_id"
                                class="select select-sm border-slate-400 bg-white text-slate-800 text-xs"
                                @if (!$header) disabled @endif>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}"
                                        @if ($header && $group->id == $header->group_id) selected @endif>
                                        Group {{ $group->group }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input name="date" type="date"
                        value="{{ $header ? \Carbon\Carbon::parse($header->date)->format('Y-m-d') : '' }}"
                        class="input input-sm border-slate-400 bg-white text-slate-900 text-xs"
                        @if (!$header) disabled @endif />

                </div>
            </div>

            <!-- Bagian Tombol -->

            <hr class=" mb-1.5 mt-2" />
            <div class="flex justify-between items-center">

                @error('date')
                    <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror

                <div class="flex items-center justify-between w-full p-1 rounded-md bg-white/80">
                    <div>
                        <button type="button"
                            @click="$dispatch('open-delete-modal', { deleteUrl: '{{ $header ? route('dekidaka-header.destroy', $header->id) : '' }}' })"
                            class="btn btn-xs btn-outline btn-error shadow-md rounded-md text-sm"
                            @if (!$header) disabled @endif>
                            <i class="fa-solid fa-trash"></i>
                        </button>

                        <button type="button" @click="editMode = !editMode"
                            class="btn btn-xs shadow-md rounded-md text-sm"
                            :class="editMode ? 'btn-primary' : 'btn-outline btn-primary'"
                            @if (!$header) disabled @endif>
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                    </div>
                    <button type="submit"
                        class="{{ $header ? 'hidden' : 'btn btn-xs btn-info w-20 shadow-md rounded-md text-sm ' }}">
                        <i class="fa-solid fa-check"></i>
                    </button>
                    <div x-show='editMode'>
                        <button type="submit" class="btn btn-xs btn-success w-20 shadow-md rounded-md text-sm">
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
