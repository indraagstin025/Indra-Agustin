
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Student') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <x-success-status class="mb-4" :status="session('message')" />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"/>
            <div class="py-4 px-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                
    @csrf
    @method('PUT')
   
   
    
    <div>
        <x-input-label for="name" :value="__('Student Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" 
        value="{{ $student->name }}" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="email" :value="__('Student Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
         value="{{ $student->email }}" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="phone" :value="__('Student Phone')" />
        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" 
        value="{{ $student->phone }}" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>

    <div>
        <x-primary-button class="ms-3">
            {{ __('Update Data') }}
        </x-primary-button>
    </div>
</form>

            </div>
        </div>
    </div>
</x-app-layout>
