<div x-data="{
    btnSelected: 'ER 01'
}"
    class="p-1.5 rounded-lg shadow-md bg-gradient-to-r from-blue-300 to-blue-700 sm:p-0 sm:min-h-[630px] sm:bg-gradient-to-br sm:from-white sm:to-slate-400 sm:border sm:text-2xl">
    <div class="hidden sm:block bg-gradient-to-r from-blue-500 to-blue-800 rounded-t-lg shadow-md shadow-slate-400">
        <h1 class="text-center font-extrabold text-white text-2xl py-2">
            PRODUCTION CONTROL LIST
        </h1>
    </div>
    <div class="sm:p-1.5 sm:mt-1">
        <h1 class="text-white text-center text-lg font-bold sm:text-slate-800 sm:text-2xl sm:hidden">PRODUCTION CONTROL
            LIST
        </h1>
        <hr class="mb-2 mt-1 sm:border-slate-300 sm:hidden" />
        <div class="flex justify-end mb-2 sm:hidden">
            <a href="{{ route('production.index') }}" class="btn btn-sm shadow font-bold sm:btn-md">Buat
                Laporan <i class="fa-solid fa-plus"></i></a>
        </div>

        <div class="mb-2 sm:p-1 sm:mb-0 sm:bg-white sm:rounded-lg">
            <div
                class="flex rounded-lg text-sm shadow-md shadow-slate-700/50 py-1 px-2 space-x-1 sm:mb-1 sm:py-2 sm:space-x-4 bg-gradient-to-r from-blue-400 to-blue-800 sm:bg-gradient-to-r sm:from-blue-600 sm:to-blue-800">
                <div @click="
                    btnSelected = 'ER 01';
                    window.dispatchEvent(new CustomEvent('btn-selected', { detail: btnSelected }));
                    "
                    :class="btnSelected === 'ER 01' ?
                        'flex-1 py-1 px-1 cursor-pointer text-white rounded-lg bg-gray-300/60 shadow' :
                        'flex-1 py-1 px-1 cursor-pointer hover:bg-gray-100/60 text-white rounded-lg'">
                    <p class="text-center font-semibold text-md">ER 01</p>
                </div>
                <div @click="
                    btnSelected = 'ER 02';
                    window.dispatchEvent(new CustomEvent('btn-selected', { detail: btnSelected }));
                    "
                    :class="btnSelected === 'ER 02' ?
                        'flex-1 py-1 px-1 cursor-pointer text-white rounded-lg bg-gray-300/60 shadow' :
                        'flex-1 py-1 px-1 cursor-pointer hover:bg-gray-100/60 text-white rounded-lg'">
                    <p class="text-center font-semibold text-md">ER 02</p>
                </div>
                <div @click="
                    btnSelected = 'ER 03';
                    window.dispatchEvent(new CustomEvent('btn-selected', { detail: btnSelected }));
                    "
                    :class="btnSelected === 'ER 03' ?
                        'flex-1 py-1 px-1 cursor-pointer text-white rounded-lg bg-gray-300/60 shadow' :
                        'flex-1 py-1 px-1 cursor-pointer hover:bg-gray-100/60 text-white rounded-lg'">
                    <p class="text-center font-semibold text-md">ER 03</p>
                </div>
                <div @click="
                    btnSelected = 'ER 150';
                    window.dispatchEvent(new CustomEvent('btn-selected', { detail: btnSelected }));
                    "
                    :class="btnSelected === 'ER 150' ?
                        'flex-1 py-1 px-1 cursor-pointer text-white rounded-lg bg-gray-300/60 shadow' :
                        'flex-1 py-1 px-1 cursor-pointer hover:bg-gray-100/60 text-white rounded-lg'">
                    <p class="text-center font-semibold text-md">ER 150</p>
                </div>
            </div>
        </div>
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
