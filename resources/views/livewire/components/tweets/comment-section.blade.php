<div class="mt-4">
    <!-- Comment Input Section -->
    <div class="flex items-center mb-4 space-x-2">
        <input 
            type="text" 
            class="w-3/4 px-4 py-2 rounded-full border focus:outline-none
                   bg-gray-800 text-white placeholder-gray-400
                   focus:bg-gray-700 focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out"
            placeholder="Tweet your reply..."
            wire:model="commentBody"
        />
        <button 
            type="submit"
            wire:click="postComment"
            class="bg-blue-400 hover:bg-blue-500 text-white rounded-full py-2 px-5 transition duration-150 ease-in-out"
        >
            <span class="font-bold text-sm">Reply</span>
        </button>
    </div>

    <!-- List of Comments -->
    <div class="divide-y divide-gray-600">
        @foreach ($comments as $comment)
            <div class="flex p-3">
                <a class="flex-shrink-0 group block" href="#">
                    <div class="flex items-start">
                        <!-- User Profile Picture -->
                        <div>
                            <img
                                class="inline-block h-8 w-8 rounded-full"
                                src="{{ $comment->user->profile_photo_url }}"
                                alt="Photo of {{ $comment->user->name }}"
                            />
                        </div>
                        <!-- Comment Content -->
                        <div class="ml-3">
                            <p class="flex items-center text-sm font-medium text-gray-200">
                                {{ $comment->user->name }}
                                <span
                                    class="ml-1 text-xs font-medium text-gray-400 group-hover:text-gray-300 transition ease-in-out duration-150"
                                >
                                    {{ '@' . $comment->user->username }} ・ {{ $comment->created_at->diffForHumans() }}
                                </span>
                            </p>
                            <p class="text-gray-300 text-sm">{{ $comment->body }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
