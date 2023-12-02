@props(['event', 'matches'])

<div class="py-16 px-32 mx-auto max-w-screen-xl relative overflow-x-auto shadow-md sm:rounded-lg">

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-4 py-2">
                    Nom
                </th>

                <th scope="col" class="px-4 py-2">
                    Scores
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($matches as $matche)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                <td scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">

                    <div class="ps-3">
                        <div class="text-base font-semibold">{{ $matche->team1->name }} vs {{ $matche->team2->name }}</div>
                    </div>
                </td>

                <td class="px-6 py-4">
                    <div>{{ $matche->score_team1 }} -  {{ $matche->score_team2 }}</div>
                </td>

            </tr>

            @endforeach
        </tbody>
    </table>


    <div class="mt-4">
        {{ $matches->links('components.UI.pagination') }}
    </div> 

</div>