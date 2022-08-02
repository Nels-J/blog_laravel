<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a new post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden mb-2 shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

                    <form method="POST" action="{{ route('poststore') }}">
                        @csrf

                        <!-- Post title -->
                        <div>
                            <x-label for="title" :value="__('Title')"/>

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                                     :value="old('title')"
                                     required
                                     autofocus/>
                        </div>

                        <!-- Post content -->
                        <div>
                            <x-label for="content" :value="__('Content')"/>

                            <x-input id="content" class="block mt-1 w-full" type="text" name="content"
                                     :value="old('content')"
                                     required/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Publish') }}
                            </x-button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

