@props(['step'])
<div {{ $attributes->merge(['class' => 'flex items-center justify-around max-w-6xl px-2 py-2 mx-auto md:px-8 bg-pizza-brown']) }}>
    @php
        $step_class = [];
        for ($i=0; $i < 5; $i++) {
            $step_class[] = (intval($step) == $i+1) ? 'text-black md:text-xl border-b-2 border-black shadow-md' : 'text-gray-50/75';
        };
    @endphp
    <div class="flex flex-wrap items-center justify-center {{ $step_class[0] }}">
        <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none">
            <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 6V12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.24 16.24L12 12" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span class="ml-1 text-xs font-bold sm:text-base">選擇時間</span>
    </div>

    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="#fff">
        <path d="M9.71069 18.2929C10.1012 18.6834 10.7344 18.6834 11.1249 18.2929L16.0123 13.4006C16.7927 12.6195 16.7924 11.3537 16.0117 10.5729L11.1213 5.68254C10.7308 5.29202 10.0976 5.29202 9.70708 5.68254C9.31655 6.07307 9.31655 6.70623 9.70708 7.09676L13.8927 11.2824C14.2833 11.6729 14.2833 12.3061 13.8927 12.6966L9.71069 16.8787C9.32016 17.2692 9.32016 17.9023 9.71069 18.2929Z" fill="#000"/>
    </svg>

    <div class="flex flex-wrap items-center justify-center {{ $step_class[1] }}">
        <svg fill="" width="25px" height="25px" viewBox="-3 0 19 19">
            <path d="M11.816 3.746a.55.55 0 0 1-.193-.035 14.657 14.657 0 0 0-10.246-.005.554.554 0 0 1-.386-1.04 15.767 15.767 0 0 1 11.018.006.554.554 0 0 1-.193 1.074zm-.446.922s-.311-.12-.697-.243a13.82 13.82 0 0 0-8.202-.05c-.43.132-.84.29-.84.29a.463.463 0 0 0-.262.61l4.943 11.95c.1.241.263.241.363 0L11.631 5.28a.464.464 0 0 0-.26-.61zM2.85 6.372a1.425 1.425 0 1 1 1.425 1.425A1.425 1.425 0 0 1 2.85 6.372zm3.662 6.971a1.425 1.425 0 1 1 1.425-1.425 1.425 1.425 0 0 1-1.425 1.425zM8.17 9.388a1.425 1.425 0 1 1 1.425-1.425A1.425 1.425 0 0 1 8.17 9.388z"/>
        </svg>
        <span class="ml-1 text-xs font-bold sm:text-base">訂購餐點</span>
    </div>

    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="#fff">
        <path d="M9.71069 18.2929C10.1012 18.6834 10.7344 18.6834 11.1249 18.2929L16.0123 13.4006C16.7927 12.6195 16.7924 11.3537 16.0117 10.5729L11.1213 5.68254C10.7308 5.29202 10.0976 5.29202 9.70708 5.68254C9.31655 6.07307 9.31655 6.70623 9.70708 7.09676L13.8927 11.2824C14.2833 11.6729 14.2833 12.3061 13.8927 12.6966L9.71069 16.8787C9.32016 17.2692 9.32016 17.9023 9.71069 18.2929Z" fill="#000"/>
    </svg>

    <div class="flex flex-wrap items-center justify-center {{ $step_class[2] }}">
        <svg width="25px" height="25px" viewBox="0 0 24 24" fill=""><path d="M10 11L3 11" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
            <path d="M10 16H3" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/><path d="M14 13.5L16.1 16L20 11" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M3 6L13.5 6M20 6L17.75 6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
        </svg>

        <span class="ml-1 text-xs font-bold sm:text-base">確認餐點</span>
    </div>

    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="#fff">
        <path d="M9.71069 18.2929C10.1012 18.6834 10.7344 18.6834 11.1249 18.2929L16.0123 13.4006C16.7927 12.6195 16.7924 11.3537 16.0117 10.5729L11.1213 5.68254C10.7308 5.29202 10.0976 5.29202 9.70708 5.68254C9.31655 6.07307 9.31655 6.70623 9.70708 7.09676L13.8927 11.2824C14.2833 11.6729 14.2833 12.3061 13.8927 12.6966L9.71069 16.8787C9.32016 17.2692 9.32016 17.9023 9.71069 18.2929Z" fill="#000"/>
    </svg>

    <div class="flex flex-wrap items-center justify-center {{ $step_class[3] }}">
        <svg width="25px" height="25px" viewBox="0 0 64 64" stroke-width="3" stroke="#000000" fill="none">
            <path d="M55.5,23.9V53.5a2,2,0,0,1-2,2h-43a2,2,0,0,1-2-2v-43a2,2,0,0,1,2-2H41.64"/><path d="M19.48,38.77l-.64,5.59a.84.84,0,0,0,.92.93l5.56-.64a.87.87,0,0,0,.5-.24L54.9,15.22a1.66,1.66,0,0,0,0-2.35L51.15,9.1a1.67,1.67,0,0,0-2.36,0L19.71,38.28A.83.83,0,0,0,19.48,38.77Z"/><line x1="44.87" y1="13.04" x2="50.9" y2="19.24"/>
        </svg>
        <span class="ml-1 text-xs font-bold sm:text-base">填寫資料</span>
    </div>

    <svg width="20px" height="20px" viewBox="0 0 24 24" fill="#fff">
        <path d="M9.71069 18.2929C10.1012 18.6834 10.7344 18.6834 11.1249 18.2929L16.0123 13.4006C16.7927 12.6195 16.7924 11.3537 16.0117 10.5729L11.1213 5.68254C10.7308 5.29202 10.0976 5.29202 9.70708 5.68254C9.31655 6.07307 9.31655 6.70623 9.70708 7.09676L13.8927 11.2824C14.2833 11.6729 14.2833 12.3061 13.8927 12.6966L9.71069 16.8787C9.32016 17.2692 9.32016 17.9023 9.71069 18.2929Z" fill="#000"/>
    </svg>

    <div class="flex flex-wrap items-center justify-center {{ $step_class[4] }}">
        <svg width="25px" height="25px" viewBox="0 0 25 25" fill="none">
            <path d="M15.9957 11.5C14.8197 10.912 11.9957 9 10.4957 9C8.9957 9 5.17825 11.7674 6 13C7 14.5 9.15134 11.7256 10.4957 12C11.8401 12.2744 13 13.5 13 14.5C13 15.5 11.8401 16.939 10.4957 16.5C9.15134 16.061 8.58665 14.3415 7.4957 14C6.21272 13.5984 5.05843 14.6168 5.5 15.5C5.94157 16.3832 7.10688 17.6006 8.4957 19C9.74229 20.2561 11.9957 21.5 14.9957 20C17.9957 18.5 18.5 16.2498 18.5 13C18.5 11.5 13.7332 5.36875 11.9957 4.5C10.9957 4 10 5 10.9957 6.5C11.614 7.43149 13.5 9.27705 14 10.3751M15.5 8C15.5 8 15.3707 7.5 14.9957 6C14.4957 4 15.9957 3.5 16.4957 4.5C17.1281 5.76491 18.2872 10.9147 18.4957 13" stroke="#121923" stroke-width="1.2"/>
        </svg>
        <span class="ml-1 text-xs font-bold sm:text-base">訂餐完成</span>
    </div>
</div>
