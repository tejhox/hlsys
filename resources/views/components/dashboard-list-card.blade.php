<div x-data="{
    btnSelected: 'ER 01'
}"
    class="sm:min-h-72 rounded-lg shadow-md bg-gradient-to-r from-blue-300 to-blue-700 sm:bg-none sm:bg-gray-100 p-1.5 sm:border">

    <h1 class="text-white text-center text-lg font-bold">PRODUCTION CONTROL LIST</h1>
    <hr class="mb-2 mt-1" />
    <div class="flex justify-end mb-2">
        <a href="{{ route('production.index') }}" class="btn btn-sm shadow font-bold sm:btn-md">Buat
            Laporan <i class="fa-solid fa-plus"></i></a>
    </div>
    <div
        class="flex rounded-lg text-sm shadow-md shadow-slate-700/50 py-1.5 px-2 space-x-1 mb-2 bg-gradient-to-r from-blue-400 to-blue-800">
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
        {{-- <p class="text-white font-semibold text-md">{{ $title }}</p> --}}
        {{-- <a href="#" class="btn btn-xs btn-info"><i class="fa-solid fa-chart-line"></i></a> --}}
    </div>
    <div>
        {{ $slot }}
    </div>
</div>
