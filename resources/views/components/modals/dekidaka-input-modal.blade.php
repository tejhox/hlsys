<div x-data="{
    showInputModal: false,
    btnStatus: true,
    error: false,
    headerId: null,
    mainId: null,
    shift: '1',
    cycle_time: null,
    hour: null,
    plan: null,
    actual: null,

    get deviation() {
        return (this.actual ?? 0) - (this.plan ?? 0);
    },

    get loss_time() {
        return Math.round((this.plan - this.actual) * this.cycle_time);
    },

    submitDekidakaMain() {
        fetch('{{ route('dekidaka-main.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    dekidaka_header_id: this.headerId,
                    hour: this.hour,
                    plan: this.plan,
                    actual: this.actual,
                    deviation: this.deviation,
                    loss_time: this.loss_time,
                })
            })
            .then(res => res.json())
            .then(data => {
                console.log('Berhasil:', data);
                this.showInputModal = false;
                location.reload();
            })

            .catch(error => {
                console.error('Gagal:', error);
            });
    },

    submitAndOpenModal() {
        fetch('{{ route('dekidaka-main.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    dekidaka_header_id: this.headerId,
                    hour: this.hour,
                    plan: this.plan,
                    actual: this.actual,
                    deviation: this.deviation,
                    loss_time: this.loss_time,
                })
            })
            .then(res => res.json())
            .then(data => {
                console.log('Berhasil:', data);
                if (data?.main?.id) {

                    this.mainId = data.main.id;

                    setTimeout(() => {
                        window.dispatchEvent(new CustomEvent('open-loss-time-input-modal', {
                            detail: {
                                loss_time: this.loss_time,
                                mainId: this.mainId,
                            }
                        }));
                    }, 200);

                }
            })
            .catch(error => {
                console.error('Gagal menyimpan Main:', error);
            });
    },

    reloadPage() {
        location.reload()
    }


}" x-init="hour = shift === '1' ? '08.00 - 09.00' : '20.00 - 21.00'" x-show="showInputModal" x-cloak
    @btn-status.window="btnStatus = $event.detail.status"
    @open-dekidaka-input-modal.window="
    headerId = $event.detail.id; 
    shift = $event.detail.shift; 
    cycle_time = $event.detail.cycle_time; 
    showInputModal = true;"
    class="modal modal-open">


    <div class="modal-box max-w-80 bg-white">

        <form @submit.prevent="submitDekidakaMain">

            <input type="hidden" name="dekidaka_header_id" :value="headerId">

            <div class="space-y-1">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-slate-800 font-semibold">Tambah Data</p>
                    </div>
                    <template x-if="shift === '1'">
                        <select name="hour" x-model="hour"
                            class="select select-sm bg-white border-slate-300 text-slate-800 w-32 text-xs">
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
                        <select name="hour" x-model="hour"
                            class="select select-sm bg-white border-slate-300 text-slate-800 w-32 text-xs">
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
                    <label for="plan" class="text-slate-800 text-sm">Plan</label>
                    <input type="number" id="plan" name="plan" max="55" x-model="plan"
                        class="input input-sm bg-white border-slate-300 text-slate-800 w-full" required />
                </div>

                <div class="flex flex-col">
                    <label for="actual" class="text-slate-800 text-sm">Aktual</label>
                    <input type="number" id="actual" name="actual" max="55" x-model="actual"
                        class="input input-sm bg-white border-slate-300 text-slate-800 w-full" required />
                </div>

                <div class="flex flex-col">
                    <label for="deviation" class="text-slate-800 text-sm">Deviasi</label>
                    <input type="number" id="deviation" name="deviation" :value="deviation"
                        class="input input-sm bg-white border-slate-300 text-slate-800 w-full" readonly />
                </div>

                <div class="flex flex-col">
                    <label for="loss_time" class="text-slate-800 text-sm">Loss Time</label>
                    <input type="number" id="loss_time" name="loss_time" :value="loss_time"
                        class="input input-sm bg-white border-slate-300 text-slate-800" readonly />
                </div>
            </div>

            <hr class="my-2 border-slate-300" />
            <div :class="btnStatus ? 'flex justify-between' : 'flex justify-end'">
                <button type="button" @click="reloadPage()" class="btn btn-sm text-white"
                    :class="loss_time > 0 ? 'btn-accent' : 'btn-warning'" x-text="loss_time > 0 ? 'OK' : 'Batal'">
                </button>
                <button x-show="loss_time === 0" type="submit" class="btn btn-sm btn-primary">
                    Simpan
                </button>
                <button x-show="loss_time > 0 && btnStatus" x-cloak type="button" @click="submitAndOpenModal"
                    class="btn btn-sm btn-outline btn-secondary">
                    Isi Ket. Loss Time
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
        </form>
    </div>
</div>
<x-modals.loss-time-input-modal />
