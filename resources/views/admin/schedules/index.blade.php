
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mr-12">
                {{ __('Agenda de Aulas') }}
            </h2>
            <!-- Filter Teacher Schedules Search -->
            <select id="small" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Selecione um Professor</option>
                <option value="Margaux de Pinho">Margaux de Pinho</option>
                <option value="Professor Teste 1">Professor Teste 1</option>
                <option value="Professor Teste 2">Professor Teste 2</option>
                <option value="Professor Teste 3">Professor Teste 3</option>
              </select>
        </div>
    </x-slot>
  

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="container">
                        <div id='calendar'></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>