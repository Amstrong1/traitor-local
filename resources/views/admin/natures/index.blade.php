<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-lg my-2">Liste des natures</h1>

                        <a href="{{ route('admin.natures.create') }}">

                            <button
                                type="button"
                                class="inline-block rounded border-2 border-success px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-success transition duration-150 ease-in-out hover:border-success-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-success-600 focus:border-success-600 focus:text-success-600 focus:outline-none focus:ring-0 active:border-success-700 active:text-success-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                data-te-ripple-init>
                                Ajouter une nature
                            </button>
                        </a>
                    </div>

                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                          <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                              <table class="min-w-full text-left text-sm font-light">
                                <thead
                                  class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                                  <tr>
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">Nom</th>
                                    <th scope="col" class="px-6 py-4">Action</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($natures as $item) 
                                        
                                    <tr
                                      class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                                      <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->id }}</td>
                                      <td class="whitespace-nowrap px-6 py-4">{{ $item->name }}</td>
                                      <td class="whitespace-nowrap px-6 py-4 flex">

                                        <a href="{{ route('admin.natures.edit', $item->id) }}">

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="color: blue;">
                                              <path stroke-linecap="round" stroke-linejoin="round" 
                                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0
                                               011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 
                                               6H10" />
                                            </svg>
                                        </a>
                                        

                                        <form action="{{ route('admin.natures.destroy', $item->id) }}" method="post" class="mx-2"
                                          onsubmit="event.preventDefault(); deleteConfirmation(this);">
                                            
                                            @csrf
                                            @method('delete')
                                            <button 
                                            type="submit"
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="color: rgb(249, 11, 15);">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 
                                                01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 
                                                0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                              </svg>
                                            </button>
                                        </form>
                                        
                                        
                                        </td>
                                      
                                    </tr>
                                    @endforeach
                                 
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>