@if ($errors->any())
    <div id="alertaErrors"
        class="relative bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md shadow-md animate-fade-in dark:bg-red-700 dark:text-white dark:border-red-300">
        <div class="flex items-start justify-between">
            <div class="flex gap-2">
                <svg class="w-6 h-6 flex-shrink-0 mt-1 text-red-500 dark:text-white" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10A8 8 0 11 2 10a8 8 0 0116 0zm-9-4a1 1 0 112 0v4a1 1 0 11-2 0V6zm1 8a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                        clip-rule="evenodd" />
                </svg>
                <ul class="space-y-1">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm font-medium">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button id="btnTancarAlerta"
                class="ml-4 text-red-700 hover:text-red-900 dark:text-white dark:hover:text-gray-300">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
@endif
