<div
    class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
    <div class="max-w-full overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-2 text-left dark:bg-meta-4">
                    @foreach ($mattributes as $column => $title)
                        <th class="py-4 px-4 font-medium text-black">
                            {{ $title }}
                        </th>
                    @endforeach
                    @isset($mactions)
                        <th class="px-4 py-3 text-center">Action(s)</th>
                    @endisset
                </tr>
            </thead>
            <tbody>
                @if (count($resources) > 0)
                    @foreach ($resources as $resource)
                        <tr>
                            @foreach ($mattributes as $column => $title)
                                <td class="border-t border-[#eee] py-5 px-4 dark:border-strokedark">
                                    @if ($column == 'avatar' || $column == 'image' || $column == 'photo' || $column == 'logo')
                                        <a class="flex items-center justify-center text-sm hover:opacity-80">
                                            <!-- Avatar OR Image with inset shadow -->
                                            <div class="relative hidden h-12 w-12 mr-3 md:block">

                                                <div data-te-lightbox-init
                                                    class="flex flex-col space-y-5 lg:flex-row lg:space-x-5 lg:space-y-0">
                                                    <div class="h-full w-full">
                                                        <img src="{{ $resource->{$column} !== null
                                                            ? url('storage/' . $resource->{$column})
                                                            : 'https://ui-avatars.com/api/?background=random&name=' . $resource->name }}"
                                                            data-te-img="{{ $resource->{$column} !== null
                                                                ? url('storage/' . $resource->{$column})
                                                                : 'https://ui-avatars.com/api/?background=random&name=' . $resource->name }}"
                                                            alt="{{ $resource->name }}" loading="lazy"
                                                            class="object-cover w-auto h-14 rounded-lg cursor-zoom-in data-[te-lightbox-disabled]:cursor-auto" />
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @elseif ($column == 'status')
                                        <p @class([
                                            'inline-flex rounded-full bg-success bg-opacity-10 py-1 px-3 text-sm font-medium text-success' =>
                                                $resource->$column == 'allowed',
                                            'inline-flex rounded-full bg-danger bg-opacity-10 py-1 px-3 text-sm font-medium text-danger' =>
                                                $resource->$column == 'denied',
                                            'inline-flex rounded-full bg-warning bg-opacity-10 py-1 px-3 text-sm font-medium text-warning' =>
                                                $resource->$column == 'pending',
                                        ])>
                                            @if ($resource->$column == 'pending')
                                                En cours
                                            @elseif ($resource->$column == 'allowed')
                                                Autorisé
                                            @else
                                                Refusé
                                            @endif
                                        </p>
                                    @else
                                        @if (is_object($resource->{$column}))
                                            {{ $resource->{$column}->company ?? $resource->{$column}->name }}
                                        @elseif (is_string($resource->{$column}) && mb_strlen($resource->{$column}) > 100)
                                            {{ Str::of($resource->{$column})->limit(100, '(...)') }}
                                        @elseif (is_array($resource->{$column}))
                                            @for ($i = 0; $i < sizeof($resource->{$column}); $i++)
                                                {{ $resource->{$column}[$i] }} <br>
                                            @endfor
                                        @else
                                            {{ $resource->$column }}
                                        @endif
                                    @endif
                                </td>
                            @endforeach
                            @isset($mactions)
                                <td class="border-t border-[#eee] py-5 px-4 dark:border-strokedark">
                                    <div class="flex items-center justify-center space-x-4 text-sm">
                                        @foreach ($mactions as $action => $title)
                                            @if ($action == 'show')
                                                <a href="{{ route(Str::plural($type) . '.show', [$resource->id]) }}"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                                    <button class="hover:text-primary">
                                                        <svg class="fill-current" width="18" height="18"
                                                            viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                                                fill="" />
                                                            <path
                                                                d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                                                fill="" />
                                                        </svg>
                                                    </button>
                                                </a>
                                            @elseif ($action == 'edit')
                                                <a href="{{ route(Str::plural($type) . '.edit', [$resource->id]) }}"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-main rounded-lg dark:text-main focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Edit">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            @elseif ($action == 'mail')
                                                <a href="{{ route(Str::plural($type) . '.mail.create', [$resource->id]) }}"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-main rounded-lg dark:text-main focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Mail">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                                    </svg>
                                                </a>
                                            @elseif ($action == 'delete')
                                                <form action="{{ route(Str::plural($type) . '.destroy', [$resource]) }}"
                                                    method="POST"
                                                    onsubmit="event.preventDefault(); deleteConfirmation(this)">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        class="hover:text-primary flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600  rounded-lg dark:text-red-600 focus:outline-none focus:shadow-outline-gray"
                                                        aria-label="Delete">
                                                        <svg class="fill-current" width="18" height="18"
                                                            viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z"
                                                                fill="" />
                                                            <path
                                                                d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z"
                                                                fill="" />
                                                            <path
                                                                d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z"
                                                                fill="" />
                                                            <path
                                                                d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z"
                                                                fill="" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                        @endforeach
                                    </div>
                                </td>
                            @endisset
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="{{ count((array) $mattributes) + 1 }}"
                            class="border-t border-[#eee] py-5 px-4 dark:border-strokedarkwhitespace-nowrap text-center text-gray-400">
                            Aucun Element </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
