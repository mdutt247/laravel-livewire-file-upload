<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Upload
    </h2>
</x-slot>

<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
         aria-modal="true" aria-labelledby="headline">
        <form>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                            <br>
                            <p class="text-sm">{{ session('files') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="mb-4">
                    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <div class="flex">
                            <label for="photos" class="block text-gray-700 text-sm font-bold mb-2">Select Images:</label>
                            <div class="px-2" wire:loading wire:target="photos">
                                Uploading...</div>
                            {{-- <div x-show="isUploading" class="px-2">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div> --}}
                        </div>
                        <input type="file" multiple name="photos" id="photos"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            wire:model="photos">
                        @error('photos') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <button wire:click.prevent="store()" type="button"
                        class="inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Upload
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
