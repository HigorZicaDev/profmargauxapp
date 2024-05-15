<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Vendas') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="mb-6 text-xl font-medium">Editar Venda:</h1>
                    <form action="{{route('sales.store')}}" method="POST">
                        @csrf()
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="txt-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                                <input type="text" name="title" id="title" value="{{$sale->title}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Por favor digite tipo de Pacote" required>
                            </div>
                            <div class="w-full">
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Venda do Aluno</label>
                                <select id="student_id" name="student_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required >
                                    <option value="{{$sale->student_id}}">Aluno : {{$student_math->name}}</option>
                                    @foreach ($students as $student)
                                        <option value="{{$student->id}}">{{$student->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full">
                                <label for="txt-price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Preço</label>
                                <input type="text" name="price" id="price" value="{{$sale->price}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ex: R$ 250,00" required="">
                            </div>
                            <div>
                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Moeda</label>
                                <select id="currency" name="currency" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required >
                                    <option value="{{$sale->currency}}">Selecionado: {{$sale->currency}}</option>
                                    <option value="EURO">EURO</option>
                                    <option value="REAL">REAL</option>
                                </select>
                            </div>
                            <div>
                                <label for="txt-dt-payment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de Pagamento:</label>
                                <input type="date" name="payday" id="payday" value="{{$sale->payday}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="01/01/2000" required="">
                            </div> 
                        </div>
                        <br>
                        <div class="flex justify-end">
                            <button type="submit" class="text-white inline-flex items-center bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                Salvar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>