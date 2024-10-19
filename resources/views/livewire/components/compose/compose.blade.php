<form x-data="{
                body: $wire.entangle('form.body'),
                radius: 30,
                maxLength: 280,
                get percentage() {
                    return Math.round((this.body.length * 100) / this.maxLength);
                },
                get displayPercentage() {
                    return this.percentage <= 100 ? this.percentage : 100;
                },
                get dash() {
                    return 2 * Math.PI * this.radius;
                },
                get offset() {
                    let circ = this.dash;
                    let progress = this.displayPercentage / 100;
                    return circ * (1 - progress);
                },
                get percentageIsOver() {
                    return this.percentage > 100;
                },
                resetForm() {
                    this.body = '';
                },
                tweet() {
                    this.$wire.tweet().then(() => {
                        this.resetForm();
                    });
                }
            }"
      @submit.prevent="tweet()"
      class="border-b border-t border-gray-200 dark:border-dim-200 pb-4 border-l border-r">
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
                x-model="body"
                placeholder="What's happening?"
                class="dark:text-white min-h-[64px] ring-0 focus:ring-0 text-gray-900 placeholder-gray-400 w-full h-10 bg-transparent border-0 focus:outline-none resize-none"></textarea>
            @error('form.body')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="w-full flex items-top p-2 text-white pl-14">
        <div class="flex-grow flex justify-between">
        </div>
        <div class="w-10 h-10 relative" x-show="body.length > 0">
            <svg class="transform -rotate-90" viewBox="0 0 120 120">
                <circle cx="60"
                        cy="60"
                        fill="none"
                        stroke-width="8"
                        class="stroke-current text-gray-700"
                        :r="radius"/>
                <circle :r="radius"
                        cx="60"
                        cy="60"
                        fill="none"
                        stroke-width="8"
                        class="stroke-current"
                        :class="percentage > 100 ? 'text-red-500' : 'text-blue-400'"
                        :stroke-dasharray="dash"
                        :stroke-dashoffset="offset"/>
            </svg>
        </div>
        <button
            type="submit"
            href="#"
            class="bg-blue-400 hover:bg-blue-500 text-white rounded-full py-1 px-4 ml-auto mr-1"
        >
            <span class="font-bold text-sm">Tweet</span>
        </button>
    </div>
</form>
