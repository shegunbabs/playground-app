<!-- Static sidebar for desktop -->
@php
$bgColor = "bg-gradient-to-r from-slate-900 to-slate-800";
$linkClass = "hover:bg-slate-400 hover:text-white text-gray-400";
$iconClass = "group-hover:text-white text-gray-400";
$activeLink = "bg-slate-700 text-white";
$links = [
    [
        "title" => "Dashboard",
        "href" => "#",
    ],
    [
       "title" => "Projects",
       "href" => [
           ["title" => "EasyPay", "href" => "#"],
           ["title" => "Sanef", "href" => "#"],
           ["title" => "Merchants", "href" => "#"],
           ["title" => "Research", "href" => "#"],
        ]
    ]
];
@endphp
<div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r px-6 {{ $bgColor }}">
        <div class="flex h-16 shrink-0 items-center">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
        </div>
        <nav class="flex flex-1 flex-col">
            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                <li>
                    <ul role="list" class="-mx-2 space-y-1">
                        @foreach($links as $link)
                            <li>
                                @if(is_array($link["href"]))
                                    <div x-data="{  open: false }">
                                        <button @click="open = !open" type="button" class="{{ $linkClass }} group flex items-center w-full text-left rounded-md p-2 gap-x-3 text-sm leading-6 font-semibold" aria-controls="sub-menu-2" aria-expanded="false">
                                            <svg class="{{ $iconClass }}h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                            </svg>
                                            {{ $link["title"] }}
                                            <!-- Expanded: "rotate-90 text-gray-500", Collapsed: "text-gray-400" -->
                                            <svg class="{{ $iconClass }} ml-auto h-5 w-5 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <ul x-show="open" x-transition x-cloak class="mt-1 px-2" id="sub-menu-2">
                                            @foreach($link["href"] as $child)
                                                <li>
                                                    <a href="#" class="hover:bg-slate-300 block rounded-md py-2 pr-2 pl-9 text-sm leading-6 text-gray-400 hover:text-gray-800">
                                                        {{ $child["title"] }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                <!-- Current: "bg-gray-50", Default: "hover:bg-gray-50" -->
                                <a href="#" class="{{ $activeLink }} group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                    <svg class="{{ $iconClass }}h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                    {{ $link["title"] }}
                                </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <div class="text-xs font-semibold leading-6 text-orange-200">Your teams</div>
                    <ul role="list" class="-mx-2 mt-2 space-y-1">
                        <li>
                            <!-- Current: "bg-indigo-700 text-white", Default: "text-indigo-200 hover:text-white hover:bg-indigo-700" -->
                            <a href="#" class="text-orange-200 hover:text-white hover:bg-orange-700 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-orange-400 bg-orange-500 text-[0.625rem] font-medium text-white">H</span>
                                <span class="truncate">Heroicons</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="text-orange-200 hover:text-white hover:bg-orange-700 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-orange-400 bg-orange-500 text-[0.625rem] font-medium text-white">T</span>
                                <span class="truncate">Tailwind Labs</span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="text-orange-200 hover:text-white hover:bg-orange-700 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-orange-400 bg-orange-500 text-[0.625rem] font-medium text-white">W</span>
                                <span class="truncate">Workcation</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="mt-auto">
                    <a href="#" class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-indigo-200 hover:bg-indigo-700 hover:text-white">
                        <svg class="h-6 w-6 shrink-0 text-indigo-200 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Settings
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</div>
