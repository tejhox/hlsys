<div x-data="{
    showEditModal: false,
    isLoading: false,
    product: null,
    mainId: null,
    hour: null,
    plan: null,
    actual: null,
    deviation: null,
    loss_time: null,
    shift: null,
    product: 'KS Reguler',
    cycle_time: null,

    get deviation() {
        return (this.actual ?? 0) - (this.plan ?? 0);
    },

    get loss_time() {
        return Math.round((this.plan - this.actual) * this.cycle_time);
    },
    reloadPage() {
        this.isLoading = true;
        location.reload()
    }
}" x-show="showEditModal" x-cloak
    @open-dekidaka-edit-modal.window="
    {{-- console.log('event.detail', $event.detail); --}}
    showEditModal = true; 
    mainId = $event.detail.id; 
    product = $event.detail.product; 
    hour = $event.detail.hour; 
    plan = $event.detail.plan; 
    actual = $event.detail.actual; 
    deviation = $event.detail.deviation; 
    loss_time = $event.detail.loss_time; 
    shift = $event.detail.shift;
    cycle_time = $event.detail.cycle_time;"
    class="modal modal-open">
    <div class="modal-box bg-white">
        <form method="POST" action="{{ route('dekidaka-main.update') }}">
            @csrf
            @method('PATCH')

            <input type="hidden" name="main_id" :value="mainId">
            <input type="hidden" name="product" :value="product">

            <div class="space-y-1">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-semibold">Edit Data</p>
                    </div>
                    <template x-if="shift === '1'">
                        <select name="hour" x-model="hour" class="select select-sm w-32 text-xs">
                            <option value="08.00 - 09.00">08.00 - 09.00</option>
                            <option value="09.00 - 10.00">09.00 - 10.00</option>
                            <option value="10.00 - 11.00">10.00 - 11.00</option>
                            <option value="11.00 - 12.00">11.00 - 12.00</option>
                            <option value="13.00 - 14.00">13.00 - 14.00</option>
                            <option value="14.00 - 15.00">14.00 - 15.00</option>
                            <option value="15.00 - 16.00">15.00 - 16.00</option>
                            <option value="16.00 - 17.00">16.00 - 17.00</option>
                            <option value="17.00 - 18.00">17.00 - 18.00</option>
                            <option value="18.00 - 19.00">18.00 - 19.00</option>
                            <option value="19.00 - 20.00">19.00 - 20.00</option>
                            <option value="20.00 - 21.00">20.00 - 21.00</option>
                        </select>
                    </template>
                    <template x-if="shift === '2'">
                        <select name="hour" x-model="hour" class="select select-sm w-32 text-xs">
                            <option value="20.00 - 21.00">20.00 - 21.00</option>
                            <option value="21.00 - 22.00">21.00 - 22.00</option>
                            <option value="22.00 - 23.00">22.00 - 23.00</option>
                            <option value="23.00 - 00.00">23.00 - 00.00</option>
                            <option value="01.00 - 02.00">01.00 - 02.00</option>
                            <option value="02.00 - 03.00">02.00 - 03.00</option>
                            <option value="03.00 - 04.00">03.00 - 04.00</option>
                            <option value="04.00 - 05.00">04.00 - 05.00</option>
                            <option value="05.00 - 06.00">05.00 - 06.00</option>
                            <option value="06.00 - 07.00">06.00 - 07.00</option>
                            <option value="07.00 - 08.00">07.00 - 08.00</option>
                        </select>
                    </template>
                </div>

                <div class="flex flex-col">
                    <label for="plan" class="text-sm">Plan</label>
                    <input type="number" id="plan" name="plan" max="55" x-model="plan"
                        class="input input-sm w-full" required />
                </div>

                <div class="flex flex-col">
                    <label for="actual" class="text-sm">Aktual</label>
                    <input type="number" id="actual" name="actual" max="55" x-model="actual"
                        class="input input-sm w-full" required />
                </div>

                <div class="flex flex-col">
                    <label for="deviation" class="text-sm">Deviasi</label>
                    <input type="number" id="deviation" name="deviation" :value="deviation"
                        class="input input-sm w-full" readonly />
                </div>

                <div class="flex flex-col">
                    <label for="loss_time" class="text-sm">Loss Time</label>
                    <div class="flex space-x-1">
                        <input type="number" id="loss_time" name="loss_time" :value="loss_time"
                            class="input input-sm" readonly />
                        <button type="button"
                            @click="
                            window.dispatchEvent(new CustomEvent('open-loss-time-input-modal', {
                                detail: {
                                    loss_time: loss_time,
                                    mainId: mainId
                                }}))"
                            class="btn btn-sm btn-outline btn-secondary"><i class="fa-solid fa-note-sticky"></i>
                            Edit Keterangan</button>
                    </div>
                </div>

                <hr class="my-2 border-slate-300" />
                <div class="flex justify-end">
                    {{-- <button type="button"
                        @click="window.dispatchEvent(new CustomEvent('open-delete-modal', { 
                    detail: { 
                        deleteUrl: '/dekidaka-main/' + mainId 
                    } 
                }))"
                        class="btn btn-sm btn-outline btn-error shadow-md rounded-md text-sm">
                        <i class="fa-solid fa-trash"></i>
                    </button> --}}
                    <div>
                        <button type="button" @click="reloadPage()" class="btn btn-sm btn-warning text-white"
                            :disabled="isLoading"> <template x-if="isLoading">
                                <span class="loading loading-spinner loading-xs"></span>
                            </template>
                            <span x-text="isLoading ? '' : 'Batal'"></span></button>
                        <button type="submit" class="btn btn-sm btn-primary ms-1.5">Simpan</button>
                    </div>
                </div>
        </form>
    </div>
</div>
<x-modals.loss-time-input-modal />
