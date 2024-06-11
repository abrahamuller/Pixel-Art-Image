<div class="bg-white sm:bg-white md:bg-gray-100 h-screen overflow-y-auto">
    <div class="p-0 sm:p-0 md:p-5">
        <div class="w-full sm:w-full md:w-full 2xl:w-full h-fit border-none sm:border-none md:border border-gray-100 shadow-none sm:shadow-none md:shadow-sm rounded bg-white p-4 sm:p-4 md:p-8">
            <div class="gap-2 pb-5">
                <div>
                    <p class="text-md sm:text-md md:text-2xl 2xl:text-3xl font-medium text-gray-600">Pixel Art.</p>
                </div>
                <div>
                    <div x-data="{ open: false }">
                        <div>
                            <p x-ref="button" @click="open = ! open" class="inline-flex justify-center gap-2 border border-slate-200 rounded-md py-2 px-3 text-center shadow-sm focus:outline-none text-xs font-semibold text-gray-600 cursor-pointer w-fit"><i class="fa-regular fa-user h-3"></i> New Pixel art</p>                               
                        </div>
                        <div class="pt-2 w-fit sm:w-fit md:w-64" x-show="open" x-cloak @click.away="open = false" x-transition x-anchor.bottom-start="$refs.button">
                            <div class="border border-gray-200 rounded-xl shadow-sm bg-white p-3">
                                <div class="flex justify-between gap-2">
                                    <p class="text-md sm:text-md md:text-sm font-medium text-gray-500">Pixel Art.</p>
                                </div>
                                <div class="pt-2">
                                    <div class="flex justify-between gap-2">
                                        <div>
                                            <img class="mx-auto h-16" src="{{ asset('images/congratss.gif')}}">
                                        </div>
                                    </div>
                                    <div>
                                        @if (session()->has('errors'))
                                            <div class="py-1">
                                                <div class="rounded-md px-5 py-2 text-gray-700  text-md sm:text-md md:text-sm font-semibold shadow-sm bg-red-100 text-center cursor-pointer w-full">
                                                    {{ session('errors') }}
                                                </div>
                                            </div>
                                        @enderror
                                        <form wire:submit="convertToAscii">
                                            <div class="py-1">
                                                <p class="text-md sm:text-md md:text-sm font-medium text-gray-500 pb-1">Select the Image</p>
                                                <input wire:model="imageInput" type="file" class="block w-full py-1 px-4 text-sm font-medium bg-transparent bg-opacity-80 text-gray-600 placeholder:text-[#A0A0A0] border border-gray-200 rounded focus:ring-gray-300 focus:border-gray-300 focus:outline focus:outline-gray-300" required>
                                                @error('email')<span class="text-xs font-semibold text-red-600">{{ $message }} </span>@enderror
                                            </div>                             
                                            <div class="pt-2">
                                                <button wire:target="convertToAscii" wire:loading.class="animate-pulse" class="w-full h-8 relative px-2 text-md sm:text-md md:text-sm font-sans text-white rounded bg-[#52B2B2] outline-none flex justify-center items-center gap-2">
                                                    <span class="py-[1px]">Generate Art</span> 
                                                    <div class="absolute top-2 right-2">
                                                        <div wire:target="convertToAscii" wire:loading style="color: #ffffff" class="la-line-spin-clockwise-fade la-dark la-sm">
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </button> 
                                            </div>     
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="mt-4 p-2 overflow-auto flex justify-center">
                    <pre class="text-xsss sixo font-bold text-gray-700">{{ $asciiOutput }}</pre>
                </div>
            </div>
        </div>
    </div>
</div>
