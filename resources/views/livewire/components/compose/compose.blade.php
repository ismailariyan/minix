<form class="border-b border-t border-gray-200 dark:border-dim-200 pb-4 border-l border-r">
    <div class="flex flex-shrink-0 pb-4 p-4">
        <div class="flex flex-shrink-0 p-4 pb-0">
            <img src="{{ auth()->user()->profile_photo_url }}"
                 class="inline-block h-10 w-10 rounded-full"
                 alt="Your profile picture">
        </div>
        <div class="w-full p-2">
            <label class="sr-only" for="main-compose">Tweet Body</label>
            <textarea
                x-auto-resize
                id="main-compose"
                placeholder="Start a new tweet..."
                class="dark:text-white min-h-[64px] ring-0 focus:ring-0 text-gray-900 placeholder-gray-400 w-full h-10 bg-transparent border-0 focus:outline-none resize-none"></textarea>
        </div>
    </div>
    <div class="w-full flex items-top p-2 text-white pl-14">
        
        <button
            type="submit"
            href="#"
            class="bg-blue-400 hover:bg-blue-500 text-white rounded-full py-1 px-4 ml-auto mr-1"
        >
            <span class="font-bold text-sm">Tweet</span>
        </button>
    </div>
</form>
