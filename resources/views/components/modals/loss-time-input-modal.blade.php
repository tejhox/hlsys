<div x-data="{
    showLossTimeDetailModal: false,
    formActive: false,
    mainId: null,
    lossTimeId: null,
    loss_time: null,
    factor: 'Man',
    loss_time_detail: null,
    note: null,
    details: [],

    getTotalLossTime() {
        const total = this.details.reduce((total, item) => total + Number(item.loss_time_detail || 0), 0);
        return total + `'`;
    },

    getLossTimeDetail() {
        console.log(this.mainId);
        fetch(`/loss-time-details?main_id=${this.mainId}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            })
            .then(res => res.json())
            .then(data => {
                console.log('Berhasil:', data.lossTimeDetails);
                this.details = data.lossTimeDetails;
            })
            .catch(error => {
                console.error('Gagal:', error);
            });
    },

    submitOrUpdateLossTimeDetail() {
        console.log(this.lossTimeId);

        let payload = {
            main_id: this.mainId,
            factor: this.factor,
            loss_time_detail: this.loss_time_detail,
            note: this.note
        };

        if (this.lossTimeId !== null && this.lossTimeId !== undefined) {
            payload.loss_time_id = this.lossTimeId;
        }

        fetch('{{ route('loss-time-detail.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(payload)
            })
            .then(res => res.json())
            .then(data => {
                console.log('Berhasil:', data.detail);
                this.details.push(data.detail);

                this.formActive = false;
                this.loss_time_detail = null;
                this.note = null;

                this.getLossTimeDetail();

            })
            .catch(error => {
                console.error('Gagal:', error);
            });
    },

    deleteLossTimeDetail(id) {
        fetch(`/loss-time-details/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(res => res.json())
            .then(data => {
                this.details = this.details.filter(d => d.id !== id);
                this.formActive = false;
                this.getLossTimeDetail();
            })
            .catch(err => console.error('Gagal hapus:', err));
    },

    resetModal() {
        this.loss_time_detail = null;
        this.note = null;
    },

}" x-effect="if (showLossTimeDetailModal) getLossTimeDetail()" x-show="showLossTimeDetailModal"
    x-cloak
    @open-loss-time-input-modal.window="
    showLossTimeDetailModal = true; 
    mainId = $event.detail.mainId;
    loss_time = $event.detail.loss_time"
    class="modal
    modal-open">

    <div class="modal-box max-w-80 bg-white">
        <div class="flex justify-between">
            <p class="text-sm font-semibold text-slate-800">Loss Time :</p>
            <p class="text-sm font-semibold text-red-500" x-text=`${loss_time}'`></p>
        </div>

        <hr class="mb-2  border-slate-300" />

        <div x-show="!formActive">
            <div class="max-h-64 overflow-auto border border-slate-300 text-black rounded-md">
                <table class="table table-xs ">
                    <thead>
                        <tr class="text-center text-slate-800 text-xs bg-gray-300">
                            <th class="border">No</th>
                            <th class="border">Faktor</th>
                            <th class="border font-bold">Keterangan</th>
                            <th class="border "><i class="fa-regular fa-clock"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-if="details.length > 0">
                            <template x-for="(detail, index) in details" :key="detail.id + '-' + index">
                                <tr @click="
                                    lossTimeId = detail.id;
                                    factor = detail.factor; 
                                    loss_time_detail = detail.loss_time_detail;
                                    note = detail.note;
                                    formActive = true"
                                    class="text-xs text-slate-900 hover:bg-slate-100 cursor-pointer">
                                    <td class="border text-center" x-text="index + 1"></td>
                                    <td class="border" x-text="detail.factor"></td>
                                    <td class="border text-left" x-text="detail.note"></td>
                                    <td class="border text-red-500 text-center" x-text="detail.loss_time_detail + '\''">
                                    </td>
                                </tr>
                            </template>
                        </template>
                        <tr x-show="details.length === 0">
                            <td colspan="4" class="text-center text-gray-500 italic py-4">
                                ----- Tidak ada loss time -----
                            </td>
                        </tr>

                        <tr>
                            <td class="border-t"></td>
                            <td class="border-t"></td>
                            <td class="text-center border-t">Total</td>
                            <td class="text-center text-red-500 border" x-text="getTotalLossTime()"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <form @submit.prevent="submitOrUpdateLossTimeDetail">

            <input type="hidden" name="main_id" :value="mainId ? mainId : null" />
            <input type="hidden" name="loss_time_id" :value="lossTimeId ? lossTimeId : null" />

            <div x-show="formActive">
                <div class="space-y-2">
                    <div class="flex space-x-1">
                        <div class="flex flex-col w-2/3">
                            <label for="factor" class="text-slate-800 text-sm">Faktor</label>
                            <select id="factor" name="factor" x-model="factor"
                                class="select select-sm text-sm text-slate-800 bg-white border-slate-400">
                                <option value="Man">Man</option>
                                <option value="Method">Method</option>
                                <option value="Machine">Machine</option>
                                <option value="Material">Material</option>
                            </select>
                        </div>
                        <div class="flex flex-col w-1/3">
                            <label for="loss_time_detail" class="text-slate-800 text-sm">Loss Time</label>
                            <input type="number" id="loss_time_detail" name="loss_time_detail"
                                x-model="loss_time_detail"
                                class="input input-sm text-sm text-slate-800 bg-white border-slate-400" />
                        </div>
                    </div>
                    <div>
                        <label for="note" class="text-slate-800 text-sm">Keterangan</label>
                        <textarea id="note" name="note" x-model="note" placeholder="Isi keterangan"
                            class="textarea text-slate-800 bg-white border-slate-400"></textarea>
                    </div>
                </div>
            </div>
            <button x-show="!formActive" x-cloak type="button" @click="lossTimeId = null; formActive = true"
                class="btn btn-sm btn-outline btn-primary w-full mt-1"><i class="fa-solid fa-plus"></i> Tambah</button>
            <hr class="my-2 border-slate-300" />
            <div class="flex justify-between">
                <div class="flex">
                    <button type="button"
                        @click="formActive ? formActive = false : showLossTimeDetailModal = false; 
                        resetModal(); 
                        $dispatch('btn-status', { status: false })"
                        class="btn
                        btn-sm btn-outline btn-neutral"><i
                            class="fa-solid fa-arrow-left"></i>
                    </button>
                    <button x-show="formActive && (lossTimeId !== null && lossTimeId !== undefined)" type="button"
                        @click="deleteLossTimeDetail(lossTimeId)"
                        class="btn btn-sm btn-outline btn-error shadow-md rounded-md text-sm ms-1">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
                <button x-show = "formActive" x-cloak type="submit"
                    class="btn btn-sm
                    btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
